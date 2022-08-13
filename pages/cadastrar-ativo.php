<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Ativo</h2>

	<form method="post" enctype="multipart/form-data">

		<?php

			if(isset($_POST['acao'])){
				$nome = $_POST['nome'];
				if($nome == ''){
					Painel::alert('erro','O campo nome não pode ficar vázio!');
				}else{
					//Apenas cadastrar no banco de dados!
					$verificar = MySql::conectar()->prepare("SELECT * FROM `ativos` WHERE nome = ?");
					$verificar->execute(array($_POST['nome']));
					if($verificar->rowCount() == 0){
					//$slug = Painel::generateSlug($nome);

					$arr = ['nome'=>$nome,'nome_tabela'=>'ativos'];
					Painel::insert($arr);
					Painel::alert('sucesso','O cadastro do ativo foi realizado com sucesso!');
					}else{
						Painel::alert("erro",'Já existe uma ativo com este nome!');
					}
				}
				
			}
		?>

		<div class="form-group">
			<label>Nome do ativo</label>
			<input type="text" name="nome" placeholder="ex: computador, rede, impressora ">
		</div><!--form-group-->


		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->