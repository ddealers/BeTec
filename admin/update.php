<?php
require_once('header.php');
require_once('admin.class.php');
$admin = new AdminClass();
	
	$res = 'false';
	$genero 		= $_POST["genero"];
	$nombre 		= $_POST["nombre"];
	$cumple 		= $_POST["cumple"];
	$email 			= $_POST["email"];
	$tel 			= $_POST["tel"];
	$cel 			= $_POST["cel"];
	$medio 			= $_POST["medio"];
	$estado 		= $_POST["estado"];
	$ciudad 		= $_POST["ciudad"];
	$prepa 			= $_POST["prepa"];
	$ingreso 		= $_POST["ingreso"];
	$hotel 			= $_POST["hotel"];
	$solo 			= $_POST["solo"];
	$perentesco 	= $_POST["perentesco"];
	$acompana 		= $_POST["acompana"];
	$tecno 			= $_POST["tecno"];
	$car1 			= $_POST["car1"];
	$car2 			= $_POST["car2"];
	$car3 			= $_POST["car3"];
	$tav1 			= $_POST["tav1"];
	$tav2 			= $_POST["tav2"];
	$tav3 			= $_POST["tav3"];
	$tas1 			= $_POST["tas1"];
	$tas2 			= $_POST["tas2"];
	$idu 			= $_POST['idu'];

	$res = $admin->updateAdmin($genero, $nombre, $cumple, $email, $tel, $cel, $medio, $estado, $ciudad, $prepa, $ingreso, $hotel, $solo, $perentesco ,$acompana, $tecno, $car1, $car2, $car3, $tav1, $tav2, $tav3, $tas1,$tas2, $idu);
	
	echo $res;

?>