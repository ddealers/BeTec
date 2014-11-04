<?php

require_once('db.class.php');
$url = $_SERVER['REQUEST_URI'];
list($class, $action) = explode('?', $url);

class AdminClass extends MYDB
{
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
		$this->table = 'admin_login';
	}

	public function login($user, $pass){
		$response = false;
		$v = $this->_where("id_login, s_login_user", "s_login_user = '$user' AND s_login_clave = '$pass'");

		if($v->count() == 1){
			$data = $v->get();
			session_start();
			$_SESSION['user'] = $data[0];
			$response = true;
		}
		return $response;
	}

	public function recuperar($email, $msg, $newpass){
		$response['status'] = false;
		$response['uri'] = '69';

		$v = $this->_where('*', "s_login_email = '$email' ");
		
		if($v->count() == 1){
			//Genera pass y manda mail
			$w = $this->_update('s_login_clave = "$newpass"', 's_login_email = "$email"');
			$response['status'] = true;
			$response['uri'] = '100';
			mail($email, 'Recuperar contraseña BTEC ADMIN', $msg);
		}else{
			//EL mail no existe
			$response['status'] = true;
			$response['uri'] = '101';
		}

		return $response;
	}

}

$admin = new AdminClass();

if($action == 'login'){
	if(($_POST['usuario'] != NULL && $_POST['clave'] != NULL) AND ($_POST['usuario'] != '' && $_POST['clave'] != '' ) ){
		$user  = $_POST['usuario'];
		$clave = $_POST['clave'];

		$res = $admin->login($user, $clave);
		
		if($res){
			$uri = "../admin/index.php";
		}else{
			$uri = "../admin/index.php?e=60";
		}
		header("Location: ". $uri);
	}
}elseif ($action == 'recuperar') {
	if($_POST['correo'] != NULL && $_POST['correo'] != ''){

		$email = $_POST['correo'];
		$psswd = substr( md5(microtime()), 1, 8);
		$msg = "Tu nueva password para acceder al administrador de btec es: <br /> $psswd";
		
		$res = $admin->recuperar($email, $msg, $psswd);

		if($res['status']){
			$uri = $res['uri'];
		}

		header("Location: ../admin/recuperar.php?e=".$uri);
		
	}
}elseif ($action = 'logout') {
	$_SESSION['user'] = null;
	unset($_SESSION['user']);
	session_destroy();
	clearstatcache();
}else{
	//echo "No entra";
}

?>