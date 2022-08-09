<?php 
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$ativo = Painel::select('ativos','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
 ?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Categoria</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$arr = $_POST;
				$verificar = MySql::conectar()->prepare("SELECT * FROM `ativos` WHERE nome = ? AND id != ?");
				$verificar->execute(array($_POST['nome'],$id));
				$info = $verificar->fetch();
				if($verificar->rowCount() == 1){
					Painel::alert("erro",'Já existe uma categoria com este nome!');
				}else{
				if(Painel::update($arr)){
					Painel::alert('sucesso','A categoria foi editada com sucesso!');
					$ativo = Painel::select('ativos','id = ?',array($id));
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
				}
			}
		?>

		<div class="form-group">
			<label>Categoria:</label>
			<input type="text" name="nome" value="<?php echo $ativo['nome']; ?>">
		</div><!--form-group-->



		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="ativos" />
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->