<?php
require_once('header.php');
require_once('admin.class.php');

$url = $_SERVER['REQUEST_URI'];
list($class, $action) = explode('?', $url);

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
	}else{
		header("Location: ../admin/index.php?e=60");
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
	session_start();
	$_SESSION['user'] = null;
	unset($_SESSION['user']);
	session_destroy($_SESSION['user']);
	clearstatcache();
	header("Location: ../admin/index.php");
}