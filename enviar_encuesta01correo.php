<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
										//Load Composer's autoloader
require 'citas/enviomail/Exception.php';
require 'citas/enviomail/PHPMailer.php';
require 'citas/enviomail/SMTP.php';

$tramite = $_POST['tramite'];
$info_clara = $_POST['info_clara'];
$acceso_facil = $_POST['acceso_facil'];
$satisfaccion = $_POST['satisfaccion'];
$mejorar = $_POST['mejorar'];

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'office365@hospitalsanrafaeltunja.gov.co';                     //SMTP username
    $mail->Password   = 'Alaba2020*';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('office365@hospitalsanrafaeltunja.gov.co', 'Hospital San Rafael de Tunja');
    $mail->addAddress('planeación@hospitalsanrafaeltunja.gov.co');     //Add a recipient             //Name is optional
    $mail->addReplyTo('office365@hospitalsanrafaeltunja.gov.co', 'Hospital San Rafael de Tunja');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Encuesta de satisfaccion SUIT';
    $mail->Body    = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <img src="https://www.hospitalsanrafaeltunja.gov.co/ckfinder/userfiles/images/logo-hsrt.png" width="400" />
							 <h2>Encuesta de satisfacción de los usuarios sobre los diferentes trámites inscritos y consultados en el Sistema Único de Tramites- SUIT</h2>
							 <p>Tramite o servicio realizado: '.$tramite. '</p>
							 <p>¿La información para realizar el trámite (pasos a seguir, requisitos, etc) o para solicitar el servicio fue clara y completa?: '.$info_clara. '</p>
							 <p>¿El acceso para realizar el trámite o solicitar el servicio fue fácil y adecuado?: '.$acceso_facil. '</p>
							 <p>¿Califique su grado de satisfacción respecto al trámites o servicios prestados en general?: '.$satisfaccion. '</p>
							 <p>¿Qué aspectos considera se deben mejorar respecto a los trámites y servicios prestados por la E.S.E. Hospital Universitario San Rafael de Tunja?</p>
							 <p>'.$mejorar. '</p>
							 <hr>
							 
						</body>
						</html>';
$mail->send();
    echo 'Enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}
header ("Location: gracias.php?seccion=gracias");
ob_end_flush();	
?>