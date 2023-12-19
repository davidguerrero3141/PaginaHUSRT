<?
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$var = $_POST['id'];
$vinculo = $_POST['vinculo'];
$sSQL="Update redes Set vinculo='".$vinculo."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$resultado = "exito";
header ("Location: redes.php?resultado=$resultado");
ob_end_flush();
?>