<?php
require_once('usuarios.class.php');

$usuario = new Usuario();

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'add'){
	echo $usuario->checkin($_REQUEST['id']);
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'remove'){
	echo $usuario->removeCheckin($_REQUEST['id']);
}