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
	<script>
function clicked(e)
{
    if(!confirm('¿Está seguro? Esta acción no se puede deshacer'))e.preventDefault();
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
        <p>Aquí podrá actualizar y modificar los adjuntos del artículo</p>
    </div>
	<div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
						
						<div class="card-body b-b">
							<h2>Formulario</h2>
							<form enctype="multipart/form-data" action="actualizar_form.php" method="POST">
							<?php $ssql = "Select * from forms where id_art = '".$_GET['id_art']."'";
								$result = $conn->query($ssql);
  								if ($result->num_rows > 0) {
      							while($row = $result->fetch_assoc()) { ?>
							<div class="form-group">
								<label for="titulo" class="col-form-label">Titulo</label>
                                <input class="form-control form-control-lg" type="text" id="nombre" name="nombre" value="<?php echo $row['nombre'] ?>">
                            </div>
							<div class="form-group">
                                    <label for="resumen"><h3>Descripción</h3></label>
                                    <textarea class="form-control r-0" id="descripcion" rows="4" name="descripcion"><?php echo $row['descripcion'] ?></textarea>
                            </div>
							<div class="form-group">
								<label for="email" class="col-form-label">Email que recibirá</label>
                                <input class="form-control form-control-lg" type="text" id="recibe" name="recibe" value="<?php echo $row['recibe'] ?>">
                            </div>
							<input type="hidden" name="num_id" value="<?php echo $_GET['num_id'] ?>" />
							<input type="hidden" value="<?php echo $_SESSION['s_nombre'] ?>" name="registrado_por">
                            <p>
                                <input type="submit" value="Guardar adjunto" class="btn btn-primary"/>
                              </p>
							<?php } ?>
                          </form>
						</div>
                        
                    </div>
                </div>
                <div class="col-md-5">
                    <h3>Documentación</h3>
                    <hr>
                    <p>Pronto.</p>

                </div>
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