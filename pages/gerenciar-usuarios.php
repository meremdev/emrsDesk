<?php
	verificaPermissaoPagina(2);
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('tb_admin.usuarios',$idExcluir);
		// $chamados = MySql::conectar()->prepare("SELECT * FROM `chamados` WHERE ativos_id = ?");
		// $chamados->execute(array($idExcluir));
		// $chamados = $chamados->fetchAll();
		// foreach ($chamados as $key => $value) {
		// $imgDelete = $value['capa'];
		// Painel::deleteFile($imgDelete);
		// }
		// $chamados = MySql::conectar()->prepare("DELETE FROM `chamados` WHERE ativos_id = ?");
		// $chamados->execute(array($idExcluir));
		Painel::redirect(INCLUDE_PATH.'gerenciar-usuarios');
	}
	
	// else if(isset($_GET['order']) && isset($_GET['id'])){
	// 	Painel::orderItem('tb_site.categorias',$_GET['order'],$_GET['id']);
	// }
	
	$users = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` ORDER BY id DESC");
	$users->execute();
	$users = $users->fetchAll();
	
?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">usuarios do sistema</h5>
				<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadUserModal">+ novo</button>
			</div>
			<div class="card-body">
				<table id="datatables-cliente" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th>id</th>
							<th>departamento</th>
							<th>reperesentante</th>
							<th>nivel</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($users as $key => $value) {
						?>
							<tr>
								<td><button style="color:#1f9bcf;" class="btn" data-bs-toggle="modal" data-bs-target="#edtUserModal_<?php echo $value['id'] ?>"><i  class="fa fa-edit fa-lg blue" title="Editar"></button></td>
								<td><a actionBtn="delete" class="btn" href="<?php echo INCLUDE_PATH ?>gerenciar-usuarios?excluir=<?php echo $value['id']; ?>"><i style="color:#d9534f;" class="fa fa-trash fa-lg blue" title="excluir"></a></td>
								<td><?php echo $value['id']?></td>
								<td><?php echo $value['user']?></td>
								<td><?php echo $value['nome']?></td>
								<td><?php
									foreach (Painel::$cargos as $key => $cargo) {
										if($value['cargo'] == $key){
											echo '<p>'.$cargo.'</p>';	
										}
									}
								?></td>
							</tr>

							<?php include 'editar-usuarios.php'?>

						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'adicionar-usuario.php'?>