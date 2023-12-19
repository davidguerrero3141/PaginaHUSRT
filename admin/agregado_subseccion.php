<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$seccion = $_POST['seccion'];
$imagen = $_POST['imagen'];
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
$slug = str_replace("<br>", "-", $slug);
$slug = str_replace(":", "-", $slug);
$slug = str_replace("?", "-", $slug);
$slug = str_replace("¡", "-", $slug);
$slug = str_replace("¿", "-", $slug);
$slug = str_replace("!", "-", $slug);
$slug = str_replace("–", "-", $slug);
$en_menu = 0;
$en_inicio = 0;
$dia = date('j');
$mesactual = date('n');
$ano = date('Y');
if ($mesactual == 1){
$actualmes = enero;} elseif ($mesactual == 2){
$actualmes = febrero;} elseif ($mesactual == 3){
$actualmes = marzo;} elseif ($mesactual == 4){
$actualmes = abril;} elseif ($mesactual == 5){
$actualmes = mayo;} elseif ($mesactual == 6){
$actualmes = junio;} elseif ($mesactual == 7){
$actualmes = julio;} elseif ($mesactual == 8){
$actualmes = agosto;} elseif ($mesactual == 9){
$actualmes = septiembre;} elseif ($mesactual == 10){
$actualmes = octubre;} elseif ($mesactual == 11){
$actualmes = noviembre;} elseif ($mesactual == 12){
$actualmes = diciembre;}
$fechacompleta = $dia." de ".$actualmes." de ".$ano;
$publicado_por = $_SESSION["s_nombre"];
$galeria = 0;
$destacado = 0;
$vermas = 0;
if ($galeria == '') { $galeria = 0 ;}
$query = "INSERT INTO `subsecciones` (`id`, `prioridad`, `seccion`, `subseccion`, `nombre`, `slug`, `imagen`, `en_menu`, `publicar`) VALUES (NULL, '1', '$seccion', '$slug', '$nombre', '$slug', '$imagen', '$en_menu', '1')";
$result = $conn->query($query);
$query = "INSERT INTO `articulos` (`id`, `dia`, `mes`, `ano`, `slug`, `consecutivo`, `seccion`, `tieness`, `subseccion`, `prioridad`, `titulo`, `subtitulo`, `resumen`, `contenido`, `vinculo`, `publicar`, `imagen`, `banner`, `vermas`, `en_menu`, `publicado_por`, `fecha_publicado`, `modificado_por`, `fecha_modificado`, `galeria`, `destacado`) VALUES (NULL, '$dia', '$mesactual', '$ano', '$slug', '12345', '$seccion', '1', '', '1', '$nombre', '', '', '', '', '1', '', '12345', '$vermas', '1', '$publicado_por', '$fechacompleta', '$publicado_por', '$fechacompleta', $galeria, $destacado)";
$result = $conn->query($query);
$resultado = "exito";
header ("Location: secciones.php?resultado=$resultado#subsecciones");
ob_end_flush();
?>