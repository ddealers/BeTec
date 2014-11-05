<?php
require_once('db.class.php');

class AdminClass extends MYDB{
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
		$this->table = 'admin_login';
	}

	public function login($user, $pass){
		$response = false;
		$v = $this->_where("id_login, s_login_user", "s_login_user = '$user' AND s_login_clave = '$pass'");

		if($v->count() == 1){
			$data = $v->get();
			session_start();
			$_SESSION['user'] = $data[0];
			$response = true;
		}
		return $response;
	}

	public function recuperar($email, $msg, $newpass){
		$response['status'] = false;
		$response['uri'] = '69';

		$v = $this->_where('*', "s_login_email = '$email' ");
		
		if($v->count() == 1){
			//Genera pass y manda mail
			$w = $this->_update('s_login_clave = "$newpass"', 's_login_email = "$email"');
			$response['status'] = true;
			$response['uri'] = '100';
			mail($email, 'Recuperar contraseña BTEC ADMIN', $msg);
		}else{
			//EL mail no existe
			$response['status'] = true;
			$response['uri'] = '101';
		}

		return $response;
	}

	public function updateAdmin($genero, $nombre, $cumple, $email, $tel, $cel, $medio, $estado, $ciudad, $prepa, $ingreso, $hotel, $solo, $perentesco, $acompana, $tecno, $car1, $car2, $car3, $tav1, $tav2, $tav3, $tas1, $tas2, $idu)
	{ 
		$response = 'false';
		
		$nombre = utf8_decode($nombre);
		$q = "UPDATE usuarios 
		SET genero = $genero, 
		nombre = '$nombre',
		#cumpleaños = '0000-00-00',
		correo = '$email', 
		telefono = '$tel' , 
		celular = '$cel', 
		id_medio = $medio, 
		id_estado = $estado, 
		id_ciudad = $ciudad, 
		id_prepa = $prepa, 
		graduacion = '$ingreso', 
		hospedaje = $hotel, 
		acompana = $solo 
		WHERE id = '$idu'";
		$v = $this->_custom($q);

		$q = "UPDATE usuario_follow 
		SET parentestco = '$perentesco', 
		acompanante = '$acompana' 
		WHERE id_usuario = $idu";

		$v = $this->_custom($q);

		$q = "UPDATE usuarios_info 
		SET monterrey = $tecno 
		WHERE id = $idu";
		
		$v = $this->_custom($q);

		$response = 'true';

		return $response;
	}
}
?>