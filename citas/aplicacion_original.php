<?php 
session_start();
if ($_SESSION["autentificado"] != "si") { 
    //si no existe, envio a la página de autentificacion 
    header("Location: index.php"); 
    //ademas salgo de este script 
    exit(); 
} 
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
            <h2 style="color: #2D2D2D">Bienvenid@ <?php echo $_SESSION['s_nombres'] ?> <?php echo $_SESSION['s_apellidos'] ?></h2>
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
                            <h2>Pida su cita médica en el formulario que encuentra a continuación, nos estaremos comunicando posteriormente para confirmarla</h2>
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
				<?php if ($_GET["resultado"]=="exito") { ?>
                <div class="column col-lg-12 col-md-12 col-sm-12">
					<h2>La cita ha sido registrada con el No. <?php echo $_GET['solicitud'] ?></h2>
					<p>Nuestro personal revisará los datos y le informaremos la confirmación de su cita.</p>
					<a href="salida.php" class="theme-btn btn-style-four">CONTINUAR</a>
					<?php } else { ?>
				<div class="column col-lg-6 col-md-12 col-sm-12">
					<h2>Solicite su cita</h2>
					<p>Los datos que ingrese serán revisados y le informaremos la confirmación de su cita.</p>
					<div class="image-box">
                        <figure class="image wow fadeInLeft"><a href="images/image-2.jpg" class="lightbox-image" data-fancybox="images"><img src="images/image-2.jpg" alt=""></a></figure>
                    </div>
                    
                </div>
                
                <div class="column col-lg-6 col-md-12 col-sm-12">
                    
                    <!-- Register Form -->
                    <div class="login-form register-form">
                        <!--Login Form-->
                        <form method="post" action="registrado_cita.php">
                            
							<!--Form Group-->
                           <div class="form-group">
                               <div class="field-label">Especialidad</div>
                                    <select name="especialidad" id="especialidad" required>
										<option value="" selected>Seleccione especialidad</option>
                                        <?php $querylocal = $conn -> query ("Select * from especialidades where publicar = '1' ORDER BY especialidad");
          						while ($valores = mysqli_fetch_array($querylocal)) {
								
            					echo '<option value="'.$valores['especialidad'].'">'.$valores['especialidad'].'</option>';
          						}
								?>
                                    </select>
                            </div>
							
							<div class="form-group">
                                <div id="especialista"></div>
                            </div>
							
							<div class="form-group">
                                <label>Fecha solicitada</label>
                                <input type="date" name="fecha" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Hora</label>
								<select name="hora" required>
									<option value="">Seleccione</option>
									<option value="7:00">7:00 AM</option>
									<option value="7:20">7:20 AM</option>
									<option value="7:40">7:40 AM</option>
									<option value="8:00">8:00 AM</option>
									<option value="8:20">8:20 AM</option>
									<option value="8:40">8:40 AM</option>
									<option value="9:00">9:00 AM</option>
									<option value="9:20">9:20 AM</option>
									<option value="9:40">9:40 AM</option>
									<option value="10:00">10:00 AM</option>
									<option value="10:20">10:20 AM</option>
									<option value="10:40">10:40 AM</option>
									<option value="11:00">11:00 AM</option>
									<option value="11:20">11:20 AM</option>
									<option value="11:40">11:40 AM</option>
									<option value="12:00">12:00 PM</option>
									<option value="12:20">12:20 PM</option>
									<option value="12:40">12:40 PM</option>
									<option value="13:00">1:00 PM</option>
									<option value="13:20">1:20 PM</option>
									<option value="13:40">1:40 PM</option>
									<option value="14:00">2:00 PM</option>
									<option value="14:20">2:20 PM</option>
									<option value="14:40">2:40 PM</option>
									<option value="14:00">3:00 PM</option>
									<option value="15:20">3:20 PM</option>
									<option value="15:40">3:40 PM</option>
									<option value="16:00">4:00 PM</option>
									<option value="16:20">4:20 PM</option>
									<option value="16:40">4:40 PM</option>
									<option value="17:00">5:00 PM</option>
									<option value="17:20">5:20 PM</option>
									<option value="17:40">5:40 PM</option>
									<option value="18:00">6:00 PM</option>
									<option value="18:20">6:20 PM</option>
									<option value="18:40">6:40 PM</option>
								</select>
                            </div>
							<?php $ssqlpac = "Select * from clientes where cedula = '".$_SESSION['s_cedula']."'";
          						$resultpac = $conn->query( $ssqlpac );
											while ( $rowpac = $resultpac->fetch_assoc() ) { 
								?>
                            <input type="hidden" name="telefono" value="<?php echo $rowpac['telefono'] ?>">
							<input type="hidden" name="celular" value="<?php echo $rowpac['celular'] ?>">
							<input type="hidden" name="eps" value="<?php echo $rowpac['eps'] ?>">
							<?php } ?>
                            <div class="form-group text-right">
                                <button class="theme-btn btn-style-four" type="submit" name="submit-form">SOLICITAR CITA</button>
                            </div>
                        </form>      
                    </div>
                    <!--End Register Form -->
                </div>
					<?php } ?>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#especialidad').val(1);
		recargarLista();

		$('#especialidad').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos_especialistas.php",
			data:"especialidad=" + $('#especialidad').val(),
			success:function(r){
				$('#especialista').html(r);
			}
		});
	}
</script>