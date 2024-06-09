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
						<a class="dropdown-item" href="list.php?db=1">PgSql</a>
						<a class="dropdown-item" href="list.php?db=2">MySql</a>
						<a class="dropdown-item" href="list.php?db=3">SqlServer</a>
					</div>
				</div>
			</nav>
			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE MINISTERIOS EN <?php if($db == "1") echo 'PGSQL' ;
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
						<a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE MINISTERIOS</a>
					</li>
					<li>
						<a href=""><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR MINISTERIO</a>
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
								<th>DESCRIPCION</th>
								<th>ACTUALIZAR</th>
								<th>ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$nMinisterio = new NMinisterio();
							$nMinisterio->setDatabase($db);
							$ministerios = $nMinisterio->lista();
							foreach ($ministerios as $ministerio) {
								?>
								<tr class="text-center">
									<td>
										<?php echo $ministerio->id ?>
									</td>
									<td>
										<?php echo $ministerio->nombre ?>
									</td>
									<td>
										<?php echo $ministerio->descripcion ?>
									</td>
									<td>
										<a href="update.php?db=<?php echo $db ?>&id=<?php echo $ministerio->id ?>" class="btn btn-success">
											<i class="fas fa-sync-alt"></i>
										</a>

									</td>
									<td>
										<form action="delete.php" method="POST">
											<input type="hidden" name="id" value="<?php echo $ministerio->id; ?>" />
											<input type="hidden" name="db" value="<?php echo $db; ?>" />
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