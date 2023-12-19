<?php
ob_start();
$salt = '$0d4';
$nombres = $_POST['nombres'];
$salt_nombres = aes_encrypt($nombres, $salt);
$apellidos = $_POST['apellidos'];
$salt_apellidos = aes_encrypt($apellidos, $salt);
$tipo_id = $_POST['tipo_id'];
$cedula = $_POST['cedula'];
$celular = $_POST['celular'];
$salt_celular = aes_encrypt($celular, $salt);
$telefono = $_POST['telefono'];
$salt_telefono = aes_encrypt($telefono, $salt);
$email = $_POST["email"];
$salt_email = aes_encrypt($email, $salt);
$direccion = $_POST["direccion"];
$salt_direccion = aes_encrypt($direccion, $salt);
$eps = $_POST["eps"];
$nacimiento = $_POST["nacimiento"];
$dia_registro = date('j');
$mes_registro = date('n');
$ano_registro = date('Y');
$clave = $_POST["contrasena"];
$clave2 = $_POST["contrasena2"];
$contrasena = sha1(md5($salt . $clave));
if ($clave != $clave2){
header ("Location: registro.php?claveinvalida=si");
ob_end_flush();	
} else {
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$ssql = "Select cedula from clientes WHERE cedula = '$cedula'"; 
//Ejecuto la consulta 
$result = $conn->query($ssql);
  if ($result->num_rows > 0)
{
header ("Location: registro.php?existe=si&documento=$cedula");
ob_end_flush();
}
// ------------ Si no esta registrado el usuario continua el script
else
{
$query = "INSERT INTO `clientes` (`nombres`, `apellidos`, `tipo_id`, `cedula`, `clave`, `nacimiento`, `email`, `telefono`, `celular`, `direccion`, `eps`, `dia_registro`, `mes_registro`, `ano_registro`, `activo`) VALUES ('$salt_nombres', '$salt_apellidos', '$tipo_id', '$cedula', '$contrasena', '$nacimiento', '$salt_email', '$salt_telefono', '$salt_celular', '$salt_direccion', '$eps', '$dia_registro', '$mes_registro', '$ano_registro', '1')";
$result = $conn->query($query);
$nombremail = isset( $_POST['nombres'] ) ? $_POST['nombres'] : '';
$apellidomail = isset( $_POST['apellidos'] ) ? $_POST['apellidos'] : '';				  
$emailmail  = isset( $_POST['email'] ) ? $_POST['email'] : '';
$telefonomail  = isset( $_POST['telefono'] ) ? $_POST['telefono'] : '';
$direccionmail = isset( $_POST['direccion'] ) ? $_POST['direccion'] : '';
$documentomail = isset( $_POST['cedula'] ) ? $_POST['cedula'] : '';
$ciudadmail = isset( $_POST['ciudad'] ) ? $_POST['ciudad'] : '';
$contenido = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <h2>Un nuevo usuario se ha registrado</h2>
							 <p>'.$nombremail. ' '.$apellidomail. ' de la ciudad de '.$ciudadmail. ', ha realizado su registro. Estos son sus datos:</p>
							 <p>Nombre Completo: '.$nombremail. ' '.$apellidomail. ' <p>
							 <p>Documento: '.$documentomail. ' <p>
							 <p>Tel&eacute;fono: '.$telefonomail. '<p>
							 <p>Direcci&oacute;n: '.$direccionmail. '<p>
						</body>
						</html>';
// Configuración de los encabezados
$asunto = 'Nuevo registro de usuario desde la plataforma de citas';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= 'From: HUSRT registro usuario <registrousuario@hospitalsanrafaeltunja.gov.co>' . "\r\n";
// Enviar correo
$envio = mail('citasweb@hospitalsanrafaeltunja.gov.co', $asunto, $contenido, $headers);
if ($autoriza_email = 1){
$contenidocliente = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <img src="https://www.hospitalsanrafaeltunja.gov.co/ckfinder/userfiles/images/logo-hsrt.png" width="400" />
							 <h2>Gracias por su registro</h2>
							 <p>'.$nombremail. ' '.$apellidomail. ', sus datos han sido registrados en nuestra base de datos, a partir de ahora puede ingresar a nuestra página web con tu número de cédula y solicitar sus citas médicas.</p>
<p>Cualquier inquietud puedes escribirnos al correo citasweb@hospitalsanrafaeltunja.gov.co"</p>
							 <hr>
							 
						</body>
						</html>';
// Configuración de los encabezados
$asunto2 = 'Gracias por su registro en el Hospital Universitario san Rafael de Tunja';
$headers2  = 'MIME-Version: 1.0' . "\r\n";
$headers2 .= "Content-type: text/html; charset=UTF-8\r\n";
$headers2 .= 'From: Hospital Universitario San Rafael <citasweb@hospitalsanrafaeltunja.gov.co>' . "\r\n";
$headers2 .= 'Reply-To: citasweb@hospitalsanrafaeltunja.gov.co' . "\r\n";
// Enviar correo
$envio2 = mail($emailmail, $asunto2, $contenidocliente, $headers2);
}
header ("Location: registro_exitoso.php?resultado=exito");
ob_end_flush();
}}
?>