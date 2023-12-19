<?
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono=$_POST['telefono'];
$whatsapp=$_POST['whatsapp'];
$imagen = $_POST['imagen'];
$query = "insert into personal (`nombre`,`apellido`,`email`,`telefono`,`whatsapp`,`imagen`,`publicar`) values 
('$nombre','$apellido','$email','$telefono','$whatsapp','$imagen','1')";
$result = $conn->query($query); 
$resultado = "exito";
header ("Location: personal.php?resultado=$resultado");
ob_end_flush();
?>