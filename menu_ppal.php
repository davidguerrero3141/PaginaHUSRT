<ul class="navbar-nav m-auto">

  <li class="nav-item"> <a class="nav-link" href="https://<?php echo $url ?>">Inicio </a> </li>

  <?php $ssqlmen = "Select * from secciones WHERE en_menu = 1 AND publicar = 1 ORDER BY prioridad";

	//Ejecuto la consulta 

	$resultmen = $conn->query( $ssqlmen );

	while ( $rowmen = $resultmen->fetch_assoc() ) { $seccionmenu = $rowmen['seccion']; $vinculomenu = $rowmen['vinculo']; $tienev = $rowmen['tienev']; $nombremenu = $rowmen['nombre']; 
	
	if ($tienev == '1') { echo "<li class='nav-item'><a class='nav-link'  href='secciones.php'seccion=$vinculomenu'>$nombremenu</a></li>";
	 } else { ?>

  <?php $ssqltiene = "Select seccion,titulo,slug,prioridad,en_menu,publicar from articulos WHERE seccion = '$seccionmenu' AND en_menu = 1 AND publicar = 1 LIMIT 1";
	$resulttiene = $conn->query( $ssqltiene );
	if ($resulttiene->num_rows > 0) { while ( $rowtiene = $resulttiene->fetch_assoc() ) { $elvinculo = $rowtiene['vinculo']; ?><li class="nav-item active"><a class="nav-link" href="secciones.php?seccion=<?php echo $seccionmenu ?>"><i class="fa fa-angle-down"></i> <?php echo $rowmen['nombre'] ?></a><?php }} else { ?> 
	  <li class="nav-item active"><a class="nav-link" <?php if ($elvinculo == ''){ ?> href="secciones.php?seccion=<?php echo $seccionmenu ?>"><?php echo $rowmen['nombre'] ?></a><?php } else { ?> href="secciones.php?seccion=<?php echo $seccionmenu ?>"><?php echo $rowmen['nombre'] ?></a><?php } ?>
	  <?php } ?>
	  
	  <?php $ssqlsubm = "Select seccion,titulo,slug,prioridad from articulos WHERE seccion = '$seccionmenu' AND en_menu = 1 AND publicar = 1 ORDER BY 'prioridad'";

	//Ejecuto la consulta 

	$resultsubm = $conn->query( $ssqlsubm );
	if ($resultsubm->num_rows > 0) { ?>

	<ul class="sub-menu">

	<?php $ssqlsub = "Select seccion,tieness,subseccion,titulo,slug,prioridad,publicar,id from articulos WHERE seccion = '$seccionmenu' AND en_menu = 1 AND publicar = 1 ORDER BY prioridad";

	//Ejecuto la consulta 

	$resultsub = $conn->query( $ssqlsub );

	while ( $rowsub = $resultsub->fetch_assoc() ) { if ($rowsub['tieness'] == "1") { ?>

      <li><a href="intro.php?seccion=<?php echo $rowsub['seccion'] ?>&slug=<?php echo $rowsub['slug'] ?>"><?php echo $rowsub['titulo'] ?></a></li>
		
		<?php } else { ?>
		
	  
	  <li><a href="contenido.php?id=<?php echo $rowsub['id'] ?>&seccion=<?php echo $rowsub['seccion'] ?>&slug=<?php echo $rowsub['slug'] ?>"><?php echo $rowsub['titulo'] ?></a></li>

		<?php }} ?>

    </ul>
	<?php } else { echo "";} ?>

  </li>

	<?php }} ?>
<li class="nav-item"> <a class="nav-link" href="intro_servicios.php">Servicios </a> </li>

</ul>

