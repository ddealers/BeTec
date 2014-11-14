<?php 
require_once('header.php');
require_once('usuarios.class.php');
require_once('estado.class.php');
require_once('ciudad.class.php');
require_once('prepa.class.php');
require_once('carrera.class.php');
require_once('medio.class.php');
require_once('talleres.class.php');
require_once('documentacion.class.php');
require_once('admin.class.php');


$usuario = new Usuario();
$estado = new Estado();
$ciudad = new Ciudad();
$prepa = new Prepa();
$carrera = new Carrera();
$medio = new Medio();
$taller = new Taller();
$docos = new Documentacion();
$admin = new AdminClass();

//Para Mail
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
?>
<?php if(isset($_GET['e']) && $e = $_GET['e']):
	switch ($e) {
		case '100':
		case '101':
	?>
		<div class='alert alert-success' role='alert'>Se Han subido correctamente tus archivos.</div>
	<?php 
		break;
		case '102': ?>
		<div class='alert alert-success' role='alert'>El usuario se creo correctamente.</div>	
	<?php 
		break;
		case '103': ?>
		<div class='alert alert-success' role='alert'>El usuario ha sido eliminado.</div>
	<?php	
		break;
		case '60': ?>
		<div class='alert alert-danger' role='alert'>Usuario o contraseña incorrectos.</div>
	<?php
		break;
		case '69':
	?>
		<div class='alert alert-danger' role='alert'>Ocurrio un problema al subir tus archivos.</div>
<?php
	}
	endif; 
?>
<?php if(isset($_SESSION['user']) && $_SESSION['user'] != NULL): ?>
	<?php if(!isset($_REQUEST['u']) 
	&& !isset($_REQUEST['n']) 
	&& !isset($_REQUEST['admin'])
	&& !isset($_REQUEST['checkin'])): ?>
	<section>
		<h4>Filtrar por:</h4>
		<form id="filters" method="get">
			<div class="from btn-group pull-left" data-toggle="buttons">
				<label class="btn btn-default <?php if(!isset($_GET['from']) || $_GET['from'] == 0) echo 'active' ?>">
					<input type="radio" name="from" value="0" id="fil_opt1" autocomplete="off" <?php if(!isset($_GET['from']) || $_GET['from'] == 0) echo 'checked' ?>> Todos
				</label>
				<label class="btn btn-default <?php if(@$_GET['from'] == 1) echo 'active' ?>">
					<input type="radio" name="from" value="1" id="fil_opt2" autocomplete="off" <?php if(@$_GET['from'] == 1) echo 'checked' ?>> Locales
				</label>
				<label class="btn btn-default <?php if(@$_GET['from'] == 2) echo 'active' ?>">
			  		<input type="radio" name="from" value="2" id="fil_opt3" autocomplete="off" <?php if(@$_GET['from'] == 2) echo 'checked' ?>> Foráneos
			  	</label>
			</div>
			<div class="foreign btn-group pull-right" data-toggle="buttons">
				<label class="btn btn-default <?php if(@$_GET['docs']) echo 'active' ?>">
					<input type="checkbox" name="docs" autocomplete="off" <?php if(@$_GET['docs']) echo 'checked' ?>> Docs Pendientes
				</label>
				<label class="btn btn-default <?php if(@$_GET['hab']) echo 'active' ?>">
					<input type="checkbox" name="hab" autocomplete="off" <?php if(@$_GET['hab']) echo 'checked' ?>> c/Habitación
				</label>
				<label class="btn btn-default <?php if(@$_GET['comp']) echo 'active' ?>">
					<input type="checkbox" name="comp" autocomplete="off" <?php if(@$_GET['comp']) echo 'checked' ?>> c/Acompañante
				</label>
			</div>
		</form>
		<div class="clearfix"></div>
		<?php 
		$s = isset($_REQUEST['s']) ? $_REQUEST['s'] : NULL;
		$f = @$_GET['from'];
		$d = @$_GET['docs'];
		$h = @$_GET['hab'];
		$c = @$_GET['comp'];
		$rows = $usuario->rows($s, $f, $d, $h, $c);
		?>
		<h4>Registros: <?php echo count($rows) ?></h4>
		<div style="border-bottom: 1px #ccc solid;" class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Modificar</th>
					<th>Boleto</th>
					<th>Check-in</th>
				</tr>
				<?php 
				if(count($rows) > 0):
				foreach($rows as $row): ?>
				<tr>
					<td><?php echo $row->id?></td>
					<td><?php echo $row->nombre?></td>
					<td><?php echo $row->correo?></td>
					<td>
						<a href='?u=<?php echo $row->id?>' type='button' class='btn btn-primary btn-xs'>Ver Detalle</a>
					</td>
					<td>
						<a href='http://borntobetec.mty.itesm.mx/boleto.php?s=<?php echo encriptarURL($row->correo, $key)?>' target="_blank" type='button' class='btn btn-primary btn-xs'>Generar Boleto</a>
						<a href='#' class='btn btn-info btn-xs' onclick='sendTicket(<?php echo $row->id ?>)'>Enviar Boleto</a>
					</td>
					<td>
						<?php if($row->checkin): ?>
						<span style="color:green; font-size: 30px" class="glyphicon glyphicon-ok-circle"></span>
						<?php else: ?>
						<span style="color:orange; font-size: 30px" class="glyphicon glyphicon-remove-circle"></span>
						<?php endif ?>
					</td>
				</tr>
				<?php 
				endforeach; 
				endif;
				?>
			</table>
		</div>
		<br>
		<div class="btn-group pull-right">
			<a href="./excel.php?<?php echo $_SERVER['QUERY_STRING'] ?>" class="btn btn-default" target="_blank">Generar Excel</a>
			<a href="?n=1" class="btn btn-success">Agregar Nuevo Registro</a>
		</div>
		<br>
		<div class="admin">
			<h2>Estadísticas</h2>
			<p class="p">* Número de usuarios registrados<span><?php echo $usuario->registrados() ?></span></p>
			<p class="p">* Número de usuarios Locales<span><?php echo $usuario->locales() ?></span></p>
			<p class="p">* Número de usuarios Foráneos<span><?php echo $usuario->foraneos() ?></span></p>
			<p class="p">* Usuarios Foráneos pendientes de subir documentos<span><?php echo $usuario->nodocs() ?></span></p>
			<p class="p">* Usuarios Foráneos que solicitaron habitación<span><?php echo $usuario->hospedaje() ?></span></p>
			<p class="p">* Usuarios Foráneos que vienen con acompañantes<span><?php echo $usuario->acompana() ?></span></p>
		</div>
	</section>
	<?php endif; ?>
	<?php if(isset($_REQUEST['checkin'])):?>
	<?php 
	if(isset($_REQUEST['validate'])){
		if(!isset($_REQUEST['correo']) || $_REQUEST['correo'] == ''){
	?>
	<div class='alert alert-danger' role='alert'>Antes de comenzar se debe introducir un correo válido.</div>
	<?php
		}else{
			$u = $usuario->byMail($_REQUEST['correo']);
			if(!$u){
	?>
	<div class='alert alert-danger' role='alert'>No se ha encontrado este correo en la base de datos.</div>
	<?php
			}else{
				$u->talleres = $usuario->getTalleres($u->id);
	?>
	<div class='alert alert-success' role='alert'>Correo válido, puedes realizar el Check-in.</div>
	<?php			
			}
		}
	}
	if(isset($_REQUEST['confirm'])){
		$_REQUEST['correo'] = '';
		$ok = $usuario->checkin($_REQUEST['id']);
		if($ok){
	?>
	<div class='alert alert-success' role='alert'>El Check-in se ha realizado correctamente.</div>
	<script type="text/javascript">
		setTimeout(function(){
			$('.alert').fadeOut();
		},500);
	</script>
	<?php
		}else{
	?>
	<div class='alert alert-warning' role='alert'>Hubo un problema al realizar el check-in, vuelve a intentarlo.</div>
	<?php
		}
	}
	?>
	<section>
		<h3>Check-in</h3>
		<form class="form-inline" role="form" method="post" >
			<input type="hidden" name="checkin">
			<?php if(isset($_REQUEST['validate']) && isset($_REQUEST['correo']) && $_REQUEST['correo'] != '' && $u): ?>
			<input type="hidden" name="confirm">
			<input type="hidden" name="id" value="<?php echo $u->id ?>">
			<?php else: ?>
			<input type="hidden" name="validate">
			<?php endif ?>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input value="<?php if(isset($_REQUEST['correo'])) echo $_REQUEST['correo'] ?>" type="email" class="form-control" id="incorreo" name="correo" placeholder="Email">
				</div>
			</div>
			<?php if(isset($_REQUEST['validate']) && isset($_REQUEST['correo']) && $_REQUEST['correo'] != '' && $u): ?>
			<a href="./index.php?checkin" class="btn btn-default">Cancelar</a>
			<button type="submit" class="btn btn-primary">Check-in</button>
			<?php else: ?>
			<button type="submit" class="btn btn-primary">Validar</button>
			<?php endif ?>
		</form>
		<?php if(isset($_REQUEST['validate']) && isset($_REQUEST['correo']) && $_REQUEST['correo'] != '' && $u): ?>
		<div class="row">
			<div class="col-sm-6">
				<h3>Talleres del Viernes</h3>
				<h5>Taller Viernes de 16:30 a 17:20</h5>
				<p><?php echo $u->talleres[0]->nombre ?></p>
				<br>
				<h5>Taller Viernes de 17:40 a 18:30</h5>
				<p><?php echo $u->talleres[1]->nombre ?></p>
				<br>
				<h5>Taller Viernes de 18:40 a 19:30</h5>
				<p><?php echo $u->talleres[2]->nombre ?></p>
				<br>
			</div>
			<div class="col-sm-6">
				<h3>Talleres del Sábado</h3>
				<h5>Taller Sábado de 9:00 a 11:30</h5>
				<p><?php echo $u->talleres[3]->nombre ?></p>
				<br>
				<h5>Taller Sábado de 11:45 a 14:15</h5>
				<p><?php echo $u->talleres[4]->nombre ?></p>
				<br>
			</div>
		</div>
		<?php endif ?>
	</section>
	<?php endif ?>
	<?php if(isset($_REQUEST['admin'])):?>
	<section>
		<div class="btn-group pull-right">
			<a href="./index.php?admin&new" class="btn btn-success" >Agregar Nuevo Registro</a>
		</div><br /><br />
		<div style="border-bottom: 1px #ccc solid;" class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th>Usuario</th>
					<th>Correo</th>
					<th>Permiso</th>
					<th>Eliminar</th>
				</tr>
				<?php foreach($admin->rows() as $row): ?>
				<tr>
					<td><?php echo $row->s_login_user ?></td>
					<td><?php echo $row->s_login_email ?></td>
					<td>
						<select class="form-control">
							<option <?php if($row->s_login_permission==1) echo 'selected' ?> value="1">Administrador</option>
							<option <?php if($row->s_login_permission==2) echo 'selected' ?> value="2">Editor</option>
							<option <?php if($row->s_login_permission==3) echo 'selected' ?> value="3">Sólo lectura</option>
						</select>
					</td>
					<td>
						<a href='./index.php?admin&delete&id=<?php echo $row->id_login ?>' type='button' class='btn btn-danger btn-xs'>Eliminar</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<?php 
		if(isset($_REQUEST['new'])):
			if(isset($_POST['email']) && isset($_POST['usr'])):
				$n = $admin->create($_POST['usr'],$_POST['pwd'],$_POST['perm'],$_POST['email']);
				if($n):
		?>
			<script type="text/javascript">location.href = './index.php?admin&e=102';</script>
		<?php 
				endif;
			endif;
		?>
		<h3>Nuevo Usuario</h3>
		<form style="margin-top:20px" method="post" role="form">
			<div class="form-group">
				<input type="text" class="form-control" name="usr" placeholder="Usuario">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="pwd" placeholder="Contraseña">
			</div>
			<div class="form-group">
				<select name="perm" class="form-control">
					<option value="1">Administrador</option>
					<option value="2">Editor</option>
					<option value="3">Sólo lectura</option>
				</select>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-addon">@</div>
					<input class="form-control" type="email" name="email" placeholder="Correo electrónico">
				</div>
			</div>
			<button type="submit" class="btn btn-default">Guardar</button>
		</form>
		<?php endif ?>
		<?php 
		if(isset($_REQUEST['delete'])):
			if(isset($_REQUEST['id'])):
				$d = $admin->delete($_REQUEST['id']);
				if($d):
		?>
			<script type="text/javascript">location.href = './index.php?admin&e=103'</script>
		<?php
				endif;
			endif;
		endif;
		?>
	</section>
	<?php endif; ?>
	<?php 
	if(isset($_REQUEST['u'])):
	$user = $usuario->byID($_REQUEST['u']);
	$user->follow = $usuario->getFollow($_REQUEST['u']);
	$user->universidad = $usuario->getUniversidad($_REQUEST['u']);
	$user->carreras = $usuario->getCarreras($_REQUEST['u']);
	$user->talleres = $usuario->getTalleres($_REQUEST['u']);
	$user->nomprepa = $usuario->getPrepa($_REQUEST['u']);
	//var_dump($user);
	$val = encriptarURL($user->correo, $key);
	$carta = $docos->documentos($_REQUEST['u']);
	?>
	<div class="btn-group pull-right">
		<button type="button" class="btn btn-info" onclick="sendTicket()">Enviar Boleto</button>
		<?php if($_SESSION['user']->s_login_permission < 3): ?>
		<button type="button" class="btn btn-success" onclick="Update()">Guardar Cambios</button>
		<a href="./index.php" class="btn btn-default">Cancelar Cambios</a>
		<?php if($_SESSION['user']->s_login_permission  < 2): ?>
		<button type="button" class="btn btn-danger btn-delete">Eliminar Registro</button>
		<?php endif ?>
		<?php else: ?>
		<a href="./index.php" class="btn btn-default">Regresar</a>
		<?php endif ?>
	</div>
	<div class="clearfix"></div>
	<br>
	<ul class="nav nav-tabs" role="tablist" id="myTab">
	 	<li role="presentation" class="active"><a href="#generales" role="tab" data-toggle="tab">Datos Generales</a></li>
	 	<li role="presentation"><a href="#hospedaje" role="tab" data-toggle="tab">Hospedaje</a></li>
	 	<li role="presentation"><a href="#universidad" role="tab" data-toggle="tab">Universidad</a></li>
	 	<li role="presentation"><a href="#talleres" role="tab" data-toggle="tab">Talleres</a></li>
	 	<li role="presentation"><a href="#documentos" role="tab" data-toggle="tab">Documentos</a></li>
	</ul>
	<div class="tab-content">
	 	<div role="tabpanel" class="tab-pane active" id="generales">
	 		<form class="form-horizontal" role="form">
	 			<h3>Generales</h3>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Género</label>
		 			<div class="col-sm-10">
		 				<select id="genero">
							<option <?php if($user->genero=='0') echo 'selected' ?> value="0">Hombre</option>
							<option <?php if($user->genero=='1') echo 'selected' ?> value="1">Mujer</option>
						</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Nombre</label>
		 			<div class="col-sm-10">
		 				<input type="hidden" id="idu" value="<?php echo $uid = $_REQUEST['u'];?>" />
		 				<input type="text" class="form-control" placeholder="Nombre(s)" id="nombre" value="<?php echo $user->nombre ?>">
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Fecha de Nacimiento(YYYY-MM-DD)</label>
		 			<div class="col-sm-10">
		 				<input type="text" class="form-control" placeholder="Nombre(s)" id="cumple" value="<?php echo $user->cumpleanos ?>">
		 			</div>
		 		</div>
		 		<h3>Contacto</h3>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Correo Electrónico</label>
		 			<div class="col-sm-10">
		 				<input type="email" class="form-control" placeholder="Correo electrónico" id="email" value="<?php echo $user->correo?>">
		 				<input type="hidden"  id="correo" value="<?php echo $val; ?>">
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Teléfono</label>
		 			<div class="col-sm-10">
		 				<input type="tel" class="form-control" placeholder="Telefono" id="tel" value="<?php echo $user->telefono ?>">
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Celular</label>
		 			<div class="col-sm-10">
		 				<input type="tel" class="form-control" placeholder="Celular" id="cel" value="<?php echo $user->celular ?>">
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">¿Cómo te enteraste?</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="medio">
							<?php foreach($medio->listAll() as $value): ?>
							<?php if($value->id == $user->id_medio): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
							<?php endforeach; ?>
						</select>
		 			</div>
		 		</div>
		 		<h3>Estudios y fecha de ingreso</h3>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Estado</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="estado">
							<?php foreach($estado->listAll() as $value): ?>
							<?php if($value->id == $user->id_estado): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
							<?php endforeach; ?>
						</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Ciudad</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="ciudad">
							<?php foreach($ciudad->listAll() as $value): ?>
							<?php if($value->id == $user->id_ciudad): ?>
							<option class="estado estado<?php echo $value->estado_id ?>" selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option class="estado estado<?php echo $value->estado_id ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
							<?php endforeach; ?>
						</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Preparatoria</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="prepa">
							<?php foreach($prepa->listAll() as $value): ?>
							<?php if($value->id == $user->id_prepa): ?>
							<option class="ciudad ciudad<?php echo $value->id_ciudad ?>" selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option class="ciudad ciudad<?php echo $value->id_ciudad ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
							<?php endforeach; ?>
							<option value="#">Otra</option>
						</select>
		 			</div>
		 			<?php if($user->id_prepa == '#'): ?>
		 			<div class="col-sm-10">
		 				<input type="text" class="form-control" placeholder="Otra preparatoria" id="nomprepa" value="<?php echo $user->nomprepa ?>">
		 			</div>
		 			<?php endif ?>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Fecha de Ingreso al Nivel Superior</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="ingreso">
		 					<option value="2015" <?php if($user->graduacion == '2015') echo 'selected' ?>>Agosto 2015</option>
		 					<option value="2016" <?php if($user->graduacion == '2016') echo 'selected' ?>>Enero 2016</option>
		 					<option value="2016-1" <?php if($user->graduacion == '2016-1') echo 'selected' ?>>Agosto 2016</option>
		 				</select>
		 				<!--input type="text" class="form-control" placeholder="Fecha de Ingreso" id="ingreso" value="<?php echo $user->graduacion ?>"-->
		 			</div>
		 		</div>
	 		</form>
		</div>
		<div role="tabpanel" class="tab-pane" id="hospedaje">
			<form class="form-horizontal" role="form">
				<h3>Hospedaje</h3>
				<div class="form-group">
			 		<label class="col-sm-2 control-label">Necesita Hospedaje</label>
			 		<div class="col-sm-10">
			 			<select id="hotel">
							<option <?php if($user->hospedaje=='0') echo 'selected' ?> value="0">No</option>
							<option <?php if($user->hospedaje=='1') echo 'selected' ?> value="1">Si</option>
						</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Lleva Acompañante</label>
			 		<div class="col-sm-10">
			 			<select id="solo">
							<option <?php if($user->acompana=='0') echo 'selected' ?> value="0">No</option>
							<option <?php if($user->acompana=='1') echo 'selected' ?> value="1">Si</option>
						</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Parentesco del Acompañante</label>
			 		<div class="col-sm-10">
			 			<select id="perentesco">
			 				<option>Ninguno</option>
							<option <?php if($user->follow && $user->follow->parentestco=='1') echo 'selected' ?> value="1">Madre</option>
							<option <?php if($user->follow && $user->follow->parentestco=='2') echo 'selected' ?> value="2">Padre</option>
						</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Nombre del Acompañante</label>
			 		<div class="col-sm-10">
			 			<input type="text" class="form-control" placeholder="Nombre" id="acompana" value="<?php if($user->follow) echo $user->follow->acompanante ?>">
			 		</div>
			 	</div>
			</form>
		</div>
		<div role="tabpanel" class="tab-pane" id="universidad">
			<form class="form-horizontal" role="form">
				<h3>Elección de Carrera</h3>
				<div class="form-group">
			 		<label class="col-sm-2 control-label">Eligió el Tec</label>
			 		<div class="col-sm-10">
			 			<select id="tecno">
							<option <?php if($user->universidad->moneterrey == '0') echo 'selected' ?> value="0">Sí</option>
							<option <?php if($user->universidad->moneterrey == '1') echo 'selected' ?> value="1">No</option>
						</select>
			 		</div>
			 	</div>
			 	<h3>Carreras de Interés</h3>
				<div class="form-group">
			 		<label class="col-sm-2 control-label">Carrera 1</label>
			 		<div class="col-sm-10">
			 			<select id="car1">
			 				<option>Ninguno</option>
			 			<?php foreach($carrera->listAll() as $value): ?>
							<?php if($value->id == $user->carreras[0]->id_carrera): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->carreras[1]->id_carrera || $value->id == $user->carreras[2]->id_carrera): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
			 			</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Carrera 2</label>
			 		<div class="col-sm-10">
			 			<select id="car2">
			 				<option>Ninguno</option>
			 			<?php foreach($carrera->listAll() as $value): ?>
							<?php if($value->id == $user->carreras[1]->id_carrera): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->carreras[0]->id_carrera || $value->id == $user->carreras[2]->id_carrera): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
			 			</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Carrera 3</label>
			 		<div class="col-sm-10">
			 			<select id="car3">
			 				<option>Ninguno</option>
			 			<?php foreach($carrera->listAll() as $value): ?>
							<?php if($value->id == $user->carreras[2]->id_carrera): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->carreras[0]->id_carrera || $value->id == $user->carreras[1]->id_carrera): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
			 			</select>
			 		</div>
			 	</div>
			</form>
		</div>
		<div role="tabpanel" class="tab-pane" id="talleres">
			<form class="form-horizontal" role="form">
				<h3>Talleres del Viernes</h3>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Viernes de 16:30 a 17:20</label>
					<div class="col-sm-10">
						<input id="pvopt1" type="hidden" value="<?php echo $user->talleres[0]->id_taller ?>">
						<select id="vopt1">
							<option>Ninguno</option>
						<?php foreach($taller->listViernes(true) as $value): ?>
							<?php if($value->id == $user->talleres[0]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[1]->id_taller || $value->id == $user->talleres[2]->id_taller): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option class="<?if($taller->full($value->id, 1)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Viernes de 17:40 a 18:30</label>
					<div class="col-sm-10">
						<input id="pvopt2" type="hidden" value="<?php echo $user->talleres[1]->id_taller ?>">
						<select id="vopt2">
							<option>Ninguno</option>
						<?php foreach($taller->listViernes() as $value): ?>
							<?php if($value->id == $user->talleres[1]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[0]->id_taller || $value->id == $user->talleres[2]->id_taller): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option class="<?if($taller->full($value->id, 2)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Viernes de 18:40 a 19:30</label>
					<div class="col-sm-10">
						<input id="pvopt3" type="hidden" value="<?php echo $user->talleres[2]->id_taller ?>">
						<select id="vopt3">
							<option>Ninguno</option>
						<?php foreach($taller->listViernes() as $value): ?>
							<?php if($value->id == $user->talleres[2]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[0]->id_taller || $value->id == $user->talleres[1]->id_taller): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option class="<?if($taller->full($value->id, 3)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<h3>Talleres del Sábado</h3>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Sábado de 9:00 a 11:30</label>
					<div class="col-sm-10">
						<input id="psopt1" type="hidden" value="<?php echo $user->talleres[3]->id_taller ?>">
						<select id="sopt1">
							<option>Ninguno</option>
						<?php foreach($taller->listSabado() as $value): ?>
							<?php if($value->id == $user->talleres[3]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[4]->id_taller): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option class="<?php if($taller->full($value->id, 4)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Sábado de 11:45 a 14:15</label>
					<div class="col-sm-10">
						<input id="psopt2" type="hidden" value="<?php echo $user->talleres[4]->id_taller ?>">
						<select id="sopt2">
							<option>Ninguno</option>
						<?php foreach($taller->listSabado() as $value): ?>
							<?php if($value->id == $user->talleres[4]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[3]->id_taller): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option class="<?php if($taller->full($value->id, 5)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
			</form>
		</div>
		<div role="tabpanel" class="tab-pane" id="documentos">
			<?php if($carta->url_permiso != '-'): ?>
			<h3>Carta Compromiso</h3>
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $_REQUEST['u'] ?>" />
					<input type="hidden" name="action" value="carta" />
					<input type="file" name="cartacomp">
					<br />
				<?php if($carta->url_permiso != '#' && $carta->url_permiso != '' && $carta->url_permiso != NULL): ?>
					<input class="btn btn-info" type="submit" value="Actualizar" />
					<a class="btn btn-info" data-ob="lightbox" target="_blank" href="http://borntobetec.mty.itesm.mx/download/<?php echo $carta->url_permiso;?>">Ver Documento</a>
				<?php else: ?>
					<input class="btn btn-info" type="submit" value="Guardar" />
				<?php endif; ?>
				</div>
			</form>
			<?php endif ?>
			<?php if($carta->url_pago != '-'): ?>
			<h3>Comprobante de Pago</h3>
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="hidden" name="id" value="<?php echo $_REQUEST['u'] ?>">
					<input type="hidden" name="action" value="pago" />
					<input type="file" name="compago">
					<br />
				<?php if($carta->url_pago != '#' && $carta->url_pago != '' && $carta->url_pago != NULL): ?>
					<input class="btn btn-info" type="submit" value="Actualizar" />
					<a class="btn btn-info" data-ob="lightbox" target="_blank" href="http://borntobetec.mty.itesm.mx/download/<?php echo $carta->url_pago;?>">Ver Documento</a>
				<?php else: ?>
					<input class="btn btn-info" type="submit" value="Guardar" />
				<?php endif; ?>
				</div>
			</form>
			<?php endif ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if(isset($_REQUEST['n'])){?>
		<div class="btn-group pull-right">
			<button type="button" class="btn btn-success" onclick="saveNew()">Guardar</button>
			<a href="./index.php" class="btn btn-default">Cancelar</a>
		</div>
		<div class="clearfix"></div>
		<ul class="nav nav-tabs" role="tablist" id="myTab">
	 	<li role="presentation" class="active"><a href="#generales" role="tab" data-toggle="tab">Datos Generales</a></li>
	 	<li role="presentation"><a href="#hospedaje" role="tab" data-toggle="tab">Hospedaje</a></li>
	 	<li role="presentation"><a href="#universidad" role="tab" data-toggle="tab">Universidad</a></li>
	 	<li role="presentation"><a href="#talleres" role="tab" data-toggle="tab">Talleres</a></li>
	</ul>
	<div class="tab-content">
	 	<div role="tabpanel" class="tab-pane active" id="generales">
	 		<form class="form-horizontal" role="form">
	 			<h3>Generales</h3>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Género</label>
		 			<div class="col-sm-10">
		 				<select id="genero">
							<option value="0">Hombre</option>
							<option value="1">Mujer</option>
						</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Nombre</label>
		 			<div class="col-sm-10">
		 				<input type="text" class="form-control" placeholder="Nombre(s)" id="nombre" />
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Fecha de Nacimiento(YYYY-MM-DD)</label>
		 			<div class="col-sm-10">
		 				<input type="text" class="form-control" placeholder="Cumpleaños" id="cumple" />
		 			</div>
		 		</div>
		 		<h3>Contacto</h3>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Correo Electrónico</label>
		 			<div class="col-sm-10">
		 				<input type="email" class="form-control" placeholder="Correo electrónico" id="email" />
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Teléfono</label>
		 			<div class="col-sm-10">
		 				<input type="tel" class="form-control" placeholder="Telefono" id="tel" />
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Celular</label>
		 			<div class="col-sm-10">
		 				<input type="tel" class="form-control" placeholder="Celular" id="cel" />
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">¿Cómo te enteraste?</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="medio">
		 					<option value="">Elige un medio</option>
							<?php foreach($medio->listAll() as $value): ?>
								<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endforeach; ?>
						</select>
		 			</div>
		 		</div>
		 		<h3>Estudios y fecha de ingreso</h3>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Estado</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="estado">
		 					<option value="">Elige un Estado</option>
							<?php foreach($estado->listAll() as $value): ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endforeach; ?>
						</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Ciudad</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="ciudad">
		 					<option value="">Elige una Ciudad</option>
							<?php foreach($ciudad->listAll() as $value): ?>
							<option class="estado estado<?php echo $value->estado_id ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endforeach; ?>
						</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Preparatoria</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="prepa">
		 					<option value="">Elige una Preparatoria</option>
							<?php foreach($prepa->listAll() as $value): ?>
							<option class="ciudad ciudad<?php echo $value->id_ciudad ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endforeach; ?>
							<option value="#">Otra</option>
						</select>
		 			</div>
		 			<div class="col-sm-10">
		 				<input type="text" class="form-control" placeholder="Nombre de otra preparatoria" id="nomprepa" value="">
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Fecha de Ingreso al Nivel Superior</label>
		 			<div class="col-sm-10">
		 				<select class="form-control" id="ingreso">
		 					<option value="">Elige una fecha</option>
		 					<option value="2015">Agosto 2015</option>
		 					<option value="2016">Enero 2016</option>
		 					<option value="2016-1">Agosto 2016</option>
		 				</select>
		 			</div>
		 		</div>
	 		</form>
		</div>
		<div role="tabpanel" class="tab-pane" id="hospedaje">
			<form class="form-horizontal" role="form">
				<h3>Hospedaje</h3>
				<div class="form-group">
			 		<label class="col-sm-2 control-label">Necesita Hospedaje</label>
			 		<div class="col-sm-10">
			 			<select id="hotel">
							<option value="0">No</option>
							<option value="1">Si</option>
						</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Lleva Acompañante</label>
			 		<div class="col-sm-10">
			 			<select id="solo">
							<option value="0">No</option>
							<option value="1">Si</option>
						</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Parentesco del Acompañante</label>
			 		<div class="col-sm-10">
			 			<select id="perentesco">
			 				<option value="">Elige uno</option>
							<option value="1">Madre</option>
							<option value="2">Padre</option>
						</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Nombre del Acompañante</label>
			 		<div class="col-sm-10">
			 			<input type="text" class="form-control" placeholder="Nombre(s)" id="acompana" />
			 		</div>
			 	</div>
			</form>
		</div>
		<div role="tabpanel" class="tab-pane" id="universidad">
			<form class="form-horizontal" role="form">
				<h3>Elección de Carrera</h3>
				<div class="form-group">
			 		<label class="col-sm-2 control-label">Eligió el Tec</label>
			 		<div class="col-sm-10">
			 			<select id="tecno">
			 				<option value="">Elegir respuesta</option>
							<option value="0">Sí</option>
							<option value="1">No</option>
						</select>
			 		</div>
			 	</div>
			 	<h3>Carreras de Interés</h3>
				<div class="form-group">
			 		<label class="col-sm-2 control-label">Carrera 1</label>
			 		<div class="col-sm-10">
			 			<select id="car1">
			 				<option value="">Elige una</option>
			 			<?php foreach($carrera->listAll() as $value): ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
						<?php endforeach; ?>
			 			</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Carrera 2</label>
			 		<div class="col-sm-10">
			 			<select id="car2">
			 				<option value="">Elige una</option>
			 			<?php foreach($carrera->listAll() as $value): ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
						<?php endforeach; ?>
			 			</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Carrera 3</label>
			 		<div class="col-sm-10">
			 			<select id="car3">
			 				<option value="">Elige una</option>
			 			<?php foreach($carrera->listAll() as $value): ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
						<?php endforeach; ?>
			 			</select>
			 		</div>
			 	</div>
			</form>
		</div>
		<div role="tabpanel" class="tab-pane" id="talleres">
			<form class="form-horizontal" role="form">
				<h3>Talleres del Viernes</h3>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Viernes de 16:30 a 17:20</label>
					<div class="col-sm-10">
						<input id="pvopt1" type="hidden" value="<?php echo $user->talleres[0]->id_taller ?>">
						<select id="vopt1">
							<option value="">Elige uno</option>
						<?php foreach($taller->listViernes(true) as $value): ?>
							<option class="<?if($taller->full($value->id, 1)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Viernes de 17:40 a 18:30</label>
					<div class="col-sm-10">
						<input id="pvopt2" type="hidden" value="<?php echo $user->talleres[1]->id_taller ?>">
						<select id="vopt2">
							<option value="">Elige uno</option>
						<?php foreach($taller->listViernes() as $value): ?>
							<option class="<?if($taller->full($value->id, 2)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Viernes de 18:40 a 19:30</label>
					<div class="col-sm-10">
						<select id="vopt3">
							<option value="">Elige uno</option>
						<?php foreach($taller->listViernes() as $value): ?>
							<option class="<?if($taller->full($value->id, 3)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<h3>Talleres del Sábado</h3>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Sábado de 9:00 a 11:30</label>
					<div class="col-sm-10">
						<input id="psopt1" type="hidden" value="<?php echo $user->talleres[3]->id_taller ?>">
						<select id="sopt1">
							<option value="">Elige uno</option>
						<?php foreach($taller->listSabado() as $value): ?>
							<option class="<?if($taller->full($value->id, 4)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Sábado de 11:45 a 14:15</label>
					<div class="col-sm-10">
						<input id="psopt2" type="hidden" value="<?php echo $user->talleres[4]->id_taller ?>">
						<select id="sopt2">
							<option value="">Elige uno</option>
						<?php foreach($taller->listSabado() as $value): ?>
							<option class="<?if($taller->full($value->id, 5)) echo 'full' ?>" value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php }?>
<?php else: ?>
		<form role="form" action="./login.php?login" method="POST">
  			<div class="form-group">
    			<label for="exampleInputEmail1">Usuario</label>
    			<input type="text" class="form-control" placeholder="usuario" name="usuario" id="usuario">
 			</div>
  			<div class="form-group">
    			<label for="exampleInputPassword1">Password</label>
    			<input type="password" class="form-control" placeholder="******" name="clave" id="clave">
  			</div>
  			<button type="submit" class="btn btn-default">Submit</button>
  			<a href="./recuperar.php">Olvidé mi contraseña</a>
		</form>
<?php endif; ?>