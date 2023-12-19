<?php
ob_start();
$nombre = $_POST['nombre'];
$directorio = $_POST['directorio'];
$adjunto = $_FILES['adjunto']['name'];
$temp = $_FILES['adjunto']['tmp_name'];
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if(move_uploaded_file($temp, '../assets/images/'.$nombre)) {
header ("Location: img_vinculos.php?resultado=exito");
ob_end_flush();
} else {
header ("Location: img_vinculos.php?resultado=fallosubida");
ob_end_flush();
}
?>