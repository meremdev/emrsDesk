<?php

	$user = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ?");
	$user->execute(array($_SESSION['user']));
	$user = $user->fetch();
?>
<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Chamados Registrados</h2>
	<div class="wraper-table">
	<table>
		<tr>

			<td>Ativo</td>
			<td>Descriçao</td>
			<td>Data</td>
			<td>Status</td>
			
		</tr>

		<?php
			$porPagina = 3;
			
			$query = "SELECT * FROM `chamados`";
			if(isset($user['id'])){
				$query.="WHERE user_id = $user[id]";

				$totalPaginas = MySql::conectar()->prepare($query);
				$totalPaginas->execute();
				$totalPaginas = ceil($totalPaginas->rowCount() / $porPagina);

				if(isset($_GET['pagina'])){
					$pagina = (int)$_GET['pagina'];
					if($pagina > $totalPaginas){
						$pagina = 1;
					}

	
					$queryPg = ($pagina - 1) * $porPagina;
					$query.=" ORDER BY id DESC LIMIT $queryPg,$porPagina";					
				}else{
					$pagina = 1;
					$query.=" ORDER BY id DESC LIMIT 0,$porPagina";
				}
			}

			

			$sql = MySql::conectar()->prepare($query);
			$sql->execute();
			$chamados = $sql->fetchAll();

			foreach ($chamados as $key => $value) {
			$nomeAtivo = Painel::select('ativos','id=?',array($value['ativos_id']))['nome'];
		?>
		<tr>
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
	</div>

	<div class="paginacao">
		<?php
			// $totalPaginas = ceil(count(Painel::selectAll('chamados')) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($pagina == $i )
					echo '<a class="page-selected" href="'.INCLUDE_PATH.'visualizar-Chamados?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH.'visualizar-chamados?pagina='.$i.'">'.$i.'</a>';
			}

		?>
	</div><!--paginacao-->


</div><!--box-content-->