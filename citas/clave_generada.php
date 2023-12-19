<?php
ob_start();
$cedula = $_POST["cedula"];
$password = $_POST['clave'];
$salt = '$0d4';
$contrasena = sha1(md5($salt . $password));
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sSQL="Update clientes Set clave='".$contrasena."' Where cedula='" . $cedula . "'";
$result = $conn->query($sSQL);   
header ("Location: genera_clave.php?creada=si");
ob_end_flush();
?>