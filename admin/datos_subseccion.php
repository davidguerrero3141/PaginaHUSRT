<?php 
$conexion=mysqli_connect('localhost','root','test2022!','contenido_husrt');
$seccion=$_POST['seccion'];

	$sql="SELECT * FROM subsecciones WHERE seccion='$seccion'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<label for='seccion' class='col-form-label'>Subsección</label> 
			<select name='subseccion' id='subseccion' class='custom-select my-1 mr-sm-2 form-control r-0 light s-12'><option value=''>No incluir en ninguna subsección</option>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value='.$ver[3].'>'.$ver[4].'</option>';
	}

	echo  $cadena."</select>";
	

?>