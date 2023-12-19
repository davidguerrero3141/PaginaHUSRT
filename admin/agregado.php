<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$slug = strtolower($titulo);
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
$seccion = $_POST['seccion'];
$subseccion = $_POST['subseccion'];
$tieness = $_POST['tieness'];
if ($tieness == '') { $tieness = 0 ;}
$vermas = $_POST["vermas"];
if ($vermas == '') { $vermas = 0 ;}
$en_menu = $_POST["en_menu"];
if ($en_menu == '') { $en_menu = 0 ;}
$publicar = $_POST["publicar"];
if ($publicar == '') { $publicar = 0 ;}
$adjuntos = $_POST["adjuntos"];
if ($adjuntos == '') { $adjuntos = 0 ;}
$formulario = $_POST["formulario"];
if ($formulario == '') { $formulario = 0 ;}
$recibe = $_POST['recibe'];
$tit_form = $_POST['tit_form'];
$desc_form = $_POST['desc_form'];
$destacado = 0;
$resumen = $_POST["resumen"];
$vinculo = $_POST["vinculo"];
$blank = $_POST["blank"];
if ($blank == '') { $blank = 0 ;}
$publicado_por = $_SESSION["s_nombre"];
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
$sustituye = array("\r\n", "\n\r", "\n", "\r");
$resumen = str_replace($sustituye, "", $resumen);
$contenido = $_POST["contenido"];
$contenido = str_replace($sustituye, "", $contenido);
$imagen = $_POST["imagen"];
$banner = $_POST["banner"];
$query = "INSERT INTO `articulos` (`id`,`dia`, `mes`, `ano`, `slug`, `consecutivo`, `seccion`, `tieness`, `subseccion`, `prioridad`, `titulo`, `subtitulo`, `resumen`, `contenido`, `vinculo`, `blank`, `publicar`, `imagen`, `banner`, `vermas`, `en_menu`, `publicado_por`, `fecha_publicado`, `modificado_por`, `fecha_modificado`, `adjuntos`, `formulario`, `tit_form`, `desc_form`, `recibe`, `destacado`) VALUES ( NULL, '$dia', '$mesactual', '$ano', '$slug', '12345', '$seccion', '$tieness', '$subseccion', '1', '$titulo', '$subtitulo', '$resumen', '$contenido', '$vinculo', '$blank', '$publicar', '$imagen', '12345', '$vermas', '$en_menu', '$publicado_por', '$fechacompleta', '$publicado_por', '$fechacompleta', '$adjuntos', '$formulario', '$tit_form', '$desc_form', '$recibe', '$destacado')";
$result = $conn->query($query); 
$resultado = "exito";
header ("Location: articulos.php?seccion=$seccion&pagina=1&resultado=$resultado");
ob_end_flush();
?>