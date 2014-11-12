<?php
require_once("../config.php");
$mysqli = new mysqli(HOST,USR,PWD,DB);

//==UPDATE
	//Alter table usuario_taller

	$q = "ALTER TABLE usuario_taller ADD horario_taller CHAR( 2 ) AFTER create_at";
	$v = $mysqli->query($q);
	$v = true;
	if($v){
		$q = "SELECT id_usuario FROM usuario_taller GROUP BY id_usuario ORDER BY id_taller ASC";
		$v = $mysqli->query($q);
		while ($row = $v->fetch_assoc()) {
			$datos[] = $row;
		}
		$lng = sizeof($datos);
		echo "Total usuarios: ".$lng."<br />";
		$hora = 1;
		for ($i=0; $i < $lng; $i++) { 
			$q = "SELECT id_usuario, id_taller FROM usuario_taller WHERE id_usuario = ".$datos[$i]['id_usuario']." ORDER BY create_at DESC ";
			$v = $mysqli->query($q);
			while ($row = $v->fetch_array()) {				
				if($hora == 6){$hora = 1;}
				$q ="UPDATE usuario_taller SET horario_taller = " .$hora." WHERE id_usuario = ".$row['id_usuario']." AND id_taller = ".$row['id_taller']."";
				$mysqli->query($q);
				$hora = $hora+1;
				//echo $q."<br />";
			}
		}
	}

//Fix Results

	$q = "SELECT id_usuario FROM usuario_taller WHERE id_taller = 1 AND horario_taller != 1 AND horario_taller != 2 AND horario_taller != 3";
	$v = $mysqli->query($q);

	if($v){
		$fix = array();
		while ($row = $v->fetch_assoc()) {
			$fix[] = $row;
		}

		$lng = sizeof($fix);
		$dataFix = array();
		for ($i=0; $i < $lng; $i++) { 
			array_push($dataFix, $fix[$i]['id_usuario']);
		}
		
		//UPDATEAMOS EN OTRO ORDEN
		$ids = implode(',', $dataFix);
		$newDatos = array();
		for ($i=0; $i < $lng; $i++) { 
			$q = "SELECT * FROM usuario_taller WHERE id_usuario in ($ids) ORDER BY create_at ASC";
			$v = $mysqli->query($q);
			while ($row = $v->fetch_assoc()) {
				$newDatos[] = $row;
			}
		}

		$nlg = sizeof($newDatos);
		$hora = 1;
		for ($i=0; $i < $nlg; $i++) { 
			if($hora == 6){$hora =1;}
			$q ="UPDATE usuario_taller SET horario_taller = " .$hora." WHERE id_usuario = ".$newDatos[$i]['id_usuario']." AND id_taller = ".$newDatos[$i]['id_taller']."";
			$mysqli->query($q);
			$hora = $hora+1;
			//echo $newDatos[$i]['id_usuario'];
			//echo " > ".$newDatos[$i]['create_at'] . " ->" ;
			//echo $q."<br />";
		}
	}
//Fix result DOS	
	$q = "SELECT id_usuario FROM usuario_taller WHERE id_taller = 2 AND horario_taller != 1 AND horario_taller != 2 AND horario_taller != 3";
	$v = $mysqli->query($q);

	if($v){
		$fix = array();
		while ($row = $v->fetch_assoc()) {
			$fix[] = $row;
		}
		$lng = sizeof($fix);
		$dataFix = array();
		for ($i=0; $i < $lng; $i++) { 
			array_push($dataFix, $fix[$i]['id_usuario']);
		}
		
		//UPDATEAMOS EN OTRO ORDEN
		$ids = implode(',', $dataFix);
		$newDatos = array();
		for ($i=0; $i < $lng; $i++) { 
			$q = "SELECT * FROM usuario_taller WHERE id_usuario in ($ids) ORDER BY create_at ASC";
			$v = $mysqli->query($q);
			while ($row = $v->fetch_assoc()) {
				$newDatos[] = $row;
			}
		}

		$nlg = sizeof($newDatos);
		$hora = 1;
		for ($i=0; $i < $nlg; $i++) { 
			if($hora == 6){$hora =1;}
			$q ="UPDATE usuario_taller SET horario_taller = " .$hora." WHERE id_usuario = ".$newDatos[$i]['id_usuario']." AND id_taller = ".$newDatos[$i]['id_taller']."";
			$mysqli->query($q);
			$hora = $hora+1;
			//echo $newDatos[$i]['id_usuario'];
			//echo " > ".$newDatos[$i]['create_at'] . " ->" ;
			//echo $q."<br />";
		}
	}
//Fix result TRES	
	$q = "SELECT id_usuario FROM usuario_taller WHERE id_taller = 3 AND horario_taller != 1 AND horario_taller != 2 AND horario_taller != 3";
	$v = $mysqli->query($q);

	if($v){
		$fix = array();
		while ($row = $v->fetch_assoc()) {
			$fix[] = $row;
		}
		$lng = sizeof($fix);
		$dataFix = array();
		for ($i=0; $i < $lng; $i++) { 
			array_push($dataFix, $fix[$i]['id_usuario']);
		}
		
		//UPDATEAMOS EN OTRO ORDEN
		$ids = implode(',', $dataFix);
		$newDatos = array();
		for ($i=0; $i < $lng; $i++) { 
			$q = "SELECT * FROM usuario_taller WHERE id_usuario in ($ids) ORDER BY create_at ASC";
			$v = $mysqli->query($q);
			while ($row = $v->fetch_assoc()) {
				$newDatos[] = $row;
			}
		}

		$nlg = sizeof($newDatos);
		$hora = 1;
		for ($i=0; $i < $nlg; $i++) { 
			if($hora == 6){$hora =1;}
			$q ="UPDATE usuario_taller SET horario_taller = " .$hora." WHERE id_usuario = ".$newDatos[$i]['id_usuario']." AND id_taller = ".$newDatos[$i]['id_taller']."";
			$mysqli->query($q);
			$hora = $hora+1;
			//echo $newDatos[$i]['id_usuario'];
			//echo " > ".$newDatos[$i]['create_at'] . " ->" ;
			//echo $q."<br />";
		}
	}
//Fix result Cuantro
	$q = "SELECT id_usuario FROM usuario_taller WHERE id_taller = 4 AND horario_taller != 1 AND horario_taller != 2 AND horario_taller != 3";
	$v = $mysqli->query($q);

	if($v){
		$fix = array();
		while ($row = $v->fetch_assoc()) {
			$fix[] = $row;
		}
		$lng = sizeof($fix);
		$dataFix = array();
		for ($i=0; $i < $lng; $i++) { 
			array_push($dataFix, $fix[$i]['id_usuario']);
		}
		
		//UPDATEAMOS EN OTRO ORDEN
		$ids = implode(',', $dataFix);
		$newDatos = array();
		for ($i=0; $i < $lng; $i++) { 
			$q = "SELECT * FROM usuario_taller WHERE id_usuario in ($ids) ORDER BY create_at ASC";
			$v = $mysqli->query($q);
			while ($row = $v->fetch_assoc()) {
				$newDatos[] = $row;
			}
		}

		$nlg = sizeof($newDatos);
		$hora = 1;
		for ($i=0; $i < $nlg; $i++) { 
			if($hora == 6){$hora =1;}
			$q ="UPDATE usuario_taller SET horario_taller = " .$hora." WHERE id_usuario = ".$newDatos[$i]['id_usuario']." AND id_taller = ".$newDatos[$i]['id_taller']."";
			$mysqli->query($q);
			$hora = $hora+1;
			//echo $newDatos[$i]['id_usuario'];
			//echo " > ".$newDatos[$i]['create_at'] . " ->" ;
			//echo $q."<br />";
		}
	}
//Fix result Cinco
	$q = "SELECT id_usuario FROM usuario_taller WHERE id_taller = 5 AND horario_taller != 1 AND horario_taller != 2 AND horario_taller != 3";
	$v = $mysqli->query($q);

	if($v){
		$fix = array();
		while ($row = $v->fetch_assoc()) {
			$fix[] = $row;
		}
		$lng = sizeof($fix);
		$dataFix = array();
		for ($i=0; $i < $lng; $i++) { 
			array_push($dataFix, $fix[$i]['id_usuario']);
		}
		
		//UPDATEAMOS EN OTRO ORDEN
		$ids = implode(',', $dataFix);
		$newDatos = array();
		for ($i=0; $i < $lng; $i++) { 
			$q = "SELECT * FROM usuario_taller WHERE id_usuario in ($ids) ORDER BY create_at ASC";
			$v = $mysqli->query($q);
			while ($row = $v->fetch_assoc()) {
				$newDatos[] = $row;
			}
		}

		$nlg = sizeof($newDatos);
		$hora = 1;
		for ($i=0; $i < $nlg; $i++) { 
			if($hora == 6){$hora =1;}
			$q ="UPDATE usuario_taller SET horario_taller = " .$hora." WHERE id_usuario = ".$newDatos[$i]['id_usuario']." AND id_taller = ".$newDatos[$i]['id_taller']."";
			$mysqli->query($q);
			$hora = $hora+1;
			//echo $newDatos[$i]['id_usuario'];
			//echo " > ".$newDatos[$i]['create_at'] . " ->" ;
			//echo $q."<br />";
		}
	}
//Fix result 46
	$q = "SELECT id_usuario FROM usuario_taller WHERE id_taller = 46 AND horario_taller != 1 AND horario_taller != 2 AND horario_taller != 3";
	$v = $mysqli->query($q);

	if($v){
		$fix = array();
		while ($row = $v->fetch_assoc()) {
			$fix[] = $row;
		}
		$lng = sizeof($fix);
		$dataFix = array();
		for ($i=0; $i < $lng; $i++) { 
			array_push($dataFix, $fix[$i]['id_usuario']);
		}
		
		//UPDATEAMOS EN OTRO ORDEN
		$ids = implode(',', $dataFix);
		$newDatos = array();
		for ($i=0; $i < $lng; $i++) { 
			$q = "SELECT * FROM usuario_taller WHERE id_usuario in ($ids) ORDER BY create_at ASC";
			$v = $mysqli->query($q);
			while ($row = $v->fetch_assoc()) {
				$newDatos[] = $row;
			}
		}

		$nlg = sizeof($newDatos);
		$hora = 1;
		for ($i=0; $i < $nlg; $i++) { 
			if($hora == 6){$hora =1;}
			$q ="UPDATE usuario_taller SET horario_taller = " .$hora." WHERE id_usuario = ".$newDatos[$i]['id_usuario']." AND id_taller = ".$newDatos[$i]['id_taller']."";
			$mysqli->query($q);
			$hora = $hora+1;
			//echo $newDatos[$i]['id_usuario'];
			//echo " > ".$newDatos[$i]['create_at'] . " ->" ;
			//echo $q."<br />";
		}
	}

?>