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
			
		</tr>

		<?php
			$porPagina = 1;
			
			$query = "SELECT * FROM `chamados`";
			if(isset($user['id'])){
				$query.="WHERE user_id = $user[id] ORDER BY id DESC";
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
		</tr>

		<?php } ?>

	</table>
	</div>

	<div class="paginacao">
		<?php
			// $totalPaginas = ceil(count(Painel::selectAll('chamados')) / $porPagina);

			// for($i = 1; $i <= $totalPaginas; $i++){
			// 	if($i == $paginaAtual)
			// 		echo '<a class="page-selected" href="'.INCLUDE_PATH.'visualizar-Chamados?pagina='.$i.'">'.$i.'</a>';
			// 	else
			// 		echo '<a href="'.INCLUDE_PATH.'visualizar-chamados?pagina='.$i.'">'.$i.'</a>';
			// }

		?>
	</div><!--paginacao-->


</div><!--box-content-->