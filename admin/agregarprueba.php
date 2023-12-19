<? 
include ("includes/seguridad.php");

session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html dir="ltr" lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Administracion web</title>
		
		<!-- Styles -->
		<link rel='stylesheet' href='_layout/style.css' type='text/css' media='all' />
		
		<!--[if IE]>
		
			<link rel='stylesheet' href='_layout/IE.css' type='text/css' media='all' />		
			
		<![endif]-->
		
		<!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold|PT+Sans+Narrow:regular,bold|Droid+Serif:i&amp;v1' rel='stylesheet' type='text/css' />
		
		
		<!-- Scripts -->
		<script type='text/javascript' src='../../../ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min97e1.js?ver=1.7'></script>
		<script type='text/javascript' src='_layout/custom.js'></script>
        <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
		
	</head>  
  
	<body>
	 
		<div id="layout">
			<div id="header-wrapper">
				<div id="header">
					<div id="user-wrapper" class="fixed">
						<div class="color-scheme"></div>
						<div class="user">
							<img src="_content/user-img.png" alt="" />
							<span>Welcome <a href="#"></a></span>
							<span class="logout"><a href="cierre.php">Cerrar sesi&oacute;n</a></span>
						</div>
					</div>
					
					<div id="launcher-wrapper" class="fixed">
						<div class="logo">
							<a href="index.html"><img src="_content/back-logo.png" alt="" /></a>
						</div>
						
						<div class="launcher">
							<ul class="fixed">
								<li class="users"><a href="#">Usuarios</a></li>
								<li class="mailbox">
									<a href="#">Mensajes</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="page fixed">
				<div id="sidebar">
					<ul id="navigation">
						
					</ul>
				</div>
				
				
			  <div id="content">
					
					<ul class="breadcrumb">
						<li class="home"><a href="index.html" ></a></li>
                        <li class="last"><a href="#" >Actualizar articulos</a></li>
					</ul>
					
					
					<h1>Bienvenido </h1>
					<div class="hr"></div>
				<p>Aqu&iacute; podr&aacute; agregar un nuevo articulo a la p&aacute;gina web.</p>
    <div class="fixed form-elements-inputs">

<form action="agregado.php" method="post" >
						<div class="col-540">
							<h1 class="m-top-30">Sección</h1>
							<p>Seleccione la sección el la que quiere que aparezca el nuevo artículo<br>
							<br><br>
                            <h1 class="m-top-30">Prioridad</h1>
							<p>Escriba en este campo un número entero para dar orden a los artículos publicados con respecto a los demás artículos de la misma sección<br>
							<input class="small" type="text" id="prioridad" name="prioridad" required pattern="^([0-9]{1,2})$" title="Agregue un número entero para dar orden con respecto a los otros artículos de la misma sección" />
                            <h1 class="m-top-30">Titulo</h1>
							<p>Escriba un título para el nuevo artículo<br>
							<input type="normal" id="titulo" name="titulo" required />
                            <h1 class="m-top-30">Resumen</h1>
							<p>Escriba un resumen corto del artículo. En este caso los únicos artículos que necesitarán resumen son las novedades.<br>
							<textarea cols="" rows="20" id="resumen" name="resumen"></textarea>
                            <h1 class="m-top-30">Contenido</h1>
							<p>Agruegue aquí el contenido principal del artículo.<br>
							<textarea id="contenido" name="contenido" class="wysiwyg-editor m-top-30" rows="20" cols="35">
							</textarea>
                            <script type="text/javascript">
var editor = CKEDITOR.replace( 'contenido' );
CKFinder.setupCKEditor( editor, 'admin/ckfinder/' );
		</script>
                            <h1 class="m-top-30">Imagen</h1>
          <div class="inline"></div>
                          <div class="inline">
							<label> Importante: 800 de ancho, cualquier largo</label>
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
<input  type="button" value="Cambiar imagen" onclick="BrowseServer();" />
							  <div class="inline">
									<label>&iquest;Desea que este art&iacute;culo sea visible para el p&uacute;blico inmediatamente al guardar?</label><input type="checkbox" id="publicar" value="1" name="publicar"/>
						  </div>
                          <div class="inline">
									<label>&iquest;Ver m&aacute;s? Este chequeo es únicamente para las novedades</label><input type="checkbox" id="vermas" value="1" name="vermas"/>
						  </div>
                          <div class="inline">
									<label>Incluir galer&iacute;a de imagenes a este art&iacute;culo</label><input type="checkbox" id="galeria" value="1" name="galeria"/>
						  </div>
                                <input name="submit" class="button-grey arrow" type="submit" value="Agregar artículo" />
						</div>
                        </form>
					</div>
			  </div>
			</div>
            
		</div>

	
	
	
	 
	</body>
	
</html>
	