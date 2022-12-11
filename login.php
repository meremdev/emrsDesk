<?php
	if(isset($_COOKIE['lembrar'])){
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
		$sql->execute(array($user,$password));
		if($sql->rowCount() == 1){
				$info = $sql->fetch();
				$_SESSION['login'] = true;
				$_SESSION['user'] = $user;
				$_SESSION['password'] = $password;
				$_SESSION['cargo'] = $info['cargo'];
				$_SESSION['nome'] = $info['nome']; 
				// $_SESSION['img'] = $info['img'];
			
		}
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Sign In | AppStack - Admin &amp; Dashboard Template</title>

	<link rel="canonical" href="https://appstack.bootlab.io/pages-sign-in.html" />
	<link rel="shortcut icon" href="img/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
	<link class="js-stylesheet" href="<?php echo INCLUDE_PATH ?>styles/light.css" rel="stylesheet">
	<!-- <script src="js/settings.js"></script> -->
	<!-- END SETTINGS -->
	<script>
		// (function(h,o,t,j,a,r){
		// 	h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
		// 	h._hjSettings={hjid:2120269,hjsv:6};
		// 	a=o.getElementsByTagName('head')[0];
		// 	r=o.createElement('script');r.async=1;
		// 	r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
		// 	a.appendChild(r);
		// })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-Q3ZYEKLQ68"></script> -->
	<script>
		// window.dataLayer = window.dataLayer || [];
		// function gtag(){dataLayer.push(arguments);}
		// gtag('js', new Date());

		// gtag('config', 'G-Q3ZYEKLQ68');
	</script>
</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-behavior: sticky (default), fixed, compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="main d-flex justify-content-center w-100">
		<main class="content d-flex p-0">
			<div class="container d-flex flex-column">
				<div class="row h-100">
					<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">

							<div class="text-center mt-4">
								<h1 class="h2">Seja bem vindo!!! Esse é um sistema EMRSTEC</h1>
								<p class="lead">
									faça o login para continuar
								</p>
							</div>

							<div class="card">
								<div class="card-body">
									<div class="m-sm-4">
										<div class="text-center">
											<!-- <img src="img/avatars/avatar.jpg" alt="Chris Wood" class="img-fluid rounded-circle" width="132" height="132" /> -->
											<h1>EMRSDESK</h1>
										</div>
										<?php
											if(isset($_POST['acao'])){
												$user = $_POST['user'];
												$password = $_POST['password'];
												$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
												$sql->execute(array($user,$password));
												if($sql->rowCount() == 1){
													$info = $sql->fetch();
													//Logamos com sucesso.
													$_SESSION['login'] = true;
													$_SESSION['user'] = $user;
													$_SESSION['password'] = $password;
													$_SESSION['cargo'] = $info['cargo'];
													$_SESSION['nome'] = $info['nome']; 
													// $_SESSION['img'] = $info['img'];
													if(isset($_POST['lembrar'])){
														setcookie('lembrar',true,time()+(60*60*24),'/');
														setcookie('user',$user,time()+(60*60*24),'/');
														setcookie('password',$password,time()+(60*60*24),'/');
													}
													if($_SESSION['cargo'] == 0){
														Painel::redirect(INCLUDE_PATH.'tikets');
													}else{
														Painel::redirect(INCLUDE_PATH.'gerenciar-tikets');
													}
													
												}else{
													//Falhou
													echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
												}
											}
										?>
										<form method="post">
											<div class="mb-3">
												<label class="form-label">Usuario</label>
												<input class="form-control form-control-lg" type="text" name="user" placeholder="entre com seu usuario" />
											</div>
											<div class="mb-3">
												<label class="form-label">Senha</label>
												<input class="form-control form-control-lg" type="password" name="password" placeholder="entre com sua senha" />
											</div>
											<div>
												<div class="form-check align-items-center">
													<input id="customControlInline" type="checkbox" class="form-check-input"  name="lembrar" checked>
													<label class="form-check-label text-small" for="customControlInline">Lembrar</label>
												</div>
											</div>
											<div class="text-center mt-3">
												<input type="submit" value="Entrar" name="acao" class="btn btn-lg btn-primary">
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

	<script src="js/app.js"></script>

</body>

</html>