<?php
require_once('admin.class.php');
$admin = new AdminClass();
	$res = 'false';
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
		'ingreso' => $_POST["ingreso"],
		'hotel' => $_POST["hotel"],
		'solo' => $_POST["solo"],
		'perentesco' => $_POST["perentesco"],
		'acompana' => $_POST["acompana"],
		'tecno' => $_POST["tecno"],
		'car1' => $_POST["car1"],
		'car2' => $_POST["car2"],
		'car3' => $_POST["car3"],
		'ptav1' => $_POST["ptav1"],
		'tav1' => $_POST["tav1"],
		'ptav2' => $_POST["ptav2"],
		'tav2' => $_POST["tav2"],
		'ptav3' => $_POST["ptav3"],
		'tav3' => $_POST["tav3"],
		'ptas1' => $_POST["ptas1"],
		'tas1' => $_POST["tas1"],
		'ptas2' => $_POST["ptas2"],
		'tas2' => $_POST["tas2"],
		'idu' => $_POST['idu']
	);
	$res = $admin->update($data);
	
	if($res){
		$res = true;	
	}
	
	echo $res;

?>