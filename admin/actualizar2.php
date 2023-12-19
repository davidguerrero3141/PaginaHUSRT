<? 
include ("includes/seguridad.php");

session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html dir="ltr" lang="en-US" xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
							<span>Welcome <a href="#"><? echo $_SESSION["s_nombre"]?></a></span>
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
						<?php include("menu.php"); ?>
					</ul>
				</div>
				
				
			  <div id="content">
					
					<ul class="breadcrumb">
						<li class="home"><a href="index.html" ></a></li>
                        <li class="last"><a href="#" >Actualizar articulos</a></li>
					</ul>
					
					
					<h1>Bienvenido <? echo $_SESSION["s_nombre"]?></h1>
					<div class="hr"></div>
				<p>Aqu&iacute; podr&aacute; modificar este art&iacute;culo</p>
				<div class="fixed form-elements-inputs">
						
                        <?
$id = $_GET['id'];
$seccion = $_GET['seccion'];
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
# execute a query and output its results
  $sql = "Select * from articulos where id = '".$_GET['id']."'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()){ ?>
<form action="actualizado.php" method="post" enctype="multipart/form-data">
						<div class="col-540">
							<h1 class="m-top-30">Prioridad</h1>
							<input class="small" type="text" id="prioridad" name="prioridad" value="<? echo $row["prioridad"];?>" />
                            <h1 class="m-top-30">Titulo</h1>
							<input type="normal" id="titulo" name="titulo" value="<? echo $row["titulo"];?>" />
                            <h1 class="m-top-30">Resumen</h1>
					<div class="hr"></div>
							<textarea id="resumen" name="resumen" rows="20" cols="35"><? echo $row["resumen"];?>
							</textarea>
                            <h1 class="m-top-30">Contenido</h1>
					<div class="hr"></div>
							<textarea id="contenido" name="contenido" class="wysiwyg-editor m-top-30" rows="20" cols="35">
							</textarea>
                            <script type="text/javascript">
var editor = CKEDITOR.replace( 'contenido');
editor.setData( ' <? echo $row["contenido"] ?> ' );
CKFinder.setupCKEditor( editor, '/admin/ckfinder/' );
		</script>
          <h1 class="m-top-30">Imagen</h1>
		  <div class="hr"></div>
          <div class="inline"></div>
                          <div class="inline">
                                    <img src="<? echo $row["imagen"];?>" width="200"/>
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
<input id="imagen" name="imagen" readonly="readonly" type="text" value="<? echo $row["imagen"];?>" />
<input  type="button" value="Cambiar imagen" onclick="BrowseServer();" />
<div class="inline">
									<label>Ver más</label><input name="vermas" type="checkbox" id="vermas" value="1" <? $vermas = ($row["vermas"]);if ($row["vermas"] == 1) { echo "checked='checked'"; } else { echo ""; }?>/>
						  </div>
							  <div class="inline">
									<label>Galeria</label><input name="galeria" type="checkbox" id="galeria" value="1" <? $galeria = ($row["galeria"]);if ($row["galeria"] == 1) { echo "checked='checked'"; } else { echo ""; }?>/>
						  </div>
                                <input name="id" type="hidden" id="id" value="<? echo $_GET['id'];?>"/>
                                
                                <input name="submit" class="button-grey arrow" type="submit" value="Actualizar" />
						</div>
                        </form>
                        <? }
  } else {
      echo "0 results";
  }

  $conn->close();?>
					</div>
			  </div>
			</div>
            
		</div>

	
	
	
	 
	</body>
	
</html>
	