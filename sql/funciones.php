<?php
if(curPageName() == 'funciones.php'){
	require_once("../config.php");	
}else{
	require_once("config.php");
}
if(isset($_GET['opc']) && $_GET['opc'] == 'encode'){
	$string = $_GET['s'];
	$key = 'BornToBeTec321_';
	$result = '';
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	echo base64_encode($result);
}
if(isset($_GET['opc']) && $_GET['opc'] == 'estadoCity'){
	$est = $_GET['est'];
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$prim = "<option value=''>Ciudad donde estudio*</option>";
	if(isset($est) AND $est != NULL){
		//$q = "SELECT id, nombre FROM ciudades WHERE estado_id = $est";
		$q = "SELECT ciudades.id, ciudades.nombre FROM ciudades, preparatorias WHERE ciudades.id = preparatorias.id_ciudad AND ciudades.estado_id = $est GROUP BY ciudades.id ORDER BY ciudades.nombre";
		$v = $mysqli->query($q);
		if($v){
			$listado = "";
			while ($row = $v->fetch_assoc()) {
				$listado .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
			}
		}
		echo $prim . $listado;
	}
}elseif (isset($_GET['opc']) && $_GET['opc'] == 'citySchool') {
	
	$idc = $_GET['idc'];
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$prim = "<option value=''>Prepa donde estudio*</option>";
	$last = "<option value='#'>Otra</option>";
	if(isset($idc) && $idc != NULL){
		$q = "SELECT id, nombre FROM preparatorias WHERE id_ciudad = $idc ORDER BY nombre";
		$v = $mysqli->query($q);

		if($v){
			$listado = "";
			while ($row = $v->fetch_assoc()) {
				$listado .= "<option value='".$row['id']."'>".utf8_decode(ucwords(strtolower($row['nombre'])))."</option>";
			}
		}
	}
		echo $prim . $listado . $last;
}
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
function cupoTaller(){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$q = "SELECT id, nombre FROM talleres WHERE libres > 0";
	$v = $mysqli->query($q);
	if($v){
		$listado = "";
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
		$listado = "";
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
		$listado = "";
		while ($row = $v->fetch_assoc()) {
			//$listado[] = $row;
			$listado .= "<option value='".$row['id']."'>".utf8_encode($row['nombre'])."</option>";
		}
	}

	return $listado;
}

function selectTalleresV($opc, $hr){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	if($opc == '1'){
		//solo x campos
		//$q = "SELECT id, nombre FROM talleres WHERE dia = 1 AND opc = 1 AND libres > 0";
		$q = "SELECT id, nombre, cupo FROM talleres WHERE dia = 1 AND opc = 1";
	}else{
		//$q = "SELECT id, nombre FROM talleres WHERE dia = 1 AND id <> 46 AND libres > 0";
		$q = "SELECT id, nombre, cupo FROM talleres WHERE dia = 1 AND id <> 46";
	}
	$v = $mysqli->query($q);

	if($v){
		$listado = "";
		while ($row = $v->fetch_assoc()) {
			$q = "SELECT COUNT(*) AS total FROM usuario_taller WHERE horario_taller=$hr AND id_taller={$row['id']}";
			$sc = $mysqli->query($q);
			$tr = $sc->fetch_assoc();
			if($tr['total'] < $row['cupo']){
				$listado .= "<option value='".$row['id']."'>".utf8_encode($row['nombre'])."</option>";
			}
		}
	}

	return $listado;
}

function selectTalleresS($hr){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	//$q = "SELECT id, nombre, cupo FROM talleres WHERE dia = 2 AND libres > 0";
	$q = "SELECT id, nombre, cupo FROM talleres WHERE dia = 2";
	$v = $mysqli->query($q);

	if($v){
		$listado = "";
		while ($row = $v->fetch_assoc()) {
			$q = "SELECT COUNT(*) AS total FROM usuario_taller WHERE horario_taller=$hr AND id_taller={$row['id']}";
			$sc = $mysqli->query($q);
			$tr = $sc->fetch_assoc();
			if($tr['total'] < $row['cupo']){
				$listado .= "<option value='".$row['id']."'>".utf8_encode($row['nombre'])."</option>";
			}
		}
	}

	return $listado;
}

function selectEventos(){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$q = "SELECT * FROM medios ";
	$v = $mysqli->query($q);

	if($v){
		$listado = "";
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
