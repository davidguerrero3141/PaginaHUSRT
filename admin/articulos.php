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
        <p>Aquí podrá actualizar y modificar el contenido de la página web</p>
    </div>
	
		<div class="animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        
                        <div class="card-body b-b">
							<table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>Subseccion</th>
										<th>Prioridad</th>
                                        <th>Artículo</th>
                                        <th>Editar</th>
										<th>Adjuntos</th>
                                        <th>Publicar</th>
										<?php if ($_GET['seccion'] == 'novedades') { ?>
										<th>Destacar</th>
										<?php } else { echo ""; } ?>
										<th>En menú principal</th>
                                        <th>Borrar</th>
                                    </tr>
										<?php $articulos_x_pagina = 10;
								$iniciar = ($_GET['pagina']-1)*$articulos_x_pagina;
										$ssql = "Select * from articulos where seccion = '".$_GET['seccion']."' ORDER BY subseccion, prioridad LIMIT $iniciar,$articulos_x_pagina";
								$result = $conn->query($ssql);
								$total_articulos_db = mysqli_num_rows($result);
								$paginas = $total_articulos_db/$articulos_x_pagina;
								$paginas = ceil($paginas);
  								if ($result->num_rows > 0) {
      							while($row = $result->fetch_assoc()) { if ($row["publicar"] == 1) {$publicado = 'No publicar' & $button = "btn btn-success btn-sm";} elseif ($row["publicar"] == 0) {$publicado = 'Publicar' & $button = "btn btn-warning btn-sm";} if ($row["en_menu"] == 1) { $button_em = "btn btn-success btn-sm";} elseif ($row["en_menu"] == 0) {$button_em = "btn btn-warning btn-sm";} if ($row["destacado"] == 1) {$destacado = 'No destacar' & $button_dest = "btn btn-success btn-sm";} elseif ($row["destacado"] == 0) {$destacado = 'Destacar' & $button_dest = "btn btn-warning btn-sm";} $subseccion = $row['subseccion']; $slug_sub = str_replace("-", " ", $subseccion); $slug_sub = ucfirst($slug_sub); ?>
                                    <tr>
                                        <td><?php if ($subseccion != '') { echo $slug_sub; } else { echo ""; } ?></td>
										<td><form action='prioridad.php' method="post">
												<input size="1" type="text" id="prioridad" name="prioridad" value="<?php echo $row["prioridad"]; ?>"/>
												<input name="id" type="hidden" id="id" value="<?php echo $row["id"]; ?>"/>
												<input name="tabla" type="hidden" id="tabla" value="articulos"/>
												<input name="submit" class="button-grey arrow" type="submit" value="Cambiar"/></form></td>
                                        <td><?php echo $row["titulo"]; ?></td>
                                        <td><a href="actualizar.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm">ACTUALIZAR</a></td>
										<td><?php if ($row["adjuntos"] == 1) { ?><a href="adjuntos.php?num_id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm">ADJUNTOS</a><?php } else { echo ""; } ?></td>
                                        <td><a class="<?php echo $button ?>" href="publicar.php?tabla=articulos&id=<?php echo $row["id"] ?>&publicar=<?php echo $row["publicar"]?>"><?php if ($row["publicar"] == 0) { echo "No publicado";} else { echo "Publicado"; }?></a></td>
										<?php if ($_GET['seccion'] == 'novedades') { ?>
										<td><a class="<?php echo $button_dest ?>" href="destacar.php?tabla=articulos&id=<?php echo $row["id"] ?>&destacado=<?php echo $row["destacado"]?>"><?php if ($row["destacado"] == 0) { echo "No destacado";} else { echo "Destacado"; }?></a></td>
										<?php } else { echo ""; } ?>
										<td><a class="<?php echo $button_em ?>" href="en_menu.php?tabla=articulos&id=<?php echo $row["id"] ?>&en_menu=<?php echo $row["en_menu"]?>"><?php if ($row["en_menu"] == 0) { echo "No aparece en menú";} else { echo "Aparece en menú"; }?></a></td>
										<td><a class="btn btn-danger btn-sm" href="borrado.php?tabla=articulos&id=<?php echo $row["id"]?>" onclick='clicked(event)'>Borrar</a></td>
                                    </tr>
                                    <?php }} else { echo ""; } ?>
                                    </tbody>
                                </table>
							<nav aria-label="Page navigation example">
  <ul class="pagination">
	  <?php $articulos_x_pagina = 10;
	$ssql = "Select * from articulos where seccion = '".$_GET['seccion']."'";
//Ejecuto la consulta 

$result = $conn->query($ssql);
$total_articulos_db = mysqli_num_rows($result);
$paginas = $total_articulos_db/$articulos_x_pagina;
$paginas = ceil($paginas);
      // output data of each row
     
		 
        ?>
    <li class="page-item <?php if ($_GET['pagina']<=1) {echo 'disabled';} ?>"><a class="page-link" href="articulos.php?pagina=<?php echo $_GET['pagina']-1; ?>&seccion=<?php echo $_GET['seccion']; ?>">Anterior</a></li>
	<?php for($i=0;$i<$paginas;$i++):?>
    <li class="page-item <?php if ($_GET['pagina']==$i+1) {echo 'active';} else {echo '';} ?>"><a class="page-link" href="articulos.php?pagina=<?php echo $i+1 ?>&seccion=<?php echo $_GET['seccion']; ?>"><?php echo $i+1 ?></a></li><?php endfor ?>
    <li class="page-item <?php if ($_GET['pagina']>=$paginas) {echo 'disabled';} ?>"><a class="page-link" href="articulos.php?pagina=<?php echo $_GET['pagina']+1; ?>&seccion=<?php echo $_GET['seccion']; ?>">Siguiente</a></li>
  </ul>
</nav>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-2">
                    <h3>Documentación</h3>
                    <hr>
                    <p>Si la columna "Subsección" está vacía es porque se trata de una "Sección" principal, con subsecciones pero sin contenido o sin subsecciones pero con contenido propio. Esta se genera como artículo al crear una nueva sección.</p>
					<p>Prioridad se refiere al orden en que aparecerán los artículos dentro de su respectiva sección principal.</p>
					<p></p>
                    

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