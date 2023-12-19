<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$query = "insert into directorio (`nombre`,`cargo`,`email`,`telefono`,`publicar`,`prioridad`) values 
('$nombre','$cargo','$email','$telefono','1','1')";
$result = $conn->query($query); 
$resultado = "exito";
header ("Location: funcionarios.php?resultado=$resultado");
ob_end_flush();
?>