<?php 
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
/*)
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=registrados_btec.xls");
header("Pragma: no-cache");
header("Expires: 0");
header("Content-Type: application/vnd.ms-excel");header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=Reporte.xls");
*/
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registros BTEC</title>
</head>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>Género</th>
			<th>Nombre</th>
			<th>Fecha de Nacimiento</th>
			<th>Correo</th>
			<th>Teléfono</th>
			<th>Celular</th>
			<th>Estado</th>
			<th>Ciudad</th>
			<th>Preparatoria</th>
			<th>Fecha de Ingreso</th>
			<th>Necesita Hospedaje</th>
			<th>Acompañante</th>
			<th>Parentesco Acompañante</th>
			<th>Nombre Acompañante</th>
			<th>Estudiará en Tec de Monterrey</th>
			<th>Otro Campus</th>
			<th>Carrera 1</th>
			<th>Carrera 2</th>
			<th>Carrera 3</th>
			<th>Taller Viernes 16:30</th>
			<th>Taller Viernes 17:40</th>
			<th>Taller Viernes 18:40</th>
			<th>Taller Sábado 9:00</th>
			<th>Taller Sábado 11:45</th>
			<th>Medio</th>
		</tr>
		<?php 
		foreach ($rows as $key => $value) : 
			$value->follow = $usuario->getFollow($value->id);
			$value->universidad = $usuario->getUniversidad($value->id);
			$value->carreras = $usuario->getCarreras($value->id);
			$value->talleres = $usuario->getTalleres($value->id);
		?>
		<tr>
			<td><?php echo $value->id ?></td>
			<td><?php echo ($value->genero > 0) ? 'Mujer':'Hombre' ?></td>
			<td><?php echo $value->nombre ?></td>
			<td><?php echo $value->nacimiento ?></td>
			<td><?php echo $value->correo ?></td>
			<td><?php echo $value->telefono ?></td>
			<td><?php echo $value->celular ?></td>
			<td><?php echo $estado->get($value->estado) ?></td>
			<td><?php echo $ciudad->get($value->ciudad) ?></td>
			<td>
			<?php 
			if($value->preparatoria){
				echo $prepa->get($value->preparatoria);
			}else{
				echo $prepa->custom($value->id);
			}
			?>
			</td>
			<td><?php echo $value->graduacion ?></td>
			<td><?php echo $value->hospedaje == '0' ? 'No':'Si'  ?></td>
			<td><?php echo $value->acompana == '0' ? 'No':'Si'  ?></td>
			<td><?php echo $value->follow != NULL ? $value->follow->parentestco : '-'  ?></td>
			<td><?php echo $value->follow != NULL ? $value->follow->acompanante : '-'  ?></td>
			<td><?php echo $value->universidad->moneterrey == '0' ? 'Sí' : 'No'  ?></td>
			<td><?php echo $value->universidad->moneterrey == '0' ? '-' : $value->universidad->campus ?></td>
			<td><?php echo $value->carreras[0] != NULL ? $value->carreras[0]->nombre : '-' ?></td>
			<td><?php echo $value->carreras[1] != NULL ? $value->carreras[1]->nombre : '-' ?></td>
			<td><?php echo $value->carreras[2] != NULL ? $value->carreras[2]->nombre : '-' ?></td>
			<td><?php echo $value->talleres[0] != NULL ? $value->talleres[0]->nombre : '-' ?></td>
			<td><?php echo $value->talleres[1] != NULL ? $value->talleres[1]->nombre : '-' ?></td>
			<td><?php echo $value->talleres[2] != NULL ? $value->talleres[2]->nombre : '-' ?></td>
			<td><?php echo $value->talleres[3] != NULL ? $value->talleres[3]->nombre : '-' ?></td>
			<td><?php echo $value->talleres[4] != NULL ? $value->talleres[4]->nombre : '-' ?></td>
			<td><?php echo $medio->get($value->medio) ?></td>
		</tr>
		<?php endforeach ?>
	</table>
</body>
</html>