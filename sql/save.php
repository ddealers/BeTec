<?php
ini_set('display_errors', '0');
setlocale(LC_ALL,"es_ES");
require_once("../config.php");	
$mysqli = new mysqli(HOST,USR,PWD,DB);

$response = 'false';

$key = 'BornToBeTec321_';

function encriptarURL($string, $key){
	$result = '';
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return base64_encode($result);
}

$ur = encriptarURL($_POST['email'], $key);
$url = "http://$_SERVER[HTTP_HOST]/documentacion?s=".$ur;

//var_dump($_REQUEST);
$genero  = $_POST['genero'];
$nombre	 = $_POST['nombre'];
$cumple	 = $_POST['cumple'];
$email	 = $_POST['email'];
$numero	 = $_POST['numero'];
$cel	 = $_POST['cel'];


$carrera = $_POST['carrera'];
$car1	 = $_POST['car1'];
$car2	 = $_POST['car2'];
$car3	 = $_POST['car3'];
$campus = $_POST['campus'];
$campus_escuela = $_POST['campus_escuela'];


$state	 = $_POST['state'];
$city	 = $_POST['city'];
$prep	 = $_POST['prep'];
$grad	 = $_POST['grad'];

$hotel	 = $_POST['hotel'];
$solo	 = $_POST['solo'];


$pare	 = $_POST['pare'];
$namep	 = $_POST['namep'];



$vopt1	 = $_POST['vopt1'];
$vopt2	 = $_POST['vopt2'];
$vopt3	 = $_POST['vopt3'];
$sopt	 = $_POST['sopt'];


$evento	 = $_POST['evento'];

$subeDocs = ($_POST['hotel'] == '1') ? '1' : '0' ;

$q = "INSERT INTO usuarios VALUES(NULL, '$genero', '$nombre', '$cumple', '$email', '$numero', '$cel', '$state', '$city', '$prep', '$grad', '$hotel', '$solo', '$evento', '$subeDocs',  CURRENT_TIMESTAMP )";
//echo $sql;
$v = $mysqli->query($q);
if($v){
	$idu = $mysqli->insert_id;

	for ($i=1; $i < 4; $i++) { 
		$q = "INSERT INTO usuario_carrera VALUES($idu, $car$i, CURRENT_TIMESTAMP)";
		$v = $mysqli->query($q);
	}

	for ($i=1; $i < 4; $i++) { 
		$qp = "INSERT INTO usuario_taller VALUES($idu, $vopt$i, CURRENT_TIMESTAMP)";
		$vp = $mysqli->query($qp);
	}

	$qw = "INSERT INTO usuario_taller VALUES($idu, $sopt, CURRENT_TIMESTAMP)";
	$vw = $mysqli->query($qw);

	$qd = "INSERT INTO usuarios_documentos VALUES(NULL, $idu, '#', '#', '$subeDocs')";
	$vd = $mysqli->query($qd);

	$qi = "INSERT INTO usuarios_info VALUES($idu, $campus, '$campus_escuela')";
	$vi = $mysqli->query($qi);

	if($v && $vp && $vi){
		$response = 'true';
	}else{
		$response = 'false';
	}
}else{
	$response = 'false';
}

//Si todo bien, envía mails
if($response){
	if($hotel == '0'){
		mail($email, 'Completa tu registro', $mail_FB);
	}elseif ($hotel == '1') {
		mail($email, 'Completa tu registro', $mail_FA);
	}elseif($hotel == '0' && $city = '986'){
		
		$data = '';
		$q = "SELECT talleres.dia, talleres.nombre FROM talleres, usuario_taller WHERE usuario_taller.id_usuario = '$idu' AND usuario_taller.id_taller = talleres.id ORDER BY talleres.dia ASC ";
		$v = $mysqli->query($q);
		if($v){
			while ($row = $v->fetch_assoc()) {
				$info[] = $row;
			}

			for ($i=0; $i < 4 ; $i++) { 
				$day = ($info[$i]['dia'] == '1') ? 'Viernes 21 Noviembre' : 'Sábado 22 Noviembre' ;
				$num = $i +1;
				$data .= "<li>" .$num.")". $info[$i]['nombre'] ." <e class='lista_link'>".$day."</e></li>";
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
						<img src='http://btec.dev/img/logo.png' />
					</figure>
					<h3 style='line-height: 1px;'>Tu reservación para BORN TO BE TEC está completa.</h3>
					<span style='color:#cfcfcf; font-size:0.7em; text-align:center; margin-left: 55px;'>(Tecnológico de Monterrey, Campus Monterrey - 21 y 22 de noviembre de 2014)</span>
					<p>
						Encontrarás tu boleto en un <strong>PDF</strong> al final de este mail, <strong style='text-transform:uppercase;'>Imprímelo y Tráelo contigo el día del evento.</strong><br /><br />
						<span>
							<strong>Fecha de reservación: </strong> ".strftime('%d de %B del %Y')."<br />
							<strong>Nombre: </strong> ".$nombre."
						</span>
					</p>
					<br />
					<p class='aviso'>
						<strong>Talleres elegidos <e style='float:right;'>Fecha de taller</e></strong>
						<hr />
						<ul>
							".$data."
						</ul>
					</p>
					</div>
					<footer>
						<h4>TECNOLÓGICO DE MONTERREY</h4>
						<p>
							Av Eugenio Garza Sada 2501 Sur, Tecnológico, 64849 Monterrey, Nuevo León. Si tienes alguna
							duda relacionada con el evento <i>Born To Be Tec</i> llámanos al 01 800 832 33 689 o al (81) 8158 2269,
							escríbenos a <a href='mailto:btec.mty@servicios.itesm.mx'>btec.mty@servicios.itesm.mx</a>
						</p>
					</footer>
				</body>
				</html>
			";
		}
		mail($email, 'Registro Completo', $mail);
	}
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
		<img src='http://btec.dev/img/logo.png' />
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
			<li>- Carta Compromiso <a href='http://bitl.ly/334ds' class='lista_link'>http://bitl.ly/334ds</a></li>
			<li>- Ficha Bancaria   <a href='http://bitl.ly/2fd8ab' class='lista_link'>http://bitl.ly/2fd8ab</a></li>
		</ul>
	</p>
	</div>
	<footer>
		<h4>TECNOLÓGICO DE MONTERREY</h4>
		<p>
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
		<img src='http://btec.dev/img/logo.png' />
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
			<li>- Carta Compromiso <a href='http://bitl.ly/334ds' class='lista_link'>http://bitl.ly/334ds</a></li>
		</ul>
	</p>
	</div>
	<footer>
		<h4>TECNOLÓGICO DE MONTERREY</h4>
		<p>
			Av Eugenio Garza Sada 2501 Sur, Tecnológico, 64849 Monterrey, Nuevo León. Si tienes alguna
			duda relacionada con el evento <i>Born To Be Tec</i> llámanos al 01 800 832 33 689 o al (81) 8158 2269,
			escríbenos a <a href='mailto:btec.mty@servicios.itesm.mx'>btec.mty@servicios.itesm.mx</a>
		</p>
	</footer>
</body>
</html>
";

echo $response;

?>