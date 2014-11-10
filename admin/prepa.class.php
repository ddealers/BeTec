<?php
require_once('db.class.php');

class Prepa extends MYDB{
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
		$this->table = 'preparatorias';
	}
	public function custom($id_user){
		$v = $this->_custom("SELECT nombre_prepa FROM usuarios_prepa WHERE id_usuario=$id_user")->first();
		return $v->nombre_prepa = utf8_encode($v->nombre_prepa);
	}
	public function get($id){
		$v = $this->_where("nombre", "id=$id")->first();
		return $v->nombre = utf8_encode($v->nombre);
	}
	public function listAll(){
		$v = $this->_all("id, id_ciudad, nombre","ORDER BY nombre ASC")->get();
		foreach ($v as $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
}
?>