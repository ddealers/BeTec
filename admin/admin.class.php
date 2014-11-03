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

}

$admin = new AdminClass();

if($action == 'login'){
	if(($_POST['usuario'] != NULL && $_POST['clave'] != NULL) AND ($_POST['usuario'] != '' && $_POST['clave'] != '' ) ){
		$user  = $_POST['usuario'];
		$clave = $_POST['clave'];

		$res = $admin->login($user, $clave);
		
		if($res){
			$uri = "/admin/index.php";
		}else{
			$uri = "/admin/index.php?e=60";
		}
		header("Location: ". $uri);
	}
}else{
	//echo "No entra";
}

?>