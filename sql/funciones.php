<?php
if(curPageName() == 'funciones.php'){
	require_once("../config.php");	
}else{
	require_once("config.php");
}
if(isset($_GET['opc']) && $_GET['opc'] == 'estadoCity'){
	$est = $_GET['est'];
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$prim = "<option value=''>Ciudad de residencia*</option>";
	if(isset($est) AND $est != NULL){
		$q = "SELECT id, nombre FROM ciudades WHERE estado_id = $est";
		$v = $mysqli->query($q);
		if($v){
			while ($row = $v->fetch_assoc()) {
				$listado .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
			}
		}
		echo $prim . $listado;
	}
}elseif (isset($_GET['opc']) && $_GET['opc'] == 'citySchool') {
	
	$idc = $_GET['idc'];
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$prim = "<option value=''>Prepa donde estudias*</option>";

	if(isset($idc) && $idc != NULL){
		$q = "SELECT id, nombre FROM preparatorias WHERE id_ciudad = $idc";
		$v = $mysqli->query($q);

		if($v){
			while ($row = $v->fetch_assoc()) {
				$listado .= utf8_decode(utf8_decode(ucwords("<option value='".$row['id']."'>".$row['nombre']."</option>")));
			}
		}
	}
		echo $prim . $listado;
}
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
function cupoTaller(){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$q = "SELECT id, nombre FROM talleres WHERE libres > 0";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".utf8_encode($row['nombre'])."</option>";
		}
	}

	return $lista;
}

function selectEstados(){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$q = "SELECT id, nombre FROM estados";
	$v = $mysqli->query($q);
	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".utf8_encode($row['nombre'])."</option>";
		}
	}

	return $listado;
}

function selectCarreras(){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$q = "SELECT * FROM carreras";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			//$listado[] = $row;
			$listado .= "<option value='".$row['id']."'>".utf8_encode($row['nombre'])."</option>";
		}
	}

	return $listado;
}

function selectTalleresV(){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$q = "SELECT id, nombre FROM talleres WHERE dia = 1 ";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".utf8_encode($row['nombre'])."</option>";
		}
	}

	return $listado;
}

function selectTalleresS(){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$q = "SELECT id, nombre FROM talleres WHERE dia = 2 ";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".utf8_encode($row['nombre'])."</option>";
		}
	}

	return $listado;
}

function selectEventos(){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$q = "SELECT * FROM medios ";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".utf8_encode($row['nombre'])."</option>";
		}
	}

	return $listado;
}

function desencriptarURL($string, $key){
	$result = '';
	$string = base64_decode($string);
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
	return $result;
}

?>