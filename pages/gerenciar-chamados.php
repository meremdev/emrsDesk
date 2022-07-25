<?php
	if(isset($_GET['excluir'])){
		$idExcluir = intval($_GET['excluir']);
		$selectImagem = MySql::conectar()->prepare("SELECT capa FROM `chamados` WHERE id = ?");
		$selectImagem->execute(array($_GET['excluir']));

		$imagem = $selectImagem->fetch()['capa'];
		Painel::deleteFile($imagem);
		Painel::deletar('chamados',$idExcluir);
		Painel::redirect(INCLUDE_PATH.'gerenciar-chamados');
	}
	
	// else if(isset($_GET['order']) && isset($_GET['id'])){
	// 	Painel::orderItem('tb_site.noticias',$_GET['order'],$_GET['id']);
	// }

	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 4;
	
	$chamados = Painel::selectAll('chamados',($paginaAtual - 1) * $porPagina,$porPagina);
	
?>
<div class="box-content">
	<h2><i class="fa fa-id-card-o" aria-hidden="true"></i> Chamados Registrados</h2>
	<div class="wraper-table">
	<table>
		<tr>
			<td>Departamento</td>
			<td>Ativo</td>
			<td>Descriçao</td>
			<td>#</td>
			<td>#</td>
			
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
			<td><a class="btn edit" href="<?php echo INCLUDE_PATH ?>editar-noticia?id=<?php echo $value['id']; ?>"><i class="fa fa-pencil"></i> Editar</a></td>
			<td><a actionBtn="delete" class="btn delete" href="<?php echo INCLUDE_PATH ?>gerenciar-chamados?excluir=<?php echo $value['id']; ?>"><i class="fa fa-times"></i> Excluir</a></td>
		</tr>

		<?php } ?>

	</table>
	</div>

	<div class="paginacao">
		<?php
			$totalPaginas = ceil(count(Painel::selectAll('chamados')) / $porPagina);

			for($i = 1; $i <= $totalPaginas; $i++){
				if($i == $paginaAtual)
					echo '<a class="page-selected" href="'.INCLUDE_PATH.'gerenciar-chamados?pagina='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH.'gerenciar-chamados?pagina='.$i.'">'.$i.'</a>';
			}

		?>
	</div><!--paginacao-->


</div><!--box-content-->