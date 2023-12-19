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
      while($row = $result->fetch_assoc()) { $titulo_sitio = $row["titulo"]; $dominio = $row["dominio"]; $telefono = $row["telefono"]; $telefono2 = $row["telefono2"]; $telefono3 = $row["telefono3"]; $email = $row["email"]; $email_envio = $row["email_envio"]; $email_juridico = $row["email_juridico"]; $email_solicitudes = $row["email_solicitudes"]; $direccion = $row["direccion"]; $logo = $row["logo"]; $logoresp = $row["logoresp"]; $imagen = $row["imagen"]; $slogan = $row["slogan"]; $resumen = $row["resumen"]; $t_intro = $row["t_intro"]; $intro = $row["intro"]; $horario = $row["horario"]; $icono = $row["icono"]; $url = $row["url"]; $nit = $row["nit"]; $color_header = $row["color_header"]; $footer1 = $row["footer1"]; $footer2 = $row["footer2"]; ?>
<title><?php echo $titulo_sitio; ?> - <?php echo $row["slogan"]; ?></title>
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
	<!-- Código de instalación Cliengo para leonalilo@gmail.com --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/626feb284d6f42002a388281/626feb2b4d6f42002a388284.js?platform=view_installation_code'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>


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

    <div class="binduz-er-news-search-box">
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
                            <form action="resultados.php" method="POST">
                                <input type="text" name="PalabraClave" placeholder="Buscar" required>
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
    </div>

    <!--====== SEARCH PART ENDS ======-->

    <!--====== BINDUZ TOP HEADER PART START ======-->

    <div class="binduz-er-top-header-area">
        <div class="binduz-er-bg-cover"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
					<a href="https://www.gov.co/" target="_blank"><img src="assets/images/gov.co-header.png" height="25px"></a>
                </div>
                <div class="col-lg-6">
                    <div class="binduz-er-topbar-social d-flex justify-content-end align-items-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="binduz-er-top-header-area" style="background-color: <?php echo $color_header ?>;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
					<img src="<?php echo $logo ?>">
                </div>
                <div class="col-lg-2">
                    <div class="binduz-er-widget d-flex">
                         <a class="binduz-er-news-search-open" href="#"><i class="far fa-search"></i></a>
                    </div>
                </div>
				<div class="col-lg-2">
                    <div id="google_translate_element" class="google"></div>
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

    <!--====== BINDUZ AUTHOR USER PART START ======-->
    <div class="binduz-er-blog-bg-area"></div>
    <section class="binduz-er-author-item-area binduz-er-author-item-layout-1 pb-20">
        <div class=" container">
            <div class="row">
				
                <div class=" col-lg-12">
					<?php
 
if(!empty($_POST))
{
      $aKeyword = explode(" ", $_POST['PalabraClave']);
      $query ="SELECT * FROM articulos WHERE titulo like '%" . $aKeyword[0] . "%'";
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR contenido like '%" . $aKeyword[$i] . "%'";
        }
      }
     
     $result = $conn->query($query);
     echo "<br>Has buscado la palabra clave:<b> ". $_POST['PalabraClave']."</b>";
                     
     if(mysqli_num_rows($result) > 0) {
        $row_count=0;
        echo "<br><br>Resultados encontrados: ";
        echo "<br><table class='table table-striped'>";
        While($row = $result->fetch_assoc()) {   
            $row_count++;                         
            echo "<tr><td>".$row_count." </td><td><a href='contenido.php?id=". $row['id'] . "&seccion=". $row['seccion'] . "&slug=". $row['slug'] . "'>". $row['titulo'] . "</a></td><td>". $row['resumen'] . "</td></tr>";
        }
        echo "</table>";
	
    }
    else {
        echo "<br>Resultados encontrados: Ninguno";
		
    }
}
 
?>
					
                </div>
            </div>
        </div>
    </section>


    <!--====== BINDUZ FOOTER PART START ======-->

    <footer class="binduz-er-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="binduz-er-footer-widget-style-1">
								<div class="binduz-er-footer-title">
                                    <h3 style="color: #FFFFFF"><?php echo $titulo_sitio ?></h3>
                                </div>
                                <div class="binduz-er-footer-menu-list">
                                    <ul>
                                	<?php echo $footer1 ?>
									</ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="binduz-er-footer-widget-style-1">
								<div class="binduz-er-footer-menu-list">
                                    <ul>
                                	<?php echo $footer2 ?>
									</ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="binduz-er-footer-widget-info">
                        <div class="binduz-er-logo">
                            <a href="#"><img src="assets/images/logo-4.png" alt="<?php echo $titulo_sitio ?>"></a>
                        </div>
                        <div class="binduz-er-text">
                            <p style="color: #fff"><?php echo $slogan ?></p>
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
                            <li><a href="contenido.php?seccion=tratamiento-de-datos-personales&slug=politica-de-tratamiento-y-proteccion-de-datos-personales">Tratamiento y Protección de Datos Personales</a></li>
                            <li><a href="contenido.php?seccion=tratamiento-de-datos-personales&slug=condiciones-de-uso-del-portal-web">Condiciones de uso</a></li>
                            <li><a href="mapa_del_sitio.php">Mapa del sitio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="binduz-er-top-header-area">
        <div class="binduz-er-bg-cover"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4">
					<p style="color: #FFF; font-size: 24px;"><img src="assets/images/logo-colombia.png" height="35px"> &#124; <img src="assets/images/gov.co-header.png" height="35px"></p>
                </div>
                <div class="col-lg-8">
                    <div class="binduz-er-topbar-social d-flex justify-content-end align-items-center">
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
	
	<script type="text/javascript">
function googleTranslateElementInit() {
	new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en,es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
        }
</script>
	
	<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>
