<?php include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php $ssql = "Select id,nombre,resumen,descripcion,valor,imagen,imagen_ref,logo,icono from datoscitas WHERE id = 1"; 
//Ejecuto la consulta 

$result = $conn->query($ssql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) { $nombre = $row["nombre"]; $logo = $row["logo"]; $resumen = $row["resumen"]; $descripcion = $row["descripcion"]; $valor = $row["valor"]; $imagen = $row["imagen"]; $imagen_ref = $row["imagen_ref"]; $icono = $row["icono"]; ?> 
	<title><?php echo $row["nombre"]; ?></title>
	<meta name="description" content="<?php echo $row["resumen"]; ?>"/>
	<link rel="shortcut icon" href="<?php echo $logo; ?>" type="image/x-icon">
	<link rel="icon" href="<?php echo $icono; ?>" type="image/x-icon">
  <?php }} else {
      echo "";
  } ?>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<link href="plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
 	
    <!-- Header Span -->
    <span class="header-span"></span>

    <!-- Main Header-->
    <header class="main-header header-style-two">
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="outer-container">
            	<div class="clearfix">
                	<div class="pull-left logo-box">
                    	<div class="logo"><a href="index.php"><img src="<?php echo $logo ?>" alt="<?php echo $nombre ?>"></a></div>
                    </div>
                   
                    <!-- Outer btn -->
                    <div class="outer-btn">
                        <a href="registro.php" class="theme-btn btn-style-four">¿No tiene cuenta? Inscribase <span class="flaticon-arrow"></span></a>
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
                <div class="nav-logo"><a href="index.php"><img src="<?php echo $logo ?>" alt="<?php echo $nombre ?>"></a></div>
                
                <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            </nav>
        </div><!-- End Mobile Menu -->
    </header>
    <!--End Main Header -->

    <!-- Banner Section -->
    <section class="banner-section" style="background-image: url(<?php echo $imagen ?>);">

        <div class="auto-container">
            <div class="row">
                <div class="content-column col-xl-8 col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        
                    </div>
                </div>

                <div class="form-column col-xl-4 col-lg-5 col-md-12 col-sm-12">
                     <div class="form-box wow slideInRight">
                        <div class="register-form">
							<?php if ($_GET["creada"]=="si"){ ?>
										<p><br>Su contrse&ntilde;a se ha creado correctamente.</p>
			  <p><a href="index.php">INGRESE A SU CUENTA</a></p>
							 <?php }else{ ?>
							<div class="title-box">
                            	<h4>Cree una contraseña</h4>
								<div class="text"></div>
                        	</div>
							<form method="post" action="clave_generada.php"> 
                                <div class="form-group">
									<label for="clave" class="form-label">Nueva Contraseña</label>
												<input type="password" class="form-control" id="clave" name="clave" placeholder="Escriba una contraseña">
                                </div>
                                <div class="form-group">
									<input type="hidden" name="cedula" value="<?php echo $_GET['cedula'] ?>">
									<div class="g-recaptcha" data-sitekey="6Lf5dkcfAAAAAP3Dq_mTVhRHYIOk7h3mWIiqxBl3"></div>
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Enviar <span class="flaticon-arrow"></span></button>
                                </div>
                            </form>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Banner Section -->

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
                <div class="copyright-text">2021. Desarrollado por: Leonardo Lizarazo Lozada.</div>
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
<!--Revolution Slider-->
<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="js/main-slider-script.js"></script>
<!--Revolution Slider-->
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