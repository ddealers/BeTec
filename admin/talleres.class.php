<?php
require_once('db.class.php');

class Taller extends MYDB{
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
		$this->table = 'talleres';
	}
	public function listViernes(){
		$v = $this->_where("id, nombre","dia='1'")->get();
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
}
?>