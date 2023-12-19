<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
										//Load Composer's autoloader
require 'enviomail/Exception.php';
require 'enviomail/PHPMailer.php';
require 'enviomail/SMTP.php';
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$cedula = $_POST['cedula'];
$ssql = "Select cedula from clientes WHERE cedula = '$cedula'"; 
//Ejecuto la consulta 
$result = $conn->query($ssql);
  if ($result->num_rows > 0)
{
$ssqlus = "Select id,cedula,email,nombres,apellidos from clientes WHERE cedula = '".$cedula."'"; 
$resultus = $conn->query($ssqlus); while($rowus = $resultus->fetch_assoc()) { $email_usuario = base64_decode($rowus['email']); $email_enmascarado = substr($email_usuario, 0, 4) . str_repeat('*', strlen($email_usuario) - 3); $nombre_usuario = base64_decode($rowus['nombres']); $apellido_usuario = base64_decode($rowus['apellidos']); $nombre_completo = $nombre_usuario.''.$apellido_usuario;
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
    $mail->addAddress( $email_usuario);     //Add a recipient             //Name is optional
    $mail->addReplyTo('citasweb@hospitalsanrafaeltunja.gov.co', 'Hospital San Rafael de Tunja');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Solicitud de contraseña';
    $mail->Body    = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <img src="https://www.hospitalsanrafaeltunja.gov.co/ckfinder/userfiles/images/logo-hsrt.png" width="400" />
							 <h2>Generar nueva contraseña de acceso</h2>
							 <p>'.$nombre_completo.' ha olvidado la contraseña de acceso a nuestra Plataforma de citas, para ello debe generar una nueva contrase&ntilde;a. Por favor haga clic en el siguiente v&iacute;nculo para crear una nueva.</p>
							 <p><a href="https://www.hospitalsanrafaeltunja.gov.co/citas/genera_clave.php?cedula='.$cedula.'">Generar clave</a><p>
							 <p>Si no ha sido usted quien solicit&oacute; generar contrase&ntilde;a no haga ninguna acci&oacute;n</p>
							 <p>Cualquier inquietud puede escribir al correo citasweb@hospitalsanrafaeltunja.gov.co</p>
						</body>
						</html>';
$mail->send();
    echo 'Enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}
header ("Location: index.php?recuperacion=si&nombre=$nombre_completo&email=$email_enmascarado");
ob_end_flush();
}} else {
header ("Location: index.php?existe=no");
ob_end_flush();	  
}
?>