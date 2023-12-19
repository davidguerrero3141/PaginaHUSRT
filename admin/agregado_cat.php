<?
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$slug = strtolower($nombre);
$slug = str_replace(" ", "-", $slug);
$slug = str_replace("á", "a", $slug);
$slug = str_replace("é", "e", $slug);
$slug = str_replace("í", "i", $slug);
$slug = str_replace("ó", "o", $slug);
$slug = str_replace("ú", "u", $slug);
$slug = str_replace("Á", "a", $slug);
$slug = str_replace("É", "e", $slug);
$slug = str_replace("Í", "i", $slug);
$slug = str_replace("Ó", "o", $slug);
$slug = str_replace("Ú", "u", $slug);
$slug = str_replace("Ñ", "n", $slug);
$slug = str_replace("ñ", "n", $slug);
if ($tipo == "categoria") {
$query = "insert into categorias (`categoria`,`nombre`,`slug`,`publicar`) values 
('$slug','$nombre','$slug','1')";
$result = $conn->query($query); 
$resultado = "exito";}
elseif ($tipo == "tipo") {
$query = "insert into tipos (`tipo`,`nombre`,`slug`,`publicar`) values 
('$slug','$nombre','$slug','1')";
$result = $conn->query($query); 
$resultado = "exito";}
header ("Location: categorias.php?resultado=$resultado");
ob_end_flush();
?>