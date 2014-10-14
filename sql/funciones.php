<?php

require_once('conection.php');

class userDAO {	
	var $conection;
	var $mysqli;
	
	function __construct() {
		$this->conection = new Conection();
		$this->mysqli = $this->conection->conect();
	}

	public function saveUser(){
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

		$idc1  = isset($_POST['carrera1'] AND $_POST['carrera1'] != NULL );
		$idc2  = isset($_POST['carrera2'] AND $_POST['carrera2'] != NULL );
		$idc3  = isset($_POST['carrera3'] AND $_POST['carrera3'] != NULL );

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

	public function cupoTaller(){
		$lista = array();
		$q = "SELECT id, nombre FROM talleres WHERE libres > 0";
		$v = $mysqli->query($q);

		if($v){
			while ($row = $v->fetch_assoc()) {
				$lista[] = $row;
			}
		}

		return $lista;
	}

	public function selectEstados(){
		$listado = array('No hay estados para elejir');
		$q = "SELECT * FROM estados";
		$v = $mysqli->query($q);

		if($v){
			while ($row = $v->fetch_assoc()) {
				$listado[] = $row;
			}
		}

		return $listado;
	}

	public function estadoCity($ide){
		$listado = array();
		
		if(isset($ide) AND $ide != NULL){
			$q = "SELECT id, nombre FROM ciudades WHERE id_estado = $ide";
			$v = $mysqli->query($q);
			if($v){
				while ($row = $v->fetch_assoc()) {
					$listado[] = $row;
				}
			}
		}
		return $listado;
	}

	public function citySchool($idc){
		$listado = array();

		if(isset($idc) && $idc != NULL){
			$q = "SELECT id, nombre FROM preparatorias WHERE id_ciudad = $idc";
			$v = $mmysqli->query($q);

			if($v){
				while ($row = $v->fetch_assoc()) {
					$listado[] = $row;
				}
			}
		}
		return $listado;
	}

	public function selectCarreras(){
		$listado = array('No hay carreras para elejir');
		$q = "SELECT * FROM carreras";
		$v = $mysqli->query($q);

		if($v){
			while ($row = $v->fetch_assoc()) {
				$listado[] = $row;
			}
		}

		return $listado;
	}

	public function selectTalleresV(){
		$listado = array('No hay talleres para elejir');
		$q = "SELECT id, nombre FROM talleres WHERE dia = 1 ";
		$v = $mysqli->query($q);

		if($v){
			while ($row = $v->fetch_assoc()) {
				$listado[] = $row;
			}
		}

		return $listado;
	}

	public function selectTalleresS(){
		$listado = array('No hay talleres para elejir');
		$q = "SELECT id, nombre FROM talleres WHERE dia = 2 ";
		$v = $mysqli->query($q);

		if($v){
			while ($row = $v->fetch_assoc()) {
				$listado[] = $row;
			}
		}

		return $listado;
	}

	public function selectEventos(){
		$listado = array('No hay evento para elejir');
		$q = "SELECT * FROM medios ";
		$v = $mysqli->query($q);

		if($v){
			while ($row = $v->fetch_assoc()) {
				$listado[] = $row;
			}
		}

		return $listado;
	}

}

?>