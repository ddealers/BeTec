<?php
require_once('db.class.php');

class Usuario extends MYDB{
	
	public function __construct(){
		parent::__construct();
		$this->table = 'usuarios';
	}

	public function rows($search = false, $from = false, $docs = false, $habitacion = false, $compania = false, $checkin = false){
		$condition = "SELECT * FROM `usuarios` ";
		if($docs){
			$condition .= "LEFT JOIN `usuarios_documentos` ON usuarios.id = usuarios_documentos.id_usuario ";
		}
		if($checkin){
			$condition .= "LEFT JOIN `checkin` ON usuarios.id = checkin.id_usuario ";
		}
		$condition .= "WHERE 1 ";
		if($from){
			switch ($from) {
				case '1':
					$condition .= "AND id_ciudad='986' ";
					break;
				case '2':
					$condition .= "AND id_ciudad<>'986' ";
					break;
			}
		}
		if($docs){
			$condition .= "AND ((`tipo_foraneo`=1 AND `url_pago`='#' OR `url_permiso`='#') OR (`tipo_foraneo`=0 AND `url_permiso`='#')) ";	
		}
		if($habitacion){
			$condition .= "AND `hospedaje`=1 ";	
		}
		if($compania){
			$condition .= "AND `acompana`=1 ";
		}
		if($search){
			$condition .= " AND (nombre LIKE '%$search%' OR correo LIKE '%$search%')";
		}
		if($checkin){
			$condition .= "AND id_check != 'NULL' GROUP BY usuarios.id ";
		}
		$condition .= "ORDER BY usuarios.id";
		//echo $condition;
		$v = $this->_custom($condition)->get();
		if($v){
			foreach ($v as $value) {
				$value->nombre = utf8_encode($value->nombre);
				$value->checkin = $this->getCheckin($value->id);
			}
		}
		return $v;
	}
	public function excel_rows($search = false, $from = false, $docs = false, $habitacion = false, $compania = false, $checkin = false){
		$condition = "SELECT usuarios.id,genero,nombre,cumpleanos AS nacimiento,correo,telefono,celular,id_estado AS estado, id_ciudad AS ciudad, id_prepa AS preparatoria, graduacion, hospedaje, acompana, id_medio AS medio FROM `usuarios` ";
		if($docs){
			$condition .= "LEFT JOIN `usuarios_documentos` ON usuarios.id = usuarios_documentos.id_usuario ";
		}
		if($checkin){
			$condition .= "LEFT JOIN `checkin` ON usuarios.id = checkin.id_usuario ";
		}
		$condition .= "WHERE 1 ";
		if($from){
			switch ($from) {
				case '1':
					$condition .= "AND id_ciudad='986' ";
					break;
				case '2':
					$condition .= "AND id_ciudad<>'986' ";
					break;
			}
		}
		if($docs){
			$condition .= "AND ((`tipo_foraneo`=1 AND `url_pago`='#' OR `url_permiso`='#') OR (`tipo_foraneo`=0 AND `url_permiso`='#')) ";	
		}
		if($habitacion){
			$condition .= "AND `hospedaje`=1 ";	
		}
		if($compania){
			$condition .= "AND `acompana`=1 ";
		}
		if($search){
			$condition .= " AND (nombre LIKE '%$search%' OR correo LIKE '%$search%')";
		}
		if($checkin){
			$condition .= "AND id_check != 'NULL' GROUP BY usuarios.id ";
		}
		$condition .= "ORDER BY usuarios.id";
		//echo $condition;
		$v = $this->_custom($condition)->get();
		if($v){
			foreach ($v as $value) {
				$value->nombre = utf8_encode($value->nombre);
			}
		}
		return $v;
	}
	public function checkins(){
		return $this->_custom("SELECT * FROM checkin GROUP BY id_usuario")->count();
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
	public function byMail( $mail ){
		$v = $this->_where("*","correo='$mail'")->first();
		if($v){
			foreach ($v as $key => $value) {
				$key = utf8_encode($key);
				$v->$key = utf8_encode($value);
			}
		}
		return $v;
	}
	public function checkin( $id ){
		$q = "INSERT INTO checkin VALUES(NULL,$id,NULL)";
		$v = $this->_custom($q)->get();
		return $v;
	}
	public function removeCheckin( $id ){
		$q = "DELETE FROM checkin WHERE id_usuario=$id";
		$v = $this->_custom($q)->get();
		return $v;
	}
	public function getCheckin($id){
		$q = "SELECT * FROM checkin WHERE id_usuario=$id";
		$chk = $this->_custom($q)->get();
		return $chk;
	}
	public function getPrepa( $id ){
		$v = $this->_custom("SELECT id_usuario, nombre_prepa FROM usuarios_prepa WHERE id_usuario='$id'")->first();
		if($v){
			foreach ($v as $key => $value) {
				$key = utf8_encode($key);
				$v->$key = utf8_encode($value);
			}
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
		if($v){
			foreach ($v as $key => $value) {
				$key = utf8_encode($key);
				$v->$key = utf8_encode($value);
			}
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
		$v = $this->_custom("SELECT id_taller, nombre FROM usuario_taller LEFT JOIN talleres ON talleres.id=usuario_taller.id_taller WHERE id_usuario='$id' ORDER BY usuario_taller.horario_taller ASC")->get();
		foreach ($v as $key => $value) {
			$value->nombre = utf8_encode($value->nombre);
		}
		return $v;
	}
}
?>