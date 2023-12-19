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
$campo = $_POST["campo"];
$tabla = $_POST["tabla"];
$pagina = $_POST["pagina"];
$imagen = $_POST["imagen"];
$sSQL="Update $tabla Set $campo='".$imagen."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$resultado = "exito";
header ("Location: $pagina.php?resultado=$resultado&id=$var");
ob_end_flush();
?>