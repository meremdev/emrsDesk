<?php
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
		Painel::redirect(INCLUDE_PATH.'gerenciar-ativos');
	}
	
	// else if(isset($_GET['order']) && isset($_GET['id'])){
	// 	Painel::orderItem('tb_site.categorias',$_GET['order'],$_GET['id']);
	// }

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 50;
	
	$ativos = Painel::selectAll('ativos',($paginaAtual - 1) * $porPagina,$porPagina);
	
?>
<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Ativos Cadastrados</h2>
	<div class="wraper-table">
	<table>
		<tr>
			<td>Ativos</td>
			<td>#</td>
			<td>#</td>
		</tr>

		<?php
			foreach ($ativos as $key => $value) {
		?>
		<tr>
			<td><?php echo $value['nome']; ?></td>
			<td><a class="btn edit" href="<?php echo INCLUDE_PATH ?>editar-ativos?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
			<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH ?>gerenciar-ativos?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>
		</tr>

		<?php } ?>

	</table>
	</div>

	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selectAll('ativos')) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH.'gerenciar-ativos?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH.'gerenciar-ativos?pagina='.$i.'">'.$i.'</a>';
			}

		?>
	</div><!--paginacao-->


</div><!--box-content-->