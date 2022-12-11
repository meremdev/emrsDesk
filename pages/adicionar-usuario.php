<?php verificaPermissaoPagina(2);?>
<!-- Modal -->
<div class="modal fade" id="cadUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
			<h1 class="modal-title fs-5" id="exampleModalLabel">Dados do Cliente</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<form method="post">
			<?php
				if(isset($_POST['acao_cad'])){
					$login = strtolower($_POST['login']);
					$nome = strtolower($_POST['nome']);
					$senha = $_POST['password'];
					$cargo = $_POST['cargo'];

					if($login == ''){
						Painel::alert('erro','O login está vázio!');
					}else if($nome == ''){
						Painel::alert('erro','O nome está vázio!');
					}else if($senha == ''){
						Painel::alert('erro','A senha está vázia!');
					}else if($cargo == ''){
						Painel::alert('erro','O cargo precisa estar selecionado!');
					}else{
					
						
						if(Usuario::userExists($login)){
							Painel::alert('erro','O Departamento já , selecione outro por favor!');
						}else{
							//Apenas cadastrar no banco de dados!
							$usuario = new Usuario();
							$usuario->cadastrarUsuario($login,$senha,$nome,$cargo);
							Painel::alert('sucesso','O cadastro do usuário '.$login.' foi feito com sucesso!');
							Painel::redirect(INCLUDE_PATH . 'gerenciar-usuarios');
						}
					}

				}
			?>
			<div class="modal-body">
				<div class="mb-3">
					<label class="form-label">Departamento</label>
					<input type="text" name="login" class="form-control" placeholder="">
				</div>
				
				
				<div class="mb-3 ">
					<label class="form-label" for="inputState">Representante</label>
					<input type="text" name="nome" class="form-control" placeholder="">
				</div>

				<div class="mb-3 ">
					<label class="form-label" for="inputState">Senha</label>
					<input type="password" name="password" class="form-control" placeholder="">
				</div>

				<div class="mb-3">
					<label class="form-label" for="inputState">Nivel</label>
					<select name="cargo" id="inputState" class="form-control">
						<?php
							foreach (Painel::$cargos as $key => $value) {
								
								echo '<option value="'.$key.'">'.$value.'</option>';
							}
						?>
					</select>
				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
				<input type="submit" name="acao_cad" class="btn btn-primary" value="cadastrar">
			</div>
		</form>
    </div>
  </div>
</div>
		