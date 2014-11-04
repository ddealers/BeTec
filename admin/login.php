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
}elseif ($action == 'logout') {
	session_start();
	$_SESSION['user'] = null;
	unset($_SESSION['user']);
	session_destroy($_SESSION['user']);
	clearstatcache();
	header("Location: ../admin/index.php");
}elseif ($action == 'update') {
	
	$res = 'false';
	$genero 		= $_POST["genero"];
	$nombre 		= $_POST["nombre"];
	$cumple 		= $_POST["cumple"];
	$email 			= $_POST["email"];
	$tel 			= $_POST["tel"];
	$cel 			= $_POST["cel"];
	$medio 			= $_POST["medio"];
	$estado 		= $_POST["estado"];
	$ciudad 		= $_POST["ciudad"];
	$prepa 			= $_POST["prepa"];
	$ingreso 		= $_POST["ingreso"];
	$hotel 			= $_POST["hotel"];
	$solo 			= $_POST["solo"];
	$perentesco 	= $_POST["perentesco"];
	$acompana 		= $_POST["acompana"];
	$tecno 			= $_POST["tecno"];
	$car1 			= $_POST["car1"];
	$car2 			= $_POST["car2"];
	$car3 			= $_POST["car3"];
	$tav1 			= $_POST["tav1"];
	$tav2 			= $_POST["tav2"];
	$tav3 			= $_POST["tav3"];
	$tas1 			= $_POST["tas1"];
	$tas2 			= $_POST["tas2"];

	$idu 			= $_POST['idu'];

	$res = $admin->updateAdmin($genero, $nombre, $cumple, $email, $tel, $cel, $medio, $estado, $ciudad, $prepa, $ingreso, $hotel, $solo, $perentesco ,$acompana, $tecno, $car1, $car2, $car3, $tav1, $tav2, $tav3, $tas1,$tas2, $idu);
	
		return $res;

}


?>