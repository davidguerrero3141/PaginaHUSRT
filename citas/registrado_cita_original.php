<?php
ob_start();
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
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
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
$query = "INSERT INTO `citas` (`id`, `especialidad`, `especialista`, `numero`, `dia`, `mes`, `ano`, `fecha`, `cliente`, `id_cliente`, `campana`, `hora`, `registrado_por`, `verificado_por`, `fecha_verificado`, `verificado`, `aprobado`) VALUES (NULL, '$especialidad', '$especialista', '$codcita', '$dia', '$mes', '$ano', '$fecha', '$cliente', '$id_cliente', 'cita', '$hora', '$cliente', '', '', '$verificado', '$aprobado');";
$result = $conn->query($query);
$contenido = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <h2>Un usuario ha solicitado una cita</h2>
							 <h2>No. de solicitud: '.$codcita. '</h2>
							 <p>'.$cliente. ' ha solititado una cita de '.$especialidad. ' con el doctor '.$especialista. ' para el día '.$fecha. '. Estos son sus datos:</p>
							 <p>Nombre Completo: '.$cliente. '<p>
							 <p>Documento: '.$id_cliente. ' <p>
							 <p>EPS: '.$eps. ' <p>
							 <p>Tel&eacute;fono: '.$telefono. ' <p>
							 <p>Celular: '.$celular. ' <p>
							 <p>Email: '.$email. ' <p>
						</body>
						</html>';
// Configuración de los encabezados
$asunto = 'Solicitud de cita desde la plataforma';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= 'From: HUSRT citas <usuario_cita@hospitalsanrafaeltunja.gov.co>' . "\r\n";
// Enviar correo
$envio = mail('citasweb@hospitalsanrafaeltunja.gov.co', $asunto, $contenido, $headers);
$contenidocliente = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <img src="https://www.hospitalsanrafaeltunja.gov.co/ckfinder/userfiles/images/logo-hsrt.png" width="400" />
							 <h2>Su solicitud de cita ha sido recibida</h2>
							 <h2>No. de solicitud: '.$codcita. '</h2>
							 <p>'.$cliente. ', usted ha solicitado una cita médica de '.$especialidad. ' con el doctor '.$especialista. ' para el día '.$fecha. '. Los datos de su cita han sido registrados en nuestra base de datos, pronto nos estaremos comunicando con usted para confirmar la disponibilidad de esta.</p>
<p>Cualquier inquietud puedes escribirnos al correo citasweb@hospitalsanrafaeltunja.gov.co"</p>
							 <hr>
							 
						</body>
						</html>';
// Configuración de los encabezados
$asunto2 = 'Solicitud de cita en el Hospital Universitario san Rafael de Tunja';
$headers2  = 'MIME-Version: 1.0' . "\r\n";
$headers2 .= "Content-type: text/html; charset=UTF-8\r\n";
$headers2 .= 'From: Hospital Universitario San Rafael <citasweb@hospitalsanrafaeltunja.gov.co>' . "\r\n";
$headers2 .= 'Reply-To: citasweb@hospitalsanrafaeltunja.gov.co' . "\r\n";
// Enviar correo
$envio2 = mail($email, $asunto2, $contenidocliente, $headers2);
header ("Location: solicitud.php?resultado=exito&solicitud=$codcita&cliente=$cliente");
ob_end_flush();	
?>