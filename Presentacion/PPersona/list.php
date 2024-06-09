<?php
require_once ('../../Negocio/NPersona.php');
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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PERSONAS
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR PERSONA</a>
					</li>
					<li>
						<a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PERSONAS</a>
					</li>
					<li>
						<a href="search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PERSONA</a>
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
								<th>APELLIDOS</th>
								<th>FECHA DE NACIMIENTO</th>
								<th>FECHA DE BAUTIZO</th>
								<th>ESTADO CIVIL</th>
								<th>CARGO/RANGO</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$nPersona = new NPersona();
							$nEstadoCivil = new NEstadoCivil();
							$nCargo = new NCargo();
							$personas = $nPersona->lista();
							foreach ($personas as $persona) {
								?>
								<tr class="text-center">
									<td>
										<?php echo $persona->id ?>
									</td>
									<td>
										<?php echo $persona->nombre ?>
									</td>
									<td>
										<?php echo $persona->apellidos ?>
									</td>
									<td>
										<?php echo $persona->fecha_nacimiento ?>
									</td>
									<td>
										<?php echo $persona->fecha_bautizo ?>
									</td>
									<td>
										<?php echo $nEstadoCivil->obtenerPorId($persona->id_estado_civil)->nombre ?>
									</td>
									<td>
										<?php 
										$id_cargo = $nCargo->obtenerPorId($persona->id_cargo);
										if($id_cargo)
											echo $id_cargo->nombre;
										else
											echo "-" ?>
									</td>
									<td>
										<a href="update.php?id=<?php echo $persona->id ?>&mensaje=ninguno" class="btn btn-success">
											<i class="fas fa-sync-alt"></i>
										</a>

									</td>
									<td>
										<form action="delete.php" method="POST">
											<input type="hidden" name="id" value="<?php echo $persona->id; ?>" />
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
							
<?php
    require_once '../layout/footer.php';
?>