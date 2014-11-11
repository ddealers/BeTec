<?php
require_once('admin.class.php');
require_once('usuarios.class.php');

$admin = new AdminClass();
$usuario = new Usuario();

//Para Mail
$key = 'BornToBeTec321_';
function encriptarURL($string, $key){
	$result = '';
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return base64_encode($result);
}

if(isset($_POST['action']) && $_POST['action']=='byID'){
	$idu = $_POST['id'];
	$u = $usuario->byID($_POST['id']);
	$nombre = $u->nombre;
	$email = $u->correo;
	$correo = encriptarURL($u->correo, $key);
}else{
	$idu	= $_POST['idu'];
	$nombre	= $_POST['nombre'];
	$email	= $_POST['email'];
	$correo	= $_POST['correo'];
}
$res = $admin->boleto($idu, $nombre, $email, $correo);
echo $res;
?>