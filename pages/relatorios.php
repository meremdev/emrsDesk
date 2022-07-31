<div class="box-content">
	<h2><i class="fa fa-pencil"></i>Relatorio mensal</h2>

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
            }
        ?>
		<div class="col-form">
			<label>Data inicio</label>
			<input type="date" name="inicio" value="<?php echo $periodo['inicio']?>">
		</div><!--form-group-->

        <div class="col-form">
			<label>Data final</label>
			<input type="date" name="fim" value="<?php echo $periodo['fim']?>">
		</div><!--form-group-->

		<div class="col-form">
			<input type="submit" name="acao" value="Buscar!">
		</div><!--form-group-->

        <div class="clear"></div>
	</form>

    <table>
		<tr>

			<td>departamento</td>
			<td>Ativo</td>
			<td>Descrição</td>
			<td>Data</td>
			<td>estado</td>
			
		</tr>

		<?php
            

			foreach ($chamados as $key => $value) {
            $usuario = Painel::select('tb_admin.usuarios','id=?',array($value['user_id']))['user'];    
			$nomeAtivo = Painel::select('ativos','id=?',array($value['ativos_id']))['nome'];
		?>
		<tr>
			<td><?php echo $usuario; ?></td>
			<td><?php echo $nomeAtivo; ?></td>
			<td><?php echo $value['conteudo']; ?></td>
			<td><?php echo date('d/m/Y - H:i:s',strtotime($value['data'])); ?></td>
			<td>
				<?php 
					if($value['status'] == 1){
						echo '<a class="btn order">Finalizado</a>';
					}else{
						echo '<a class="btn delete">em aberto</a>';
					}  
				?>
			</td>
		</tr>

		<?php } ?>

	</table>

</div><!--box-content-->
