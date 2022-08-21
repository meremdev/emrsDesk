<div class="box-content rat">
	<h2><i class="fa fa-pencil"></i>Relatorio</h2>

	
	<div class="forms">
		<form class="relatorio" method="post" enctype="multipart/form-data">
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
					$query = "SELECT * FROM chamados WHERE status= 1";
					$sql = MySql::conectar()->prepare($query);
					$sql->execute();
					$chamados = $sql->fetchAll();
				}
			?>
			<div class="col-form">
				<label>Data inicio</label>
				<input required type="date" name="inicio" value="<?php echo isset($periodo['inicio']) ? $periodo['inicio'] :  date('Y-m-d') ?>">
			</div><!--form-group-->

			<div class="col-form">
				<label>Data final</label>
				<input required type="date" name="fim" value="<?php echo isset($periodo['inicio']) ? $periodo['inicio'] :  date('Y-m-d') ?>">
			</div><!--form-group-->

			<div class="col-form">
				<input type="submit" name="acao" value="Buscar!">
			</div><!--form-group-->

			

			<div class="clear"></div>
		</form>

		<form class="" action="<?php echo INCLUDE_PATH; ?>pdf.php" method="get" target="_blank" >
			<input type="hidden" name="inicio" value="<?php echo $periodo['inicio'] ?>">
			<input type="hidden" name="fim" value="<?php echo $periodo['fim'] ?>">
			<input class="form_pdf" type="submit" name="acao_pdf" value="Gerar pdf">
		</form>
	</div>
	



	<?php

		foreach ($chamados as $key => $value) {
		$tecnico = Painel::select('tb_admin.usuarios','id=?', array($value['tec_id']))['nome'];		
		$usuario = Painel::select('tb_admin.usuarios','id=?',array($value['user_id']))['user'];    
		$nomeAtivo = Painel::select('ativos','id=?',array($value['ativos_id']))['nome'];
	?>
		<div class="rats">
		
			<div class="rat_logo">
				<img src="./images/lhcons_logo.jpeg" width="200" height="240" alt="">
			</div>

			<div class="rat_header">
				<div class="rat_title">
					<h1>RELATÓRIO DE ATIVIDADES TECNICAS</h1>
				</div>
				<div class="">
					<p><span>PRESTADOR (ES)</span></p>
					<P><?php echo $tecnico ; ?></p>
					<p><span>REF: </span><?php echo date('d/m/Y',strtotime($value['data'])); ?></p>
				</div>
			</div>

			<div class="rat_cli">
				<p><span>CLIENTE:</span> BENEFICENCIA HOSPITALAR CESARIO DE LANGE</p>
			</div>

			<div class="rat_unit">
				<p><span>UNIDADE:</span> HOSPITAL MUNICIPAL DA CRIANÇA E DO ADOLESCENTE</p>
			</div>

			<div class="rat_dep">
				<ul>
					<li><?php echo $usuario; ?></li>
				</ul>		
			
			</div>

			<div class="rat_descr">
				<div>
					<p><?php echo $value['conteudo'] ?> </p>
				</div>
				<div>
					<p><?php echo $value['resposta']?></p>
				</div>
			</div>

			<div class="rat_ativo">
				<p><?php echo $nomeAtivo;?><p>
			</div>

			<!-- <div class="rat_void"></div> -->

		</div>

	<?php } ?>

	

</div><!--box-content-->
