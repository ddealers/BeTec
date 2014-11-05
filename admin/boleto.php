<?php
require_once('admin.class.php');
$admin = new AdminClass();

$idu	= $_POST['idu'];
$nombre	= $_POST['nombre'];
$email	= $_POST['email'];
$correo	= $_POST['correo'];

$res = $admin->boleto($idu, $nombre, $email, $correo);

echo $res;
?>