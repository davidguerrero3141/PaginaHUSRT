<?php include ("includes/seguridad.php");
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
                            <h2>Sus datos han sido registrados exitosamente</h2>
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
					<?php if ($_GET["resultado"]=="exito") { ?>
					<h2>Gracias por registrase en nuestra plataforma de solicitud de citas</h2>
					<p>Ya puede ingresar y solicitar sus citas médicas</p>
					<?php } else { ?>
					<h2>Registre sus datos personales</h2>
					<p>Complete el formulario para registrarse y poder solicitar citas médicas</p>
					<?php } ?>
					<div class="image-box">
                        <figure class="image wow fadeInLeft"><a href="images/resource/image-2.jpg" class="lightbox-image" data-fancybox="images"><img src="images/resource/image-2.jpg" alt=""></a></figure>
                    </div>
                    
                </div>
                
                <div class="column col-lg-6 col-md-12 col-sm-12">
                    
                    <!-- Register Form -->
                    <div class="login-form register-form">
							
                            <div class="form-group text-right">
								<a href="index.php" class="theme-btn btn-style-four">INGRESE A SU CUENTA</a>
                            </div>      
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