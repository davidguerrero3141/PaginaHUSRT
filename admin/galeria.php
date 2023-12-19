<? 
include ("includes/seguridad.php");
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
                        <img class="user_avatar" src="<? echo $_SESSION["s_imagen"]; ?>" alt="<? echo $_SESSION["s_nombre"]; ?>">
                    </div>
                    <div class="float-left info">
                        <h6 class="font-weight-light mt-2 mb-1"><? echo $_SESSION["s_nombre"]; ?></h6>
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
		<? if ($_GET["resultado"] == 'exito') { ?>
				<div class="toast"
                     data-title="Actualización exitosa"
                     data-message="La información se ha modificado correctamente"
                     data-type="success">
                </div>
		<? } elseif ($_GET["resultado"] == 'fallo') { ?>
				<div class="toast"
                     data-title="La actualización falló"
                     data-message="Hubo un error y la información no se ha podido modificar"
                     data-type="error">
                </div>
		<? } else { echo "";} ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="s-24">
                        <i class="icon-pages"></i>
                        Bienvenido <? echo $_SESSION["s_nombre"]; ?>
                    </h1>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid my-3">
        <p>Aquí podrá actualizar y modificar el contenido del directorio</p>
    </div>
	<div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        
                        <div class="card-body b-b">
							<table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Prioridad</th>
										<th>Imagen</th>
                                        <th>Publicar</th>
                                        <th>Borrar</th>
                                    </tr>
										<? $ssql = "Select * from galeria where id_gal = '".$_GET['id_gal']."' ORDER BY prioridad";
								$result = $conn->query($ssql);
  								if ($result->num_rows > 0) {
      							while($row = $result->fetch_assoc()) { if ($row["publicar"] == 1) {$publicado = 'No publicar' & $button = "btn btn-success btn-sm";} elseif ($row["publicar"] == 0) {$publicado = 'Publicar' & $button = "btn btn-warning btn-sm";}?>
                                    <tr>
                                        <td><form action='prioridad.php' method="post">
												<input size="1" type="text" id="prioridad" name="prioridad" value="<? echo $row["prioridad"]; ?>"/>
												<input name="id" type="hidden" id="id" value="<? echo $row["id"]; ?>"/>
												<input name="tabla" type="hidden" id="tabla" value="galeria"/>
												<input name="submit" class="button-grey arrow" type="submit" value="Cambiar"/></form></td>
                                        <td><img src="../..<? echo $row["imagen"]; ?>" width="250px"></td>
                                        <td><a class="<? echo $button ?>" href="publicar.php?tabla=galeria&id=<? echo $row["id"] ?>&publicar=<? echo $row["publicar"]?>">Publicar</a></td>
										<td><a class="btn btn-danger btn-sm" href="borrado.php?tabla=galeria&id=<? echo $row["id"]?>" onclick='clicked(event)'>Borrar</a></td>
                                    </tr>
                                    <? }} else { echo ""; } ?>
                                    </tbody>
                                </table>
                        </div>
						
						<div class="card-body b-b">
							<h2>Agregar nueva imagen</h2>
							<form enctype="multipart/form-data" action="subir_galeria.php" method="POST">
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
<input id="imagen" name="imagen" readonly="readonly" type="text" />
<input  type="button" value="Seleccionar imagen" onclick="BrowseServer();" />
							<input type="hidden" name="campo" value="imagen" />
							<input type="hidden" name="tabla" value="galeria" />
							<input type="hidden" name="id_gal" value="<? echo $_GET['id_gal'] ?>" />
							<input type="hidden" name="pagina" value="galeria" />
                            <p>
                                <input type="submit" value="Guardar imagen" class="btn btn-primary"/>
                              </p>
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