<?php
ob_start();
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$tramite = $_POST['tramite'];
$info_clara = $_POST['info_clara'];
$acceso_facil = $_POST['acceso_facil'];
$satisfaccion = $_POST['satisfaccion'];
$mejorar = $_POST['mejorar'];
$dia = date('j');
$mes = date('n');
$ano = date('Y');
$query = "INSERT INTO `encuesta_suit` (`id`, `dia`, `mes`, `ano`, `tramite`, `info_clara`, `acceso_facil`, `satisfaccion`, `mejorar`) VALUES (NULL, '$dia', '$mes', '$ano', '$tramite', '$info_clara', '$acceso_facil', '$satisfaccion', '$mejorar')";
$result = $conn->query($query); 
header ("Location: gracias.php?seccion=gracias");
ob_end_flush();	
?>