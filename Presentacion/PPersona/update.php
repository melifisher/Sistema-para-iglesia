<?php
require_once '../../Negocio/NPersona.php';
require_once ('../../Negocio/NEstadoCivil.php');
require_once ('../../Negocio/NCargo.php');

require_once '../layout/header.php';
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
					<i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR PERSONA
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PERSONA</a>
					</li>
					<li>
						<a href="list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PERSONAS</a>
					</li>
					<li>
						<a href="search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PERSONA</a>
					</li>
				</ul>
			</div>

			<?php
			$nPersona = new NPersona();
			$id = $_GET['id'];
			$persona = $nPersona->obtenerPorId($id);

			?>
			<!-- Content here-->
			<div class="container-fluid">
				<form action="edit.php" class="form-neon" autocomplete="off" method="POST">
					<fieldset>
						<legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
						<div class="container-fluid">
							<div class="row">

								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="id" class="bmd-label-floating">ID</label>
										<input type="text" pattern="[a-zA-Z0-9-]{1,27}" class="form-control" name="id"
											id="id" maxlength="27" value="<?php echo $persona->id; ?>" readonly>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="nombre" class="bmd-label-floating">Nombre</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control"
											name="nombre" id="nombre" maxlength="40"
											value="<?php echo $persona->nombre; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="apellidos" class="bmd-label-floating">Apellidos</label>
										<input type="text" class="form-control"
											name="apellidos" id="apellidos"
											value="<?php echo $persona->apellidos; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="fecha_nacimiento" class="bmd-label-floating">Fecha de Nacimiento</label>
										<input type="text" class="form-control"
											name="fecha_nacimiento" id="fecha_nacimiento"
											value="<?php echo $persona->fecha_nacimiento; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="fecha_bautizo" class="bmd-label-floating">Fecha de Bautizo</label>
										<input type="text" class="form-control"
											name="fecha_bautizo" id="fecha_bautizo"
											value="<?php echo $persona->fecha_bautizo; ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="id_estado_civil" class="bmd-label-floating">Estado Civil</label>
										<br>
										<?php $nEstadoCivil=new NEstadoCivil();
											$estadosCiviles=$nEstadoCivil->lista();
										?>
										<select name="id_estado_civil" id="id_estado_civil" required>
										<option value="">Seleccionar</option>
										<?php foreach ($estadosCiviles as $estadoCivil) {?>
											<option value="<?php echo $estadoCivil->id ?>" <?php if($estadoCivil->id == $persona->id_estado_civil) echo 'selected' ?>><?php echo $estadoCivil->nombre ?></option>
											<?php }?>
										</select>
									</div>
									<?php 
										$mensaje = $_GET['mensaje'];
										if ($mensaje!="ninguno"): ?>
										<span class="mensaje" style="color:red;"><?php echo $mensaje; ?></span>

									<?php endif; ?>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="id_cargo" class="bmd-label-floating">Cargo/Rango</label>
										<br>
										<?php $nCargo=new NCargo();
											$cargos=$nCargo->lista();
										?>
										<select name="id_cargo" id="id_cargo">
										<option value="0">Seleccionar</option>
										<?php foreach ($cargos as $cargo) {?>
											<option value="<?php echo $cargo->id ?>" <?php if($cargo->id == $persona->id_cargo) echo 'selected' ?>><?php echo $cargo->nombre ?></option>
										<?php }?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset><br>
					
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