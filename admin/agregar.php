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
        <?php  include("menu.php"); ?>
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
							<form action="agregado.php" method="post">
                            <h2>Agregue el contenido del nuevo articulo:</h2>
                            <div class="form-group">
								<label for="titulo" class="col-form-label">Título</label>
                                <input class="form-control form-control-lg" type="text" id="titulo" name="titulo" required>
                            </div>
							<div class="form-group">
								<label for="subtitulo" class="col-form-label">Subtítulo</label>
                                <input class="form-control form-control-lg" type="text" id="subtitulo" name="subtitulo">
                            </div>
							<div class="form-group">
								<label for="seccion" class="col-form-label">Sección</label>
								<select name="seccion" id="seccion" class="custom-select my-1 mr-sm-2 form-control r-0 light s-12" required>
        							<option  value="0">Seleccione una seccion</option>
							<?php $query = $conn -> query ("Select id,seccion,nombre from secciones where publicar = '1'");
          						while ($valores = mysqli_fetch_array($query)) {
								
            					echo '<option value="'.$valores[seccion].'">'.$valores[nombre].'</option>';
          						}
								?>
								</select>
							</div>
							<div class="form-group">
								<div id="subseccion"></div>
							</div>
							<?php if ($_GET['tipo'] == 'link'){ ?>
							<div class="form-group">
								<label for="vinculo" class="col-form-label">Vínculo (si el artículo lleva a una página externa)</label>
                                <input class="form-control form-control-lg" type="text" id="vinculo" name="vinculo">
                            </div>
							<div class="form-group col-md-6">
								<label for="blank" class="col-form-label"><h3>Hacer que el vínculo se abra en una pestaña nueva</h3></label>
                                <input name="blank" type="checkbox" id="blank" value="1"/>
                            </div>
							<div class="form-group col-md-6">
								<label for="publicar" class="col-form-label"><h3>Publicar al guardar</h3></label>
                                <input name="publicar" type="checkbox" id="publicar" value="1"/>
                            </div>
							<div class="form-group col-md-6">
								<label for="en_menu" class="col-form-label"><h3>Aparecer en menú principal</h3></label>
                                <input name="en_menu" type="checkbox" id="en_menu" value="1"/>
                            </div>
							<input type="hidden" value="0" name="tieness" id="tieness">
							<input type="submit" value="GUARDAR" class="btn btn-primary">
							</form>
							<?php } elseif ($_GET['tipo'] == 'sub'){ ?>
							<div class="form-group col-md-6">
								<label for="publicar" class="col-form-label"><h3>Publicar al guardar</h3></label>
                                <input name="publicar" type="checkbox" id="publicar" value="1"/>
                            </div>
							<div class="form-group col-md-6">
								<label for="en_menu" class="col-form-label"><h3>Aparecer en menú principal</h3></label>
                                <input name="en_menu" type="checkbox" id="en_menu" value="1"/>
                            </div>
							<input type="hidden" value="1" name="tieness" id="tieness">
							<input type="submit" value="GUARDAR" class="btn btn-primary">
							</form>
							<?php } else { ?>
							<div class="form-group">
                                    <label for="resumen">Resumen</label>
                                    <textarea class="form-control r-0" id="resumen" rows="4" name="resumen"></textarea>
                            </div>
                            <div class="form-group">
                                    <label for="contenido">Contenido</label>
                                    <textarea id="contenido" name="contenido"></textarea>
									<script type="text/javascript">
    var editor = CKEDITOR.replace( 'contenido' );
CKFinder.setupCKEditor( editor, 'https://www.hospitalsanrafaeltunja.gov.co/admin/ckfinder/' );
</script>
                            </div>
							<div class="form-group col-md-6">
								<h2>Imagen principal</h2>
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
<input id="imagen" name="imagen" readonly="readonly" type="text"/>
<input  type="button" value="Seleccionar imagen" onclick="BrowseServerb();" />
                            </div>
							<div class="form-group col-md-6">
								<h2>Banner</h2>
								<script type="text/javascript">
   function BrowseServerc()
  {
          var finder = new CKFinder();
          finder.selectActionFunction = SetFileFieldc;
          finder.popup();
  }
           
  function SetFileFieldc( fileUrl )
  {    
          document.getElementById('banner').value = fileUrl ;
  }
</script>
<input id="banner" name="banner" readonly="readonly" type="text"/>
<input  type="button" value="Seleccionar imagen" onclick="BrowseServerc();" />
                            </div>
							<div class="form-group col-md-12">
								<label for="galeria" class="col-form-label"><h3>Este artículo tendrá archivos adjuntos</h3></label>
                                <input name="adjuntos" type="checkbox" id="adjuntos" value="1"/>
                            </div>
							<div class="form-group col-md-12">
								<label for="publicar" class="col-form-label"><h3>Publicar al guardar</h3></label>
                                <input name="publicar" type="checkbox" id="publicar" value="1"/>
                            </div>
							<div class="form-group col-md-12">
								<label for="en_menu" class="col-form-label"><h3>Aparecer en menú principal</h3></label>
                                <input name="en_menu" type="checkbox" id="en_menu" value="1"/>
                            </div>
							<div class="form-group col-md-12">
								<label for="vermas" class="col-form-label"><h3>Ver más</h3></label>
                                <input name="vermas" type="checkbox" id="vermas" value="1"/>
                            </div>
						<hr>
							<div class="form-group col-md-12">
								<label for="formulario" class="col-form-label"><h3>Este artículo tendrá formulario de contacto</h3></label>
                                <input name="formulario" type="checkbox" id="formulario" value="1"/>
                            </div>
							<div class="form-group">
								<label for="titulo" class="col-form-label">Título del formulario</label>
                                <input class="form-control form-control-lg" type="text" id="tit_form" name="tit_form">
                            </div>
							<div class="form-group">
								<label for="subtitulo" class="col-form-label">Email que recibirá el mensaje</label>
                                <input class="form-control form-control-lg" type="text" id="recibe" name="recibe">
                            </div>
							<div class="form-group">
                                 <label for="desc_form">Descripción del formulario</label>
                                 <textarea class="form-control r-0" id="desc_form" rows="4" name="desc_form"></textarea>
                            </div>
							<input type="hidden" value="0" name="tieness" id="tieness">
							<input type="submit" value="GUARDAR" class="btn btn-primary">
							</form>
							<?php } ?>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-5">
                    <h3>Documentación</h3>
                    <hr>
                    <p>El resumen es funcional únicamente para la sección "Novedades" como texto introductorio de una noticia en la página de inicio. </p>
					<h3>Como agregar video a un artículo</h3>
                    <p>Para agregar un video, este debe estar en Youtube y estos son los pasos para hacerlo:<br>
					Entrar al video en Youtube, seleccionar y copiar la dirección web completa<br><br>
						Dentro del contenido ubicar el cursor en donde quiera agregar el video, hacer clic en el botón video
						<img src="assets/img/btyoutube.jpg" width="350px"><br>
						En la ventana emergente pegar el codigo en el campo "Pegar código embed" y aceptar
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#seccion').val(1);
		recargarLista();

		$('#seccion').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"datos_subseccion.php",
			data:"seccion=" + $('#seccion').val(),
			success:function(r){
				$('#subseccion').html(r);
			}
		});
	}
</script>