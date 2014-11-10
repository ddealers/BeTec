<?php
require_once('admin.class.php');
$admin = new AdminClass();
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

$ur = encriptarURL($_POST["email"], $key);

if($_POST['hotel'] == '0'){
	$_POST['solo'] = '0';
}

$data = array(
	'genero' => $_POST["genero"],
	'nombre' => $_POST["nombre"],
	'cumple' => $_POST["cumple"],
	'email'  => $_POST["email"],
	'tel' => $_POST["tel"],
	'cel' => $_POST["cel"],
	'medio' => $_POST["medio"],
	'estado' => $_POST["estado"],
	'ciudad' => $_POST["ciudad"],
	'prepa' => $_POST["prepa"],
	'nomprepa' => $_POST["nomprepa"],
	'ingreso' => $_POST["ingreso"],
	'hotel' => $_POST["hotel"],
	'solo' => $_POST["solo"],
	'perentesco' => $_POST["perentesco"],
	'acompana' => $_POST["acompana"],
	'tecno' => $_POST["tecno"],
	'car1' => $_POST["car1"],
	'car2' => $_POST["car2"],
	'car3' => $_POST["car3"],
	'tav1' => $_POST["tav1"],
	'tav2' => $_POST["tav2"],
	'tav3' => $_POST["tav3"],
	'tas1' => $_POST["tas1"],
	'tas2' => $_POST["tas2"]
);

$res = $admin->save($data, $ur);
echo $res;
?>