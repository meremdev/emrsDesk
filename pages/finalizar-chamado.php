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
			
			echo $value['user']. "\n";
			echo date('d/m/Y - H:i:s', strtotime($chamado['data']));
		} 
	} ?> </h2>


	

	<form method="post" enctype="multipart/form-data">


		<?php
			if(isset($_POST['acao'])){
				if(Painel::update($_POST)){
					Painel::alert('sucesso','O chamado foi finalizado com sucesso!');
					$depoimento = Painel::select('tb_site.depoimentos','id = ?',array($id));
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
			}
		?>

		<div class="form-group">
			<label>representante</label>
			<?php echo $value['nome'] ?>
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
			<input type="hidden" name="nome_tabela" value="chamados" />
			<input type="hidden" name="status" value="1" />
			<input type="hidden" name="id" value="<?php echo $id?>" />
			<input type="submit" name="acao" value="Finalizar"/>
		</div><!--form-group-->

	</form>



</div><!--box-content-->