<?php
require_once ('../../Negocio/NBautismo.php');
require_once ('../../Negocio/NPersona.php');

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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE BAUTISMOS
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR BAUTISMO</a>
					</li>
					<li>
						<a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE BAUTISMOS</a>
					</li>
					<li>
						<a href=""><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR BAUTISMO</a>
					</li>
				</ul>
			</div>

			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>NRO</th>
								<th>LUGAR</th>
								<th>FECHA CELEBRACIÓN</th>
								<th>FECHA REGISTRO</th>
								<th>PARROCO</th>
								<th>BAUTIZADO</th>
								<th>PADRINOS</th>
								<th>IMPRIMIR</th>
								<th>ACCIONES</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$nBautismo = new NBautismo();
							$nPersona = new NPersona();
							$bautismos = $nBautismo->lista();
							foreach ($bautismos as $bautismo) {
								?>
								<tr class="text-center">
									<td>
										<?php echo $bautismo->nro ?>
									</td>
									<td>
										<?php echo $bautismo->lugar ?>
									</td>
									<td>
										<?php echo $bautismo->fecha_celebracion ?>
									</td>
									<td>
										<?php echo $bautismo->fecha_registro ?>
									</td>
									<td>
										<?php $parroco = $nPersona->obtenerPorId($bautismo->id_parroco);
										echo $parroco->nombre.' '. $parroco->apellidos?>
									</td>
									<td>
										<?php $bautizado = $nPersona->obtenerPorId($bautismo->id_bautizado);
										echo $bautizado->nombre.' '. $bautizado->apellidos?>
									</td>
									<td>
										<?php echo $bautismo->padrinos ?>
									</td>
									<td>
									<a href="imprimir.php?nro=<?php echo $bautismo->nro ?>" class="btn btn-primary">
											<i class="fas fa-print"></i>
										</a>
									</td>
									<td>
										<a href="update.php?nro=<?php echo $bautismo->nro ?>" class="btn btn-success">
											<i class="fas fa-sync-alt"></i>
										</a>&nbsp;
										<form action="delete.php" method="POST">
											<input type="hidden" name="nro" value="<?php echo $bautismo->nro; ?>" />
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