<?php

$action = $_POST['action'];
$uid 	= $_POST['id'];

if(isset($action) AND $action == 'carta'){
	$carta 	= $_FILES['cartacomp'];
	//pedo pa' subir y guardar
}elseif (isset($action) AND $action == 'pago') {
	$pago 	= $_FILES['compago'];
	//
}


?>