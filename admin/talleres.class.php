<?php
require_once('db.class.php');

class Taller extends MYDB{
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
		$this->table = 'talleres';
	}
	public function listViernes($v1 = false){
		if($v1){
			$v = $this->_where("id, nombre","dia='1' AND opc='1'")->get();
		}else{
			$v = $this->_where("id, nombre","dia='1' AND id<>46")->get();
		}
		foreach ($v as $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
	public function listSabado(){
		$v = $this->_where("id, nombre","dia='2'")->get();
		foreach ($v as $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
	public function byID($id){
		$v = $this->_where("id, nombre, cupo","id=$id")->first();
		return $v;
	}
	public function full($t, $h){
		$c = $this->byID($t)->cupo;
		$t = $this->_custom("SELECT * FROM usuario_taller WHERE id_taller=$t AND horario_taller=$h")->count();
		return $t >= $c;
	}
}
?>