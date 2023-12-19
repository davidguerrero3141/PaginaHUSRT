<?php
ob_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
										//Load Composer's autoloader
require 'citas/enviomail/Exception.php';
require 'citas/enviomail/PHPMailer.php';
require 'citas/enviomail/SMTP.php';

$visita = $_POST['visita'];
$encontro = $_POST['encontro'];
$facilidad = $_POST['facilidad'];

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
    $mail->addAddress('calidad@hospitalsanrafaeltunja.gov.co');     //Add a recipient             //Name is optional
    $mail->addReplyTo('office365@hospitalsanrafaeltunja.gov.co', 'Hospital San Rafael de Tunja');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Encuesta de satisfacci&oacute;n SUIT';
    $mail->Body    = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <img src="https://www.hospitalsanrafaeltunja.gov.co/ckfinder/userfiles/images/logo-hsrt.png" width="400" />
							 <h2>Encuesta grado de satisfacci&oacute;n, de acuerdo con la informaci&oacute;n disponible en la secci&oacute;n de Transparencia y Acceso a la Informaci&oacute;n P&uacute;blica</h2>
							 <p>&iquest;Con qu&eacute; regularidad visita el sitio web de la E.S.E. Hospital Universitario San Rafael de Tunja?: '.$visita. '</p>
							 <p>&iquest;Encontr&oacute; la informaci&oacute;n que estaba buscando?: '.$encontro. '</p>
							 <p>Califique la facilidad de acceso a la informaci&oacute;n que buscaba: '.$facilidad. '</p>
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