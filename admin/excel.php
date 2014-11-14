<?php 
ini_set('display_errors', '0');
require_once('usuarios.class.php');
require_once('estado.class.php');
require_once('ciudad.class.php');
require_once('prepa.class.php');
require_once('medio.class.php');

$usuario = new Usuario();
$estado = new Estado();
$ciudad = new Ciudad();
$prepa = new Prepa();
$medio = new Medio();

$s = isset($_REQUEST['s']) ? $_REQUEST['s'] : NULL;
$f = @$_GET['from'];
$d = @$_GET['docs'];
$h = @$_GET['hab'];
$c = @$_GET['comp'];
$rows = $usuario->excel_rows($s, $f, $d, $h, $c);
$filename = 'Registros BTEC.csv';
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header('Content-Description: File Transfer');
header("Content-type: text/csv");
header("Content-Disposition: attackment; filename={$filename}");
header("Expires: 0");
header("Pragma: public");
$fh = @fopen('php://output', 'w');
fputcsv($fh, array('ID',
	'Género',
	'Nombre',
	'Fecha de Nacimiento',
	'Correo',
	'Teléfono',
	'Celular',
	'Estado',
	'Ciudad',
	'Preparatoria',
	'Fecha de Ingreso',
	'Necesita Hospedaje',
	'Acompañante',
	'Parentesco Acompañante',
	'Nombre Acompañante',
	'Estudiará en Tec de Monterrey<',
	'Otro Campus',
	'Carrera 1',
	'Carrera 2',
	'Carrera 3',
	'Taller Viernes 16:30',
	'Taller Viernes 17:40',
	'Taller Viernes 18:40',
	'Taller Sábado 9:00',
	'Taller Sábado 11:45',
	'Medio'
));
foreach ($rows as $key => $value) {
	$value->follow = $usuario->getFollow($value->id);
	$value->universidad = $usuario->getUniversidad($value->id);
	$value->carreras = $usuario->getCarreras($value->id);
	$value->talleres = $usuario->getTalleres($value->id);

	$g = ($value->genero > 0) ? 'Mujer':'Hombre';
	$e = $estado->get($value->estado);
	$c = $ciudad->get($value->ciudad);
	if($value->preparatoria){
		$p = $prepa->get($value->preparatoria);
	}else{
		$p = $prepa->custom($value->id);
	}
	$h = $value->hospedaje == '0' ? 'No':'Si';
	$a = $value->acompana == '0' ? 'No':'Si';
	$fp = $value->follow != NULL ? $value->follow->parentestco : '-';
	$fa = $value->follow != NULL ? $value->follow->acompanante : '-';
	$um = $value->universidad->moneterrey == '0' ? 'Sí' : 'No';
	$uc = $value->universidad->moneterrey == '0' ? '-' : $value->universidad->campus;
	$c1 = $value->carreras[0] != NULL ? $value->carreras[0]->nombre : '-';
	$c2 = isset($value->carreras[1]) && $value->carreras[1] != NULL ? $value->carreras[1]->nombre : '-';
	$c3 = isset($value->carreras[2]) && $value->carreras[2] != NULL ? $value->carreras[2]->nombre : '-';
	$t1v = $value->talleres[0] != NULL ? $value->talleres[0]->nombre : '-';
	$t2v = $value->talleres[1] != NULL ? $value->talleres[1]->nombre : '-';
	$t3v = $value->talleres[2] != NULL ? $value->talleres[2]->nombre : '-';
	$t1s = $value->talleres[3] != NULL ? $value->talleres[3]->nombre : '-';
	$t2s = $value->talleres[4] != NULL ? $value->talleres[4]->nombre : '-';
	$m = $medio->get($value->medio);

	fputcsv($fh, array(
		$value->id,
		$g,
		$value->nombre,
 		$value->nacimiento,
		$value->correo,
		$value->telefono,
		$value->celular,
		$e,
		$c,
		$p,
		$value->graduacion,
		$h,
		$a,
		$fp,
		$fa,
		$um,
		$uc,
		$c1,
		$c2,
		$c3,
		$t1v,
		$t2v,
		$t3v,
		$t1s,
		$t2s
	));
}
?>
