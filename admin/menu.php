<ul class="sidebar-menu">
  <li><a href="aplicacion.php"> <i class="icon icon-home blue-text s-18"></i> <span>INICIO</span></a></li>
  <li><a href="redes.php"> <i class="icon icon-wifi blue-text s-18"></i> <span>Redes sociales</span></a></li>
  <li><a href="aliados.php"> <i class="icon icon-people blue-text s-18"></i> <span>Aliados</span></a></li>
  <li class="header"><strong>ARTÍCULOS</strong></li>
  <li class="treeview"><a href="#"> <i class="icon icon-document-edit blue-text s-18"></i> <span>Actualizar artículos</span> <i
                    class="icon icon-angle-left s-18 pull-right"></i> </a>
    <ul class="treeview-menu">
		<?php $ssql = "Select DISTINCT seccion from articulos where publicar = '1' ORDER BY prioridad";
								$result = $conn->query($ssql);
      							while($row = $result->fetch_assoc()) { $seccion = $row['seccion'] ?>
      <li><a href="articulos.php?seccion=<?php echo $row["seccion"]; ?>&pagina=1"><i class="icon icon-circle-o"></i><?php $nombreseccion = str_replace("-", " ", $seccion); echo ucfirst($nombreseccion) ?></a> </li>
		<?php } ?>
    </ul>
  </li>
  <li class="treeview"><a href="#"> <i class="icon icon-document-add blue-text s-18"></i> <span>Nuevo artículo</span><i
                    class="icon icon-angle-left s-18 pull-right"></i></a>
	<ul class="treeview-menu">
		<li><a href="agregar.php"><i class="icon icon-circle-o"></i> Con contenido propio</a></li>
		<li><a href="agregar.php?tipo=sub"><i class="icon icon-circle-o"></i> Que llevará subsecciones</a></li>
		<li><a href="agregar.php?tipo=link"><i class="icon icon-circle-o"></i> Que lleva a un vínculo externo</a></li>
	</ul>
	</li>
  <li><a href="secciones.php"> <i class="icon icon-folders2 blue-text s-18"></i> <span>Secciones</span></a></li>
  <li><a href="calendario.php"> <i class="icon icon-calendar blue-text s-18"></i> <span>Calendario de actividades</span></a></li>
  <li><a href="funcionarios.php"> <i class="icon icon-agenda blue-text s-18"></i> <span>Directorio de funcionarios</span></a></li>
  <li class="header"><strong>IMÁGENES</strong></li>
  <li><a href="slider.php"> <i class="icon icon-image blue-text s-18"></i> <span>Slider inicio</span></a></li>
  <li><a href="img_vinculos.php"> <i class="icon icon-image blue-text s-18"></i> <span>Vínculos inicio</span></a></li>
  <li class="header"><strong>ENCUESTAS</strong></li>
  <li><a href="encuestas.php?encuesta=encuesta_suit"> <i class="icon icon-check blue-text s-18"></i> <span>SUIT</span></a></li>
  <li><a href="encuestas.php?encuesta=encuesta_transp"> <i class="icon icon-check blue-text s-18"></i> <span>Transparencia</span></a></li>	
	<li class="header"><strong>USUARIOS</strong></li>
  <li><a href="usuarios.php"> <i class="icon icon-user blue-text s-18"></i> <span>Usuarios</span></a></li>
  <li><a href="cierre.php"> <i class="icon icon-power-off blue-text s-18"></i> <span>Cerrar sesión</span></a></li>
</ul>
