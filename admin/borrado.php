<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
$id = $_GET['id'];
$tabla = $_GET["tabla"];
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sSQL="DELETE FROM ".$_GET['tabla']." WHERE id='".$_GET['id']."'"; 
$result = $conn->query($sSQL);
header ('Location:' . getenv('HTTP_REFERER'));
ob_end_flush();
?>