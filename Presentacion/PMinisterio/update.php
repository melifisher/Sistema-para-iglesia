<?php
require_once ('../../Negocio/NMinisterio.php');
//$this->layout('layouts/template', ['title' => 'Lista de estados civiles']);

require_once '../layout/header.php';
$db = $_GET['db'];
?>
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
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR MINISTERIO EN <?php if($db == "1") echo 'PGSQL' ;
					elseif($db == "2") echo 'MYSQL';
					elseif($db == "3") echo 'SQLSERVER' ?>
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="new.php?db=<?php echo $db ?>"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR MINISTERIO</a>
					</li>
					<li>
						<a href="list.php?db=<?php echo $db ?>"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE MINISTERIOS</a>
					</li>
					<li>
						<a href="search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR MINISTERIO</a>
					</li>
				</ul>
			</div>

			<?php
			$nMinisterio = new NMinisterio();
			$nMinisterio->setDatabase($db);
			$id = $_GET['id'];
			$cargo = $nMinisterio->obtenerPorId($id);

			?>
			<!-- Content here-->
			<div class="container-fluid">
				<form action="edit.php" class="form-neon" autocomplete="off" method="POST">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">
							<input type="hidden" name="db" value="<?php echo $db; ?>" />
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="id" class="bmd-label-floating">ID</label>
										<input type="text" pattern="[a-zA-Z0-9-]{1,27}" class="form-control" name="id"
											id="id" maxlength="27" value="<?php echo $cargo->id; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="nombre" class="bmd-label-floating">Nombre</label>
										<input type="text" class="form-control"
											name="nombre" id="nombre" maxlength="40"
											value="<?php echo $cargo->nombre; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="descripcion" class="bmd-label-floating">Descripcion</label>
										<input type="text" class="form-control"
											name="descripcion" id="descripcion"
											value="<?php echo $cargo->descripcion; ?>">
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
		<?php
    require_once '../layout/footer.php';
?>