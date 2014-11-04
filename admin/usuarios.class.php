<?php
require_once('db.class.php');

class Usuario extends MYDB{
	
	public function __construct(){
		parent::__construct();
		$this->table = 'usuarios';
	}

	public function rows($search){
		if($search){
			$v = $this->_where("id, nombre, correo","nombre LIKE '%$search%' OR correo LIKE '%$search%'")->get();
		}else{
			$v = $this->_all("id, nombre, correo")->get();
		}
		foreach ($v as $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
	public function registrados(){
		return $this->_all("id")->count();
	}
	public function locales(){
		return $this->_where("id","id_ciudad='986'")->count();
	}
	public function foraneos(){
		return $this->_where("id","id_ciudad<>'986'")->count();
	}
	public function nodocs(){
		$total = 0;
		$r = $this->_custom("SELECT * FROM usuarios_documentos")->get();
		foreach ($r as $key => $value) {
			if($value->tipo_foraneo== '1'){
				if($value->url_pago == '#' || $value->url_permiso == '#') $total++;
			}elseif($value->tipo_foraneo == '0'){
				if($value->url_permiso == '#') $total++;
			}
		}
		return $total;
	}
	public function hospedaje(){
		return $this->_where("id","hospedaje='1'")->count();
	}
	public function acompana(){
		return $this->_where("id","acompana='1'")->count();
	}
	public function realtime(){
		return array(
			'registrados'=>$this->registrados(), 
			'locales'=>$this->locales(), 
			'foraneos'=>$this->foraneos(), 
			'nodocs'=>$this->nodocs(), 
			'hospedaje'=>$this->hospedaje(), 
			'acompana'=>$this->acompana()
			);
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
		if($v){
			foreach ($v as $key => $value) {
				$key = utf8_encode($key);
				$v->$key = utf8_encode($value);
			}
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
		$v = $this->_custom("SELECT id_carrera, nombre FROM usuario_carrera LEFT JOIN carreras ON carreras.id=usuario_carrera.id_carrera WHERE id_usuario='$id' ORDER BY create_at ASC")->get();
		foreach ($v as $key => $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
	public function getTalleres( $id ){
		$v = $this->_custom("SELECT id_taller, nombre FROM usuario_taller LEFT JOIN talleres ON talleres.id=usuario_taller.id_taller WHERE id_usuario='$id' ORDER BY create_at ASC")->get();
		foreach ($v as $key => $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
}
?>