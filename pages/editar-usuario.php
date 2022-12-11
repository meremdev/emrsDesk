<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h2><i class="fa fa-pencil"></i> Editar Usuário</h2>
			</div>	
			
			<div class="card-body">
				<form method="post" enctype="multipart/form-data">

					<?php
						if(isset($_POST['acao'])){
							//Enviei o meu formulário.
							
							$nome = strtolower($_POST['nome']);
							$senha = strtolower($_POST['password']);
							$usuario = new Usuario();

							if($usuario->atualizarUsuario($nome,$senha)){
								$_SESSION['nome'] = $nome;
								Painel::alert('sucesso','Atualizado com sucesso!');
							}else{
								Painel::alert('erro','Ocorreu um erro ao atualizar...');
							}
							

						}
					?>

					<div class="mb-3 col-6">
						<label>Nome:</label>
						<input class="form-control" type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
					</div><!--form-group-->

					<div class="mb-3 col-6">
						<label>Senha:</label>
						<input class="form-control" type="password" name="password" value="<?php echo $_SESSION['password']; ?>" required>
					</div><!--form-group-->


					<div class="form-group ">
						<input class="btn btn-info" type="submit" name="acao" value="Atualizar!">
					</div><!--form-group-->

				</form>
			</div>	
		</div>	
	</div>


</div><!--box-content-->