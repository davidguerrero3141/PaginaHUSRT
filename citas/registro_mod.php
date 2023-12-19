<?php
include ("includes/datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php $ssql = "Select id,nombre,resumen,descripcion,valor,imagen,logo from datoscitas WHERE id = 1"; 
//Ejecuto la consulta 

$result = $conn->query($ssql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) { $nombre = $row["nombre"]; $logo = $row["logo"]; $resumen = $row["resumen"]; $descripcion = $row["descripcion"]; $valor = $row["valor"]; $imagen = $row["imagen"]; ?> 
	<title><?php echo $row["nombre"]; ?></title>
	<meta name="description" content="<?php echo $row["resumen"]; ?>"/>
	<link rel="shortcut icon" href="<?php echo $logo; ?>" type="image/x-icon">
	<link rel="icon" href="<?php echo $logo; ?>" type="image/x-icon">
  <?php }} else {
      echo "";
  } ?>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header-->
    <header class="main-header header-style-two">
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="outer-container">
            	<div class="clearfix">
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="index.php"><img src="<?php echo $logo ?>" alt="<?php echo $nombre ?>"></a></div>
                    </div>
                   	
                   	<!--Nav Outer-->
                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>
                        
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                <?php include('menu.php') ?>
							</div>
						</nav>
					</div>

                </div>
            </div>
        </div>
        <!--End Header Upper-->
        
        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>
            
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
                <div class="nav-logo"><a href="aplicacion.php"><img src="<?php echo $logo ?>" alt="" title=""></a></div>
                
                <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            </nav>
        </div><!-- End Mobile Menu -->
    </header>
    <!--End Main Header -->
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/18.jpg);">

        <div class="auto-container">
            <h2 style="color: #2D2D2D">Registre sus datos</h2>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Fun Fact Section -->
    <section class="fun-fact-section" style="background-image: url(images/background/2.jpg);">
        <div class="auto-container">
            <div class="fact-counter">
                <div class="row clearfix">

                    <!--Column-->
                    <div class="counter-column col-lg-12 col-md-12 col-sm-12 wow fadeInUp">
                        <div class="count-box">
                            <h2>Registre sus datos en el formulario que encuentra a continuación para obtrener su usuario y poder solicitar citas médicas</h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--End Fun Fact Section -->

    <!--Login Section-->
    <section class="login-section">
        <div class="auto-container">
            <div class="row clearfix">
				<div class="column col-lg-6 col-md-12 col-sm-12">
					<?php if ($_GET["existe"]=="si") { ?>
					<h2>El documento registrado ya existe en nuestra base de datos</h2>
					<p>El usuario con número de documento <?php echo $_GET['cedula'] ?> ya está registrado, verifique la información o si desea recuperar su contraseña <a href="index.php?olvido=si">ENTRE AQUÍ</a></p>
					<?php } elseif ($_GET["claveinvalida"]=="si") { ?>
					<h2>La clave ingresada no coincide, por favor vuelva a intentar</h2>
					<?php } else { ?>
					<h2>Registre sus datos personales</h2>
					<p>Complete el formulario para registrarse y poder solicitar citas médicas</p>
					<?php } ?>
					<div class="image-box">
                        <figure class="image wow fadeInLeft"><a href="images/image-2.jpg" class="lightbox-image" data-fancybox="images"><img src="images/image-2.jpg" alt=""></a></figure>
                    </div>
                    
                </div>
                
                <div class="column col-lg-6 col-md-12 col-sm-12">
                    
                    <!-- Register Form -->
                    <div class="login-form register-form">
                        <!--Login Form-->
                        <form method="post" action="registrado_usuario_mod.php">
							
							<div class="form-group">
                                <label>Nombres*</label>
                                <input type="text" name="nombres" required>
                            </div>
							
							<div class="form-group">
                                <label>Apellidos*</label>
                                <input type="text" name="apellidos" required>
                            </div>
							
							<div class="form-group">
                                <label>Tipo de Identificación*</label>
								<select name="tipo_id" required>
									<option value="">Seleccione</option>
									<option value="CC">Cédula de ciudadanía</option>
									<option value="CE">Cédula de extranjería</option>
									<option value="TI">Tarjeta de identidad</option>
									<option value="RC">Registro Civil</option>
								</select>
                            </div>
							
							<div class="form-group">
                                <label>Número de identificación*</label>
                                <input type="text" name="cedula" pattern="[0-9]+" required>
                            </div>
							
							<div class="form-group">
                                <label>Dirección*</label>
                                <input type="text" name="direccion" required>
                            </div>
							
							<div class="form-group">
                                <label>Teléfono</label>
                                <input type="tel" name="telefono">
                            </div>
							
							<div class="form-group">
                                <label>Celular*</label>
                                <input type="tel" name="celular" required>
                            </div>
							
							<div class="form-group">
                                <label>Email*</label>
                                <input type="email" name="email" required>
                            </div>
							
							<div class="form-group">
                                <label>Fecha de nacimiento*</label>
                                <input type="date" name="nacimiento" required>
                            </div>
							
							<!--Form Group-->
                           <div class="form-group">
                               <div class="field-label">EPS*</div>
                                    <select name="eps" required>
										<option value="" selected>Seleccione su EPS</option>
                                        <?php $querylocal = $conn -> query ("Select * from eps where publicar = '1' ORDER BY nombre");
          						while ($valores = mysqli_fetch_array($querylocal)) {
								
            					echo '<option value="'.$valores['nombre'].'">'.$valores['nombre'].'</option>';
          						}
								?>
                                    </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Cree una contraseña*</label>
                                <input type="password" name="contrasena" required>
                            </div>
							
							<div class="form-group">
                                <label>Repita la contraseña*</label>
                                <input type="password" name="contrasena2" required>
                            </div>
							<div class="form-group">
								<p>* Campos obligatorios</p>
                            </div>
							<div class="form-group">
								<input type="checkbox" id="check-1" name="terminos" required>
                                <label>Acepto y autorizo irrevocablemente el tratamiento de mis datos personales, de conformidad con la <a href="https://www.hospitalsanrafaeltunja.gov.co/contenido.php?seccion=tratamiento-de-datos-personales&slug=politica-de-tratamiento-y-proteccion-de-datos-personales" target="_blank">Política de Tratamiento y Protección de Datos Personales</a> y con la autorización que por este medio otorgo.</label>
                            </div>
                            
                            <div class="form-group text-right">
                                <button class="theme-btn btn-style-four" type="submit" name="submit-form" onclick="if(!this.form.terminos.checked){alert('Estimado Usuario la autorización para el tratamiento de datos personales es necesaria para poder continuar con el proceso  y posterior solicitud de servicio');return false}">REGISTRARSE</button>
                            </div>
                        </form>      
                    </div>
                    <!--End Register Form -->
                </div>
            </div>
        </div>
    </section>
    <!--End Login Section-->
    
    <!-- Main Footer -->
    <footer class="main-footer" style="background-image:url(images/background/4.jpg);">
        <div class="auto-container">
            <!-- Upper Box -->

            <!-- Footer Content -->
            <div class="footer-content">
                <div class="footer-logo"><a href="#"><img src="<?php echo $logo ?>" alt=""></a></div>
                <div class="social-links">
                    <div class="text-box">
                        <div class="text"><?php echo $nombre ?></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/appear.js"></script>
<script src="js/jquery.countdown.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/owl.js"></script>
<script src="js/wow.js"></script>
<script src="js/script.js"></script>
</body>
</html>