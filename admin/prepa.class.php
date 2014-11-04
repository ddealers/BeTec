<?php
require_once('db.class.php');

class Prepa extends MYDB{
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
		$this->table = 'preparatorias';
	}
	public function listAll(){
		$v = $this->_all("id, nombre")->get();
		foreach ($v as $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
}
?>