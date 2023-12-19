<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
$id = $_GET['id'];
$en_menu = $_GET['en_menu'];
$tabla = $_GET["tabla"];
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if ($en_menu==1){
$sSQL="Update ".$_GET['tabla']." Set en_menu = 0 Where id='".$_GET['id']."'";
$result = $conn->query($sSQL); 
} elseif ($en_menu==0){
$sSQL="Update ".$_GET['tabla']." Set en_menu = 1 Where id='".$_GET['id']."'";
$result = $conn->query($sSQL);} 
header ('Location:' . getenv('HTTP_REFERER'));
ob_end_flush();
?>