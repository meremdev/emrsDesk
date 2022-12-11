<?php verificaPermissaoPagina(2);?>
<!-- Modal editar -->
<div class="modal fade" id="edtAtivoModal_<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Dados do ativo</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form method="post">
				<?php
					$id = $value['id'];
					$ativo = Painel::select('ativos','id = ?',array($id));
					if(isset($_POST['acao'])){
						$arr = $_POST;
						$verificar = MySql::conectar()->prepare("SELECT * FROM `ativos` WHERE nome = ? AND id != ?");
						$verificar->execute(array(strtolower($_POST['nome']),$id));
						$info = $verificar->fetch();
						if($verificar->rowCount() == 1){
							Painel::alert("erro",'Já existe um Ativo com este nome!');
						}else{
						if(Painel::update($arr)){
							Painel::alert('sucesso','O Ativo foi editado com sucesso!');
							$ativo = Painel::select('ativos','id = ?',array($id));
							Painel::redirect(INCLUDE_PATH.'ativos');
						}else{
							Painel::alert('erro','Campos vázios não são permitidos.');
						}
						}
					}
				?>
				<div class="modal-body">
					<div class="mb-3">
						<label class="form-label">nome do ativo</label>
						<input type="text" name="nome" class="form-control" value="<?php echo $ativo['nome']; ?>" placeholder="">
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="nome_tabela" value="ativos" />
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<input type="submit" class="btn btn-primary" name="acao" value="Atualizar">
				</div>
			</form>
		</div>
	</div>
</div>