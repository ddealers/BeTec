<?php
require_once('db.class.php');
class AdminClass extends MYDB{
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
		$this->table = 'admin_login';
	}
	public function rows(){
		$v = $this->_all("id_login, s_login_user,s_login_permission,s_login_email")->get();
		return $v;
	}
	public function create($usr,$pwd,$per,$mail){
		$data = array('s_login_user'=>$usr, 's_login_clave'=>$pwd, 's_login_permission'=>$per,'s_login_email'=>$mail);
		$v = $this->_insert($data);
		return $v;
	}
	public function del($id){
		$condition = "id_login=$id";
		$v = $this->_delete($condition);
		return $v;
	}
	public function login($user, $pass){
		$response = false;
		$v = $this->_where("id_login, s_login_user, s_login_permission", "s_login_user = '$user' AND s_login_clave = '$pass'");

		if($v){
			$data = $v->first();
			session_start();
			$_SESSION['user'] = $data;
			$response = true;
		}
		return $response;
	}

	public function recuperar($email, $msg, $newpass){
		$response['status'] = false;
		$response['uri'] = '69';

		$v = $this->_where('*', "s_login_email = '$email' ")->first();
		if($v){
			//Genera pass y manda mail
			$data = array('s_login_clave' => $newpass);
			$condition = "s_login_email = '$email'";
			$w = $this->_update( $data, $condition);
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

	public function boleto($idu, $nombre, $email, $correo){
		$response = false;
		
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf8' . "\r\n";
		$cabeceras .= 'From: btec.mty@servicios.itesm.mx' . "\r\n" . 'Reply-To: btec.mty@servicios.itesm.mx' . "\r\n";
		$cabeceras .= "Bcc:ccpin.mty@itesm.mx \r\n";

		$boleto = "http://borntobetec.mty.itesm.mx/boleto.php?s=".$correo;
		$data = '';
		
		$q = "SELECT talleres.dia, talleres.nombre FROM talleres, usuario_taller WHERE usuario_taller.id_usuario = '$idu' AND usuario_taller.id_taller = talleres.id ORDER BY usuario_taller.create_at ASC ";
		$v = $this->_custom($q)->get();
		for ($i=0; $i < 5; $i++) { 
			$day = ($v[$i]->dia == '1') ? 'Viernes 21 Noviembre' : 'Sábado 22 Noviembre' ;
			$num = $i + 1;
			$data .= "<tr><td>" .$num.")". utf8_encode($v[$i]->nombre) ."</td><td>".$day."</td></tr>";
		}
		
		$mail = "
		<!DOCTYPE html>
		<html lang='es'>
		<head>
		<meta charset='UTF-8'>
		<title>Mail</title>
		</head>
		<style type='text/css'>
			a{
				color: #00b7ff;
			}
			a:visited{
				color: #00b7ff;
			}
			body{
				font-family: 'Times New Roman', Times, serif;
				font-size: 18px;
				height: 100%;
				width: 600px;
			}
			figure{
				position: relative;
				margin-left: 35%;
				width: 147px;
			}
			img{
				width: 100%;
			}
			h3{
				text-align: center;
				color: #424040;
			}
			p{
				font-size: 0.8em;
				text-align: justify;
				padding-left: 10px;
				padding-right: 30px;

			}
			p>strong{
				color: #000;
				font-size: 0.9em;
			}
			hr{
				border: 0.5;
				border-color: #000;
			}
			ul{
				margin: 0;
				padding: 0;
				position: relative;
				left: 8px;
				list-style: none;
				display: inline;
				font-size: 0.8em;
				line-height: 20px;

			}
			footer{
				text-align: center;
				font-size: 0.8em;
				margin-left: 50px;
				margin-right: 50px;
			}
			footer>h4{
				margin-top: 20px;
				margin-left: -15px;
				margin-bottom: -1px;
				line-height: 10px;
				text-align: left;
				font-size: 0.8em;

			}
			li{
				border-width: 1px;
				border-bottom: dashed;
				border-color: #ccc;
			}
			li:last-child{
				border-width: 0px;
				border-bottom: none;
			}
			.aviso{
				line-height: 1px;
			}
			.cuadro{
				border-top: 10px solid #06ba4e;
				background-color: #fff;
				padding: 25px;
			}
			.lista_link{
				position: relative;
				float: right;
				margin-right: 70px;
			}
		</style>
		<body>
			<div class='cuadro'>
			<figure>
			<img src='http://borntobetec.mty.itesm.mx/img/logo.png' />
			</figure>
			<h3 style='line-height: 1px;'>Tu reservación para BORN TO BE TEC está completa.</h3>
			<span style='color:#cfcfcf; text-align:center;'>Tecnológico de Monterrey, Campus Monterrey - 21 y 22 de noviembre de 2014</span>
			<p>
			Encontrarás tu boleto en <a href='".$boleto."'>".$boleto."</a><strong style='text-transform:uppercase;'>  Imprímelo y Tráelo contigo el día del evento.</strong><br /><br />
			<span>
			<strong>Nombre: </strong> ".$nombre."
			</span>
			</p>
			<br />
			<p class='aviso'>
			<table>
			<tr>
			<th>Talleres elegidos</th>
			<th>Fecha de taller</th>
			</tr>
			".$data."
			</table>
			</p>
			</div>
			<footer>
				<p>
				<e style='font-size:0.9em;'>TECNOLÓGICO DE MONTERREY</e><br/>
				Av Eugenio Garza Sada 2501 Sur, Tecnológico, 64849 Monterrey, Nuevo León. Si tienes alguna
				duda relacionada con el evento <i>Born To Be Tec</i> llámanos al 01 800 832 33 689 o al (81) 8158 2269,
				escríbenos a <a href='mailto:btec.mty@servicios.itesm.mx'>btec.mty@servicios.itesm.mx</a>
				</p>
			</footer>
		</body>
		</html>";

		if(mail($email, 'Registro Completo', $mail, $cabeceras)){
			$response = true;
		}

		echo $response;
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
		SET moneterrey = {$data['tecno']} 
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
		/*
		$q = "UPDATE talleres SET libres=libres+1 WHERE id = {$data['ptav1']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres+1 WHERE id = {$data['ptav2']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres+1 WHERE id = {$data['ptav3']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres+1 WHERE id = {$data['ptas1']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres+1 WHERE id = {$data['ptas2']}";
		$u = $this->_custom($q);
		*/
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tav1']}', '$tsv1',1)";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tav2']}', '$tsv2',2)";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tav3']}', '$tsv3',3)";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tas1']}', '$tss1',4)";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES({$data['idu']}, '{$data['tas2']}', '$tss2',5)";
		$i = $this->_custom($q);
		/*
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tav1']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tav2']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tav3']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tas1']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tas2']}";
		$u = $this->_custom($q);
		*/
		$response = 'true';

		return $response;
	}
	public function delete( $id ){
		$q = "SELECT id_taller FROM usuario_taller WHERE id_usuario='$id'";
		$t = $this->_custom($q)->get();
		foreach ($t as $key => $value) {
			$q = "UPDATE talleres SET libres=libres+1 WHERE id={$value->id_taller}";
		}
		$q = "DELETE FROM usuarios WHERE id = $id";
		$d = $this->_custom($q);
		return $d->get();
	}
	public function save($data, $ur){ 
		$response = 'false';
		$data['nombre'] = utf8_decode($data['nombre']);
		$data['acompana'] = utf8_decode($data['acompana']);
		
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf8' . "\r\n";
		$cabeceras .= 'From: btec.mty@servicios.itesm.mx' . "\r\n" . 'Reply-To: btec.mty@servicios.itesm.mx' . "\r\n";
		$cabeceras .= "Bcc:ccpin.mty@itesm.mx \r\n";

		$boleto = "http://borntobetec.mty.itesm.mx/boleto.php?s=".$ur;
		$url = "http://borntobetec.mty.itesm.mx/documentacion.php?s=".$ur;
		$datos = '';
		$subeDocs = ($data['hotel'] == '1') ? '1' : '0' ;
		
		$q = "INSERT INTO usuarios VALUES (NULL, {$data['genero']}, '{$data['nombre']}', '{$data['cumple']}', '{$data['email']}', '{$data['tel']}', '{$data['cel']}', {$data['estado']}, {$data['ciudad']}, {$data['prepa']}, '{$data['ingreso']}', {$data['hotel']}, {$data['solo']}, {$data['medio']}, 0, NOW())";

		$idu = $this->_custom($q)->get();
		
		if($data['hotel'] == '1' && $data['solo'] == '1'){
			$q = "INSERT INTO usuario_follow VALUES(NULL, $idu, '{$data['perentesco']}', '{$data['acompana']}')";
			$this->_custom($q);
		}

		if($city == '986'){
			$q = "INSERT INTO usuarios_documentos VALUES(NULL, $idu, '-', '-', '$subeDocs')";
			$v = $mysqli->query($q);
		}else{
			$q = "INSERT INTO usuarios_documentos VALUES(NULL, $idu, '#', '#', '$subeDocs')";
			$v = $mysqli->query($q);
		}
		$q = "INSERT INTO usuarios_prepa VALUES ($idu, '{$data['nomprepa']}')";
		$v = $mysqli->query($q);

		$q = "INSERT INTO usuarios_info VALUES($idu, {$data['tecno']}, '')";
		$v = $this->_custom($q);

		//Carreras
		$ts1 = date('Y-m-d H:i:s', time());
		$ts2 = date('Y-m-d H:i:s', time() + 1);
		$ts3 = date('Y-m-d H:i:s', time() + 2);

		$q = "INSERT INTO usuario_carrera VALUES($idu, '{$data['car1']}', '$ts1')";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_carrera VALUES($idu, '{$data['car2']}', '$ts2')";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_carrera VALUES($idu, '{$data['car3']}', '$ts3')";
		$i = $this->_custom($q);
		
		//Talleres
		$tsv1 = date('Y-m-d H:i:s', time());
		$tsv2 = date('Y-m-d H:i:s', time() + 1);
		$tsv3 = date('Y-m-d H:i:s', time() + 2);
		$tss1 = date('Y-m-d H:i:s', time() + 3);
		$tss2 = date('Y-m-d H:i:s', time() + 4);
		
		/*
		$q = "SELECT id, nombre FROM talleres WHERE id='{$data['tav1']}' AND libres > 0";
		if($this->_custom($q)->count() <= 0){
			echo json_encode(array('error'=>'El taller del Viernes a las 16:30 está lleno, elige otro.'));
			return;
		}
		$q = "SELECT id, nombre FROM talleres WHERE id='{$data['tav2']}' AND libres > 0";
		if($this->_custom($q)->count() <= 0){
			echo json_encode(array('error'=>'El taller del Viernes a las 17:40 está lleno, elige otro.'));
			return;
		}
		$q = "SELECT id, nombre FROM talleres WHERE id='{$data['tav3']}' AND libres > 0";
		if($this->_custom($q)->count() <= 0){
			echo json_encode(array('error'=>'El taller del Viernes a las 18:40 está lleno, elige otro.'));
			return;
		}
		$q = "SELECT id, nombre FROM talleres WHERE id='{$data['tas1']}' AND libres > 0";
		if($this->_custom($q)->count() <= 0){
			echo json_encode(array('error'=>'El taller del Sábado a las 9:00 está lleno, elige otro.'));
			return;
		}
		$q = "SELECT id, nombre FROM talleres WHERE id='{$data['tas2']}' AND libres > 0";
		if($this->_custom($q)->count() <= 0){
			echo json_encode(array('error'=>'El taller del Sábado a las 11:45 está lleno, elige otro.'));
			return;
		}
		*/
		$q = "INSERT INTO usuario_taller VALUES($idu, '{$data['tav1']}', '$tsv1',1)";
		$i = $this->_custom($q);	
		$q = "INSERT INTO usuario_taller VALUES($idu, '{$data['tav2']}', '$tsv2',2)";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES($idu, '{$data['tav3']}', '$tsv3',3)";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES($idu, '{$data['tas1']}', '$tss1',4)";
		$i = $this->_custom($q);
		$q = "INSERT INTO usuario_taller VALUES($idu, '{$data['tas2']}', '$tss2',5)";
		$i = $this->_custom($q);
		/*
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tav1']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tav2']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tav3']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tas1']}";
		$u = $this->_custom($q);
		$q = "UPDATE talleres SET libres=libres-1 WHERE id = {$data['tas2']}";
		$u = $this->_custom($q);
		*/

		//CORREOS
		$q = "SELECT talleres.dia, talleres.nombre FROM talleres, usuario_taller WHERE usuario_taller.id_usuario = '$idu' AND usuario_taller.id_taller = talleres.id ORDER BY usuario_taller.create_at ASC ";
		$v = $this->_custom($q)->get();

		for ($i=0; $i < 5; $i++) { 
			$day = ($v[$i]->dia == '1') ? 'Viernes 21 Noviembre' : 'Sábado 22 Noviembre' ;
			$num = $i + 1;
			$datos .= "<tr><td>" .$num.")". utf8_encode($v[$i]->nombre) ."</td><td>".$day."</td></tr>";
		}


		$mail_FA = "
		<!DOCTYPE html>
		<html lang='es'>
		<head>
		<meta charset='UTF-8'>
		<title>Mail</title>
		</head>
		<style type='text/css'>
			a{
				color: #00b7ff;
			}
			a:visited{
				color: #00b7ff;
			}
			body{
				font-family: 'Times New Roman', Times, serif;
				font-size: 18px;
				height: 100%;
				width: 600px;
			}
			figure{
				position: relative;
				margin-left: 35%;
				width: 147px;
			}
			img{
				width: 100%;
			}
			h3{
				text-align: center;
				color: #424040;
			}
			p{
				font-size: 0.8em;
				text-align: justify;
				padding-left: 10px;
				padding-right: 30px;

			}
			p>strong{
				color: #000;
				font-size: 0.9em;
			}
			hr{
				border: 0.5;
				border-color: #000;
			}
			ul{
				margin: 0;
				padding: 0;
				position: relative;
				left: 8px;
				list-style: none;
				display: inline;
				font-size: 0.8em;
				line-height: 20px;

			}
			footer{
				text-align: center;
				font-size: 0.8em;
				margin-left: 50px;
				margin-right: 50px;
			}
			footer>h4{
				margin-top: 20px;
				margin-left: -15px;
				margin-bottom: -1px;
				line-height: 10px;
				text-align: left;
				font-size: 0.8em;

			}
			li:first-child{
				border-width: 1px;
				border-bottom: dashed;
				border-color: #ccc;
			}
			.aviso{
				line-height: 1px;
			}
			.cuadro{
				border-top: 10px solid #fc2f7a;
				background-color: #fff;
			}
			.lista_link{
				position: relative;
				float: right;
				margin-right: 70px;
			}
		</style>
		<body>
			<div class='cuadro'>
			<figure>
			<img src='http://borntobetec.mty.itesm.mx/img/logo.png' />
			</figure>
			<h3>Tu reservación para BORN TO BE TEC está casi completa.</h3>
			<p>
			Ingresa al siguiente link para subir tu <strong>Carta Compromiso</strong> correctamente llenada y
			firmada por tus padres, así como tu <strong>comprobante de depósito bancario </strong> por los
			$500.00 pesos: <a href='".$url."'>".$url."</a>.<br /><br />
			Tienes hasta el 18 de noviembre de 2014 para realizar este proceso, de lo
			contrario tu registro no podrá ser confirmado. ¡Date prisa que los lugares se
			acaban!.
			</p>
			<br />
			<p class='aviso'>
			<strong>¿No encuentras los formatos? Descárgalos de aquí</strong>
			<hr />
			<ul>
			<li>- Carta Compromiso <a href='http://borntobetec.mty.itesm.mx/download/FormatodeCartaCompromisao_2014_BTEC.pdf' class='lista_link'>http://bitl.ly/334ds</a></li>
			<li>- Ficha Bancaria   <a href='http://borntobetec.mty.itesm.mx/download/FormatodeCuentaBancaria.jpg' class='lista_link'>http://bitl.ly/2fd8ab</a></li>
			</ul>
			</p>
			</div>
			<footer>
			<p>
			<e style='font-size:0.9em;'>TECNOLÓGICO DE MONTERREY</e><br/>
			Av Eugenio Garza Sada 2501 Sur, Tecnológico, 64849 Monterrey, Nuevo León. Si tienes alguna
			duda relacionada con el evento <i>Born To Be Tec</i> llámanos al 01 800 832 33 689 o al (81) 8158 2269,
			escríbenos a <a href='mailto:btec.mty@servicios.itesm.mx'>btec.mty@servicios.itesm.mx</a>
			</p>
			</footer>
		</body>
		</html>
		";

		$mail_FB = "
		<!DOCTYPE html>
		<html lang='es'>
		<head>
		<meta charset='UTF-8'>
		<title>Mail</title>
		</head>
		<style type='text/css'>
			a{
				color: #00b7ff;
			}
			a:visited{
				color: #00b7ff;
			}
			body{
				font-family: 'Times New Roman', Times, serif;
				font-size: 18px;
				height: 100%;
				width: 600px;
			}
			figure{
				position: relative;
				margin-left: 35%;
				width: 147px;
			}
			img{
				width: 100%;
			}
			h3{
				text-align: center;
				color: #424040;
			}
			p{
				font-size: 0.8em;
				text-align: justify;
				padding-left: 10px;
				padding-right: 30px;

			}
			p>strong{
				color: #000;
				font-size: 0.9em;
			}
			hr{
				border: 0.5;
				border-color: #000;
			}
			ul{
				margin: 0;
				padding: 0;
				position: relative;
				left: 8px;
				list-style: none;
				display: inline;
				font-size: 0.8em;
				line-height: 20px;

			}
			footer{
				text-align: center;
				font-size: 0.8em;
				margin-left: 50px;
				margin-right: 50px;
			}
			footer>h4{
				margin-top: 20px;
				margin-left: -15px;
				margin-bottom: -1px;
				line-height: 10px;
				text-align: left;
				font-size: 0.8em;

			}
			li:first-child{
				border-width: 1px;
				border-bottom: dashed;
				border-color: #ccc;
			}
			.aviso{
				line-height: 1px;
			}
			.cuadro{
				border-top: 10px solid #fc2f7a;
				background-color: #fff;
			}
			.lista_link{
				position: relative;
				float: right;
				margin-right: 70px;
			}
		</style>
		<body>
			<div class='cuadro'>
			<figure>
			<img src='http://borntobetec.mty.itesm.mx/img/logo.png' />
			</figure>
			<h3>Tu reservación para BORN TO BE TEC está casi completa.</h3>
			<p>
			Ingresa al siguiente link para subir tu <strong>Carta Compromiso</strong> correctamente llenada y
			firmada por tus padres: <a href='".$url."'>".$url."</a>.<br /><br />
			Tienes hasta el 18 de noviembre de 2014 para realizar este proceso, de lo
			contrario tu registro no podrá ser confirmado. ¡Date prisa que los lugares se
			acaban!.
			</p>
			<br />
			<p class='aviso'>
			<strong>¿No encuentras el formato? Descárgalo de aquí</strong>
			<hr />
			<ul>
			<li>- Carta Compromiso <a href='http://borntobetec.mty.itesm.mx/download/FormatodeCartaCompromisao_2014_BTEC.pdf' class='lista_link'>http://bitl.ly/334ds</a></li>
			</ul>
			</p>
			</div>
			<footer>
			<p>
			<e style='font-size:0.9em;'>TECNOLÓGICO DE MONTERREY</e><br/>
			Av Eugenio Garza Sada 2501 Sur, Tecnológico, 64849 Monterrey, Nuevo León. Si tienes alguna
			duda relacionada con el evento <i>Born To Be Tec</i> llámanos al 01 800 832 33 689 o al (81) 8158 2269,
			escríbenos a <a href='mailto:btec.mty@servicios.itesm.mx'>btec.mty@servicios.itesm.mx</a>
			</p>
			</footer>
		</body>
		</html>
		";

		$mail = "
		<!DOCTYPE html>
		<html lang='es'>
		<head>
		<meta charset='UTF-8'>
		<title>Mail</title>
		</head>
		<style type='text/css'>
			a{
				color: #00b7ff;
			}
			a:visited{
				color: #00b7ff;
			}
			body{
				font-family: 'Times New Roman', Times, serif;
				font-size: 18px;
				height: 100%;
				width: 600px;
			}
			figure{
				position: relative;
				margin-left: 35%;
				width: 147px;
			}
			img{
				width: 100%;
			}
			h3{
				text-align: center;
				color: #424040;
			}
			p{
				font-size: 0.8em;
				text-align: justify;
				padding-left: 10px;
				padding-right: 30px;

			}
			p>strong{
				color: #000;
				font-size: 0.9em;
			}
			hr{
				border: 0.5;
				border-color: #000;
			}
			ul{
				margin: 0;
				padding: 0;
				position: relative;
				left: 8px;
				list-style: none;
				display: inline;
				font-size: 0.8em;
				line-height: 20px;

			}
			footer{
				text-align: center;
				font-size: 0.8em;
				margin-left: 50px;
				margin-right: 50px;
			}
			footer>h4{
				margin-top: 20px;
				margin-left: -15px;
				margin-bottom: -1px;
				line-height: 10px;
				text-align: left;
				font-size: 0.8em;

			}
			li{
				border-width: 1px;
				border-bottom: dashed;
				border-color: #ccc;
			}
			li:last-child{
				border-width: 0px;
				border-bottom: none;
			}
			.aviso{
				line-height: 1px;
			}
			.cuadro{
				border-top: 10px solid #06ba4e;
				background-color: #fff;
				padding: 25px;
			}
			.lista_link{
				position: relative;
				float: right;
				margin-right: 70px;
			}
		</style>
		<body>
			<div class='cuadro'>
			<figure>
			<img src='http://borntobetec.mty.itesm.mx/img/logo.png' />
			</figure>
			<h3 style='line-height: 1px;'>Tu reservación para BORN TO BE TEC está completa.</h3>
			<span style='color:#cfcfcf; text-align:center;'>Tecnológico de Monterrey, Campus Monterrey - 21 y 22 de noviembre de 2014</span>
			<p>
			Encontrarás tu boleto en <a href='".$boleto."'>".$boleto."</a><strong style='text-transform:uppercase;'>  Imprímelo y Tráelo contigo el día del evento.</strong><br /><br />
			<span>
			<strong>Nombre: </strong> ".$data['nombre']."
			</span>
			</p>
			<br />
			<p class='aviso'>
			<table>
			<tr>
			<th>Talleres elegidos</th>
			<th>Fecha de taller</th>
			</tr>
			".$datos."
			</table>
			</p>
			</div>
			<footer>
				<p>
				<e style='font-size:0.9em;'>TECNOLÓGICO DE MONTERREY</e><br/>
				Av Eugenio Garza Sada 2501 Sur, Tecnológico, 64849 Monterrey, Nuevo León. Si tienes alguna
				duda relacionada con el evento <i>Born To Be Tec</i> llámanos al 01 800 832 33 689 o al (81) 8158 2269,
				escríbenos a <a href='mailto:btec.mty@servicios.itesm.mx'>btec.mty@servicios.itesm.mx</a>
				</p>
			</footer>
		</body>
		</html>";

		if($data['ciudad'] == 986){
			$send = mail($data['email'], 'Registro Completo', $mail, $cabeceras);
		}elseif ($data['ciudad'] != 986 && $data['hotel'] == '1' && $data['solo'] == '1') {
			$send = mail($data['email'], 'Completa tu Registro', $mail_FA, $cabeceras);
		}elseif($data['ciudad'] != 986 && $data['hotel'] == '1' && $data['solo'] == '0'){
			$send = mail($data['email'], 'Completa tu Registro', $mail_FB, $cabeceras);
		}

		if($send){
			$response = 'true';
		}else{
			$response = 'false';
		}

		echo $response;
	}
}
class Validator{
	
	public static $errors;
	public static $valid = true;
	
	public static function validate( $fields ){
		foreach($fields as  $field ){
			$rules = explode( ",", $field['rules'] );
			$value = $field['value'];
			$name = $field['name'];
			foreach( $rules as $rule ){
				self::$rule( $name, $value );
			}
		}
	}
	
	private static function required( $name, $value ){
		if( !isset($value) || empty( $value ) ){
			self::$valid = false;
			self::$errors[] = "el campo " . $name . " es requerido";
		}
	}
	
	private function file( $name, $value ){
		if( !isset($value) || empty( $value ) ){
			self::$valid = false;
			self::$errors[] = "el campo " . $name . " es requerido";
		}
		if ($value['error'] > 0){
  			self::$errors[] = $value['error'];
  		}
	}
	private static function selection( $name, $value ){
		if( $value=="-1" ){
			self::$valid = false;
			self::$errors[] = "no has seleccionado un valor para " . $name;
		}
	}
	
	private static function email( $name, $value ){
		$mail_rule = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
		if( !preg_match( $mail_rule, $value ) ){
			self::$valid = false;
			self::$errors[] = "el campo " . $name . " no está bien escrito";
		}
	}
	
	private static function phone( $name, $value ){
		$phone_rule = "/^[0-9]{10}$/";
		if( !preg_match( $phone_rule, $value ) ){
			self::$valid = false;
			self::$errors[] = "el campo " . $name . " tiene caracteres inválidos";
		}
	}
	
	private static function ticket( $name, $value ){
		
	}
}
?>