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

	public function update($data)
	{ 
		$response = 'false';
		
		$data['nombre'] = utf8_decode($data['nombre']);
		$data['acompana'] = utf8_decode($data['acompana']);
		$q = "UPDATE usuarios 
		SET genero = {$data['genero']}, 
		nombre = '{$data['nombre']}',
		cumpleanos = '{$data['cumple']}',
		correo = '{$data['email']}', 
		telefono = '{$data['tel']}' ,
		celular = '{$data['cel']}', 
		id_medio = {$data['medio']}, 
		id_estado = {$data['estado']}, 
		id_ciudad = {$data['ciudad']}, 
		id_prepa = {$data['prepa']}, 
		graduacion = '{$data['ingreso']}', 
		hospedaje = {$data['hotel']}, 
		acompana = {$data['solo']} 
		WHERE id = '{$data['idu']}'";

		$v = $this->_custom($q);
		
		if($data['hotel'] == '1' && $data['solo'] == '1'){
			$q = "SELECT parentestco, acompanante FROM usuario_follow WHERE id_usuario = '{$data['idu']}'";
			$v = $this->_custom($q)->get();
			if(!$v){
				$q = "INSERT INTO usuario_follow VALUES(NULL, {$data['idu']}, '{$data['perentesco']}', '{$data['acompana']}')";
				$this->_custom($q);
			}else{
				$q = "UPDATE usuario_follow 
				SET parentestco = '{$data['perentesco']}', 
				acompanante = '{$data['acompana']}' 
				WHERE id_usuario = {$data['idu']}";
				$v = $this->_custom($q)->get();
			}
		}
		if($data['hotel'] == '0' || ($data['hotel'] == '1' && $data['solo'] == '0')){
			$q = "SELECT parentestco, acompanante FROM usuario_follow WHERE id_usuario = '{$data['idu']}'";
			$v = $this->_custom($q)->get();
			if($v){
				$q = "DELETE FROM usuario_follow 
				WHERE id_usuario = {$data['idu']}";
				$this->_custom($q);
			}
		}

		$q = "UPDATE usuarios_info 
		SET monterrey = {$data['tecno']} 
		WHERE id = {$data['idu']}";
		$v = $this->_custom($q);

		//Carreras
		$ts1 = date('Y-m-d H:i:s', time());
		$ts2 = date('Y-m-d H:i:s', time() + 1);
		$ts3 = date('Y-m-d H:i:s', time() + 2);
		$q = "DELETE FROM usuario_carrera WHERE id_usuario = {$data['idu']}";
		$d = $this->_custom($q);
		$q = "INSERT INTO usuario_carrera VALUES({$data['idu']}, '{$data['car1']}', '$ts1')";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_carrera VALUES({$data['idu']}, '{$data['car2']}', '$ts2')";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_carrera VALUES({$data['idu']}, '{$data['car3']}', '$ts3')";
		$i = $this->_custom($q);
		
		//Talleres
		$tsv1 = date('Y-m-d H:i:s', time());
		$tsv2 = date('Y-m-d H:i:s', time() + 1);
		$tsv3 = date('Y-m-d H:i:s', time() + 2);
		$tss1 = date('Y-m-d H:i:s', time() + 3);
		$tss2 = date('Y-m-d H:i:s', time() + 4);
		$q = "DELETE FROM usuario_taller WHERE id_usuario = {$data['idu']}";
		$d = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tav1']}', '$tsv1')";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tav2']}', '$tsv2')";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tav3']}', '$tsv3')";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tas1']}', '$tss1')";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tas2']}', '$tss2')";
		$i = $this->_custom($q);
		
		$response = 'true';

		return $response;
	}
	public function delete( $id ){
		$q = "DELETE FROM usuarios WHERE id = $id";
		$d = $this->_custom($q);
		return $d->get();
	}
}
?>