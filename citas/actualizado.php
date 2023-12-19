<?php
ob_start();
$var = $_POST['cedula'];
$nombres = $_POST['nombres'];
$cod_nombres = base64_encode($nombres);
$apellidos = $_POST['apellidos'];
$apellidos = base64_encode($apellidos);
$tipo_id = $_POST['tipo_id'];
$celular = $_POST['celular'];
$celular = base64_encode($celular);
$telefono = $_POST['telefono'];
$telefono = base64_encode($telefono);
$email = $_POST["email"];
$email = base64_encode($email);
$direccion = $_POST["direccion"];
$direccion = base64_encode($direccion);
$eps = $_POST["eps"];
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sSQL="Update clientes Set nombres='".$cod_nombres."' Where cedula='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update clientes Set apellidos='".$apellidos."' Where cedula='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update clientes Set tipo_id='".$tipo_id."' Where cedula='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update clientes Set celular='".$celular."' Where cedula='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update clientes Set telefono='".$telefono."' Where cedula='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update clientes Set email='".$email."' Where cedula='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update clientes Set direccion='".$direccion."' Where cedula='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update clientes Set eps='".$eps."' Where cedula='" . $var . "'";
$result = $conn->query($sSQL);
header ("Location: actualizar.php?actualizado=si");
ob_end_flush();
?>