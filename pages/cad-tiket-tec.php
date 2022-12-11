<?php verificaPermissaoPagina(1);?>
<!-- Modal -->
<div class="modal fade" id="cadTiketTecModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">registrar tiket tecnico</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<form method="post">
			<?php
				if(isset($_POST['acao'])){
					$tec_id = $_POST['tec_id'];
					$user_id = $_POST['user_id'];
					$ativo_id = $_POST['ativos_id'];
					$conteudo = strtolower($_POST['conteudo']);
					$resposta = strtolower($_POST['resposta']);
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
								Painel::redirect(INCLUDE_PATH.'gerenciar-tikets?sucesso');
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
			<div class="modal-body">
				<div class="mb-3">
					<label class="form-label">data</label>
					<input type="date" name="data"  value="<?php echo date('Y-m-d')?>"  class="form-control" placeholder="">
				</div>
				
				
				<div class="mb-3">
					<label class="form-label" for="inputState">Departamento</label>
					<select id="inputState" name="user_id" class="form-control">
						<?php
							$query = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` ORDER BY user");
							$query->execute();
							$users = $query->fetchAll();
							foreach ($users as $key => $value) {
						?>
							<option <?php if($value['id'] == @$_POST['user_id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['user']; ?></option>
						<?php } ?>
					</select>
				</div>

				<div class="mb-3 ">
					<label class="form-label" for="inputState">ativos</label>
					<select id="inputState" name="ativos_id" class="form-control">
						<?php
							$query = MySql::conectar()->prepare("SELECT * FROM ativos ORDER BY nome");
							$query->execute();
							$ativos = $query->fetchAll();
							foreach ($ativos as $key => $value) {
						?>
						<option <?php if($value['id'] == @$_POST['ativos_id']) echo 'selected'; ?> value="<?php echo $value['id'] ?>"><?php echo $value['nome']; ?></option>
						<?php } ?>
					</select>
				</div>
				
				<div class="mb-3">
					<label class="form-label">Descrição</label>
					<textarea name="conteudo" class="form-control"><?php recoverPost('conteudo'); ?></textarea>
				</div>
				
				<div class="mb-3">
					<label class="form-label">Parecer tecnico</label>
					<textarea name="resposta" class="form-control"><?php recoverPost('resposta'); ?></textarea>
				</div>
			</div>

			<?php
				$tec = $_SESSION['user'];
				$tecnico = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user= ?");
				$tecnico->execute(array($tec));
				$tecnico = $tecnico->fetchAll();
				foreach ($tecnico as $key => $value) {
			?>

				<div class="modal-footer">
					<input type="hidden" name="nome_tabela" value="chamados" />
					<input type="hidden" name="status" value="1" />
					<input type="hidden" name="tec_id" value="<?php echo $value['id'] ?>" />
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
					<input type="submit" name="acao" class="btn btn-primary" value="registrar">
				</div>
			<?php }?>	
		</form>
    </div>
  </div>
</div>