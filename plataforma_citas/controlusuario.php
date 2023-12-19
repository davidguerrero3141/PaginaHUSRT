<?
$secret = "6LcxhcYUAAAAACfAa5TaUVzTvtv4Egvy3ty_WUZu";
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

$link = mysqli_connect("localhost", "leonard1_lelilo", "7Jhendrix7", "leonard1_citashusrt");
		
if ($_POST['usuario']) {
//Comprobacion del envio del nombre de usuario y password
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$salt = '$0d4';
$contrasena = sha1(md5($salt . $clave));
if ($clave==NULL) {
echo "La password no fue enviada";
}else{
$query = mysqli_query($link,"SELECT usuario,clave,nombre FROM usuarios WHERE usuario = '$usuario'") or die(mysqli_error());
$data = mysqli_fetch_array($query);
if($data['clave'] != $contrasena) {
header("Location: index.php?errorusuario=si");
}else{
$query = mysqli_query($link,"SELECT * FROM usuarios WHERE usuario = '$usuario'") or die(mysqli_error());
$row = mysqli_fetch_array($query);
session_start();
$_SESSION["s_nombre"] = $row['nombre'];
$_SESSION["s_usuario"] = $row['usuario'];
$_SESSION["s_imagen"] = $row['imagen'];
$_SESSION["s_email"] = $row['email'];
$_SESSION["s_perfil"] = $row['perfil'];
$_SESSION['autentificado'] = "si";
header ("Location: aplicacion.php?in=novedades&pagina=1");
}
}
}
echo $miresultado;
	} else {
		// Eres un robot!
		echo "No pudo ingresar, haga clic en no soy un robot";
	}
?>