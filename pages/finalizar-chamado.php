<?php 
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$chamado = Painel::select('chamados','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}

	$user = Painel::selectAll('tb_admin.usuarios');
 ?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i>finalizar chamado de <?php foreach($user as $key => $value){
		if($value['id'] == $chamado['user_id']){

			$user_id =  $value['nome'];
			echo $value['user']. "\n";
			echo date('d/m/Y - H:i:s', strtotime($chamado['data']));
		} 
	} ?> </h2>


	

	<form method="post" enctype="multipart/form-data">


		<?php
			if(isset($_POST['acao'])){
				if(Painel::update($_POST)){
					Painel::alert('sucesso','O chamado foi finalizado com sucesso!');
					//$depoimento = Painel::select('tb_site.depoimentos','id = ?',array($id));
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
			}
		?>

		<div class="form-group">
			<label>representante</label>
			<?php
				echo $user_id;
			?>
		</div>

		<div class="form-group">
		<label>Ativo:</label>
			<?php
				$ativos = Painel::selectAll('ativos');
				foreach ($ativos as $key => $value) {
					if($value['id'] == $chamado['ativos_id']) echo $value['nome'];
				}
			?>
		</div>


		<div class="form-group">
			<label>Descriçao</label>
			<?php echo $chamado['conteudo'] ?>
		</div>

		<div class="form-group">
			<label>Resolução</label>
			<textarea class="" name="resposta"><?php recoverPost('resposta'); ?></textarea>
		</div>


		
		<?php
			$user = $_SESSION['user'];
			$usuario = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user= ?");
			$usuario->execute(array($user));
			$usuario = $usuario->fetchAll();
			foreach ($usuario as $key => $value) {
		?>
			<div class="form-group">
				<input type="hidden" name="nome_tabela" value="chamados" />
				<input type="hidden" name="status" value="1" />
				<input type="hidden" name="id" value="<?php echo $id?>" />
				<input type="hidden" name="tec_id" value="<?php echo $value['id'] ?>" />
				<input type="submit" name="acao" value="Finalizar"/>
			</div><!--form-group-->
		<?php }?>

	</form>



</div><!--box-content-->