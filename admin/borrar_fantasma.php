<?php
require_once("../config.php");
$mysqli = new mysqli(HOST,USR,PWD,DB);
//==Delete 
	//Array id_usuarios tabala: usuario_taller
	$q ="SELECT id_usuario FROM usuario_taller GROUP BY id_usuario";
	$v = $mysqli->query($q);

	$dataT = array();

	if($v){
		while ($row = $v->fetch_assoc()) {
			$dataT[] = $row;
		}
		/*echo "<pre>";
		print_r($dataT);
		echo "</pre>";*/
	}

	//Array id tabla: usuarios para comparar
	$q = "SELECT id FROM usuarios GROUP BY id";
	$v = $mysqli->query($q);
	$dataU = array();
	
	if($v){
		while ($row = $v->fetch_assoc()) {
			$dataU[] = $row['id'];
		}

		/*echo "=========USUARIOS =======<pre>";
		print_r($dataU);
		echo "</pre>";*/
	}
	//array de los que no existen:
	$dataN = array();

	$lng = sizeof($dataT);
	for ($i=0; $i < $lng; $i++) { 
		if(in_array($dataT[$i]['id_usuario'], $dataU)){
			//No pasa nada estan bien
		}else{
			//echo $dataT[$i]['id_usuario']."<br />";
			array_push($dataN, $dataT[$i]['id_usuario']);
		}
	}

	//Obtener id_talleres de los usuarios que son fantasma

	$dataF = array();
	$ids = implode(',', $dataN);
	//echo $ids;
	/*
	echo "<pre>";
	print_r($dataN);
	echo "</pre>";
	*/
	
	$q = "SELECT id_usuario, id_taller FROM usuario_taller WHERE id_usuario in ($ids)";
	$v = $mysqli->query($q);

	if($v){
		while ($row = $v->fetch_assoc()) {
			$dataF[] = $row;
		}
	}

	//echo $dataF[0]['id_usuario'];
	//echo $dataF[0]['id_taller'];
	/*echo "<pre>";
	print_r($dataF);
	echo "</pre>";*/

	$lngF = sizeof($dataF);
	$vd = false;
	for ($i=0; $i < $lngF; $i++) { 
		$q = "UPDATE talleres SET libres=libres+1 WHERE id = ".$dataF[$i]['id_taller']. "";
		$v = $mysqli->query($q);
		if($v){
			$qd = "DELETE FROM usuario_taller WHERE id_usuario =".$dataF[$i]['id_usuario']."";
			$vd = $mysqli->query($qd);
		}
	}

	if($vd){
		echo "<h1>Todo correcto</h1>";
	}else{
		echo "<h1>No hay nada que afectar</h1>";
	}

?>