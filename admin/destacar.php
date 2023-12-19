<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
$id = $_GET['id'];
$destacado = $_GET['destacado'];
$tabla = $_GET["tabla"];
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($destacado==1){
$sSQL="Update ".$_GET['tabla']." Set destacado = 0 Where id='".$_GET['id']."'";
$result = $conn->query($sSQL); 
} elseif ($destacado==0){
$sSQL="Update ".$_GET['tabla']." Set destacado = 1 Where id='".$_GET['id']."'";
$result = $conn->query($sSQL);} 
header ('Location:' . getenv('HTTP_REFERER'));
ob_end_flush();
?>