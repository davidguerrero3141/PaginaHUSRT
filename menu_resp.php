<ul class="binduz-er-news-offcanvas_main_menu">
  <li class="binduz-er-news-menu-item-has-children binduz-er-news-active"> <a href="https://<?php echo $url ?>">Inicio</a> </li>
  <?php $ssqlmen = "Select * from secciones WHERE en_menu = 1 AND publicar = 1 ORDER BY prioridad";

	//Ejecuto la consulta 

	$resultmen = $conn->query( $ssqlmen );

	while ( $rowmen = $resultmen->fetch_assoc() ) { $seccionmenu = $rowmen['seccion']; $vinculomenu = $rowmen['vinculo']; ?>

  <?php $ssqltiene = "Select seccion,titulo,slug,prioridad,en_menu,publicar from articulos WHERE seccion = '$seccionmenu' AND en_menu = 1 AND publicar = 1 LIMIT 1";
	$resulttiene = $conn->query( $ssqltiene );
	if ($resulttiene->num_rows > 0) { while ( $rowtiene = $resulttiene->fetch_assoc() ) { $elvinculo = $rowtiene['vinculo']; ?><li class="binduz-er-news-menu-item-has-children"><a class="nav-link" href="secciones.php"><i class="fa fa-angle-down"></i> <?php echo $rowmen['nombre'] ?></a><?php }} else { ?> 
	  <li class="binduz-er-news-menu-item-has-children"><a class="nav-link" <?php if ($elvinculo == ''){ ?> href="secciones.php?seccion=<?php echo $seccionmenu ?>"><?php echo $rowmen['nombre'] ?></a><?php } else { ?> href="<?php echo $elvinculo ?>"><?php echo $rowmen['nombre'] ?></a><?php } ?>
	  <?php } ?>
	  
	  <?php $ssqlsubm = "Select seccion,titulo,slug,prioridad from articulos WHERE seccion = '$seccionmenu' AND en_menu = 1 AND publicar = 1 ORDER BY 'prioridad'";

	//Ejecuto la consulta 

	$resultsubm = $conn->query( $ssqlsubm );
	if ($resultsubm->num_rows > 0) { ?>

	<ul class="binduz-er-news-sub-menu">

	<?php $ssqlsub = "Select seccion,subseccion,titulo,slug,prioridad,publicar,id from articulos WHERE seccion = '$seccionmenu' AND en_menu = 1 AND publicar = 1 ORDER BY prioridad";

	//Ejecuto la consulta 

	$resultsub = $conn->query( $ssqlsub );

	while ( $rowsub = $resultsub->fetch_assoc() ) { if ($rowsub['subseccion'] != "") { ?>

      <li><a href="contenido.php?id=<?php echo $rowsub['id'] ?>&seccion=<?php echo $rowsub['seccion'] ?>&slug=<?php echo $rowsub['slug'] ?>"><?php echo $rowsub['titulo'] ?></a></li>
		
		<?php } else { ?>
		
	  
	  <li><a href="contenido.php?id=<?php echo $rowsub['id'] ?>&seccion=<?php echo $rowsub['seccion'] ?>&slug=<?php echo $rowsub['slug'] ?>"><?php echo $rowsub['titulo'] ?></a></li>

		<?php }} ?>

    </ul>
	<?php } else { echo "";} ?>

  </li>

	<?php } ?>
  <li class="binduz-er-news-menu-item-has-children binduz-er-news-active"> <a href="intro_servicios.php">Servicios</a> </li>
  <li class="binduz-er-news-menu-item-has-children"> <a href="http://52.10.39.228/citas/" target="_blank"> Citas médicas en línea</a> </li>
</ul>
