<?php
	// $usuariosOnline = Painel::listarUsuariosOnline();
?>
<div  <?php verificaPermissaoMenu(2); ?>class="box-content w100">
		<h2><i class="fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA ?></h2>

		<div class="box-metricas">
			
			
			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>chamados do dia</h2>
					<p><?php ?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>chamados mensais</h2>
					<p><?php ?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Total de chamados</h2>
					<p><?php ?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->
			<div class="clear"></div>
		</div><!--box-metricas-->

</div><!--box-content-->


<div <?php verificaPermissaoMenu(2); ?> class="box-content w100 right">
	<h2><i class="fa fa-rocket" aria-hidden="true"></i> Usuários do Painel</h2>

	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>Nome</span>
			</div><!--col-->
			<div class="col">
				<span>Cargo</span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->

		<?php
			$usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
			$usuariosPainel->execute();
			$usuariosPainel = $usuariosPainel->fetchAll();
			foreach ($usuariosPainel as $key => $value) {

		?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['user'] ?></span>
			</div><!--col-->
			<div class="col">
				<span><?php echo $value['id']; ?></span>
			</div><!--col-->
			<div class="clear"></div>
		</div><!--row-->
		<?php } ?>
	</div><!--table-responsive-->
</div><!--box-content-->

<div class="clear"></div>