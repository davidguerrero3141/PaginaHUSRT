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

	$link = mysqli_connect("localhost", "root", "Millos310114$", "citas_husrt");

	if ($_POST['cedula']) {
		//Comprobacion del envio del nombre de usuario y password
		$cedula = $_POST['cedula'];
		$clave = $_POST['clave'];
		$salt = '$0d4';
		$contrasena = sha1(md5($salt . $clave));
		if ($clave == NULL) {
			echo "La password no fue enviada";
		} else {
			$query = mysqli_query($link, "SELECT cedula,clave,nombres FROM clientes WHERE cedula = '$cedula'") or die(mysqli_error());
			$data = mysqli_fetch_array($query);
			if ($data['clave'] != $contrasena) {
				header("Location: index.php?errorusuario=si");
			} else {
				$query = mysqli_query($link, "SELECT nombres,apellidos,cedula,email FROM clientes WHERE cedula = '$cedula'") or die(mysqli_error());
				$row = mysqli_fetch_array($query);
				session_start();
				$nombres = $row['nombres'];
				$salt_nombres = base64_decode($nombres);
				$apellidos = $row['apellidos'];
				$salt_apellidos = base64_decode($apellidos);
				$email = $row['email'];
				$salt_email = base64_decode($email);
				$_SESSION["s_nombres"] = $salt_nombres;
				$_SESSION["s_apellidos"] = $salt_apellidos;
				$_SESSION["s_cedula"] = $row['cedula'];
				$_SESSION["s_email"] = $salt_email;
				$_SESSION['autentificado'] = "si";
				header("Location: aplicacion.php");
			}
		}
	}
	echo $miresultado;
} else {
	// Eres un robot!
	echo "No pudo ingresar, haga clic en no soy un robot";
}
?>