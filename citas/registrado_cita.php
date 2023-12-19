<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
										//Load Composer's autoloader
require 'enviomail/Exception.php';
require 'enviomail/PHPMailer.php';
require 'enviomail/SMTP.php';
include ("includes/seguridad.php");
session_start();
$cliente = $_SESSION['s_nombres']." ".$_SESSION['s_apellidos'];
$id_cliente = $_SESSION['s_cedula'];
$email = $_SESSION['s_email'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$eps = $_POST['eps'];
$especialidad = $_POST['especialidad'];
$especialista = $_POST['especialista'];
$tipo = $_POST['tipo'];
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$horacon = date('Gis');
$codcita = $ano.$mes.$dia.$horacon;
$verificado = 0;
$aprobado = 0;
include ("datosconfig.php");
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$query = "INSERT INTO `citas` (`id`, `especialidad`, `especialista`, `numero`, `dia`, `mes`, `ano`, `tipo`, `cliente`, `id_cliente`, `campana`, `registrado_por`, `verificado_por`, `fecha_verificado`, `verificado`, `aprobado`) VALUES (NULL, '$especialidad', '$especialista', '$codcita', '$dia', '$mes', '$ano', '$tipo', '$cliente', '$id_cliente', 'cita', '$cliente', '', '', '$verificado', '$aprobado');";
$result = $conn->query($query);
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
    $mail->Subject = 'Solicitud de cita en el Hospital Universitario san Rafael de Tunja';
    $mail->Body    = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <img src="https://www.hospitalsanrafaeltunja.gov.co/ckfinder/userfiles/images/logo-hsrt.png" width="400" />
							 <h2>Su solicitud de cita ha sido recibida</h2>
							 <h2>No. de solicitud: '.$codcita. '</h2>
							 <p>'.$cliente. ', usted ha solicitado una cita medica de '.$tipo. ', '.$especialidad. ' con el doctor '.$especialista. '. Los datos han sido registrados en nuestra base de datos, nos estaremos comunicando con usted para confirmar la disponibilidad de esta. La confirmacien de su cita puede tomar hasta 72 horas.</p>
<p>Cualquier inquietud puedes escribirnos al correo citasweb@hospitalsanrafaeltunja.gov.co</p>
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
    $mail2->Subject = 'Solicitud de cita desde la plataforma';
    $mail2->Body    = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <h2>Un usuario ha solicitado una cita</h2>
							 <h2>No. de solicitud: '.$codcita. '</h2>
							 <p>'.$cliente. ' ha solititado una cita de '.$especialidad. ' con el doctor '.$especialista. ' de '.$tipo. '. Estos son sus datos:</p>
							 <p>Nombre Completo: '.$cliente. '<p>
							 <p>Documento: '.$id_cliente. ' <p>
							 <p>EPS: '.$eps. ' <p>
							 <p>Tel&eacute;fono: '.$telefono. ' <p>
							 <p>Celular: '.$celular. ' <p>
							 <p>Email: '.$email. ' <p>
						</body>
						</html>';
$mail2->send();
    echo 'Enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar: {$mail2->ErrorInfo}";
}
header ("Location: solicitud.php?resultado=exito&solicitud=$codcita&cliente=$cliente");
ob_end_flush();	
?>