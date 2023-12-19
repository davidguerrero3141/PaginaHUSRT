<?php 
$secret = "6Lf5dkcfAAAAAI6m_P8nPuQORyyWqqIL71yL3GG2";
if (isset($_POST['g-recaptcha-response'])) {
$captcha = $_POST['g-recaptcha-response']; 
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
'secret' => $secret,
'response' => $captcha,
'remoteip' => $_SERVER['REMOTE_ADDR']
);

$curlConfig = array(
CURLOPT_URL => $url,
CURLOPT_POST => true,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_POSTFIELDS => $data
);

$ch = curl_init();
curl_setopt_array($ch, $curlConfig);
$response = curl_exec($ch);
curl_close($ch);
}

$jsonResponse = json_decode($response);

if ($jsonResponse->success === true) {
$id = $_POST['id'];
$seccion = $_POST['seccion'];
$slug = $_POST['slug'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$recibe = $_POST['recibe'];
$nomform = $_POST['nomform'];
$mensaje = $_POST['mensaje'];
$txmensaje = nl2br($mensaje);
$txmensaje = stripslashes($txmensaje);
// No eres un robot, continuamos con el envío del email
$contenido = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <h2>Ha recibido un mensaje a través de la página web del formulario '.$nomform. '</h2>
							 <p>Nombre: '.$nombre. '</p>
							 <p>Email: '.$email. ' </p>
							 <h2>Mensaje:</h2>
							 <p>'.$txmensaje.'</p>
							 <p></p>
							 <p></p>
							 <hr>
							 
						</body>
						</html>';


// Configuración de los encabezados
$asunto = 'Formulario desde la pagina web';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= 'From: HUSRT Formulario <formularioweb@hospitalsanrafaeltunja.gov.co>' . "\r\n";

// Enviar correo
$envio = mail($recibe, $asunto, $contenido, $headers);

$contenidocliente = '
						<html>
						<head>
							<title></title>
						</head>
						<body>
							 <img src="https://www.hospitalsanrafaeltunja.gov.co/ckfinder/userfiles/images/logo-hsrt.png" width="400" />
							 <h2>Gracias por escribirnos</h2>
							 <p>'.$nombre. ', para el Hospital Universitario San Rafael de Tunja son muy importantes sus comentarios. Pronto revisaremos y haremos seguimiento a su mensaje.</p>
							 <p></p>
							 <p>Este correo fue enviado por el sistema automático del Hospital Universitario San Rafael de Tunja, favor no responda a esta dirección, su correo no será atendido por este medio.</p>
							 <hr>
							 
						</body>
						</html>';


// Configuración de los encabezados
$asunto2 = 'Gracias por su mensaje en el Hospital Universitario San Rafael de Tunja';
$headers2  = 'MIME-Version: 1.0' . "\r\n";
$headers2 .= "Content-type: text/html; charset=UTF-8\r\n";
$headers2 .= 'From: Hospital Universitario San Rafael de Tunja <mensajes@hospitalsanrafaeltunja.gov.co>' . "\r\n";
$headers2 .= 'Reply-To: '.$recibe. '' . "\r\n";

// Enviar correo
$envio2 = mail($email, $asunto2, $contenidocliente, $headers2);	

if($envio) {
header ("Location: contenido.php?id=$id&seccion=$seccion&slug=$slug&enviado=si");
} else{
header ("Location: contenido.php?id=$id&seccion=$seccion&slug=$slug&enviado=no");
}
	} else {
		// Eres un robot!
		echo "Su mensaje no se envi&oacute;. Es usted un robot?";
	}
?>