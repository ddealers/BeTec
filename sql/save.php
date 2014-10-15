<?php
ini_set('display_errors', '0');
$mysqli = new mysqli('localhost','root','olamund0','test');
$response = 'false';

//var_dump($_REQUEST);
$genero  = $_POST['genero'];
$nombre	 = $_POST['nombre'];
$cumple	 = $_POST['cumple'];
$email	 = $_POST['email'];
$numero	 = $_POST['numero'];
$cel	 = $_POST['cel'];

/* Carreas De Preferencia */
$car1	 = $_POST['car1'];
$car2	 = $_POST['car2'];
$car3	 = $_POST['car3'];
/* Carreas De Preferencia */

$state	 = $_POST['state'];
$city	 = $_POST['city'];
$prep	 = $_POST['prep'];
$grad	 = $_POST['grad'];

$hotel	 = $_POST['hotel'];
$solo	 = $_POST['solo'];
/*Si viene acompañado*/
$pare	 = $_POST['pare'];
$namep	 = $_POST['namep'];
/*Si viene acompañado*/

/*Talleres Elegidos*/
$vopt1	 = $_POST['vopt1'];
$vopt2	 = $_POST['vopt2'];
$vopt3	 = $_POST['vopt3'];
$sopt	 = $_POST['sopt'];
/*Talleres Elegidos*/

$evento	 = $_POST['evento'];

$q = "INSERT INTO usuarios VALUES(NULL, '$genero', '$nombre', '$cumple', '$email', '$numero', '$cel', '$state', '$city', '$prep', '$grad', '$hotel', '$solo', '$evento', CURRENT_TIMESTAMP )";
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

	if($v && $vp){
		$response = 'true';
	}else{
		$response = 'false';
	}
}else{
	$response = 'false';
}

echo $response;
?>