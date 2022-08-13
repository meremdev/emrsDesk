<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Registrar Chamado</h2>

	<form method="post" enctype="multipart/form-data">

		<?php

			if(isset($_POST['acao'])){
				$tec_id = $_POST['tec_id'];
				$user_id = $_POST['user_id'];
				$ativo_id = $_POST['ativos_id'];
				$conteudo = $_POST['conteudo'];
				$resposta = $_POST['resposta'];
				$status = $_POST['status'];
				$data = $_POST['data'];

				if($conteudo == ''){
					Painel::alert('erro','Campos Vázios não são permitidos!');
				}else{
					$verifica = MySql::conectar()->prepare("SELECT * FROM `chamados` WHERE ativos_id = ?");
					$verifica->execute(array($ativo_id));
					if(isset($verifica)){
					
						$arr = ['tec_id' => $tec_id, 'user_id' => $user_id, 'ativos_id'=>$ativo_id, 'data'=>$data,'conteudo'=>$conteudo, 'resposta' => $resposta , 'status'=>$status,
						'nome_tabela'=>'chamados'
						];
						if(Painel::insert($arr)){
							Painel::redirect(INCLUDE_PATH.'cadastrar-chamado-tec?sucesso');
						}

					}else{
						Painel::alert('erro','Não foi possivel cadastrar!');
					}
					
				}
				
				
			}
			if(isset($_GET['sucesso']) && !isset($_POST['acao'])){
				Painel::alert('sucesso','O cadastro foi realizado com sucesso!');
			}
		?>
		
		<div class="form-group">
			<label>Data</label>
			<input type="date" name="data" value="<?php echo date('Y-m-d')?>" id="">
		</div>

		<div class="form-group">
			<label>Departamento:</label>
			<select name="user_id">
				<?php
					$users = Painel::selectAll('tb_admin.usuarios');
					foreach ($users as $key => $value) {
				?>
				<option <?php if($value['id'] == @$_POST['user_id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['user']; ?></option>
				<?php } ?>
			</select>
		</div>

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


		<div class="form-group">
			<label>Descreva o chamado</label>
			<textarea class="" name="conteudo"><?php recoverPost('conteudo'); ?></textarea>
		</div>

		<div class="form-group">
			<label>Resolução</label>
			<textarea class="" name="resposta"><?php recoverPost('resposta'); ?></textarea>
		</div>


		<?php
			$tec = $_SESSION['user'];
			$tecnico = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user= ?");
			$tecnico->execute(array($tec));
			$tecnico = $tecnico->fetchAll();
			foreach ($tecnico as $key => $value) {
		?>
			
			<div class="form-group">
				<input type="hidden" name="nome_tabela" value="chamados" />
				<input type="hidden" name="status" value="1" />
				<input type="hidden" name="tec_id" value="<?php echo $value['id'] ?>" />
				<input type="submit" name="acao" value="Cadastrar!"/>
			</div><!--form-group-->
		<?php }?>

	</form>



</div><!--box-content-->