<?php 
$conexion=mysqli_connect('localhost','admincitas','Husrt-admin23#','citas_husrt');
$especialidad=$_POST['especialidad'];

	$sql="SELECT * FROM especialistas WHERE especialidad='$especialidad'";

	$result=mysqli_query($conexion,$sql);

	$cadena="<div class='field-label'>Especialista</div> 
			<select name='especialista' required>Seleccione un especialista</option>";

	while ($ver=mysqli_fetch_row($result)) {
		$cadena=$cadena.'<option value="'.$ver[2].'">'.$ver[2].'</option>';
	}

	echo  $cadena."</select>";
	

?>