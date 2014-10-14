<?php

if(isset($_GET['opc']) && $_GET['opc'] == 'estadoCity'){
	$est = $_GET['est'];
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$prim = "<option value='#'>Elije</option>";
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
	$prim = "<option value='#'>Elije</option>";

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
}elseif (isset($_GET['opc'])) {
	# code...
}

function saveUser(){
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$response['success'] = false;
	//guarda info
	$n = $_POST['nombre'].' '.$_POST['apaterno'].' '.$_POST['amaterno'];
	$c = $_POST['nanio'].'-'.$_POST['nmes'].'-'.$_POST['ndia'];
	$n = '('.$_POST['lada'].')'.$_POST['telefono'];

	$name  = isset($n) AND $n != NULL;
	$birt  = isset($c) AND $c != NULL;
	$sexo  = isset($_POST['genero']) AND $_POST['genero'] != NULL;
	$mail  = isset($_POST['email']) AND $_POST['email'] != NULL;
	$phon  = isset($n) AND $n != NULL;
	$cel   = isset($_POST['cel']) AND $_POST['cel'] != NULL;

	$id_state = isset($_POST['estado']) AND $_POST['estado'] != NULL;
	$id_city  = isset($_POST['ciudad']) AND $_POST['ciudad'] != NULL;
	$id_prepa = isset($_POST['prepa']) AND $_POST['prepa'] != NULL;
	$sale  = isset($_POST['gradua']) AND $_POST['gradua'] != NULL;

	$hotel = isset($_POST['hospedaje']) AND $_POST['hospedaje'] != NULL;
	$solo  = isset($_POST['acompanante']) AND $_POST['acompanante'] != NULL;
	if($solo){
		$par   = isset($_POST['parentesco']) AND $_POST['parentesco'] != NULL;
		$pname = isset($_POST['nomcomp']) AND $_POST['nomcomp'] != NULL;
	}

	$idc1  = isset($_POST['carrera1']) AND $_POST['carrera1'] != NULL;
	$idc2  = isset($_POST['carrera2']) AND $_POST['carrera2'] != NULL;
	$idc3  = isset($_POST['carrera3']) AND $_POST['carrera3'] != NULL;

	$idt1 = isset($_POST['vopt1']) AND $_POST['vopt1'] != NULL;
	$idt2 = isset($_POST['vopt2']) AND $_POST['vopt2'] != NULL;
	$idt3 = isset($_POST['vopt3']) AND $_POST['vopt3'] != NULL;
	$idt4 = isset($_POST['sopt']) AND $_POST['sopt'] != NULL;
	
	$id_medio = isset($_POST['evento']) AND $_POST['evento'] != NULL;
	
	if($sexo AND $name AND $birt AND $mail AND $phon AND $cel AND $id_state AND $id_city AND $id_prepa AND $sale AND $hotel AND $solo AND $id_medio){
		
		$q = "INSERT INTO usuarios VALUES(NULL, $sexo, '$name', $birt, '$mail', '$phon', '$cel', $id_state, $id_city, $id_prepa, '$sale', $hotel, $solo, $id_medio, CURRENT_TIMESTAMP )";
		$v = $mysqli->query($q);
		if($v){
			$idu = $mysqli->insert_id;
			
			for ($i=1; $i < 4; $i++) { 
				$q = "INSERT INTO usuario_carrera VALUES($idu, $idc$i, CURRENT_TIMESTAMP)";
				$v = $mysqli->query($q);
			}

			for ($i=1; $i < 5; $i++) { 
				$qp = "INSERT INTO usuario_taller VALUES($idu, $idt$i, CURRENT_TIMESTAMP)";
				$vp = $mysqli->query($q);
			}

			if($v && $vp){
				$response['success'] = true;
			}else{
				$response['success'] = false;
			}
		}else{
			$response['success'] = false;
		}
	}else{
		$response['success'] = false;
	}

	return $response;
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
	$listado = "<option value='#'>Elije un opción</option>";
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
	$listado = "<option value='#'>Elije un taller</option>";
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
	$listado = "<option value='#'>Elije un taller</option>";
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
	$listado = "<option value='#'>Elije un medio</option>";
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