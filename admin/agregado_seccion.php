<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
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
$en_menu = 0;
$en_inicio = 0;
$vinculo = $_POST['vinculo'];
if ($vinculo == '') { $tienev = 0; } else { $tienev = 1; };
$query = "INSERT INTO `secciones` (`id`, `seccion`, `nombre`, `slug`, `imagen`, `tienev`, `vinculo`, `en_menu`, `en_inicio`, `prioridad`, `publicar`) VALUES (NULL, '$slug', '$nombre', '$slug', '', '$tienev', '$vinculo', '$en_menu', '$en_inicio', '1', '1')";
$result = $conn->query($query); 
$resultado = "exito";
header ("Location: secciones.php?resultado=$resultado");
ob_end_flush();
?>