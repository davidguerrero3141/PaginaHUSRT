<? 
include ("includes/seguridad.php");
session_start(); 
include ("includes/datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$resultado = $_GET['resultado'];
$codigo = $_GET['codigo'];
?>
<!doctype html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>Plataforma de gestión online</title>
	<script src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
</head>

<body <? if ($resultado == 'exito') { ?> onload="success_noti()" <? } elseif ($resultado == 'fallo') { ?> onload="error_noti()" <? } else { echo "";} ?>>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Mega City</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<?php include("menu.php"); ?>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item dropdown dropdown-large">
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-notifications-list">
										
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
									</a>
									<div class="header-message-list">
										
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="<? echo $_SESSION["s_imagen"] ?>" class="user-img" alt="<? echo $_SESSION["s_nombre"] ?>">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><? echo $_SESSION["s_nombre"] ?></p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="perfil.php"><i class="bx bx-user"></i><span>Perfil</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="cierre.php"><i class='bx bx-log-out-circle'></i><span>Cerrar sesión</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Bienvenido <? echo $_SESSION["s_nombre"] ?></div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="aplicacion.php?in=novedades&pagina=1"><i class="bx bx-home-alt"></i></a>
								<li class="breadcrumb-item active" aria-current="page"><a href="campanas_club.php">Fechas Club</a></li>
								<li class="breadcrumb-item active" aria-current="page">Detalle</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="container">
					<div class="main-body">
						<div class="row">
							<? $ssql = "Select * from datoscitas where id = '1'"; 
								$result = $conn->query($ssql);
      							while($row = $result->fetch_assoc()) { $nombre = $row["nombre"]; $descripcion = $row["descripcion"]; $resumen = $row["resumen"]; $fecha_registro = $row["fecha_registro"]; ?>
							<div class="col-lg-4">
								<div class="card">
									<div class="card-body">
										<form action="actualizado_campana_club.php" method="post">
										<div class="d-flex flex-column align-items-center text-center">
											<img src="<? echo $row['imagen'] ?>" alt="<? echo $nombre ?>" width="350">
											<div class="mt-3">
												<h4><? echo $nombre ?></h4>
												<? if ($_SESSION['s_perfil'] == 1 OR $_SESSION['s_perfil'] == 2) { ?>
												<script type="text/javascript">
   function BrowseServerb()
  {
          var finder = new CKFinder();
          finder.selectActionFunction = SetFileFieldb;
          finder.popup();
  }
           
  function SetFileFieldb( fileUrl )
  {    
          document.getElementById('imagen').value = fileUrl ;
  }
</script>
												<input type="text" name="imagen" id="imagen" class="form-control" value="<? echo $row['imagen'] ?>" readonly/>
												<input type="button" class="btn btn-outline-primary" value="Cambiar fotografía" onclick="BrowseServerb();">
												<? } else { echo ""; } ?>
											</div>
										</div>
										<hr class="my-4" />
									</div>
								</div>
							</div>
							<div class="col-lg-8">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Nombre</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="nombre" class="form-control" value="<? echo $nombre ?>" <? if ($_SESSION['s_perfil'] == 3 OR $_SESSION['s_perfil'] == 4) { echo "readonly"; } ?>/>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Resumen</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea class="form-control" rows="10" cols="10" name="resumen" id="resumen" <? if ($_SESSION['s_perfil'] == 3 OR $_SESSION['s_perfil'] == 4) { echo "readonly"; } ?> /><? echo $resumen; ?></textarea>
										<script>
										CKEDITOR.replace( 'resumen' );
            						    </script>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Descripción</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<textarea class="form-control" rows="10" cols="10" name="descripcion" id="descripcion" <? if ($_SESSION['s_perfil'] == 3 OR $_SESSION['s_perfil'] == 4) { echo "readonly"; } ?> /><? echo $descripcion; ?></textarea>
										<script>
										CKEDITOR.replace( 'descripcion' );
            						    </script>
											</div>
										</div>
										<div class="row mb-3">
											<div class="col-sm-3">
												<h6 class="mb-0">Valor en pesos del intercambio</h6>
											</div>
											<div class="col-sm-9 text-secondary">
												<input type="text" name="valor" class="form-control" value="<? echo $row['valor'] ?>" <? if ($_SESSION['s_perfil'] == 3 OR $_SESSION['s_perfil'] == 4) { echo "readonly"; } ?> />
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3"></div>
											<div class="col-sm-9 text-secondary">
												<input type="hidden" name="codigo" value="<? echo $codigo ?>">
												<? if ($_SESSION['s_perfil'] == 3 OR $_SESSION['s_perfil'] == 4) { echo " "; } else { ?>
												<input type="submit" class="btn btn-primary px-4" value="Guardar cambios" />
												<? } ?>
											</div>
										</div>
									</div>
								</div>
								</form>
							</div>
							<? } ?>
						</div>
						<div class="row">
							<div class="col-xl-12 mx-auto">
										<h6 class="mb-0 text-uppercase">ESTADÍSTICAS</h6>
										<hr/>
										<div class="card">
											<? $ssqlest = "Select * from club where codigo = '".$codigo."'";
                                               $resultest = $conn->query( $ssqlest );
                                               while ( $rowest = $resultest->fetch_assoc() ) { $mes = $rowest['mes']; $ano = $rowest['ano']; $facturas = $rowest['facturas']; $puntos = $rowest['puntos']; $ventas = $rowest['ventas']; ?>
											<div class="card-body">
												<p>Fecha de inicio</p>
												<h2><? echo $ano; echo " "; if ($mes == '01') { echo "Enero"; } elseif ($mes == '02') { echo "Febrero"; } elseif ($mes == '03') { echo "Marzo"; } elseif ($mes == '04') { echo "Abril"; } elseif ($mes == '05') { echo "Mayo"; } elseif ($mes == '06') { echo "Junio"; } elseif ($mes == '07') { echo "Julio"; } elseif ($mes == '08') { echo "Agosto"; } elseif ($mes == '09') { echo "Septiembre"; } elseif ($mes == '10') { echo "Octubre"; } elseif ($mes == '11') { echo "Noviembre"; } elseif ($mes == '12') { echo "Diciembre"; } ?></h2>
											</div>
											<div class="card-body">
												<h2><? echo $facturas; ?> facturas registradas</h2>
											</div>
											<div class="card-body">
												<h2><? echo $puntos; ?> puntos</h2>
											</div>
											<div class="card-body">
												<h2>$<? echo number_format($ventas, 0, ",", "."); ?> en ventas</h2>
											</div>
											<? } ?>
										</div>
								
										<h6 class="mb-0 text-uppercase">FACTURAS REGISTRADAS</h6>
										<hr/>
										<div class="card">
											<div class="card-body">
												<div class="chart-container1">
													<canvas id="chart1"></canvas>
												</div>
											</div>
											<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th>Facturas registradas</th>
													<th>Local</th>
                                                  </tr>
                                                  </thead>
                                                <tbody>
                                                    <?
                                                    $ssqlfac = "Select local, COUNT(*) as conteo from facturas where cod_campana = '".$codigo."' group by local";
                                                    $resultfac = $conn->query( $ssqlfac );
                                                    if ( $resultfac->num_rows > 0 ) {
                                                      while ( $rowfac = $resultfac->fetch_assoc() ) {
                                                        ?>
                                                    <tr>
													<td><? $numfacturas = $rowfac['conteo']; echo $numfacturas ; ?></td>
                                                    <td><? $locfac = $rowfac['local']; $txloc = strtr($locfac, "-", " "); $txloc = ucwords($txloc); echo $txloc; ?></td>
                                                    <? }} else { echo ""; } ?>
                                                  </tbody>
                                                <tfoot>
                                                    <tr>
													<th>Facturas registradas</th>
                                                    <th>Local</th>
                                                  </tr>
                                                  </tfoot>
                                              </table>
                                              </div>
                                          </div>
										</div>
										<h6 class="mb-0 text-uppercase">VENTAS REGISTRADAS</h6>
										<hr/>
										<div class="card">
											<div class="card-body">
												<div class="chart-container1">
													<canvas id="chart2"></canvas>
												</div>
											</div>
											<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>Ventas registradas</th>
                                                    <th>Local</th>
                                                  </tr>
                                                  </thead>
                                                <tbody>
                                                    <?
                                                    $ssqltot = "Select local, SUM(monto) as suma from facturas where cod_campana = '".$codigo."' group by local";
                                                    $resulttot = $conn->query( $ssqltot );
                                                    if ( $resulttot->num_rows > 0 ) {
                                                      while ( $rowtot = $resulttot->fetch_assoc() ) {
                                                        ?>
                                                    <tr>
													<td>$<? $totfacturas = $rowtot['suma']; echo number_format($totfacturas); ?></td>
                                                    <td><? $loctot = $rowtot['local']; $txtot = strtr($loctot, "-", " "); $txtot = ucwords($txtot); echo $txtot; ?></td>
                                                    <? }} else { echo ""; } ?>
                                                  </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Ventas registradas</th>
                                                    <th>Local</th>
                                                  </tr>
                                                  </tfoot>
                                              </table>
                                              </div>
                                          </div>
										</div>
										<h6 class="mb-0 text-uppercase">CLIENTES QUE REGISTRAN MAS FACTURAS</h6>
										<hr/>
										<div class="card">
											<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example3" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>Facturas registradas</th>
                                                    <th>Cliente</th>
                                                  </tr>
                                                  </thead>
                                                <tbody>
                                                    <?
                                                    $ssqlfactcli = "Select cliente, COUNT(*) as conteo from facturas where cod_campana = '".$codigo."' group by cliente ORDER BY conteo desc";
                                                    $resultfactcli = $conn->query( $ssqlfactcli );
                                                    if ( $resultfactcli->num_rows > 0 ) {
                                                      while ( $rowfactcli = $resultfactcli->fetch_assoc() ) {
                                                        ?>
                                                    <tr>
                                                    <td><? $numfacturas = $rowfactcli['conteo']; echo $numfacturas ; ?></td>
													<td><? $cliente = $rowfactcli['cliente']; $txcliente = strtr($cliente, "-", " "); $txcliente = ucwords($txcliente); echo $txcliente; ?></td>
                                                    <? }} else { echo ""; } ?>
                                                  </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Facturas registradas</th>
                                                    <th>Cliente</th>
                                                  </tr>
                                                  </tfoot>
                                              </table>
                                              </div>
                                          </div>
										</div>
										<h6 class="mb-0 text-uppercase">CLIENTES QUE MAS FACTURAN</h6>
										<hr/>
										<div class="card">
											<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example4" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                    <th>Valor de facturas</th>
                                                    <th>Cliente</th>
                                                  </tr>
                                                  </thead>
                                                <tbody>
                                                    <?
                                                    $ssqltotcli = "Select cliente, SUM(monto) as suma from facturas where cod_campana = '".$codigo."' group by cliente ORDER BY suma";
                                                    $resulttotcli = $conn->query( $ssqltotcli );
                                                    if ( $resulttotcli->num_rows > 0 ) {
                                                      while ( $rowtotcli = $resulttotcli->fetch_assoc() ) {
                                                        ?>
                                                    <tr>
													<td>$<? $totfacturascli = $rowtotcli['suma']; echo number_format($totfacturascli); ?></td>
                                                    <td><? $clitot = $rowtotcli['cliente']; $txtotcli = strtr($clitot, "-", " "); $txtotcli = ucwords($txtotcli); echo $txtotcli; ?></td>
                                                    <? }} else { echo ""; } ?>
                                                  </tbody>
                                                <tfoot>
                                                    <tr>
                                                    <th>Valor de facturas</th>
                                                    <th>Cliente</th>
                                                  </tr>
                                                  </tfoot>
                                              </table>
                                              </div>
                                          </div>
										</div>
									</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Leonardo Lizarazo Lozada</p>
		</footer>
	</div>
	<!--end wrapper-->
	
	<!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script> 
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="assets/plugins/notifications/js/notification-custom-script.js"></script>
	<script>
		$(function () {
	"use strict";
	new Chart(document.getElementById("chart1"), {
		type: 'pie',
		data: {
			labels: [<? $ssqlloc = "Select local, COUNT(*) as conteo from facturas where cod_campana = '".$codigo."' group by local ORDER BY conteo desc LIMIT 10"; 
								$resultloc = $conn->query($ssqlloc);
      							while($rowloc = $resultloc->fetch_assoc()) { $local = $rowloc['local']; $txslug = strtr($local, "-", " "); $txslug = ucwords($txslug); $numerolocales = mysqli_num_rows($resultloc); echo '"' ; echo $txslug ; echo '"' ;  echo ","; } ?>],
			datasets: [{
				label: "Population (millions)",
				backgroundColor: ["#FF0000", "#FF9900", "#99FF00", "#00CCFF", "#6600CC","#660000", "#FFCC00", "#669900", "#0066CC", "#CC00CC"],
				data: [<? $ssqlnum = "Select local, COUNT(*) as conteo from facturas where cod_campana = '".$codigo."' group by local ORDER BY conteo desc LIMIT 10"; 
								$resultnum = $conn->query($ssqlnum);
      							while($rownum = $resultnum->fetch_assoc()) { $numerolocales = $rownum['conteo']; echo $numerolocales ; echo ","; } ?>]
			}]
		},
		options: {
			maintainAspectRatio: false,
			title: {
				display: true,
				text: 'Top 10 locales con mayor cantidad de facturas registradas'
			}
		}
	});
	new Chart(document.getElementById("chart2"), {
		type: 'pie',
		data: {
			labels: [<? $ssqlsuma = "Select local, SUM(monto) as suma from facturas where cod_campana = '".$codigo."' group by local ORDER BY suma desc LIMIT 10"; 
								$resultsuma = $conn->query($ssqlsuma);
      							while($rowsuma = $resultsuma->fetch_assoc()) { $localsum = $rowsuma['local']; $txsuma = strtr($localsum, "-", " "); $txsuma = ucwords($txsuma); $sumaresultados = mysqli_num_rows($resultsuma); echo '"' ; echo $txsuma ; echo '"' ;  echo ","; } ?>],
			datasets: [{
				label: "Population (millions)",
				backgroundColor: ["#FF0000", "#FF9900", "#99FF00", "#00CCFF", "#6600CC","#660000", "#FFCC00", "#669900", "#0066CC", "#CC00CC"],
				data: [<? $ssqllasuma = "Select SUM(monto) as suma from facturas where cod_campana = '".$codigo."' group by local ORDER BY suma desc LIMIT 10"; 
								$resultlasuma = $conn->query($ssqllasuma);
      							while($rowlasuma = $resultlasuma->fetch_assoc()) { $sumatoria = $rowlasuma['suma']; echo $sumatoria ; echo ","; } ?>]
			}]
		},
		options: {
			maintainAspectRatio: false,
			title: {
				display: true,
				text: 'Top 10 locales con mayor facturación'
			}
		}
	});
	});		
	</script>
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="assets/js/table-datatable.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	
</body>

</html>
