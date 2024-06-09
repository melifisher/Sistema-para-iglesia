<?php
require_once ('../../Negocio/NEstadoCivil.php');
require_once '../../Negocio/NCargo.php';

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
					<i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PERSONA
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR
							PERSONA</a>
					</li>
					<li>
						<a href="list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE
							PERSONAS</a>
					</li>
					<li>
						<a href="search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PERSONA</a>
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
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control"
											name="nombre" id="nombre" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="apellidos" class="bmd-label-floating">Apellidos</label>
										<input type="text" class="form-control" name="apellidos" id="apellidos" required>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="fecha_nacimiento" class="bmd-label-floating">Fecha de nacimiento</label>
										<input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="aaaa-mm-dd">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="fecha_bautizo" class="bmd-label-floating">Fecha de bautizo</label>
										<input type="text" class="form-control" name="fecha_bautizo" id="fecha_bautizo" placeholder="aaaa-mm-dd">
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
											<option value="<?php echo $estadoCivil->id ?>"><?php echo $estadoCivil->nombre ?></option>
										<?php }?>
										</select>
									</div>
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
											<option value="<?php echo $cargo->id ?>"><?php echo $cargo->nombre ?></option>
										<?php }?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
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