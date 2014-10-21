<?php
require_once("../config.php");	
//variales FORM
$hora = date('YmdHms');
$s = $_POST['string'];
$idu = $_POST['idu'];
$ruta = $_POST['ruta'];
$res = false;

$mysqli = new mysqli(HOST,USR,PWD,DB);

	//Mover
	if(isset($_FILES['carta']) && $_FILES['carta'] != NULL){
		$uname = str_replace(' ', '', $_FILES['carta']['name']);
		$name0 = $hora . $uname;
		$mv0 = move_uploaded_file($_FILES['carta']['tmp_name'], $ruta.$name0);

		$q = "UPDATE usuarios_documentos SET url_permiso = '$name0' WHERE id_usuario = '$idu' ";
		$v = $mysqli->query($q);
		if($v){
			$res = true;
		}
	}

	if(isset($_FILES['banco']) && $_FILES['banco'] != NULL){
		$uname1 = str_replace(' ', '', $_FILES['banco']['name']);
		$name1 = $hora . $uname1;
		$mv1 = move_uploaded_file($_FILES['banco']['tmp_name'], $ruta.$name1);

		$q = "UPDATE usuarios_documentos SET url_pago = '$name1' WHERE id_usuario = '$idu' ";
		$v = $mysqli->query($q);
		if($v){
			$res = true;
		}
	}



	if($res){
		header("Location: ../boleto.php?s=$s");
	}


?>