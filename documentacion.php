<style type="text/css">
	form{
		background-color: #fff;
		border-top: 10px solid #06ba4e;
		font-size: 16px;
		width: 600px;
	}
	fieldset{
		text-align: center;
		font-size: 1.2em;
		font-weight: bold;
		border: none;
	}
	label{
		text-align: left;
		font-size: 0.9em;
		font-weight: bold;
	}
	input[type="file"]{
		height: 25px;
		width: 100%;
	}
	input[type='submit']{
		border: none;
		background-color: #5aaded;
		height: 35px;
		width: 100px;
		cursor: pointer;
		border-radius: 4px;
		float: right;
		color: white;
		font-weight: bold;
	}
	input[type='submit']:hover{
		background-color: #37a7fc;
	}
	span{
		text-align: center;
		position: relative;
		display: block;
		background-color: #5ccc8d;
		font-style: italic;
	}
	.noactive{
		background-color: #ccc!important;
		color: black!important;
		font-weight: normal!important;
	}
	.boleto{
		background-color: #b33535;
		color: white;
		font-weight: bold;
		height: 35px;
		width: 100px;
		cursor: pointer;
		border-radius: 4px;
		border:none;
		float: left;
		margin-left: 250px;
		margin-top: 5%;

	}
	input[type="button"]:hover{
		background-color: #d93c3c;
	}
</style>
<?php
header('Content-Type: text/html; charset=utf-8');
require_once("config.php");
require('./sql/funciones.php');
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


//Generamos Boleto
$correcto = "<span>Se guardo correctamente tu información.</span><br />";
$nll = '';
$bolet = "<a href='boleto.php?s=".$string."'><input type='button' value='Generar Boleto' class='boleto'/></a>";
$class = 'noactive';

$correcto = ($v == 'ok') ? $correcto : $nll ;
$bolet = ($v == 'ok' || $respuesta['v'] == 'ok') ? $bolet : $nll;
$class = ($v == 'ok') ? $class : $nll;

//Forms
$form_FB = "
<form action='./sql/saveDoc.php' method='POST' enctype='multipart/form-data'>
	<fieldset>Sube tu documentación</fieldset>
	".$correcto."
	<label>Carta Compromiso</label><br />
	<input type='hidden' name='string' value='".$string."' />
	<input type='hidden' name='idu' value='".$idu."' />
	<input type='file' name='carta' />
	<br />
	<label>Ficha Bancaria</label><br />
	<input type='file' name='banco' /><br />
	<input type='submit' value='Guardar' class='".$class."'/>
	".$bolet."
</form>
";

$form_FA = "
<form action='./sql/saveDoc.php' method='POST' enctype='multipart/form-data'>
	<fieldset>Sube tu documentación</fieldset>
	".$correcto."
	<label>Carta Compromiso</label><br />
	<input type='hidden' name='string' value='".$string."' />
	<input type='hidden' name='idu' value='".$idu."' />
	<input type='file' name='carta' />
	<br />
	<input type='submit' value='Guardar' class='".$class."'/>
	".$bolet."
</form>
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