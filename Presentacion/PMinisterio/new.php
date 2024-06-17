<?php
require_once ('../../Negocio/NMinisterio.php');

require_once '../layout/header.php';
$db = $_GET['db'];
?>
		<!-- Page content -->
		<section class="full-box page-content">
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<div class="dropdown show">
					<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Base de Datos
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="new.php?db=1">PgSql</a>
						<a class="dropdown-item" href="new.php?db=2">MySql</a>
						<a class="dropdown-item" href="new.php?db=3">SqlServer</a>
					</div>
				</div>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR MINISTERIO EN <?php if($db == "1") echo 'PGSQL' ;
					elseif($db == "2") echo 'MYSQL';
					elseif($db == "3") echo 'SQLSERVER' ?>
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR
							MINISTERIO</a>
					</li>
					<li>
						<a href="list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE
							MINISTERIOS</a>
					</li>
					<li>
						<a href="search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR MINISTERIO</a>
					</li>
				</ul>
			</div>

			<!-- Content here-->
			<div class="container-fluid">
				<form action="store.php" method="POST" class="form-neon" autocomplete="off">

					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
							<input type="hidden" name="db" value="<?php echo $db; ?>" />
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="id" class="bmd-label-floating">ID</label>
										<input type="text" pattern="[a-zA-Z0-9-]{1,27}" class="form-control" name="id"
											id="id" maxlength="27">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="nombre" class="bmd-label-floating">Nombre</label>
										<input type="text" class="form-control"
											name="nombre" id="nombre" maxlength="40">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="descripcion" class="bmd-label-floating">Descripción</label>
										<input type="text" class="form-control" name="descripcion" id="descripcion">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<br>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i
								class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i>
							&nbsp; GUARDAR</button>
					</p>
				</form>
			</div>

		</section>
		<?php
    require_once '../layout/footer.php';
?>