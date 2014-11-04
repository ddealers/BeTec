<?php
require_once('db.class.php');

class Usuario extends MYDB{
	
	public function __construct(){
		parent::__construct();
		$this->table = 'usuarios';
	}

	public function rows(){
		$v = $this->_all("id, nombre, correo")->get();
		foreach ($v as $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
	public function byID( $id ){
		$v = $this->_where("*","id=$id")->first();
		foreach ($v as $key => $value) {
			$key = utf8_encode($key);
			$v->$key = utf8_encode($value);
		}
		return $v;
	}
	public function getFollow( $id ){
		$v = $this->_custom("SELECT parentestco, acompanante FROM usuario_follow WHERE id_usuario='$id'")->first();
		foreach ($v as $key => $value) {
			$key = utf8_encode($key);
			$v->$key = utf8_encode($value);
		}
		return $v;
	}
	public function getUniversidad( $id ){
		$v = $this->_custom("SELECT moneterrey, campus FROM usuarios_info WHERE id='$id'")->first();
		foreach ($v as $key => $value) {
			$key = utf8_encode($key);
			$v->$key = utf8_encode($value);
		}
		return $v;
	}
	public function getCarreras( $id ){
		$v = $this->_custom("SELECT id_carrera, nombre FROM usuario_carrera LEFT JOIN carreras ON carreras.id=usuario_carrera.id_carrera WHERE id_usuario='$id'")->get();
		foreach ($v as $key => $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
}
?>