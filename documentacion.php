<?php
header('Content-Type: text/html; charset=utf-8');
require_once("config.php");
require_once('./sql/funciones.php');

//cadena encriptada
$string = $_GET['s'];

//guardo bien form
$v = (isset($_GET['v'])) ? $_GET['v'] : '' ;

//llave descriptar
$key = 'BornToBeTec321_';

function validaMail($mail){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$res = array();
	$q = "SELECT id, documentos FROM usuarios WHERE correo = '$mail' ";
	$v = $mysqli->query($q);
	if($v){
		if($v->num_rows > 0){
			while ($row = $v->fetch_assoc()) {
				$inf = $row;
			}
			$res[0] = true;
			$res[1] = $inf;
		}else{
			$res[0] = false;
		}
	}
	return $res;
}


function validaDocs($idu){
	$mysqli = new mysqli(HOST,USR,PWD,DB);
	$respuesta = array();
	$q = "SELECT * FROM usuarios_documentos WHERE id_usuario = '$idu' ";
	$v = $mysqli->query($q);

	if($v){
		if($v->num_rows > 0){
			while ($row = $v->fetch_assoc()) {
				$info = $row;
			}
		}
		if($info['tipo_foraneo'] == '0' && $info['url_permiso'] == '#' && $info['url_pago'] == '#'){
			$respuesta['estatus'] = 'true';
			$respuesta['docs'] = 'false';
			$respuesta['hotel'] = 'false';
			$respuesta['v'] = 'no';
		}elseif($info['tipo_foraneo'] == '1' && ($info['url_pago'] == '#' || $info['url_permiso'] == '#')) {
			$respuesta['estatus'] = 'true';
			$respuesta['docs'] = 'false';
			$respuesta['hotel'] = 'true';
			$respuesta['v'] = 'no';
		}elseif($info['url_pago'] != '#' || $info['url_permiso'] != '#'){
			$respuesta['estatus'] = 'boleto';
			$respuesta['v'] = 'ok';
		}
	}
	return $respuesta;
}

$mail = desencriptarURL($string, $key);
$in = validaMail($mail);
$idu = $in[1]['id'];

$respuesta = validaDocs($idu);

//
//var_dump($mail);
//var_dump($in);

//Generamos Boleto
$correcto = "<span>Se guardo correctamente tu información.</span><br />";
$nll = '';
$bolet = "<a href='boleto.php?s=".$string."'><input type='button' value='Generar Boleto' class='boleto'/></a>";
$class = 'noactive';

$correcto = ($v == 'ok') ? $correcto : $nll ;
$bolet = ($v == 'ok' || $respuesta['v'] == 'ok') ? $bolet : $nll;
$class = ($v == 'ok') ? $class : $nll;


//enviar ruta para subir archivos
$dir = dirname(__FILE__);
$ruta = $dir;
$ruta = $ruta . '/archivos/';

//Forms
$form_FA = "
<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>BTEC</title>
	<link rel='stylesheet' type='text/css' href='css/normalize.css' />
	<link rel='stylesheet' type='text/css' href='css/1140.css' />
	<link rel='stylesheet' type='text/css' href='css/responsive-tables.css'>
	<link rel='stylesheet' type='text/css' href='css/btec.css' />
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<script type='text/javascript' src='js/vendor/jquery.min.js'></script>
	<script type='text/javascript' src='js/vendor/skrollr/skrollr.min.js'></script>
	<script type='text/javascript' src='js/vendor/skrollr/skrollr.menu.min.js'></script>
	<script type='text/javascript' src='js/vendor/responsive-tables.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js'></script>
	<script type='text/javascript' src='js/main.js'></script>
</head>
<body>
	<header>
		<figure id='logo'>
			<a href='#'><img src='./img/logo.png' title='Born to be TEC' /></a>
			
		</figure>
		<nav>
			<ul><!--NADA--></ul>
		</nav>
		<div class='social'>
			<ahref='#registro'><img src='./img/registro_boton.png'/></a>
			<div class='rs'>
				<a href='https://www.facebook.com/BorntoBeTEC' target='_blank'><img src='./img/face.png'></a>
				<a href='https://twitter.com/BorntoBeTEC' target='_blank'><img src='./img/tw.png'></a>
			</div>
		</div>
	</header>
	<section class='content'>
		<article>
			<h1>ADJUNTAR</h1>
			<span>Sube tu carta compromiso correctamente llenada y firmada antes del 18 de noviembre.</span>
			<h3>GERMÁN RADILLO</h3>
			<span class='sub'>Asistente</span>
			<p>	
				<div class='evento'>
					<span class='even'>Evento</span>
					<h4 class='font'>BORN TO BE TEC 2014</h4>
				</div>
				<div class='acciones'>
					<div class='hecho'>
						<figure>
							<img src='img/correcto.png' alt='Registrado'>
						</figure>
						<span class='even'>Registro</span>
						<h4>Realizado</h4>
					</div>
					<div class='pendiente'>
						<figure>
							<img src='img/incorrecto.png' alt='Pendiente'>
						</figure>
						<span class='even'>Carta</span>
						<h4>Pendiente subir<br> carta compromiso</h4>
						<form action='./sql/saveDoc.php' method='POST' enctype='multipart/form-data'>
							<input type='hidden' name='string' value='".$string."' />
							<input type='hidden' name='idu' value='".$idu."' />
							<input type='hidden' name='ruta' value='".$ruta."' />
							<input type='file' name='carta' />
							<input type='submit' value='Guardar' class='".$class."'/>
						</form>
					</div>
				</div>
			</p>
			<div class='azul'>
				<p class='dudas'>¿TIENES DUDAS?</p>
				<ul>
					<li>Escribenos:<br><br><img src='./img/mesage.png'> btec.mty@servicios.itesm.mx</li>
					<li>Llámanos:<br><br><img src='./img/fon.png'> 01 800 832 33 689<br>o al (81) 8158 2269</li>
					<li>Postea:<br><br><img src='./img/face.png'> /AdmisionesTecdeMty</li>
					<li>Tuitea: <br><br><img src='./img/tw.png'> AdmisionesITESM</li>
				</ul>
			</div>
		</article>
	</section>
</body>
</html>
";

$form_FB = "
<!DOCTYPE html>
<html lang='es'>
<head>
	<meta charset='UTF-8'>
	<title>BTEC</title>
	<link rel='stylesheet' type='text/css' href='css/normalize.css' />
	<link rel='stylesheet' type='text/css' href='css/1140.css' />
	<link rel='stylesheet' type='text/css' href='css/responsive-tables.css'>
	<link rel='stylesheet' type='text/css' href='css/btec.css' />
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<script type='text/javascript' src='js/vendor/jquery.min.js'></script>
	<script type='text/javascript' src='js/vendor/skrollr/skrollr.min.js'></script>
	<script type='text/javascript' src='js/vendor/skrollr/skrollr.menu.min.js'></script>
	<script type='text/javascript' src='js/vendor/responsive-tables.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js'></script>
	<script type='text/javascript' src='js/main.js'></script>
</head>
<body>
	<header>
		<figure id='logo'>
			<a href='#'><img src='./img/logo.png' title='Born to be TEC' /></a>
		</figure>
		<nav>
			<ul><!--NADA--></ul>
		</nav>
		<div class='social'>
			<ahref='#registro'><img src='./img/registro_boton.png'/></a>
			<div class='rs'>
				<a href='https://www.facebook.com/BorntoBeTEC' target='_blank'><img src='./img/face.png'></a>
				<a href='https://twitter.com/BorntoBeTEC' target='_blank'><img src='./img/tw.png'></a>
			</div>
		</div>
	</header>
	<section class='content'>
		<article>
			<h1>ADJUNTAR</h1>
			<span>Sube tu carta compromiso correctamente llenada y firmada antes del 18 de noviembre.</span>
			<h3>GERMÁN RADILLO</h3>
			<span class='sub'>Asistente</span>
			<p>	
				<div class='evento'>
					<span class='even'>Evento</span>
					<h4 class='font'>BORN TO BE TEC 2014</h4>
				</div>
				<div class='acciones'>
					<div class='hecho'>
						<figure>
							<img src='img/correcto.png' alt='Registrado'>
						</figure>
						<span class='even'>Registro</span>
						<h4>Realizado</h4>
					</div>
					<div class='pendiente'>
						<figure>
							<img src='img/incorrecto.png' alt='Pendiente'>
						</figure>
						<span class='even'>Pago</span>
						<h4>Pendiente subir<br> comprobante</h4>
						<form action='./sql/saveDoc.php' method='POST' enctype='multipart/form-data'>
							<input type='hidden' name='string' value='".$string."' />
							<input type='hidden' name='idu' value='".$idu."' />
							<input type='hidden' name='ruta' value='".$ruta."' />
							<input type='file' name='banco' />
					</div>
					<div class='pendiente carta'>
						<figure>
							<img src='img/incorrecto.png' alt='Pendiente'>
						</figure>
						<span class='even'>Carta</span>
						<h4>Pendiente subir<br> carta compromiso</h4>
							<input type='file' name='carta' />
							<input type='submit' value='Guardar' class='".$class."'/>
						</form>
					</div>
				</div>
			</p>
			<div class='azul'>
				<p class='dudas'>¿TIENES DUDAS?</p>
				<ul>
					<li>Escribenos:<br><br><img src='./img/mesage.png'> btec.mty@servicios.itesm.mx</li>
					<li>Llámanos:<br><br><img src='./img/fon.png'> 01 800 832 33 689<br>o al (81) 8158 2269</li>
					<li>Postea:<br><br><img src='./img/face.png'> /AdmisionesTecdeMty</li>
					<li>Tuitea: <br><br><img src='./img/tw.png'> AdmisionesITESM</li>
				</ul>
			</div>
		</article>
	</section>
</body>
</html>
";

if($respuesta['estatus'] == 'true' && $respuesta['docs'] == 'false' && $respuesta['hotel'] == 'false'){
	echo $form_FA;
}elseif ($respuesta['estatus'] == 'true' && $respuesta['docs'] == 'false' && $respuesta['hotel'] == 'true') {
	echo $form_FB;
}elseif ($respuesta['estatus'] == 'boleto') {
	echo $bolet;
}elseif($respuesta['estatus'] == 'false'){
	echo "<h1>Lo sentimos, este link ha expirado.</h1>";
}

?>