<?php
	$user = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ?");
	$user->execute(array($_SESSION['user']));
	$user = $user->fetch();
	$user_id = $user['id'];
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Gerenciar Tikets</h5>
				<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tiketsModal">+ novo</button>
			</div>
			<div class="card-body">
				<table id="datatables-marca" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Data</th>
							<th>Ativo</th>
							<th>Descrição</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = "SELECT * FROM `chamados` WHERE user_id = $user_id";
							$sql = MySql::conectar()->prepare($query);
							$sql->execute();
							$chamados = $sql->fetchAll();
				
							foreach ($chamados as $key => $value) {
							$nomeAtivo = Painel::select('ativos','id=?',array($value['ativos_id']))['nome'];
						?>
						<tr>
							<td><?php echo $value['id'] ?></td>
							<td><?php echo date('d/m/Y',strtotime($value['data'])); ?></td>
							<td><?php echo $nomeAtivo; ?></td>
							<td><?php echo $value['conteudo']; ?></td>
							<td><?php 
									if($value['status'] == 1){
										echo '<p class="badge bg-success">Finalizado</p>';
									}else{
										echo '<p class="badge bg-danger">em aberto</p>';
									}  
								?>
							</td>
							
						</tr>
						<?php }?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include 'cadastrar-tiket.php'?>