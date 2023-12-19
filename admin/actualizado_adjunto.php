<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$var = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST["descripcion"];
$modificado_por = $_POST["modificado_por"];
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
$sustituye = array("\r\n", "\n\r", "\n", "\r");
$descripcion = str_replace($sustituye, "", $descripcion);
$adjunto = $_FILES["adjunto"]["name"];
$arrayString = explode(".", $adjunto);
$nombrearchivo = current($arrayString);
$extension = end($arrayString);
$extension = strtolower($extension);
$directorio = '../adjuntos/'.$nombrearchivo.".".$extension;
$nombreadjunto = $nombrearchivo.'.'.$extension;
$tamano = $_FILES["adjunto"]["size"];
$sSQL="Update adjuntos Set nombre='".$nombre."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update adjuntos Set descripcion='".$descripcion."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
if(move_uploaded_file($_FILES['adjunto']['tmp_name'], $directorio)) {
$sSQL="Update adjuntos Set tipo='".$extension."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update adjuntos Set tamano='".$tamano."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update adjuntos Set vinculo='".$directorio."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update adjuntos Set modificado_por='".$modificado_por."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update adjuntos Set fecha_modificado='".$fechacompleta."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
}
$resultado = "exito";
header ("Location: actualizar_adjunto.php?id=$var&resultado=$resultado");
ob_end_flush();
?>