<?php
date_default_timezone_set('America/Mexico_City');
require_once("config.php");

$action = $_POST['action'];
$uid 	= $_POST['id'];

$hora = date('YmdHms');
$ruta = '../download/';

$mysqli = new mysqli(HOST,USR,PWD,DB);

if(isset($action) AND $action == 'carta'){
	$e = 69;
	if(isset($_FILES['cartacomp']) && $_FILES['cartacomp'] != NULL && $_FILES['cartacomp']['error'] == 0){
		$uname = str_replace(' ', '', $_FILES['cartacomp']['name']);
		$name0 = $hora . $uname;
		$mv0 = move_uploaded_file($_FILES['cartacomp']['tmp_name'], $ruta.$name0);
		
		$q = "UPDATE usuarios_documentos SET url_permiso = '$name0' WHERE id_usuario = '$uid' ";
		$v = $mysqli->query($q);
		if($v){
			$e = 100; 
		}
	}

}elseif (isset($action) AND $action == 'pago') {
	$e = 69;
	if(isset($_FILES['compago']) && $_FILES['compago'] != NULL && $_FILES['compago']['error'] == 0){
		$uname1 = str_replace(' ', '', $_FILES['compago']['name']);
		$name1 = $hora . $uname1;
		$mv1 = move_uploaded_file($_FILES['compago']['tmp_name'], $ruta.$name1);
		
		$q = "UPDATE usuarios_documentos SET url_pago = '$name1' WHERE id_usuario = '$uid' ";
		$v = $mysqli->query($q);
		if($v){
			$e = 101;
		}
	}
}

header("Location: index.php?u=".$uid."&e=".$e);



?>