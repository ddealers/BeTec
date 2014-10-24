<?php
require_once("../config.php");
setlocale(LC_ALL,"es_ES");
//variales FORM
$hora = date('YmdHms');
$s = $_POST['string'];
$key = 'BornToBeTec321_';
$idu = $_POST['idu'];
$ruta = $_POST['ruta'];
$permiso = false;
$pago = false;
$res = false;

function desencriptarURL($string, $key){
	$result = '';
	$string = base64_decode($string);
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	}
	return $result;
}

$boleto = "http://$_SERVER[HTTP_HOST]/boleto.php?s=".$s;
$correo = desencriptarURL($s, $key);
$mysqli = new mysqli(HOST,USR,PWD,DB);	

	//Mover
	if(isset($_FILES['carta']) && $_FILES['carta'] != NULL){
		$uname = str_replace(' ', '', $_FILES['carta']['name']);
		$name0 = $hora . $uname;
		//$mime = mime_content_type($_FILES['carta']['tmp_name']);
		//if($mime == 'image/png' || $mime == 'image/jpeg' || $mime == 'application/pdf'){
			$mv0 = move_uploaded_file($_FILES['carta']['tmp_name'], $ruta.$name0);

			$q = "UPDATE usuarios_documentos SET url_permiso = '$name0' WHERE id_usuario = '$idu' ";
			$v = $mysqli->query($q);
			if($v){
				$permiso = true;
			}
		//}else{
		//	$error = 'El formato del archivo es incorrecto, sólo puedes subir archivos PNG, JPG o PDF';
		//}
	}
	if(isset($_FILES['banco']) && $_FILES['banco'] != NULL){
		$uname1 = str_replace(' ', '', $_FILES['banco']['name']);
		$name1 = $hora . $uname1;
		//$mime = mime_content_type($_FILES['carta']['tmp_name']);
		//if($mime == 'image/png' || $mime == 'image/jpeg' || $mime == 'application/pdf'){
			$mv1 = move_uploaded_file($_FILES['banco']['tmp_name'], $ruta.$name1);

			$q = "UPDATE usuarios_documentos SET url_pago = '$name1' WHERE id_usuario = '$idu' ";
			$v = $mysqli->query($q);
			if($v){
				$pago = true;
			}
		//}else{
		//	$error = 'El formato del archivo es incorrecto, sólo puedes subir archivos PNG, JPG o PDF';
		//}
	}
	$q = "SELECT * FROM usuarios_documentos WHERE id_usuario = '$idu' ";
	$v = $mysqli->query($q);
	if($v){
		$row = $v->fetch_assoc();
		if($row['tipo_foraneo'] == '1'){
			$res = ($row['url_pago'] != '#' && $row['url_permiso'] != '#');
		}elseif($row['tipo_foraneo'] == '0'){
			$res = $row['url_permiso'] != '#';
		}
	}
	if($error){
		header("Location: ../documentacion.php?s=$s&e=$error");
	}
	if($res){
		$data = '';
		$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf8' . "\r\n";
		$cabeceras .= 'From: no-reply@servicios.itesm.mx' . "\r\n" . 'Reply-To: btec.mty@servicios.itesm.mx' . "\r\n";

		$qn = "SELECT nombre FROM usuarios WHERE id = $idu";
		$r = $mysqli->query($qn);
		if($r){
			while ($rw = $r->fetch_assoc()) {
				$name = $rw['nombre'];
			}
		}
		$q = "SELECT talleres.dia, talleres.nombre FROM talleres, usuario_taller WHERE usuario_taller.id_usuario = '$idu' AND usuario_taller.id_taller = talleres.id ORDER BY talleres.dia ASC ";
		$v = $mysqli->query($q);
		if($v){
			while ($row = $v->fetch_assoc()) {
				$info[] = $row;
			}

			for ($i=0; $i < 5 ; $i++) { 
				$day = ($info[$i]['dia'] == '1') ? 'Viernes 21 Noviembre' : 'Sábado 22 Noviembre' ;
				$num = $i + 1;
				$data .= "<tr><td>" .$num.")". utf8_encode($info[$i]['nombre']) ."</td><td>".$day."</td></tr>";
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
				<strong>Fecha de reservación: </strong> ".strftime('%d de %B del %Y')."<br />
				<strong>Nombre: </strong> ".$name."
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
			</html>
			";
		}
		mail($correo, 'Registro Completo', $mail, $cabeceras);
		header("Location: ../boleto.php?s=$s");
	}else{
		header("Location: ../documentacion.php?s=$s");
	}
?>