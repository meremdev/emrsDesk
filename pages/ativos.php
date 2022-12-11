<?php
	verificaPermissaoPagina(2);
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('ativos',$idExcluir);
		$chamados = MySql::conectar()->prepare("SELECT * FROM `chamados` WHERE ativos_id = ?");
		$chamados->execute(array($idExcluir));
		$chamados = $chamados->fetchAll();
		foreach ($chamados as $key => $value) {
			$imgDelete = $value['capa'];
			Painel::deleteFile($imgDelete);
		}
		$chamados = MySql::conectar()->prepare("DELETE FROM `chamados` WHERE ativos_id = ?");
		$chamados->execute(array($idExcluir));
		Painel::redirect(INCLUDE_PATH.'ativos');
	}
	
	// else if(isset($_GET['order']) && isset($_GET['id'])){
	// 	Painel::orderItem('tb_site.categorias',$_GET['order'],$_GET['id']);
	// }

	
$ativos = Mysql::conectar()->prepare("SELECT * FROM `ativos` ORDER BY id DESC");
	$ativos->execute();
	$ativos = $ativos->fetchAll();
	
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Gerenciar ativos</h5>
				<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadAtivoModal">+ novo</button>
			</div>
			<div class="card-body">
				<table id="datatables-marca" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th>ID</th>
							<th>Ativos</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($ativos as $key => $value) {
						?>
							<tr>
								<td><button class="btn" data-bs-toggle="modal" data-bs-target="#edtAtivoModal_<?php echo $value['id']; ?>"><i style="color:#1f9bcf;" class="fa fa-edit fa-lg " title="Editar"></button></td>
								<td><a href="<?php echo INCLUDE_PATH ?>ativos?excluir=<?php echo $value['id']; ?>"><i style="color: #d9534f;" class="fa fa-trash fa-lg " title="Excluir"></td>
								<td><?php echo $value['id']; ?></td>
								<td><?php echo $value['nome']; ?></td>
							</tr>


							<?php include 'editar-ativos.php'?>




						<?php } ?>		
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'cadastrar-ativo.php'?>




