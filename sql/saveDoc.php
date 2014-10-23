<?php
require_once("../config.php");	
//variales FORM
$hora = date('YmdHms');
$s = $_POST['string'];
$idu = $_POST['idu'];
$ruta = $_POST['ruta'];
$permiso = false;
$pago = false;
$res = false;

$mysqli = new mysqli(HOST,USR,PWD,DB);
	//Mover
	if(isset($_FILES['carta']) && $_FILES['carta'] != NULL){
		$uname = str_replace(' ', '', $_FILES['carta']['name']);
		$name0 = $hora . $uname;
		//$mime = mime_content_type($_FILES['carta']['tmp_name']);
		//if($mime == 'image/png' || $mime == 'image/jpeg' || $mime == 'application/pdf'){
			$mv0 = move_uploaded_file($_FILES['carta']['tmp_name'], $ruta.$name0);

			$q = "UPDATE usuarios_documentos SET url_permiso = '$name0' WHERE id_usuario = '$idu' ";
			$v = $mysqli->query($q);
			if($v){
				$permiso = true;
			}
		//}else{
		//	$error = 'El formato del archivo es incorrecto, sólo puedes subir archivos PNG, JPG o PDF';
		//}
	}
	if(isset($_FILES['banco']) && $_FILES['banco'] != NULL){
		$uname1 = str_replace(' ', '', $_FILES['banco']['name']);
		$name1 = $hora . $uname1;
		//$mime = mime_content_type($_FILES['carta']['tmp_name']);
		//if($mime == 'image/png' || $mime == 'image/jpeg' || $mime == 'application/pdf'){
			$mv1 = move_uploaded_file($_FILES['banco']['tmp_name'], $ruta.$name1);

			$q = "UPDATE usuarios_documentos SET url_pago = '$name1' WHERE id_usuario = '$idu' ";
			$v = $mysqli->query($q);
			if($v){
				$pago = true;
			}
		//}else{
		//	$error = 'El formato del archivo es incorrecto, sólo puedes subir archivos PNG, JPG o PDF';
		//}
	}
	$q = "SELECT * FROM usuarios_documentos WHERE id_usuario = '$idu' ";
	$v = $mysqli->query($q);
	if($v){
		$row = $v->fetch_assoc();
		if($row['tipo_foraneo'] == '1'){
			$res = ($row['url_pago'] != '#' && $row['url_permiso'] != '#');
		}elseif($row['tipo_foraneo'] == '0'){
			$res = $row['url_permiso'] != '#';
		}
	}
	if($error){
		header("Location: ../documentacion.php?s=$s&e=$error");
	}
	if($res){
		header("Location: ../boleto.php?s=$s");
	}else{
		header("Location: ../documentacion.php?s=$s");
	}
?>