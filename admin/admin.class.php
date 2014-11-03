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
		$clave = md5($pass);

		$v = $this->_where('*', 's_login_user = "$user" AND s_login_clave = "$clave"');

		var_dump($v->get());
		//return $response;
	}

}

$admin = new AdminClass();

if($action == 'login'){
	if(($_POST['usuario'] != NULL && $_POST['clave'] != NULL) AND ($_POST['usuario'] != '' && $_POST['clave'] != '' ) ){
		$user  = $_POST['usuario'];
		$clave = $_POST['clave'];

		$res = $admin->login($user, $clave);

		var_dump($res);
		exit();
		
		if($res){
			$uri = "/admin/home.php";
		}else{
			$uri = "/admin/index.php?e=60";
		}
		header("Location: ". $uri);
	}
}else{
	//echo "No entra";
}

?>