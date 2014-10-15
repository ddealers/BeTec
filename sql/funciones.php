<?php

if(isset($_GET['opc']) && $_GET['opc'] == 'estadoCity'){
	$est = $_GET['est'];
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$prim = "<option value=''>Elije</option>";
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
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$prim = "<option value=''>Elije</option>";

	if(isset($idc) && $idc != NULL){
		$q = "SELECT id, nombre FROM preparatorias WHERE id_ciudad = $idc";
		$v = $mysqli->query($q);

		if($v){
			while ($row = $v->fetch_assoc()) {
				$listado = "<option value='".$row['id']."'>".$row['nombre']."</option>";
			}
		}
	}
		echo $prim . $listado;
}

function cupoTaller(){
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$listado = "<option value='#'>Elije un taller</option>";
	$q = "SELECT id, nombre FROM talleres WHERE libres > 0";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
		}
	}

	return $lista;
}

function selectEstados(){
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$listado = "<option value='#'>Elije tu estado</option>";
	$q = "SELECT id, nombre FROM estados";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
		}
	}

	return $listado;
}

function selectCarreras(){
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$listado = "<option value=''>Elije un opción</option>";
	$q = "SELECT * FROM carreras";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			//$listado[] = $row;
			$listado .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
		}
	}

	return $listado;
}

function selectTalleresV(){
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$listado = "<option value=''>Elije un taller</option>";
	$q = "SELECT id, nombre FROM talleres WHERE dia = 1 ";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
		}
	}

	return $listado;
}

function selectTalleresS(){
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$listado = "<option value=''>Elije un taller</option>";
	$q = "SELECT id, nombre FROM talleres WHERE dia = 2 ";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
		}
	}

	return $listado;
}

function selectEventos(){
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$listado = "<option value=''>Elije un medio</option>";
	$q = "SELECT * FROM medios ";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$listado .= "<option value='".$row['id']."'>".$row['nombre']."</option>";
		}
	}

	return $listado;
}

?>