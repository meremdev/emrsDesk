<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Registrar Chamado</h2>

	<form method="post" enctype="multipart/form-data">

		<?php

			if(isset($_POST['acao'])){
				$ativo_id = $_POST['ativos_id'];
				$conteudo = $_POST['conteudo'];
				$capa = $_FILES['capa'];

				if($conteudo == ''){
					Painel::alert('erro','Campos Vázios não são permitidos!');
				}else if($capa['tmp_name'] == '' ){
					Painel::alert('erro','A imagem de capa precisa ser selecionada.');
				}else{
					if(Painel::imagemValida($capa)){
						$verifica = MySql::conectar()->prepare("SELECT * FROM `chamados` WHERE ativos_id = ?");
						$verifica->execute(array($ativo_id));
						if($verifica->rowCount() == 0){
						$imagem = Painel::uploadFile($capa);
						//$slug = Painel::generateSlug($titulo);
						$arr = ['ativos_id'=>$ativo_id,'data'=>date('Y-m-d'),'conteudo'=>$conteudo,'capa'=>$imagem,
						'nome_tabela'=>'chamados'
						];
						if(Painel::insert($arr)){
							Painel::redirect(INCLUDE_PATH.'cadastrar-chamado?sucesso');
						}

						//Painel::alert('sucesso','O cadastro da notícia foi realizado com sucesso!');
						}else{
							Painel::alert('erro','Já existe uma notícia com esse nome!');
						}
					}else{
						Painel::alert('erro','Selecione uma imagem válida!');
					}
					
				}
				
				
			}
			if(isset($_GET['sucesso']) && !isset($_POST['acao'])){
				Painel::alert('sucesso','O cadastro foi realizado com sucesso!');
			}
		?>
		<div class="form-group">
		<label>Ativo:</label>
			<select name="ativos_id">
				<?php
					$ativos = Painel::selectAll('ativos');
					foreach ($ativos as $key => $value) {
				?>
				<option <?php if($value['id'] == @$_POST['ativos_id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['nome']; ?></option>
				<?php } ?>
			</select>
		</div>

		<!-- <div class="form-group">
			<label>Título:</label>
			<input type="text" name="titulo" value="<?php recoverPost('titulo'); ?>">
		</div>form-group -->

		<div class="form-group">
			<label>Descreva o chamado</label>
			<textarea class="tinymce" name="conteudo"><?php recoverPost('conteudo'); ?></textarea>
		</div>


		<div class="form-group">
			<label>Imagem</label>
			<input type="file" name="capa"/>
		</div><!--form-group-->

		<div class="form-group">
			<input type="hidden" name="nome_tabela" value="chamados" />
			<input type="hidden" name="user_id" value="" />
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->
		<?php var_dump($_SESSION)?>

	</form>



</div><!--box-content-->