<?php include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Modulo de administración de página web">
    <meta name="author" content="Leonardo Lizarazo Lozada">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Módulo de administración web</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/app.css">
    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #F5F8FA;
            z-index: 9998;
            text-align: center;
        }

        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%;
        }
    </style>
    <!-- Js -->
    <!--
    --- Head Part - Use Jquery anywhere at page.
    --- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
    -->
    <script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
   function BrowseServer()
  {
          var finder = new CKFinder();
          finder.selectActionFunction = SetFileField;
          finder.popup();
  }
           
  function SetFileField( fileUrl )
  {    
          document.getElementById('imagen').value = fileUrl ;
  }
</script>
</head>
<body class="light">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
<aside class="main-sidebar fixed offcanvas shadow" data-toggle='offcanvas'>
    <section class="sidebar">
        <div class="w-80px mt-3 mb-3 ml-3">
            <img src="assets/img/basic/logo.png" alt="">
        </div>
        <div class="relative">
            <a data-toggle="collapse" href="#userSettingsCollapse" role="button" aria-expanded="false"
               aria-controls="userSettingsCollapse" class="btn-fab btn-fab-sm absolute fab-right-bottom fab-top btn-primary shadow1 ">
                <i class="icon icon-cogs"></i>
            </a>
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left image">
                        <img class="user_avatar" src="<?php echo $_SESSION["s_imagen"]; ?>" alt="<?php echo $_SESSION["s_nombre"]; ?>">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1"><?php echo $_SESSION["s_nombre"]; ?></h6>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="collapse multi-collapse" id="userSettingsCollapse">
                    <div class="list-group mt-3 shadow">
                        <a href="index.html" class="list-group-item list-group-item-action ">
                            <i class="mr-2 icon-person text-blue"></i>Perfil
                        </a>
                        <a href="#" class="list-group-item list-group-item-action"><i
                                class="mr-2 icon-security text-purple"></i>Cambiar contraseña</a>
                    </div>
                </div>
            </div>
        </div>
        <?php include("menu.php"); ?>
    </section>
</aside>
<!--Sidebar End-->
<div class="has-sidebar-left">
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
            <!--Top Menu Start -->

        </div>
    </div>
</div>
<div class="page has-sidebar-left">
    <header class="my-3">
		<?php if ($_GET["resultado"] == 'exito') { ?>
				<div class="toast"
                     data-title="Actualización exitosa"
                     data-message="La información se ha modificado correctamente"
                     data-type="success">
                </div>
		<?php } elseif ($_GET["resultado"] == 'fallo') { ?>
				<div class="toast"
                     data-title="La actualización falló"
                     data-message="Hubo un error y la información no se ha podido modificar"
                     data-type="error">
                </div>
		<?php } else { echo "";} ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="s-24">
                        <i class="icon-pages"></i>
                        Bienvenido <?php echo $_SESSION["s_nombre"]; ?>
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <p>Aquí podrá actualizar y modificar el contenido de la página web</p>
    </div>
	<div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        
                        <div class="card-body b-b">
							<form action="actualizar_contacto.php" method="post">
                            <h2>Estos son los datos básicos y de contacto:</h2>
							<?php $ssql = "Select * from contacto WHERE id = 1"; 
								$result = $conn->query($ssql);
  								if ($result->num_rows > 0) {
      							while($row = $result->fetch_assoc()) { ?>
                            <div class="form-group">
								<label for="titulo" class="col-form-label">Nombre</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["titulo"]; ?>" id="titulo" name="titulo">
                            </div>
							<div class="form-group">
								<label for="slogan" class="col-form-label">Eslogan</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["slogan"]; ?>" id="slogan" name="slogan">
                            </div>
							<div class="form-group">
                                    <label for="resumen">Resumen</label>
                                    <textarea class="form-control r-0" id="resumen" rows="4" name="resumen"><?php echo $row["resumen"]; ?></textarea>
                            </div>
							<hr />
							<div class="form-group">
                                    <label for="footer1">Footer Columna 1</label>
                                    <textarea id="footer1" name="footer1"><?php echo $row["footer1"]; ?></textarea>
									<script type="text/javascript">
var editor = CKEDITOR.replace( 'footer1');
editor.setData( ' <?php echo $row["footer1"] ?> ' );
CKFinder.setupCKEditor( editor, 'https://www.hospitalsanrafaeltunja.gov.co/admin/ckfinder/' );
		</script>
                            </div>
							<div class="form-group">
                                    <label for="footer1">Footer Columna 2</label>
                                    <textarea id="footer2" name="footer2"><?php echo $row["footer2"]; ?></textarea>
									<script type="text/javascript">
var editor = CKEDITOR.replace( 'footer2');
editor.setData( ' <?php echo $row["footer2"] ?> ' );
CKFinder.setupCKEditor( editor, 'https://www.hospitalsanrafaeltunja.gov.co/admin/ckfinder/' );
		</script>
                            </div>
							<div class="form-group">
								<label for="direccion" class="col-form-label">Dirección</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["direccion"]; ?>" id="direccion" name="direccion">
                            </div>
							<div class="form-group">
								<label for="direccion" class="col-form-label">Horario de atención general</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["horario"]; ?>" id="horario" name="horario">
                            </div>
							<div class="form-group col-md-6">
								<label for="telefono" class="col-form-label">Teléfono</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["telefono"]; ?>" id="telefono" name="telefono">
                            </div>
							<div class="form-group col-md-6">
								<label for="telefono2" class="col-form-label">Telefono atención al usuario</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["telefono2"]; ?>" id="telefono2" name="telefono2">
                            </div>
							<div class="form-group col-md-6">
								<label for="telefono2" class="col-form-label">Línea gratuita nacional</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["telefono3"]; ?>" id="telefono2" name="telefono3">
                            </div>
							<div class="form-group col-md-6">
								<label for="telefono_citas" class="col-form-label">Call Center Citas</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["telefono_citas"]; ?>" id="telefono_citas" name="telefono_citas">
                            </div>
							<div class="form-group col-md-6">
								<label for="email" class="col-form-label">Email general</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["email"]; ?>" id="email" name="email">
                            </div>
							<div class="form-group col-md-6">
								<label for="email" class="col-form-label">Email atención al usuario</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["email_solicitudes"]; ?>" id="email_solicitudes" name="email_solicitudes">
                            </div>
							<div class="form-group col-md-6">
								<label for="email" class="col-form-label">Email notificaciones jurídicas</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["email_juridico"]; ?>" id="email_juridico" name="email_juridico">
                            </div>
							<div class="form-group col-md-6">
								<label for="nit" class="col-form-label">NIT</label>
                                <input class="form-control form-control-lg" type="text" value="<?php echo $row["nit"]; ?>" id="nit" name="nit">
                            </div>
							<hr />
							<div class="form-group col-md-12">
                                <h2>Logotipo</h2>
								<p>Este es el logotipo que aparece en la parte superior de la página web en todas las secciones</p>
								<img src="../..<?php echo $row["logo"];?>" width="200"/>
                                <script type="text/javascript">
   function BrowseServer()
  {
          var finder = new CKFinder();
          finder.selectActionFunction = SetFileField;
          finder.popup();
  }
           
  function SetFileField( fileUrl )
  {    
          document.getElementById('logo').value = fileUrl ;
  }
</script>
                                <input id="logo" name="logo" readonly="readonly" type="text" value="<?php echo $row["logo"];?>"/>
                                <input  type="button" value="Seleccionar imagen" onclick="BrowseServer();" />
                              </div>
								<div class="form-group col-md-6">
								<label for="color_header" class="col-form-label">Color superior</label>
                               <div class="color-picker input-group my-3">
                                <input type="text" name="color_header" value="<?php echo $row["color_header"];?>" class="form-control"/>
                                <span class="input-group-append">
                        <span class="input-group-text add-on">
                            <i></i>
                      </span>
                    </span>
                            </div>
                            </div>
								<hr />
							  <div class="form-group col-md-12">
                                <h2>Icono</h2>
								<p>Este se refiere al ícono de la pestaña de la página web</p>
								<img src="../..<?php echo $row["icono"];?>" width="200"/>
                                <script type="text/javascript">
   function BrowseServerIco()
  {
          var finder = new CKFinder();
          finder.selectActionFunction = SetFileFieldIco;
          finder.popup();
  }
           
  function SetFileFieldIco( fileUrl )
  {    
          document.getElementById('icono').value = fileUrl ;
  }
</script>
                                <input id="icono" name="icono" readonly="readonly" type="text" value="<?php echo $row["icono"];?>"/>
                                <input  type="button" value="Seleccionar imagen" onclick="BrowseServerIco();" />
                              </div>
								<hr />
							  <div class="form-group col-md-12">
								<h2>Imagen principal</h2>
								<p>Esa imágen se verá cuando un artículo no tenga una imagen principal de referencia al verlo en el conjunto de artículos de una sección</p>
								<img src="../..<?php echo $row["imagen"];?>" width="200"/>
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
<input id="imagen" name="imagen" readonly="readonly" type="text" value="<?php echo $row["imagen"];?>" />
<input  type="button" value="Seleccionar imagen" onclick="BrowseServerb();" />
                            </div>
							<div class="form-group col-md-12">
								<h2>Imagen banner</h2>
								<p>Esa imágen se ve en la parte superior al inicio de cada artículo. Esta imagen es estándar para toda la página y si se cambia, cambiará en todos los artículos. El tamaño ideal es 1922px x 360px</p>
								<img src="../assets/images/blog-details-bg.jpg" width="200"/>
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
<input id="imagen" name="imagen" readonly="readonly" type="text" value="<?php echo $row["imagen"];?>" />
<input  type="button" value="Seleccionar imagen" onclick="BrowseServerb();" />
                            </div>
							<?php }} else { echo ""; } ?>
							<input type="submit" value="GUARDAR CAMBIOS" class="btn btn-primary">
							</form>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-5">
                    <h3>Documentación</h3>
                    <hr>
                    <p>En esta primera parte se encuentran los datos básicos de contacto que aparecen en el Footer o pié de página.</p>
					<h3>Resumen</h3>
                    <p>El resumen se refiere a las dos líneas de texto que aparecerán en los motores de búsqueda (Google, Bing, etc.) como descripción general del sitio. Cualquier cambio no de verá reflejado en los motores de búsqueda de manera inmediata, depende de la indexación de la plataforma.
					</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
<!--/#app -->
<script src="assets/js/app.js"></script>




<!--
--- Footer Part - Use Jquery anywhere at page.
--- http://writing.colin-gourlay.com/safely-using-ready-before-including-jquery/
-->
<script>(function($,d){$.each(readyQ,function(i,f){$(f)});$.each(bindReadyQ,function(i,f){$(d).bind("ready",f)})})(jQuery,document)</script>
</body>
</html>