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
	$q = "SELECT id, documentos, nombre FROM usuarios WHERE correo = '$mail' ";
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
			$info = $v->fetch_assoc();
		}
		if($info['url_pago'] == '-' || $info['url_permiso'] == '-'){
			$respuesta['estatus'] = 'boleto';
		}elseif($info['tipo_foraneo'] == '0'){
			$respuesta['estatus'] = 'true';
			$respuesta['tipo'] = 'B';
			if($info['url_permiso'] == '#') 
				$respuesta['carta'] = 'false';
			else
				$respuesta['carta'] = 'true';
			$respuesta['banco'] = 'false';
		}elseif($info['tipo_foraneo'] == '1'){
			$respuesta['estatus'] = 'true';
			$respuesta['tipo'] = 'A';
			if($info['url_permiso'] == '#')
				$respuesta['carta'] = 'false';
			else
				$respuesta['carta'] = 'true';
			if($info['url_pago'] == '#')
				$respuesta['banco'] = 'false';
			else
				$respuesta['banco'] = 'true';
		}
	}
	return $respuesta;
}

$string = str_replace(" ","+",$string);
$mail = desencriptarURL($string, $key);
$in = validaMail($mail);
if($in[0]){
	$idu = $in[1]['id'];
	$name = utf8_encode($in[1]['nombre']);
	$respuesta = validaDocs($idu);
}else{
	$respuesta['estatus'] = 'false';
}
//enviar ruta para subir archivos
$dir = dirname(__FILE__);
$ruta = $dir;
$ruta = $ruta . '/download/';

//error al subir el archivo
@$error = $_GET['e'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>BTEC</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/1140.css" />
	<link rel="stylesheet" type="text/css" href="css/ionicons.min.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive-tables.css" />
	<link rel="stylesheet" type="text/css" href="css/perfect-scrollbar.min.css" />
	<link rel="stylesheet" type="text/css" href="css/btec.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
	<script type="text/javascript" src="js/vendor/skrollr/skrollr.min.js"></script>
	<script type="text/javascript" src="js/vendor/skrollr/skrollr.menu.min.js"></script>
	<script type="text/javascript" src="js/vendor/responsive-tables.js"></script>
	<script type="text/javascript" src="js/vendor/perfect-scrollbar.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<a href="./"><img src="./img/logo.png" title="Born to be TEC" /></a>
		</figure>
		<nav>
			<ul><!--NADA--></ul>
		</nav>
		<div class="social">
			<!--a href='#registro'><img src='./img/registro_boton.png'/></a>
			<div class='rs'>
				<a href='https://www.facebook.com/BorntoBeTEC' target='_blank'><img src='./img/face.png'></a>
				<a href='https://twitter.com/BorntoBeTEC' target='_blank'><img src='./img/tw.png'></a>
			</div-->
		</div>
	</header>
	<section class="content">
		<article>
			<h1>ADJUNTAR</h1>
			<p class="sub">Sube tu carta compromiso correctamente llenada y firmada antes del 18 de noviembre.</p>
			<div class="cont">
				<div class="columns50">
				<?php if($respuesta['estatus'] != 'false'): ?>
					<h3><?php echo $name ?></h3>
					<span>Asistente</span>
				<?php endif; ?>
				</div>
				<div class="columns50">
					<span>Evento</span>
					<h4 class="font">BORN TO BE TEC 2014</h4>
				</div>
			</div>
			<div class="cont">
				<?php if($error): ?>
					<div class="columns100 alert"><?php echo $error; ?></div>
				<?php endif; ?>
				<div class="columns30">
				<?php if($respuesta['estatus'] == 'false'): ?>
					<h3>Lo sentimos, este link ha expirado.</h3>
				<?php elseif($respuesta['estatus'] == 'boleto'): ?>
					<a class="btn" href="boleto.php?s=<?php echo $string ?>">
						Descargar boleto
					</a>
				<?php elseif($respuesta['tipo'] == 'A' && $respuesta['carta'] == 'true' && $respuesta['banco'] == 'true'): ?>
					<a class="btn" href="boleto.php?s=<?php echo $string ?>">
						Descargar boleto
					</a>
				<?php elseif($respuesta['tipo'] == 'B' && $respuesta['carta'] == 'true'): ?>
					<a class="btn" href="boleto.php?s=<?php echo $string ?>">
						Descargar boleto
					</a>
				<?php endif; ?>
				</div>
			</div>
			<div class="cont acciones">		
				<div class="columns30 hecho">
					<figure>
						<img src="img/correcto.png" alt="Registrado">
					</figure>
					<span class='even'>Registro</span>
					<h4>Realizado</h4>
				</div>
				<?php if($respuesta['estatus'] != 'false'): ?>
				<?php if($respuesta['estatus'] != 'boleto'): ?>
				<div class="columns30 pendiente">
					<figure>
					<?php if($respuesta['carta'] == 'false'): ?>
						<img src="img/incorrecto.png" alt="Pendiente">
					<?php else: ?>
						<img src="img/correcto.png" alt="Registrado">
					<?php endif; ?>
					</figure>
					<span>Carta</span>
					<?php if($respuesta['carta'] == 'false'): ?>
					<h4>Pendiente subir<br>carta compromiso</h4>
					<form id="carta_upload" action="./sql/saveDoc.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="string" value="<?php echo $string ?>"/>
						<input type="hidden" name="idu" value="<?php echo $idu ?>"/>
						<input type="hidden" name="ruta" value="<?php echo $ruta ?>"/>
						<div class="file-upload btn">
							<span>Subir Archivo</span>
							<input type="file" class="upload" accept="image/png,image/jpeg,application/pdf" name="carta"/>
						</div>
						<!--input id="#carta_upload" type="submit" value="Guardar"/-->
					</form>
					<?php else: ?>
					<h4>Realizado</h4>
					<?php endif; ?>
				</div>
				<?php if($respuesta['tipo'] == 'A'): ?>
				<div class="columns30 pendiente">
					<figure>
					<?php if($respuesta['banco'] == 'false'): ?>
						<img src="img/incorrecto.png" alt="Pendiente">
					<?php else: ?>
						<img src="img/correcto.png" alt="Registrado">
					<?php endif; ?>
					</figure>
					<span>Pago</span>
					<?php if($respuesta['banco'] == 'false'): ?>
					<h4>Pendiente subir<br>comprobante</h4>
					<form id="banco_upload" action="./sql/saveDoc.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="string" value="<?php echo $string ?>"/>
						<input type="hidden" name="idu" value="<?php echo $idu ?>"/>
						<input type="hidden" name="ruta" value="<?php echo $ruta ?>"/>
						<div class="file-upload btn">
							<span>Subir Archivo</span>
							<input type="file" class="upload" accept="image/png,image/jpeg,application/pdf" name="banco"/>
						</div>
						<!--input id="banco_upload" type="submit" value="Guardar"/-->
					</form>
					<?php else: ?>
					<h4>Realizado</h4>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="azul">
				<p class="dudas">¿TIENES DUDAS?</p>
				<ul>
					<li class="msg">Escribenos:<br><br><span>btec.mty@servicios.itesm.mx</span></li>
					<li class="phn">Llámanos:<br><br><span> 01 800 832 33 689<br>o al (81) 8158 2269</span></li>
					<li class="fb">Postea:<br><br><a href="https://www.facebook.com/AdmisionesTecdeMty" target="_blank" style="color:white;"><span>/AdmisionesTecdeMty</span></a></li>
					<li class="tw">Tuitea:<br><br><a href="http://twitter.com/AdmisionesITESM" target="_blank" style="color:white;"><span>AdmisionesITESM</span></a></li>
				</ul>
			</div>
		</article>
	</section>
</body>
</html>
<?
/*
if($respuesta['estatus'] == 'true' && $respuesta['docs'] == 'false' && $respuesta['hotel'] == 'false'){
	echo $form_FA;
}elseif ($respuesta['estatus'] == 'true' && $respuesta['docs'] == 'false' && $respuesta['hotel'] == 'true') {
	echo $form_FB;
}elseif ($respuesta['estatus'] == 'boleto') {
	echo $bolet;
}elseif($respuesta['estatus'] == 'false'){
	echo "<h1>Lo sentimos, este link ha expirado.</h1>";
}
*/
?>