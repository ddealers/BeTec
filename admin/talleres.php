<?
require_once('header.php');
require_once('usuarios.class.php');
require_once('talleres.class.php');
require_once('admin.class.php');

$users = new Usuario();
$collection = $users->rows();
foreach($collection as $user){
	$user->talleres = $users->getTalleres($user->id);
	echo $user->nombre.'<br>';
	if($user->talleres[0]->id_taller == 1){
		echo $user->talleres[0]->nombre;
	}
	/*
	echo $user->talleres[0]->nombre.'<br>';
	echo $user->talleres[1]->nombre.'<br>';
	echo $user->talleres[2]->nombre.'<br>';
	echo $user->talleres[3]->nombre.'<br>';
	echo $user->talleres[4]->nombre.'<br>';
	*/
	echo '---------------------------<br>';
}