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
      while($row = $result->fetch_assoc()) { $titulo_sitio = $row["titulo"]; $dominio = $row["dominio"]; $telefono = $row["telefono"]; $telefono2 = $row["telefono2"]; $telefono3 = $row["telefono3"]; $email = $row["email"]; $email_envio = $row["email_envio"]; $email_juridico = $row["email_juridico"]; $email_solicitudes = $row["email_solicitudes"]; $direccion = $row["direccion"]; $logo = $row["logo"]; $logoresp = $row["logoresp"]; $imagen = $row["imagen"]; $slogan = $row["slogan"]; $resumen = $row["resumen"]; $t_intro = $row["t_intro"]; $intro = $row["intro"]; $horario = $row["horario"]; $icono = $row["icono"]; $url = $row["url"]; $nit = $row["nit"]; $color_header = $row["color_header"] ?>
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

    <div class="binduz-er-blog-bg-area"></div>
	<section class="binduz-er-main-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="binduz-er-content">
                        <div class="binduz-er-video-post-title">
                            <h3 class="binduz-er-title">Mapa del sitio</h3>
                        </div>
                    </div>
                    <div class="row">
						
						<ul class="navbar-nav m-auto">
							<li class="nav-item"> <a class="nav-link" href="https://<?php echo $url ?>">Inicio </a> </li>
							<?php $ssqlsecc = "Select * from secciones WHERE en_menu = 1 AND publicar = 1 ORDER BY prioridad";

	//Ejecuto la consulta 

	$resultsecc = $conn->query( $ssqlsecc );

	while ( $rowsecc = $resultsecc->fetch_assoc() ) { $seccion = $rowsecc['slug']; $prioridad = $rowsecc['prioridad']; ?>
							<li class="nav-item active"><a class="nav-link" href="secciones.php?seccion=<?php echo $rowsecc['seccion'] ?>&slug=<?php echo $rowsecc['slug'] ?>"><i class="fa fa-angle-down"></i> <?php echo $prioridad ?>. <?php echo $rowsecc['nombre']; ?></a>
								<ul class="sub-menu">
							

  <?php $ssqlmen = "Select * from subsecciones WHERE seccion = '".$seccion."' AND publicar = 1 ORDER BY prioridad";

	//Ejecuto la consulta 

	$resultmen = $conn->query( $ssqlmen );

	while ( $rowmen = $resultmen->fetch_assoc() ) { $subseccion = $rowmen['subseccion']; $txsubseccion = $rowmen['nombre']; $seccion = $rowmen['seccion']; $slug = $rowmen['slug']; $prioridadsc = $rowmen['prioridadsc'];

  $ssqltiene = "Select seccion,titulo,slug,prioridad,en_menu,publicar,tieness,vinculo,id from articulos WHERE subseccion = '$subseccion' AND publicar = 1 AND tieness = 0 ORDER BY prioridad LIMIT 1";
	$resulttiene = $conn->query( $ssqltiene );
	while ( $rowtiene = $resulttiene->fetch_assoc() ) { $elvinculo = $rowtiene['vinculo']; $tieness = $rowtiene['tieness']; ?>
	  <li class="nav-item active"><a class="nav-link" href="intro.php?seccion=<?php echo $rowmen['seccion'] ?>&slug=<?php echo $rowmen['slug'] ?>"><i class="fa fa-angle-down"></i> <?php echo $prioridad; echo "."; echo $rowmen['prioridad'] ?>. <?php echo $txsubseccion ?></a>
			<ul class="sub-menu"><?php $ssqlsub = "Select seccion,titulo,slug,prioridad,en_menu,publicar,tieness,vinculo,blank,id from articulos WHERE subseccion = '$subseccion' AND publicar = 1 ORDER BY prioridad";
	$resultsub = $conn->query( $ssqlsub );
	while ( $rowsub = $resultsub->fetch_assoc() ) { $vinculosub = $rowsub['vinculo']; $blanksub = $rowsub['blank']; if ($vinculosub == '') { ?>
			<li><a href="contenido.php?id=<?php echo $rowsub['id'] ?>&seccion=<?php echo $rowsub['seccion'] ?>&slug=<?php echo $rowsub['slug'] ?>"><?php echo $prioridad; echo "."; echo $rowmen['prioridad'] ?>.<?php echo $rowsub['prioridad'] ?>. <?php echo $rowsub['titulo'] ?></a></li>
				<?php } else { ?>
				<li><a href="<?php echo $vinculosub ?>" target="<?php if ($blanksub == 1) { echo "_blank"; } else { echo "_self"; } ?>"><?php echo $prioridad; echo "."; echo $rowmen['prioridad'] ?>.<?php echo $rowsub['prioridad'] ?>. <?php echo $rowsub['titulo'] ?></a></li>
				<?php } ?>
				<?php } ?></ul>

  </li>

	<?php }} ?>
								</ul></li>
						<?php } ?>
							<li class="nav-item active"><a class="nav-link" href="intro_servicios.php"><i class="fa fa-angle-down"></i> 5. Servicios</a><ul class="sub-menu">
								<?php $ssqlart = "Select DISTINCT subseccion from articulos WHERE seccion = 'servicios' AND publicar = 1 ORDER BY prioridad";
											$resultart = $conn->query( $ssqlart );
											while ( $rowart = $resultart->fetch_assoc() ) { $subseccion = $rowart['subseccion']; 
											$ssqlss = "Select * FROM subsecciones WHERE subseccion = '".$subseccion."' AND publicar = 1 ORDER BY prioridad";
											$resultss = $conn->query( $ssqlss );
											while ( $rowss = $resultss->fetch_assoc() ) {
						?>
								<li><a href="intro.php?seccion=servicios&slug=<?php echo $rowss['subseccion'] ?>"><?php echo $rowss['nombre']; ?></a></li>
								<?php } ?>
								</ul></li>
							<?php } ?>

</ul>
						
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="binduz-er-favorites-categories-area">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="binduz-er-favorites-categories-box">
                        <div class="binduz-er-favorites-categories-list">
							<?php $ssqlali = "Select * from aliados WHERE publicar = 1 ORDER BY prioridad";
											$resultali = $conn->query( $ssqlali );
											while ( $rowali = $resultali->fetch_assoc() ) { ?>
                            <div class="binduz-er-item">
                                <a href="<?php echo $rowali["vinculo"] ?>" target="_blank">
                                    <img src="<?php echo $rowali["imagen"] ?>" alt="<?php echo $rowali["nombre"] ?>">
                                </a>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== BINDUZ FAVORITES CATEGORIES PART ENDS ======-->


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
                                        <li><a href="#"><?php echo $direccion ?></a></li>
										<li><a href="#"><?php echo $horario ?></a></li>
                                        <li><a href="#">Consulte horarios especiales de atención en otros servicios</a></li>
                                        <li><a href="#">Directorio de áreas y funcionarios principales</a></li>
										<li><a href="#">PBX: <?php echo $telefono ?></a></li>
										<li><a href="#">TELEFAX: <?php echo $telefono2 ?></a></li>
                                        <li><a href="#">Línea gratuita nacional: <?php echo $telefono3 ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="binduz-er-footer-widget-style-1">
                                <div class="binduz-er-footer-menu-list">
                                    <ul>
                                        <li><a href="#">Atención al Usuario: <?php echo $email ?></a></li>
                                        <li><a href="#">Notificaciones: <?php echo $email_juridico ?></a></li>
                                        <li><a href="#">Solicitudes: <?php echo $email_solicitudes ?></a></li>
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
                            <?php $ssqltra = "Select id,dia,mes,ano,slug,seccion,titulo,subtitulo,publicar,imagen,destacado,vinculo,blank from articulos WHERE seccion = 'tratamiento-de-datos-personales' AND publicar = 1";
											$resulttra = $conn->query( $ssqltra );
											while ( $rowtra = $resulttra->fetch_assoc() ) { ?>
                            <li><a href="contenido.php?id=<?php echo $rowtra['id'];?>&seccion=<?php echo $rowtra['seccion'];?>&slug=<?php echo $rowtra['slug'];?>"><?php echo $rowtra['titulo'] ?></a></li>
							<?php } ?>
                            <li><a href="mapa_del_sitio.php">Mapa del sitio</a></li>
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
