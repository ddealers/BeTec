<?php
require_once('db.class.php');

class Usuarios extends MYDB
{
	
	public function __construct(){
		parent::__construct();
		$this->table = 'usuarios';
	}

	public function rowUsuarios(){
		$res = '';
		$v = $this->_all("id, nombre, correo");
		$lng = sizeof($v->get());
		$data = $v->get();
		for ($i=0; $i < $lng; $i++) { 
			$res .= "<tr><td>".$data[$i]->id."</td>";
			$res .= "<td>".$data[$i]->nombre."</td>";
			$res .= "<td>".$data[$i]->correo."</td>";
			$res .= "<td><button type='button' class='btn btn-primary btn-xs'>Modificar</button></td></tr>";
				
		}
		return $res;
	}

}
?>