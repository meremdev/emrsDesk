<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel de Controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH ?>estilo/font-awesome.min.css">
	<link href="<?php echo INCLUDE_PATH ?>estilo/style.css" rel="stylesheet" />
</head>
<body>

<div class="menu">
	<div class="menu-wraper">
	<div class="box-usuario">
			<div class="avatar-usuario">
				<i class="fa fa-user"></i>
			</div><!--avatar-usuario-->
		
		<div class="nome-usuario">
			<p><?php echo $_SESSION['user']; ?></p>
			<p><?php echo $_SESSION['nome']; ?></p>
		</div><!--nome-usuario-->
	</div><!--box-usuario-->
	<div class="items-menu">
		<h2>Chamados</h2>
		<a <?php selecionadoMenu('cadastrar-chamado'); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-chamado">Registrar</a>
		
		<a <?php selecionadoMenu('visualizar-chamados'); ?> href="<?php echo INCLUDE_PATH ?>visualizar-chamados">Visualizar</a>
		<a <?php selecionadoMenu('cadastrar-ativo'); ?>  <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>cadastrar-ativo">Cadastrar Ativos</a>
		<a <?php selecionadoMenu('gerenciar-ativos'); ?>  <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH ?>gerenciar-ativos">Gerenciar Ativos</a>
		<a <?php selecionadoMenu('gerenciar-chamados'); ?>  <?php verificaPermissaoMenu(1);?> href="<?php echo INCLUDE_PATH ?>gerenciar-chamados">Gerenciar Chamados</a>
		<h2 <?php verificaPermissaoMenu(1);?>>Relatorios</h2>
		<a <?php selecionadoMenu('cadastrar-chamado-tec'); ?> <?php verificaPermissaoMenu(1);?> href="<?php echo INCLUDE_PATH ?>cadastrar-chamado-tec">Cadastrar RAT</a>
		<a <?php selecionadoMenu('relatorios'); ?>  <?php verificaPermissaoMenu(1);?> href="<?php echo INCLUDE_PATH ?>relatorios">Relatorios</a>

		<h2 <?php verificaPermissaoMenu(1);?>>Usuarios</h2>
		<a <?php selecionadoMenu('editar-usuario'); ?> <?php verificaPermissaoMenu(1);?> href="<?php echo INCLUDE_PATH ?>editar-usuario">Editar Usuário</a>
		<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2);?> href="<?php echo INCLUDE_PATH ?>adicionar-usuario">Adicionar Usuário</a>
		<a <?php selecionadoMenu('gerenciar-usuarios'); ?> <?php verificaPermissaoMenu(2);?> href="<?php echo INCLUDE_PATH ?>gerenciar-usuarios">Gerenciar Usuário</a>
	</div><!--items-menu-->
	</div><!--menu-wraper-->
</div><!--menu-->

<header>
	<div class="center">
		<div class="menu-btn">
			<i class="fa fa-bars"></i>
		</div><!--menu-btn-->

		<div class="loggout">
			<a <?php if(@$_GET['url'] == ''){ ?> style="background: #60727a;padding: 15px;" <?php } ?> href="<?php echo INCLUDE_PATH?>"> <i class="fa fa-home"></i> <span>Página Inicial</span></a>
			<a href="<?php echo INCLUDE_PATH ?>?loggout"> <i class="fa fa-window-close"></i> <span>Sair</span></a>
		</div><!--loggout-->

		<div class="clear"></div>
	</div>
</header>

<div class="content">

	<?php Painel::carregarPagina(); ?>


</div><!--content-->

<script src="<?php echo INCLUDE_PATH?>js/jquery.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/jquery.mask.js"></script>
<script src="<?php echo INCLUDE_PATH ?>js/main.js"></script>
 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>
  tinymce.init({ 
  	selector:'.tinymce',
  	plugins: "image",
  	height:300
   });
  </script>
</body>
</html>