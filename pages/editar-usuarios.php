<?php verificaPermissaoPagina(2);?>
<!-- Modal editar-->
<div class="modal fade" id="edtUserModal_<?php echo $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">Editar dados do usuario</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<form method="post">
			<?php
				$id = $value['id'];
				$usuario = Painel::select('tb_admin.usuarios','id = ?',array($id));

				if(isset($_POST['acao'])){
					$arr = $_POST;
					$verificar = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE nome = ? AND id != ?");
					$verificar->execute(array($_POST['nome'],$id));
					$info = $verificar->fetch();
					if($verificar->rowCount() == 1){
						Painel::alert("erro",'Já existe um usuario com este nome!');
					}else{
						if(Painel::update($arr)){
							Painel::alert('sucesso','O Usuario foi editado com sucesso!');
							$ativo = Painel::select('tb_admin.usuarios','id = ?',array($id));
							Painel::redirect(INCLUDE_PATH . 'gerenciar-usuarios');
						}else{
							Painel::alert('erro','Campos vázios não são permitidos.');
						}
					}
				}
			?>
			<div class="modal-body">
				<div class="mb-3">
					<label class="form-label">Departamento</label>
					<input type="text" name="user" class="form-control" placeholder="" value="<?php echo $usuario['user'] ?>">
				</div>
				
				
				<div class="mb-3 ">
					<label class="form-label" for="inputState">Representante</label>
					<input type="text" name="nome" class="form-control" placeholder="" value="<?php echo $usuario['nome'] ?>">
				</div>

				<div class="mb-3 ">
					<label class="form-label" for="inputState">Senha</label>
					<input type="password" name="password" class="form-control" placeholder="" value="<?php echo $usuario['password'] ?>" >
				</div>

				<div class="mb-3">
					<label class="form-label" for="inputState">Nivel</label>
					<select name="cargo" id="inputState" class="form-control">
						<?php
							foreach (Painel::$cargos as $key => $cargo) {
								if($usuario['cargo'] == $key){
									echo '<option selected  value="'.$key.'">'.$cargo.'</option>';	
								}else{
									echo '<option  value="'.$key.'">'.$cargo.'</option>';	
								}
							}
						?>
					</select>
				</div>
				
			</div>
			<div class="modal-footer">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
				<input type="hidden" name="nome_tabela" value="tb_admin.usuarios" />
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
				<input type="submit" name="acao" class="btn btn-primary" value="editar">
			</div>
		</form>
    </div>
  </div>
</div>
		