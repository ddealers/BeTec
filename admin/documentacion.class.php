<?php
require_once('db.class.php');

class Documentacion extends MYDB{
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
		$this->table = 'usuarios_documentos';
	}

	public function documentos($uid){
		$v = $this->_where("url_pago, url_permiso","id_usuario = '$uid' ")->first();
		return $v;
	}
}
?>