<? 
include ("includes/seguridad.php");
session_start(); 
include ("includes/datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$in = $_GET['in'];
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
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/fullcalendar/css/main.min.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
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
	<script>
function clicked(e)
{
    if(!confirm('¿Está seguro? Esta acción no se puede deshacer'))e.preventDefault();
}
</script>
</head>

<body>
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
								</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				
				<!--start email wrapper-->
				<div class="email-wrapper">
					<div class="email-sidebar">
						<div class="email-sidebar-header d-grid"> <a href="javascript:;" class="btn btn-primary compose-mail-btn"><i class='bx bx-plus me-2'></i> Enviar mensaje</a>
						</div>
						<div class="email-sidebar-content">
							<div class="email-navigation">
								<div class="list-group list-group-flush">
									<a href="aplicacion.php?in=novedades&pagina=1" class="list-group-item <? if ($in == "novedades" OR $in == "") { echo 'active';} ?> d-flex align-items-center"><i class='bx bxs-star me-3 font-20'></i><span>Novedades</span></a>
									<a href="aplicacion.php?in=mensajes&pagina=1" class="list-group-item <? if ($in == "mensajes") { echo 'active';} ?> d-flex align-items-center"><i class='bx bxs-inbox me-3 font-20'></i><span>Mensajes</span></a>
									<a href="aplicacion.php?in=tareas&pagina=1" class="list-group-item <? if ($in == "tareas") { echo 'active';} ?> d-flex align-items-center"><i class='bx bx-list-check me-3 font-20'></i><span>Tareas</span></a>
									<a href="aplicacion.php?in=enviados&pagina=1" class="list-group-item <? if ($in == "enviados") { echo 'active';} ?> d-flex align-items-center"><i class='bx bxs-send me-3 font-20'></i><span>Enviados</span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="email-header d-xl-flex align-items-center">
						<div class="d-flex align-items-center">
							<h2><? echo $in ?></h2>
						</div>
						<div class="ms-auto d-flex align-items-center">
							<button class="btn btn-sm btn-light"><? if ($in == "novedades"){ $ssqlin = "Select * from mensajes WHERE tipo = '".$in."' AND publicar = 1 ORDER BY fecha"; $resultin = $conn->query($ssqlin);
$total_in = mysqli_num_rows($resultin); echo $total_in; echo " novedades"; } elseif ($in == "mensajes"){ $ssqlin = "Select * from mensajes WHERE tipo = '".$in."' AND recibe = '".$_SESSION['s_nombre']."' AND publicar = 1 ORDER BY fecha"; $resultin = $conn->query($ssqlin);
$total_in = mysqli_num_rows($resultin); echo $total_in; echo " mensajes"; } elseif ($in == "tareas"){ $ssqlin = "Select * from mensajes WHERE tipo = '".$in."' AND recibe = '".$_SESSION['s_nombre']."' AND publicar = 1 ORDER BY fecha"; $resultin = $conn->query($ssqlin);
$total_in = mysqli_num_rows($resultin); echo $total_in; echo " tareas pendientes"; } elseif ($in == "enviados"){ $ssqlin = "Select * from mensajes WHERE tipo = 'mensajes' AND envia = '".$_SESSION['s_nombre']."' AND publicar = 1 ORDER BY fecha"; $resultin = $conn->query($ssqlin);
$total_in = mysqli_num_rows($resultin); echo $total_in; echo " mensajes enviados"; } ?></button>
							<? if ($_GET['pagina']<=1) { ?><a href="#"><button class="btn btn-white px-2 ms-2" <? echo 'disabled'; ?>><i class='bx bx-chevron-left me-0'></i></button></a><? } else { ?>
							<a href="aplicacion.php?in=<? echo $in ?>&pagina=<? echo $_GET['pagina']-1; ?>"><button class="btn btn-white px-2 ms-2" ><i class='bx bx-chevron-left me-0'></i></button></a><? } ?>
							<? if ($_GET['pagina']>=$paginas) { ?><a href="#"><button class="btn btn-white px-2 ms-2" <? echo 'disabled'; ?>><i class='bx bx-chevron-right me-0'></i></button></a><? } else { ?>
							<a href="aplicacion.php?in=<? echo $in ?>&pagina=<? echo $_GET['pagina']-1; ?>"><button class="btn btn-white px-2 ms-2" ><i class='bx bx-chevron-right me-0'></i></button></a><? } ?>
						</div>
					</div>
					<div class="email-content">
						<div class="">
							<div class="email-list">
								<? 
								$articulos_x_pagina = 50;
								$iniciar = ($_GET['pagina']-1)*$articulos_x_pagina; 
								if ($in == "novedades"){ 
								$ssql = "Select * from mensajes WHERE tipo = '".$in."' AND publicar = 1 ORDER BY fecha DESC LIMIT $iniciar,$articulos_x_pagina";
								$result = $conn->query($ssql);
$total_articulos_db = mysqli_num_rows($result);
$paginas = $total_articulos_db/$articulos_x_pagina;
$paginas = ceil($paginas);							
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) { $envia = $row['envia']; $tipo = $row['tipo']; $id = $row['id']; ?>
								<a href="mensaje.php?in=<? echo $row["tipo"] ?>&id=<? echo $row["id"] ?>">
									<div class="d-md-flex align-items-center email-message px-3 py-1">
										<div class="d-flex align-items-center email-actions">
											<? if($envia == $_SESSION['s_nombre']){ ?><a href="publicar.php?tabla=mensajes&publicar=<? echo $row['publicar'] ?>&id=<? echo $row['id'] ?>" onclick='clicked(event)'><i class='bx bx-trash font-20 mx-2 email-star'></i></a><? } else { echo "<a href='mensaje.php?in=$tipo&id=$id'><i class='bx bx-radio-circle font-20 mx-2 email-star'></i></a>"; } ?>
											<p class="mb-0"><b><? echo $row["envia"] ?></b>
											</p>
										</div>
										<div class="">
											<a href="mensaje.php?in=<? echo $row["tipo"] ?>&id=<? echo $row["id"] ?>"><p class="mb-0"><? echo $row["asunto"] ?></p></a>
										</div>
										<div class="ms-auto">
											<p class="mb-0 email-time"><? echo $row["fecha"] ?></p>
										</div>
									</div>
								</a>
								<? }} else { echo ""; } 
								} elseif ($in == "mensajes"){ 
								$ssql = "Select * from mensajes WHERE tipo = '".$in."' AND recibe = '".$_SESSION['s_nombre']."' AND publicar = 1 ORDER BY fecha DESC LIMIT $iniciar,$articulos_x_pagina";
								$result = $conn->query($ssql);
$total_articulos_db = mysqli_num_rows($result);
$paginas = $total_articulos_db/$articulos_x_pagina;
$paginas = ceil($paginas);							
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) { ?>
								<a href="mensaje.php?in=<? echo $row["tipo"] ?>&id=<? echo $row["id"] ?>">
									<div class="d-md-flex align-items-center email-message px-3 py-1">
										<div class="d-flex align-items-center email-actions">
											<p class="mb-0"><b><? echo $row["envia"] ?></b>
											</p>
										</div>
										<div class="">
											<p class="mb-0"><? echo $row["asunto"] ?></p>
										</div>
										<div class="ms-auto">
											<p class="mb-0 email-time"><? echo $row["fecha"] ?></p>
										</div>
									</div>
								</a>
								<? }} else { echo ""; } 
								} elseif ($in == "tareas"){ 
								$ssql = "Select * from mensajes WHERE tipo = '".$in."' AND recibe = '".$_SESSION['s_nombre']."' AND publicar = 1 ORDER BY fecha DESC LIMIT $iniciar,$articulos_x_pagina";
								$result = $conn->query($ssql);
$total_articulos_db = mysqli_num_rows($result);
$paginas = $total_articulos_db/$articulos_x_pagina;
$paginas = ceil($paginas);							
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) { $pendiente = $row['pendiente']; if ($pendiente == 1) {$estado = 'warning'; $txestado = 'Pendiente'; } elseif ($pendiente == 0) {$estado = 'success'; $txestado = 'Completada';} ?>
								<a href="mensaje.php?in=<? echo $row["tipo"] ?>&id=<? echo $row["id"] ?>">
									<div class="d-md-flex align-items-center email-message px-3 py-1">
										<div class="d-flex align-items-center email-actions">
											<button type="button" class="btn btn-<? echo $estado ?>"><? echo $txestado ?></button>
										</div>
										<div class="">
											<p class="mb-0"><? echo $row["asunto"] ?></p>
										</div>
										<div class="ms-auto">
											<p class="mb-0 email-time"><? echo $row["fecha"] ?></p>
										</div>
									</div>
								</a>
								<? }} else { echo ""; } 
								} elseif ($in == "enviados"){ 
								$ssql = "Select * from mensajes WHERE tipo = 'mensajes' AND envia = '".$_SESSION['s_nombre']."' AND publicar = 1 ORDER BY fecha DESC LIMIT $iniciar,$articulos_x_pagina";
								$result = $conn->query($ssql);
$total_articulos_db = mysqli_num_rows($result);
$paginas = $total_articulos_db/$articulos_x_pagina;
$paginas = ceil($paginas);							
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
								?>
								<a href="mensaje.php?in=enviados&id=<? echo $row["id"] ?>">
									<div class="d-md-flex align-items-center email-message px-3 py-1">
										<a href="publicar.php?tabla=mensajes&publicar=<? echo $row['publicar'] ?>&id=<? echo $row['id'] ?>" onclick='clicked(event)'><i class='bx bx-trash font-20 mx-2 email-star'></i></a>
										<div class="d-flex align-items-center email-actions">
											<p class="mb-0"><b><? echo $row["recibe"] ?></b>
											</p>
										</div>
										<div class="">
											<a href="mensaje.php?in=enviados&id=<? echo $row["id"] ?>"><p class="mb-0"><? echo $row["asunto"] ?></p></a>
										</div>
										<div class="ms-auto">
											<p class="mb-0 email-time"><? echo $row["fecha"] ?></p>
										</div>
									</div>
								</a>
								<? }} else { echo ""; } 
								} ?>
								
							</div>
						</div>
					</div>
					<!--start compose mail-->
					<div class="compose-mail-popup">
						<div class="card">
							<div class="card-header bg-dark text-white py-2 cursor-pointer">
								<div class="d-flex align-items-center">
									<div class="compose-mail-title">Nuevo mensaje</div>
									<div class="compose-mail-close ms-auto">x</div>
								</div>
							</div>
							<div class="card-body">
								<div class="email-form">
									<form action="enviar_mensaje.php" method="post">
									<div class="mb-3">
										<select class="single-select" name="recibe" required>
											<option value="">Seleccione el destinatario</option>
											<option value="novedades">Para todos (Novedad)</option>
							<? $query = $conn -> query ("Select id,nombre from usuarios where activo = '1'");
          						while ($valores = mysqli_fetch_array($query)) {
								
            					echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
          						}
								?>
										</select>
									</div>
									<div class="mb-3">
										<input type="text" class="form-control" placeholder="Asunto" name="asunto" />
									</div>
									<div class="mb-3">
										<textarea class="form-control" placeholder="Mensaje" rows="10" cols="10" name="contenido" id="contenido"></textarea>
										<script>
										CKEDITOR.replace( 'contenido' );
            						    </script>
									</div>
									<div class="mb-0">
										<div class="d-flex align-items-center">
											<div class="">
												<div class="btn-group">
													<input type="submit" class="btn btn-primary" value="ENVIAR"/>
												</div>
											</div>
										</div>
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!--end compose mail-->
					<!--start email overlay-->
					<div class="overlay email-toggle-btn-mobile"></div>
					<!--end email overlay-->
				</div>
				<!--end email wrapper-->
				
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
	<script src="assets/plugins/fullcalendar/js/main.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
				},
				initialView: 'dayGridMonth',
				initialDate: '<? echo date('Y-m-d'); ?>',
				navLinks: true, // can click day/week names to navigate views
				selectable: true,
				nowIndicator: true,
				dayMaxEvents: true, // allow "more" link when too many events
				editable: false,
				selectable: true,
				businessHours: true,
				dayMaxEvents: true, // allow "more" link when too many events
				events: [
					<? $ssql = "Select * from calendario WHERE publicar = 1"; 
								$result = $conn->query($ssql);
  								if ($result->num_rows > 0) {
      							while($row = $result->fetch_assoc()) { $titulo = $row["titulo"]; $start = $row["start"]; $end = $row["end"]; $hora = $row["hora"]; $vinculo = $row["vinculo"];?>
					{
					title: '<? echo $titulo; ?>',
					start: '<? echo $start; if ($hora !='') { echo "T"; echo $hora; } else { echo ""; } ?>',
					<? if ($end !='') { ?>
					end: '<? echo $end; ?>',
					<? } else { echo "";} ?>
					<? if ($vinculo !='') { ?>
					url: '<? echo $vinculo; ?>',
					<? } else { echo "";} ?>
				},<? }} else { echo ""; } ?>
				]
			});
			calendar.render();
		});
	</script>
	<script src="assets/js/app-emailbox.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	
</body>

</html>
