<?php
require_once('db.class.php');

class Ciudad extends MYDB{
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
		$this->table = 'ciudades';
	}
	public function get($id){
		$v = $this->_where("nombre", "id=$id")->first();
		return $v->nombre = utf8_encode($v->nombre);
	}
	public function listAll(){
		$v = $this->_all("id, estado_id, nombre","ORDER BY nombre ASC")->get();
		foreach ($v as $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
}
?>