<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$red = $_POST['red'];
$red = strtolower($red);
$vinculo = $_POST['vinculo'];
$query = "insert into redes (`red`,`vinculo`,`prioridad`,`publicar`) values 
('$red','$vinculo','1','1')";
$result = $conn->query($query); 
$resultado = "exito";
header ("Location: redes.php?resultado=$resultado");
ob_end_flush();
?>