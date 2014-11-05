<?php 
require_once('header.php');
require_once('usuarios.class.php');
require_once('estado.class.php');
require_once('ciudad.class.php');
require_once('prepa.class.php');
require_once('carrera.class.php');
require_once('medio.class.php');
require_once('talleres.class.php');

$usuario = new Usuario();
$estado = new Estado();
$ciudad = new Ciudad();
$prepa = new Prepa();
$carrera = new Carrera();
$medio = new Medio();
$taller = new Taller();
?>
<?php if(isset($_SESSION['user']) && $_SESSION['user'] != NULL): ?>
	<?php if(!isset($_REQUEST['u'])): ?>
	<section>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Correo</td>
					<td>Modificar</td>
				</tr>
				<?php 
				$s = isset($_REQUEST['s']) ? $_REQUEST['s'] : NULL;
				foreach($usuario->rows($s) as $row): ?>
				<tr>
					<td><?php echo $row->id?></td>
					<td><?php echo $row->nombre?></td>
					<td><?php echo $row->correo?></td>
					<td>
						<a href='?u=<?php echo $row->id?>' type='button' class='btn btn-primary btn-xs'>Ver Detalle</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		<div class="admin">
			<p class="p">* Número de usuarios registrados<span><?php echo $usuario->registrados() ?></span></p>
			<p class="p">* Número de usuarios Locales<span><?php echo $usuario->locales() ?></span></p>
			<p class="p">* Número de usuarios Foráneos<span><?php echo $usuario->foraneos() ?></span></p>
			<p class="p">* Usuarios Foráneos pendientes de subir documentos<span><?php echo $usuario->nodocs() ?></span></p>
			<p class="p">* Usuarios Foráneos que solicitaron habitación<span><?php echo $usuario->hospedaje() ?></span></p>
			<p class="p">* Usuarios Foráneos que vienen con acompañantes<span><?php echo $usuario->acompana() ?></span></p>
		</div>
	</section>
	<?php endif; ?>
	<?php 
	if(isset($_REQUEST['u'])):
	$user = $usuario->byID($_REQUEST['u']);
	$user->follow = $usuario->getFollow($_REQUEST['u']);
	$user->universidad = $usuario->getUniversidad($_REQUEST['u']);
	$user->carreras = $usuario->getCarreras($_REQUEST['u']);
	$user->talleres = $usuario->getTalleres($_REQUEST['u']);
	//var_dump($user);
	?>
	<div class="btn-group pull-right">
		<button type="button" class="btn btn-info">Enviar Boleto</button>
		<button type="button" class="btn btn-success" onclick="Update()">Guardar Cambios</button>
		<button type="button" class="btn btn-default">Cancelar Cambios</button>
		<button type="button" class="btn btn-danger">Eliminar Registro</button>
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
		 			<label class="col-sm-2 control-label">Fecha de Nacimiento</label>
		 			<div class="col-sm-10">
		 				<input type="text" class="form-control" placeholder="Nombre(s)" id="cumple" value="<?php echo $user->cumpleanos ?>">
		 			</div>
		 		</div>
		 		<h3>Contacto</h3>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Correo Electrónico</label>
		 			<div class="col-sm-10">
		 				<input type="email" class="form-control" placeholder="Correo electrónico" id="email" value="<?php echo $user->correo?>">
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
						</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Fecha de Ingreso al Nivel Superior</label>
		 			<div class="col-sm-10">
		 				<input type="text" class="form-control" placeholder="Fecha de Ingreso" id="ingreso" value="<?php echo $user->graduacion ?>">
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
					<label class="col-sm-2 control-label">Taller Viernes 1</label>
					<div class="col-sm-10">
						<input id="pvopt1" type="hidden" value="<?php echo $user->talleres[0]->id_taller ?>">
						<select id="vopt1">
						<?php foreach($taller->listViernes() as $value): ?>
							<?php if($value->id == $user->talleres[0]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[1]->id_taller || $value->id == $user->talleres[2]->id_taller): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Viernes 2</label>
					<div class="col-sm-10">
						<input id="pvopt2" type="hidden" value="<?php echo $user->talleres[1]->id_taller ?>">
						<select id="vopt2">
						<?php foreach($taller->listViernes() as $value): ?>
							<?php if($value->id == $user->talleres[1]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[0]->id_taller || $value->id == $user->talleres[2]->id_taller): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Viernes 3</label>
					<div class="col-sm-10">
						<input id="pvopt3" type="hidden" value="<?php echo $user->talleres[2]->id_taller ?>">
						<select id="vopt3">
						<?php foreach($taller->listViernes() as $value): ?>
							<?php if($value->id == $user->talleres[2]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[0]->id_taller || $value->id == $user->talleres[1]->id_taller): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<h3>Talleres del Sábado</h3>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Sábado 1</label>
					<div class="col-sm-10">
						<input id="psopt1" type="hidden" value="<?php echo $user->talleres[3]->id_taller ?>">
						<select id="sopt1">
						<?php foreach($taller->listSabado() as $value): ?>
							<?php if($value->id == $user->talleres[3]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[4]->id_taller): ?>
							<option value="<?php echo $value->id ?>" style="display: none;"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Taller Sábado 2</label>
					<div class="col-sm-10">
						<input id="psopt2" type="hidden" value="<?php echo $user->talleres[4]->id_taller ?>">
						<select id="sopt2">
						<?php foreach($taller->listSabado() as $value): ?>
							<?php if($value->id == $user->talleres[4]->id_taller): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php elseif($value->id == $user->talleres[3]->id_taller): ?>
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
	</div>
	<?php endif; ?>
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
		</form>
<?php endif; ?>