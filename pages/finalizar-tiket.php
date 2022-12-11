<?php 
	verificaPermissaoPagina(1);
	$id = $value['id'];
	$chamado = Painel::select('chamados','id = ?',array($id));
	$user = Painel::selectAll('tb_admin.usuarios');
 ?>
<!-- Modal -->
<div class="modal fade" id="tikRespModal_<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">finalizar tiket do <?php foreach($user as $key => $value){
					if($value['id'] == $chamado['user_id']){

						$user_id =  $value['nome'];
						echo $value['user']. "\n";
						echo date('d/m/Y', strtotime($chamado['data']));
					} 
				} ?>  
			</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<form method="post">
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
			<div class="modal-body">
				<div class="mb-3">
					<label class="form-label form-control">Representante:</label>
					<p> <?php echo $user_id; ?></p>
				</div>
				
				<div class="mb-3">
					<label class="form-label form-control">Ativo:</label>
					<p><?php
						$ativos = Painel::selectAll('ativos');
						foreach ($ativos as $key => $value) {
							if($value['id'] == $chamado['ativos_id']) echo $value['nome'];
						}
					?></p>
				</div>
				
				<div class="mb-3">
					<label class="form-label form-control">descrição: </label>
					<p><?php echo $chamado['conteudo'] ?></p>
				</div>

				<hr>

				<div class="mb-3">
					<label class="form-label">Parecer Tecnico</label>
					<textarea name="resposta" class="form-control" ><?php echo isset($chamado['resposta']) ? $chamado['resposta'] : '' ?></textarea>
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
					<input type="hidden" name="status" value="1" />
					<input type="hidden" name="id" value="<?php echo $id?>" />
					<input type="hidden" name="tec_id" value="<?php echo $value['id'] ?>" />
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<input type="submit" name="acao" class="btn btn-primary" value="finalizar">
				</div>
			<?php }?>	
		</form>
    </div>
  </div>
</div>
					