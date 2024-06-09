<?php
require_once ('../../Negocio/NEstadoCivil.php');
//$this->layout('layouts/template', ['title' => 'Lista de estados civiles']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lista de Estados Civiles</title>

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
									<a href="../PMinisterio/list.php"><i class="fas fa-plus fa-fw"></i> &nbsp;
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
									<a href="../PPersona/list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
										Personas </a>
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

		<!-- Page content -->
		<section class="full-box page-content">


			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<a href="">
					<i class="fas fa-user-cog"></i>
				</a>
				<a href="#" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>
			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ESTADOS CIVILES
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ESTADO CIVIL</a>
					</li>
					<li>
						<a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ESTADOS
							CIVILES</a>
					</li>
					<li>
						<a href="search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ESTADO CIVIL</a>
					</li>
				</ul>
			</div>

			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>ID</th>
								<th>NOMBRE</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$nEstadoCivil = new NEstadoCivil();
							$estadosCiviles = $nEstadoCivil->lista();
							foreach ($estadosCiviles as $estadoCivil) {
								?>
								<tr class="text-center">
									<td>
										<?php echo $estadoCivil->id ?>
									</td>
									<td>
										<?php echo $estadoCivil->nombre ?>
									</td>
									<td>
										<a href="update.php?id=<?php echo $estadoCivil->id ?>" class="btn btn-success">
											<i class="fas fa-sync-alt"></i>
										</a>

									</td>
									<td>
										<form action="delete.php" method="POST">
											<input type="hidden" name="id" value="<?php echo $estadoCivil->id; ?>" />
											<button type="submit" class="btn btn-warning">
												<i class="far fa-trash-alt"></i>
											</button>
										</form>

									</td>
								</tr>
							<?php } ?>
							</td>
						</tbody>
					</table>
				</div>
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>
		</section>
	</main>


	<!--=============================================
	=            Include JavaScript files           =
	==============================================-->
	<!-- jQuery V3.4.1 -->
	<script src="../js/jquery-3.4.1.min.js"></script>

	<!-- popper -->
	<script src="../js/popper.min.js"></script>

	<!-- Bootstrap V4.3 -->
	<script src="../js/bootstrap.min.js"></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- Bootstrap Material Design V4.0 -->
	<script src="../js/bootstrap-material-design.min.js"></script>
	<script>$(document).ready(function () { $('body').bootstrapMaterialDesign(); });</script>

	<script src="../js/main.js"></script>
</body>

</html>