<?php 
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$usuario = Painel::select('tb_admin.usuarios','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parametro ID.');
		die();
	}
 ?>
<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Editar Usuario</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
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
				}else{
					Painel::alert('erro','Campos vázios não são permitidos.');
				}
				}
			}
		?>

		<div class="form-group">
			<label>Departamento:</label>
			<input type="text" name="user" value="<?php echo $usuario['user'] ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nome" value="<?php echo $usuario['nome'] ?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Senha:</label>
			<input type="password" name="password" value="<?php echo $usuario['password'] ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Cargo:</label>
			<select name="cargo">
			
				<?php
					$cg = '';
					foreach (Painel::$cargos as $key => $value) {
						if($usuario['cargo']){
							$cg = 'selected';
							
						}
						echo '<option value="'.$key.'">' .$value. '</option>';	
					}
					
				?>
			</select>
		</div><!--form-group-->



		<div class="form-group">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="nome_tabela" value="tb_admin.usuarios" />
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->