<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lista de Personas</title>

	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="../css/normalize.css">

	<!-- Bootstrap V4.3 -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">

	<!-- Bootstrap Material Design V4.0 -->
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 -->
	<link rel="stylesheet" href="../css/all.css">

	<!-- Sweet Alerts V8.13.0 CSS file -->
	<link rel="stylesheet" href="../css/sweetalert2.min.css">

	<!-- Sweet Alert V8.13.0 JS file-->
	<script src="../js/sweetalert2.min.js"></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">

	<!-- General Styles -->
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>

	<!-- Main container -->
	<main class="full-box main-container">
		<!-- Nav lateral -->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<i class="far fa-times-circle show-nav-lateral"></i>
					<img src="../assets/logo.jpg" class="img-fluid" alt="Parroquia">
					<figcaption class="roboto-medium text-center">
						Parroquia María Auxiliadora
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="../home.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Dashboard</a>
						</li>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Iglesia <i
									class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../PMinisterio/list.php?db=1"><i class="fas fa-plus fa-fw"></i> &nbsp;
										Ministerios</a>
								</li>
								<li>
									<a href="../PPertenece/list.php"><i class="fas fa-users fa-fw"></i> &nbsp;
									Pertenencia a Ministerio </a>
								</li>
								<li>
									<a href="../PCargo/list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
										Cargos</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-users fa-fw"></i> &nbsp; Personas <i
									class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../PEstadoCivil/list.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Estado
										Civil </a>
								</li>
								<li>
									<a href="../PPersona/list.php"><i
											class="fas fa-clipboard-list fa-fw"></i> Personas </a>
								</li>
								<li>
									<a href="../PTipo/list.php"><i class="fas fa-search-dollar fa-fw"></i> &nbsp;
										Tipo Relación </a>
								</li>
								<li>
									<a href="../PRelacion/list.php"><i class="fas fa-heart fa-fw"></i> &nbsp;
										Relación</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp;
								Certificados <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../PBautismo/list.php"><i class="fas fa-plus fa-fw"></i> &nbsp;
										Certificado de Bautismo</a>
								</li>
								<li>
									<a href="../PConfirmacion/list.php"><i class="fas fa-clipboard-list fa-fw"></i>
										&nbsp; Certificado de Confirmación</a>
								</li>
								<li>
									<a href="../PMatrimonio/list.php"><i class="fas fa-search fa-fw"></i> &nbsp;
										Certificado de Matrimonio</a>
								</li>
							</ul>
						</li>

					</ul>
				</nav>
			</div>
		</section>
		