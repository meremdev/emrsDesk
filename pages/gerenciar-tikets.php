<?php
	verificaPermissaoPagina(1);
    if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		Painel::deletar('chamados',$idExcluir);
		Painel::redirect(INCLUDE_PATH.'gerenciar-tikets');
	}
	
	// else if(isset($_GET['order']) && isset($_GET['id'])){
	// 	Painel::orderItem('tb_site.noticias',$_GET['order'],$_GET['id']);
	// }

	$chamados = Mysql::conectar()->prepare("SELECT * FROM `chamados` ORDER BY `id` DESC");
	$chamados->execute();
	$chamados = $chamados->fetchAll();
	
	
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">tikets</h5>
				<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadTiketTecModal">+ novo</button>
			</div>
			<div class="card-body">
				<table id="datatables-marca" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							
							<th></th>
							<th></th>
							<th>ID</th>
							<td>Tecnico</td>
							<td>Departamento</td>
							<td>Ativo</td>
							<td>Descrição</td>
							<td>Status</td>
							<td>Data</td>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($chamados as $key => $value) {
								
							@$tecnico = Painel::select('tb_admin.usuarios','id=?', array($value['tec_id']))['nome'];	
							$usuario = Painel::select('tb_admin.usuarios','id=?',array($value['user_id']))['user'];
							$nomeAtivo = Painel::select('ativos','id=?',array($value['ativos_id']))['nome'];
						?>
							<tr>
								<td><button class="btn response" style="color: #3f80ea;" data-bs-toggle="modal" data-bs-target="#tikRespModal_<?php echo $value['id']; ?>"><i class="fa fa-clipboard-check fa-lg blue" title="responder chamado"></button></td>
								<td><a actionBtn="delete" style="color: #d9534f;" class="btn delete" href="<?php echo INCLUDE_PATH ?>gerenciar-tikets?excluir=<?php echo $value['id']; ?>"><i class="fa fa-trash fa-lg red" title="Excluir"></a></td>
								<td><?php echo $value['id']; ?></td>
								<td><?php echo $tecnico; ?></td>
								<td><?php echo $usuario; ?></td>
								<td><?php echo $nomeAtivo; ?></td>
								<td><?php echo $value['conteudo']; ?></td>
								<td>
									<?php
										if($value['status'] == 1){
											echo '<p class="badge bg-success">Finalizado</p>';
										}else{
											echo '<p class="badge bg-danger"">em aberto</p>';
										}
									?>
								</td>
								<td><?php echo date('d/m/Y',strtotime($value['data'])); ?></td>
							</tr>

							<?php include 'finalizar-tiket.php'?>
							
						<?php } ?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'cad-tiket-tec.php'?>