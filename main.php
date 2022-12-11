<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
		<meta name="author" content="Bootlab">

		<title>Calendar | AppStack - Admin &amp; Dashboard Template</title>

		<!--<link rel="canonical" href="https://appstack.bootlab.io/calendar.html" />-->
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
	</head>
	<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="fixed">

		<div class="wrapper">
			<!-- incluir menu lateral -->
			<?php include 'include/navbar.php'?>

			<div class="main">
				<!-- incluir menu topo -->
			<?php include 'include/navbar_top.php'?>

				<main class="content">
					<div class="container-fluid p-0">
						<!-- incluir paginas -->
						<?php Painel::carregarPagina(); ?>
					</div>
				</main>

				<footer class="footer">
					<div class="container-fluid">
						<div class="row text-muted">
							<div class="col-6 text-start">
								<ul class="list-inline">
									<li class="list-inline-item">
										<a class="text-muted" href="https://emrstec.com.br/">Suporte</a>
									</li>

								</ul>
							</div>
							<div class="col-6 text-end">
								<p class="mb-0">
									&copy; 2022 - <a href="https://emrstec.com.br/" class="text-muted">Emrstec</a>
								</p>
							</div>
						</div>
					</div>
				</footer>

			</div>

		</div>

		<script src="<?php echo INCLUDE_PATH ?>js/app.js"></script>	
		<script>
			$(document).ready(function () {
					$("table").DataTable({
						"language":{
							"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
						}
					});
			});
		</script>	

	</body>

</html>