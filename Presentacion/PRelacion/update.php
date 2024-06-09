<?php
require_once ('../../Negocio/NRelacion.php');
require_once ('../../Negocio/NPersona.php');
require_once ('../../Negocio/NTipo.php')
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Lista de Relaciones</title>

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
									<a href="../PEstadoCivil/list.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Estado Civil </a>
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
									<a href="../PCertBautismo/list.php"><i class="fas fa-plus fa-fw"></i> &nbsp;
										Certificado de Bautismo</a>
								</li>
								<li>
									<a href="../PCertConfirmacion/list.php"><i class="fas fa-clipboard-list fa-fw"></i>
										&nbsp; Certificado de Confirmación</a>
								</li>
								<li>
									<a href="../PCertMatrimonio/list.php"><i class="fas fa-search fa-fw"></i> &nbsp;
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
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR RELACION
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR RELACION</a>
					</li>
					<li>
						<a href="list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE RELACIONES</a>
					</li>
					<li>
						<a href="search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR RELACION</a>
					</li>
				</ul>
			</div>

			<?php
			$nRelacion = new NRelacion();
			$id_1 = $_GET['id_1'];
			$id_2 = $_GET['id_2'];
			$relacion = $nRelacion->obtenerPorId($id_1, $id_2);
			?>
			<!-- Content here-->
			<div class="container-fluid">
				<form action="edit.php" class="form-neon" autocomplete="off" method="POST">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
								<?php $nPersona=new NPersona();
									$personas=$nPersona->lista();
								?>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="id_persona1" class="bmd-label-floating">Persona 1</label>
										<br>
										<select name="id_persona1" id="id_persona1" required>
										<option value="">Seleccionar</option>
										<?php foreach ($personas as $persona) {?>
											<option value="<?php echo $persona->id ?>" <?php if($persona->id == $relacion->id_persona1) echo 'selected' ?>>
											<?php echo $persona->nombre.' '.$persona->apellidos?>
											</option>
										<?php }?>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="id_persona2" class="bmd-label-floating">Persona 2</label>
										<br>
										<select name="id_persona2" id="id_persona2" required>
											<option value="">Seleccionar</option>
											<?php
											foreach ($personas as $persona) {
											?>
												<option value="<?php echo $persona->id ?>" <?php if($persona->id == $relacion->id_persona2) echo 'selected' ?>>
												<?php echo $persona->nombre. " ". $persona->apellidos ?>
												</option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="id_tipo" class="bmd-label-floating">Tipo</label>
										<br>
										<?php $nTipo=new NTipo();
											$tipos=$nTipo->lista();
										?>
										<select name="id_tipo" id="id_tipo">
										<option value="0">Seleccionar</option>
										<?php foreach ($tipos as $tipo) {?>
											<option value="<?php echo $tipo->id ?>" <?php if($tipo->id == $relacion->id_tipo) echo 'selected' ?>><?php echo $tipo->nombre ?></option>
										<?php }?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="submit" class="btn btn-raised btn-success btn-sm"><i class="fas fa-sync-alt"></i>
							&nbsp; ACTUALIZAR</button>
					</p>
				</form>
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