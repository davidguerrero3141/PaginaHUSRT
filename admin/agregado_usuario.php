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
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$clave=$_POST['clave'];
$salt = '$0d4';
$contrasena = sha1(md5($salt . $clave));
$directorio = 'images/';
$imagen = $_POST['imagen'];
$query = "insert into adm_hsrt (`nombre`,`usuario`,`email`,`clave`,`imagen`) values 
('$nombre','$usuario','$email','$contrasena','$imagen')";
$result = $conn->query($query); 
$resultado = "exito";
header ("Location: usuarios.php?resultado=$resultado");
ob_end_flush();
?>