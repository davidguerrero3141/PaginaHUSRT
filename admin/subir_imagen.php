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
$directorio = '../images/';
$imagen = $_FILES["subir_archivo"]['name'];
$subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
$sSQL="Update $tabla Set $campo='images/".$imagen."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$resultado = "exito";
} else {
$resultado = "fallo";
}
header ("Location: $pagina.php?resultado=$resultado&id=$var");
ob_end_flush();
?>