<!-- Modal -->
<div class="modal fade" id="tiketsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">abertura de chamado</h1>
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

					

					if($conteudo == ''){
						Painel::alert('erro','Campos Vázios não são permitidos!');
					}else{
						$verifica = MySql::conectar()->prepare("SELECT user_id FROM `chamados` WHERE ativos_id = ? ORDER BY id DESC ");
						$verifica->execute(array($ativo_id));
						if(isset($verifica)){
						
							$arr = ['tec_id' => $tec_id, 'user_id' => $user_id, 'ativos_id'=>$ativo_id, 'data'=>date('Y-m-d'), 'conteudo'=>$conteudo, 'resposta' => $resposta, 'status'=>$status,
							'nome_tabela'=>'chamados'
							];
							if(Painel::insert($arr)){
								Painel::redirect(INCLUDE_PATH.'tikets?sucesso');
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
					<label class="form-label">Ativo</label>
					<select name="ativos_id" class="form-control" >
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
					<textarea class="form-control" name="conteudo"><?php recoverPost('conteudo'); ?></textarea>
				</div>
				
			</div>

			<?php
				$user = $_SESSION['user'];
				$usuario = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user= ?");
				$usuario->execute(array($user));
				$usuario = $usuario->fetchAll();
				foreach ($usuario as $key => $value) {
			?>
				<div class="modal-footer">
					<input type="hidden" name="nome_tabela" value="chamados" />
					<input type="hidden" name="status" value="0" />
					<input type="hidden" name="user_id" value="<?php echo $value['id']?>" />
					<input type="hidden" name="tec_id" value="0" />
					<input type="hidden" name="resposta" value="0" />
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
					<input type="submit" name="acao" value="registrar"  class="btn btn-primary">
				</div>
			<?php }?>
		</form>
    </div>
  </div>
</div>