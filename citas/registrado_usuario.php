<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
										//Load Composer's autoloader
require 'enviomail/Exception.php';
require 'enviomail/PHPMailer.php';
require 'enviomail/SMTP.php';
$salt = '$0d4';
$nombres = $_POST['nombres'];
$salt_nombres = base64_encode($nombres);
$apellidos = $_POST['apellidos'];
$salt_apellidos = base64_encode($apellidos);
$tipo_id = $_POST['tipo_id'];
$cedula = $_POST['cedula'];
$celular = $_POST['celular'];
$salt_celular = base64_encode($celular);
$telefono = $_POST['telefono'];
$salt_telefono = base64_encode($telefono);
$email = $_POST["email"];
$salt_email = base64_encode($email);
$direccion = $_POST["direccion"];
$salt_direccion = base64_encode($direccion);
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
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'citasmedicassrtunja@hospitalsanrafaeltunja.gov.co';                     //SMTP username
    $mail->Password   = 'Alaba2020*';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('citasmedicassrtunja@hospitalsanrafaeltunja.gov.co', 'Hospital San Rafael de Tunja');
    $mail->addAddress( $email);     //Add a recipient             //Name is optional
    $mail->addReplyTo('citasweb@hospitalsanrafaeltunja.gov.co', 'Hospital San Rafael de Tunja');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Gracias por su registro en el Hospital Universitario san Rafael de Tunja';
    $mail->Body    = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <img src="https://www.hospitalsanrafaeltunja.gov.co/ckfinder/userfiles/images/logo-hsrt.png" width="400" />
							 <h2>Gracias por su registro</h2>
							 <p>'.$nombres. ' '.$apellidos. ', sus datos han sido registrados en nuestra base de datos, a partir de ahora puede ingresar a nuestra página web con su número de cédula y solicitar sus citas médicas.</p>
<p>Cualquier inquietud puedes escribirnos al correo citasweb@hospitalsanrafaeltunja.gov.co"</p>
							 <hr>
							 
						</body>
						</html>';
$mail->send();
    echo 'Enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}
$mail2 = new PHPMailer(true);

try {
    //Server settings
    $mail2->SMTPDebug = 0;                      //Enable verbose debug output
    $mail2->isSMTP();                                            //Send using SMTP
    $mail2->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail2->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail2->Username   = 'citasmedicassrtunja@hospitalsanrafaeltunja.gov.co';                     //SMTP username
    $mail2->Password   = 'Alaba2020*';                               //SMTP password
    $mail2->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail2->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail2->setFrom('citasmedicassrtunja@hospitalsanrafaeltunja.gov.co', 'Hospital san Rafael de Tunja');
    $mail2->addAddress( 'citasweb@hospitalsanrafaeltunja.gov.co');   //Add a recipient             //Name is optional
    $mail2->addReplyTo('citasmedicassrtunja@hospitalsanrafaeltunja.gov.co', 'Hospital san Rafael de Tunja');

    //Content
    $mail2->isHTML(true);                                  //Set email format to HTML
    $mail2->Subject = 'Nuevo registro de usuario desde la plataforma de citas';
    $mail2->Body    = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <h2>Un nuevo usuario se ha registrado</h2>
							 <p>'.$nombres. ' '.$apellidos. ' de la ciudad de '.$ciudad. ', ha realizado su registro. Estos son sus datos:</p>
							 <p>Nombre Completo: '.$nombres. ' '.$apellidos. ' <p>
							 <p>Documento: '.$tipo_id. ' '.$cedula. ' <p>
							 <p>Tel&eacute;fono: '.$telefono. '<p>
							 <p>Direcci&oacute;n: '.$direccion. '<p>
							 <p>Email: '.$email. '<p>
						</body>
						</html>';
$mail2->send();
    echo 'Enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar: {$mail2->ErrorInfo}";
}
header ("Location: registro_exitoso.php?resultado=exito");
ob_end_flush();
}}
?>