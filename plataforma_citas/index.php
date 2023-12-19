<?php
session_unset();
session_destroy();
include ("includes/datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
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
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<title>Plataforma de administración</title>
	<meta name="author" content="Leonardo Lizarazo Lozada">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<? $ssql = "Select id,logo,titulo from contacto WHERE id = 1"; 
						$result = $conn->query($ssql);
  						if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $logo = $row["logo"]; $titulo = $row["titulo"]; ?>
						<div class="mb-4 text-center">
							<img src="../..<? echo $logo; ?>" width="180" alt="<? echo $logo; ?>" />
						</div>
						<? }} else { echo ""; } ?>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Bienvenido a la plataforma de administración de <? echo $titulo; ?></h3>
										<? if ($_GET["errorusuario"]=="si"){ ?>
										<p style="color: #FF0004;">Datos incorrectos, por favor revise e intente nuevamente o pongase en contacto con el administrador del sistema</p>
										<? }else{ echo ""; } ?>
									</div>
									
									<div class="login-separater text-center mb-4"> <span>Ingrese sus datos</span>
										<hr/>
									</div>
									<div class="form-body">
										<form class="row g-3" action="controlusuario.php" method="post">
											<div class="col-12">
												<label for="usuario" class="form-label">Usuario</label>
												<input type="text" class="form-control" id="usuario" name="usuario" placeholder="documento de identidad">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Contraseña</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="clave" placeholder="Password" name="clave"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="recuperar.php">¿Olvidó su contraseña?</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<div class="g-recaptcha" data-sitekey="6LcxhcYUAAAAAJ3aGXsa2idHU9WmgXucfVjokkW1"></div>
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>INGRESAR</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>