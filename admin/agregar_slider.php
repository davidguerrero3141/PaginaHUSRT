<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$tabla = $_POST['tabla'];
$vinculo = $_POST['vinculo'];
$imagen = $_POST['imagen'];
$query = "insert into $tabla (`imagen`,`vinculo`,`prioridad`,`publicar`) values 
('$imagen','$vinculo','1','1')";
$result = $conn->query($query); 
$resultado = "exito";
header ("Location: slider.php?resultado=$resultado");
ob_end_flush();
?>