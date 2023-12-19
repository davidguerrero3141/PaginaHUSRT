<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$campo = $_POST['campo'];
$tabla = $_POST['tabla'];
$pagina = $_POST['pagina'];
$imagen = $_POST['imagen'];
$query = "insert into $tabla (imagen) values 
('$imagen')";
$result = $conn->query($query); 
$resultado = "exito";
header ("Location: $pagina.php?resultado=$resultado");
ob_end_flush();
?>