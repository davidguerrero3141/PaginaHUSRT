<?php
ob_start();
include ("includes/seguridad.php");
session_start(); 
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$var = $_POST['id'];
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
$imagen = $_POST["imagen"];
$vermas = $_POST["vermas"];
$adjuntos = $_POST["adjuntos"];
if ($adjuntos == '') { $adjuntos = 0 ;}
$formulario = $_POST["formulario"];
if ($formulario == '') { $formulario = 0 ;}
$recibe = $_POST['recibe'];
$tit_form = $_POST['tit_form'];
$desc_form = $_POST['desc_form'];
$banner = $_POST["banner"];
$icono = $_POST["icono"];
$seccion = $_POST["seccion"];
$subseccion = $_POST["subseccion"];
$resumen = $_POST["resumen"];
$vinculo = $_POST["vinculo"];
$blank = $_POST["blank"];
if ($blank == '') { $blank = 0 ;}
$modificado_por = $_SESSION["s_nombre"];
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
$sSQL="Update articulos Set titulo='".$titulo."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set subtitulo='".$subtitulo."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set slug='".$slug."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set resumen='".$resumen."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set vinculo='".$vinculo."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set blank='".$blank."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set contenido='".$contenido."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set vermas='".$vermas."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set adjuntos='".$adjuntos."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set formulario='".$formulario."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set tit_form='".$tit_form."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set desc_form='".$desc_form."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set recibe='".$recibe."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set imagen='".$imagen."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set banner='".$banner."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set icono='".$icono."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set seccion='".$seccion."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set subseccion='".$subseccion."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set modificado_por='".$modificado_por."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$sSQL="Update articulos Set fecha_modificado='".$fechacompleta."' Where id='" . $var . "'";
$result = $conn->query($sSQL);
$resultado = "exito";
header ("Location: actualizar.php?id=$var&resultado=$resultado");
ob_end_flush();
?>