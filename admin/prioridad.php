<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
$prioridad = $_POST["prioridad"];
$var = $_POST["id"];
$tabla = $_POST["tabla"];
$seccion = $_POST["seccion"];
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "Update $tabla Set prioridad='".$_POST["prioridad"]."' Where id='" .$_POST["id"]. "'";
$result = $conn->query($sql);
$resultado = "exito";
header ('Location:' . getenv('HTTP_REFERER'));
ob_end_flush();
?>