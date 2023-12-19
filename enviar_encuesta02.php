<?php
ob_start();
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$visita = $_POST['visita'];
$encontro = $_POST['encontro'];
$facilidad = $_POST['facilidad'];
$dia = date('j');
$mes = date('n');
$ano = date('Y');
$query = "INSERT INTO `encuesta_transp` (`id`, `dia`, `mes`, `ano`, `visita`, `encontro`, `facilidad`) VALUES (NULL, '$dia', '$mes', '$ano', '$visita', '$encontro', '$facilidad')";
$result = $conn->query($query); 
header ("Location: gracias.php?seccion=gracias");
ob_end_flush();	
?>