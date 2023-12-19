<?php
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
<!doctype html>
<html lang="es">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $ssql = "Select * from contacto WHERE id = 1"; 
$result = $conn->query($ssql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) { $titulo = $row["titulo"]; $dominio = $row["dominio"]; $telefono = $row["telefono"]; $telefono2 = $row["telefono2"]; $telefono3 = $row["telefono3"]; $email = $row["email"]; $email_envio = $row["email_envio"]; $direccion = $row["direccion"]; $logo = $row["logo"]; $logoresp = $row["logoresp"]; $imagen = $row["imagen"]; $slogan = $row["slogan"]; $resumen = $row["resumen"]; $t_intro = $row["t_intro"]; $intro = $row["intro"]; $horario = $row["horario"]; $icono = $row["icono"]; $url = $row["url"]; $nit = $row["nit"]; ?>
<title><?php echo $titulo; ?> - <?php echo $row["slogan"]; ?></title>
<meta name="description" content="<?php echo $row["resumen"]; ?>"/>
<?php }} else {
      echo "";
  } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo $icono ?>" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--====== nice select css ======-->
    <link rel="stylesheet" href="assets/css/nice-select.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/css/slick.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>

    <!--====== OFFCANVAS MENU PART START ======-->

    <div class="binduz-er-news-off_canvars_overlay"></div>
    <div class="binduz-er-news-offcanvas_menu">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="binduz-er-news-offcanvas_menu_wrapper">
                        <div class="binduz-er-news-canvas_close">
                            <a href="javascript:void(0)"><i class="fal fa-times"></i></a>
                        </div>
                        <div id="menu" class="text-left ">
                            <?php include("menu_resp.php"); ?>
                        </div>
                        <div class="binduz-er-news-offcanvas_footer">
                            <div class="binduz-er-news-logo text-center mb-30 mt-30">
                                <a href="https://<?php echo $url ?>">
                                    <img src="<?php echo $logoresp ?>" alt="<?php echo $titulo ?>">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== OFFCANVAS MENU PART ENDS ======-->

    <!--====== SEARCH PART START ======-->

    <!--<div class="binduz-er-news-search-box">
        <div class="binduz-er-news-search-header">
            <div class="container mt-60">
                <div class="row">
                    <div class="col-6">
                        <img src="assets/images/logo-4.png" alt="">
                    </div>
                    <div class="col-6">
                        <div class="binduz-er-news-search-close float-end">
                            <button class="binduz-er-news-search-close-btn">Cerrar <span></span><span></span></button>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
        <div class="binduz-er-news-search-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="binduz-er-news-search-form">
                            <form action="#">
                                <input type="text" placeholder="Buscar">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
    </div>-->

    <!--====== SEARCH PART ENDS ======-->

    <!--====== BINDUZ TOP HEADER PART START ======-->

    <div class="binduz-er-top-header-area">
        <div class="binduz-er-bg-cover"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
					<img src="assets/images/gov.co-header.png" height="25px">
                </div>
                <div class="col-lg-6">
                    <div class="binduz-er-topbar-social d-flex justify-content-end align-items-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="binduz-er-top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10">
					<img src="<?php echo $logo ?>">
                </div>
                <div class="col-lg-2">
                    <div class="binduz-er-widget d-flex">
                         <a class="binduz-er-news-search-open" href="#"><i class="far fa-search"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== BINDUZ TOP HEADER PART ENDS ======-->

    <!--====== BINDUZ HEADER PART START ======-->

    <header class="binduz-er-header-area">
        <div class="binduz-er-header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg">
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <?php include("menu_ppal.php"); ?>
                                </div> <!-- navbar collapse -->
                                <div class="binduz-er-navbar-btn d-flex">
                                    <span class="binduz-er-toggle-btn binduz-er-news-canvas_open d-block d-lg-none">
                                        <i class="fal fa-bars"></i>
                                    </span>
                                </div>
                            </nav>
                        </div> <!-- navigation -->
                    </div>
                </div> <!-- row -->
            </div>
        </div>
    </header>

    <!--====== BINDUZ HEADER PART ENDS ======-->

    
    <div class="binduz-er-contact-us-area">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="binduz-er-contact-us-box">
                        <form action="#">
                            <div class="binduz-er-contact-title">
                                <h4 class="binduz-er-title">Solicite su cita médica en línea</h4>
								<p>Pensando en su comodidad, puede programar sus citas en medicina general, pediatría y salud directa de manera rápida y ágil, a través de nuestro formulario.</p>
                            </div>
                            <div class="row">
                                <div class=" col-lg-4">
                                    <div class="binduz-er-input-box">
                                        <input type="text" placeholder="Nombres">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
                                <div class=" col-lg-4">
                                    <div class="binduz-er-input-box">
                                        <input type="text" placeholder="Apellidos">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
								<div class=" col-lg-4">
                                    <div class="binduz-er-input-box binduz-er-select-item">
                                        <select>
                                            <option data-display="Seleccione su EPS">EPS</option>
                                            <option value="1">Compensar</option>
                                            <option value="2">Famisanar</option>
                                            <option value="3">Aliansalud</option>
                                            <option value="4">Capital Salud EPS</option>
											<option value="4">Nueva EPS</option>
											<option value="4">EPS Sanitas</option>
                                        </select>
                                        <i class="fal fa-arrow-down"></i>
                                    </div>
                                </div>
                                <div class=" col-lg-6">
                                    <div class="binduz-er-input-box binduz-er-select-item">
                                        <select>
                                            <option data-display="Seleccione su tipo de documento">Tipo de documento</option>
                                            <option value="1">Cédula de ciudadanía</option>
                                            <option value="2">Cédula de extranjería</option>
                                            <option value="3">Tarjeta de identidad</option>
                                            <option value="4">Otro</option>
                                        </select>
                                        <i class="fal fa-arrow-down"></i>
                                    </div>
                                </div>
								<div class=" col-lg-6">
                                    <div class="binduz-er-input-box">
                                        <input type="text" placeholder="Número de documento (sin puntos)">
                                        <i class="fal fa-user"></i>
                                    </div>
                                </div>
								<div class=" col-lg-4">
                                    <div class="binduz-er-input-box">
                                        <input type="text" placeholder="email">
                                        <i class="fal fa-envelope"></i>
                                    </div>
                                </div>
								<div class=" col-lg-4">
                                    <div class="binduz-er-input-box">
                                        <input type="text" placeholder="Teléfono">
                                        <i class="fal fa-phone"></i>
                                    </div>
                                </div>
								<div class=" col-lg-4">
                                    <div class="binduz-er-input-box">
                                        <input type="text" placeholder="Celular">
                                        <i class="fal fa-mobile"></i>
                                    </div>
                                </div>
								<div class=" col-lg-6">
                                    <div class="binduz-er-input-box binduz-er-select-item">
                                        <select>
                                            <option data-display="Seleccione el servicio o especialidad">Servicio o Especialidad</option>
                                            <option value="12457">Ecografías</option>
                                            <option value="12419">Lectura de exámenes</option>
                                            <option value="10438">Medicina General</option>
                                            <option value="4">Ortopedia</option>
                                        </select>
                                        <i class="fal fa-arrow-down"></i>
                                    </div>
                                </div>
								<div class=" col-lg-4">
                                    <div class="binduz-er-input-box">
                                        <input type="date" id="start" name="trip-start" value="2022-05-04" min="2022-05-04" max="2022-30-04">
                                        <i class="fal fa-clock"></i>
                                    </div>
                                </div>
                            </div>
                            <button class="binduz-er-main-btn">Agendar Cita</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== BINDUZ CONTACT US PART ENDS ======-->



    <!--====== BINDUZ FOOTER PART START ======-->

    <footer class="binduz-er-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="binduz-er-footer-widget-style-1">
								<div class="binduz-er-footer-title">
                                    <h3 class="binduz-er-title">Contacto</h3>
                                </div>
                                <div class="binduz-er-footer-menu-list">
                                    <ul>
                                        <li><a href="#"><?php echo $horario ?></a></li>
                                        <li><a href="#">Consulte horarios especiales de atención en otros servicios</a></li>
                                        <li><a href="#">Directorio de áreas y funcionarios principales</a></li>
                                        <li><a href="#">Atención al Usuario: siau@hospitalsanrafaeltunja.gov.co</a></li>
                                        <li><a href="#">Notificaciones: juridicanotificaciones@hospitalsanrafaeltunja.gov.co</a></li>
                                        <li><a href="#">Solicitudes: pqrs@hospitalsanrafaeltunja.gov.co</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="binduz-er-footer-widget-style-1">
                                <div class="binduz-er-footer-menu-list">
                                    <ul>
                                        <li><a href="#"><?php echo $telefono ?> - <?php echo $telefono2 ?></a></li>
                                        <li><a href="#">Línea gratuita nacional: <?php echo $telefono3 ?></a></li>
                                        <li><a href="#">Atención al usuario:(57)8 7405050 o (57)8 7405030 ext  2114</a></li>
                                        <li><a href="#"><?php echo $direccion ?></a></li>
                                        <li><a href="#">Nit: <?php echo $nit ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="binduz-er-footer-widget-info">
                        <div class="binduz-er-logo">
                            <a href="#"><img src="assets/images/logo-4.png" alt=""></a>
                        </div>
                        <div class="binduz-er-text">
                            <p><?php echo $slogan ?></p>
                        </div>
                        <div class="binduz-er-social">
                            <ul>
								<?php $ssqlred = "Select * from redes WHERE publicar = 1 ORDER BY prioridad";
											$resultred = $conn->query( $ssqlred );
											while ( $rowred = $resultred->fetch_assoc() ) { ?>
                                <li><a href="<?php echo $rowred["vinculo"] ?>"><i class="fab fa-<?php echo $rowred["red"] ?>"></i></a></li>
								<?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="binduz-er-footer-copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="binduz-er-copyright-text">
                        <p>E.S.E. Hospital Universitario San Rafael Tunja -Todos los derechos reservados - 2022</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="binduz-er-copyright-menu float-lg-end float-none">
                        <ul>
                            <li><a href="#">Tratamiento y Protección de Datos Personales</a></li>
                            <li><a href="#">Condiciones de uso</a></li>
                            <li><a href="#">Mapa del sitio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== BINDUZ FOOTER PART ENDS ======-->

    <!--====== BINDUZ BACK TO TOP PART START ======-->

    <!--====== BINDUZ BACK TO TOP PART ENDS ======-->












    <!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>

    <!--====== nice select js ======-->
    <script src="assets/js/jquery.nice-select.min.js"></script>

    <!--====== Isotope js ======-->
    <script src="assets/js/isotope.pkgd.min.js"></script>

    <!--====== Images Loaded js ======-->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>
	
	<script>(function(d){var s = d.createElement("script");s.setAttribute("data-account", "v30TZru2IL");s.setAttribute("src", "https://cdn.userway.org/widget.js");(d.body || d.head).appendChild(s);})(document)</script><noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>

</body>

</html>
