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
	$idu	= $_REQUEST['idu'];
	$nombre	= $_POST['nombre'];
	$email	= $_POST['email'];
	$correo	= $_POST['correo'];
}

$q = "SELECT * FROM usuarios_documentos WHERE id_usuario=$idu";
$v = $usuario->_custom($q)->first();

if($v->url_permiso == "-" && $v->url_pago == "-"){
	$res = $admin->boleto($idu, $nombre, $email, $correo);
}elseif($v->url_pago != "#" && $v->url_permiso != "#" && $v->tipo_foraneo == 1){
	$res = $admin->boleto($idu, $nombre, $email, $correo);
}elseif($v->url_permiso != "#" && $v->tipo_foraneo == 0){
	$res = $admin->boleto($idu, $nombre, $email, $correo);
}else{
	$res = $admin->docs($idu, $nombre, $email, $correo, $v->tipo_foraneo);
}
echo $res;
?>