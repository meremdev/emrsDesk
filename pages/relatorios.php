<?php verificaPermissaoPagina(1); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">buscar ocorrencias</h5>
			</div>
			<div class="card-body">
				<form method="post" class="row row-cols-md-auto align-items-center">
					<?php
						

						$periodo = filter_input_array(INPUT_POST, FILTER_DEFAULT);

						if(isset($_POST['acao'])){

							$query = "SELECT * FROM chamados WHERE `data` BETWEEN :inicio AND :fim AND status= 1";
							$sql = MySql::conectar()->prepare($query);
							$sql->bindParam(':inicio', $periodo['inicio']);
							$sql->bindParam(':fim', $periodo['fim']);
							$sql->execute();
							$chamados = $sql->fetchAll();
						}else{
							$chamados = array();
						}
					?>
					<div class="col-12">
						<label class="sr-only" for="inlineFormInputName2">inicio do periodo</label>
						<input type="date" name="inicio" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"  value="<?php echo isset($periodo['inicio']) ? $periodo['inicio'] :  date('Y-m-d') ?>">
					</div>

					<div class="col-12">
						<div class="input-group mb-2 mr-sm-2">
							<label class="sr-only" for="inlineFormInputName2">finaldo do periodo</label>
							<input type="date" name="fim" class="form-control" id="inlineFormInputGroupUsername2"   value="<?php echo isset($periodo['fim']) ? $periodo['fim'] :  date('Y-m-d') ?>">
						</div>
					</div>

					<div class="col-12">
						<button type="submit" name="acao" class="btn btn-primary mb-2">buscar</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">

			<form class="" action="<?php echo INCLUDE_PATH; ?>pdf.php" method="get" target="_blank" >
				<input type="hidden" name="inicio" value="<?php echo $periodo['inicio'] ?>">
				<input type="hidden" name="fim" value="<?php echo $periodo['fim'] ?>">
				<input class="btn btn-success" type="submit" name="acao_pdf" value="Gerar pdf">
			</form>
			
			</div>
			<div class="card-body">
			

				<table id="datatables-marca" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							
						
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
						<?php } ?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>