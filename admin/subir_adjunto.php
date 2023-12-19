<?php
ob_start();
$num_id = $_POST['num_id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$dia = date('j');
$mesactual = date('n');
$ano = date('Y');
if ($mesactual == 1){
$actualmes = enero;} elseif ($mesactual == 2){
$actualmes = febrero;} elseif ($mesactual == 3){
$actualmes = marzo;} elseif ($mesactual == 4){
$actualmes = abril;} elseif ($mesactual == 5){
$actualmes = mayo;} elseif ($mesactual == 6){
$actualmes = junio;} elseif ($mesactual == 7){
$actualmes = julio;} elseif ($mesactual == 8){
$actualmes = agosto;} elseif ($mesactual == 9){
$actualmes = septiembre;} elseif ($mesactual == 10){
$actualmes = octubre;} elseif ($mesactual == 11){
$actualmes = noviembre;} elseif ($mesactual == 12){
$actualmes = diciembre;}
$fechacompleta = $dia." de ".$actualmes." de ".$ano;
$registrado_por = $_POST["registrado_por"];
$adjunto = $_FILES["adjunto"]["name"];
$arrayString = explode(".", $adjunto);
$nombrearchivo = current($arrayString);
$extension = end($arrayString);
$extension = strtolower($extension);
$directorio = '../adjuntos/'.$nombrearchivo.".".$extension;
$nombreadjunto = $nombrearchivo.'.'.$extension;
$tamano = $_FILES["adjunto"]["size"];
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if(move_uploaded_file($_FILES['adjunto']['tmp_name'], $directorio)) {
$query = "insert into adjuntos (`num_id`,`nombre`,`descripcion`,`tipo`,`tamano`,`vinculo`,`fecha_publicado`,`publicado_por`,`fecha_modificado`,`modificado_por`,`publicar`,`prioridad`) values 
('$num_id','$nombre','$descripcion','$extension','$tamano','$directorio','$fechacompleta','$registrado_por','$fechacompleta','$registrado_por','1','1')";
$result = $conn->query($query);
header ("Location: adjuntos.php?resultado=exito&num_id=$num_id");
ob_end_flush();
} else {
header ("Location: adjuntos.php?resultado=fallosubida&num_id=$num_id");
ob_end_flush();
}
?>