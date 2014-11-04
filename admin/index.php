<?php 
require_once('header.php');
require_once('usuarios.class.php');
require_once('estado.class.php');
require_once('ciudad.class.php');
require_once('prepa.class.php');
require_once('carrera.class.php');

$usuario = new Usuario();
$estado = new Estado();
$ciudad = new Ciudad();
$prepa = new Prepa();
$carrera = new Carrera();
?>
<?php if(isset($_SESSION['user']) && $_SESSION['user'] != NULL): ?>
	<?php if(!isset($_REQUEST['u'])): ?>
	<section>
		<table class="table table-bordered">
			<tr>
				<td>ID</td>
				<td>Nombre</td>
				<td>Correo</td>
				<td>Modificar</td>
			</tr>
			<?php foreach($usuario->rows() as $row): ?>
			<?php //var_dump($row) ?>
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
		<div class="admin">
			<p class="p">* Número de usuarios registrados<span></span></p>
			<p class="p">* Número de usuarios Locales<span></span></p>
			<p class="p">* Número de usuarios Foráneos<span></span></p>
			<p class="p">* Usuarios Foráneos pendientes de subir documentos<span></span></p>
			<p class="p">* Usuarios Foráneos que solicitaron habitación<span></span></p>
			<p class="p">* Usuarios Foráneos que vienen con acompañantes<span></span></p>
		</div>
	</section>
	<?php endif; ?>
	<?php 
	if(isset($_REQUEST['u'])):
	$user = $usuario->byID($_REQUEST['u']);
	$user->follow = $usuario->getFollow($_REQUEST['u']);
	$user->universidad = $usuario->getUniversidad($_REQUEST['u']);
	$user->carreras = $usuario->getCarreras($_REQUEST['u']);
	var_dump($user);
	?>
	<p><br></p>
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
		 				<select>
							<option <?php if($user->genero=='0') echo 'selected' ?> value="0">Hombre</option>
							<option <?php if($user->genero=='1') echo 'selected' ?> value="1">Mujer</option>
						</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Nombre</label>
		 			<div class="col-sm-10">
		 				<input type="text" class="form-control" placeholder="Nombre(s)" id="nombre" value="<?php echo $user->nombre ?>">
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Fecha de Nacimiento</label>
		 			<div class="col-sm-10">
		 				<input type="text" class="form-control" placeholder="Nombre(s)" id="cumple" value="<?php echo $user->cumpleaños ?>">
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
		 		<h3>Estudios y fecha de ingreso</h3>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Estado</label>
		 			<div class="col-sm-10">
		 				<select class="form-control">
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
		 				<select class="form-control">
							<?php foreach($ciudad->listAll() as $value): ?>
							<?php if($value->id == $user->id_ciudad): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
							<?php endforeach; ?>
						</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-sm-2 control-label">Preparatoria</label>
		 			<div class="col-sm-10">
		 				<select class="form-control">
							<?php foreach($prepa->listAll() as $value): ?>
							<?php if($value->id == $user->id_prepa): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
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
			 			<select>
							<option <?php if($user->hospedaje=='0') echo 'selected' ?> value="0">No</option>
							<option <?php if($user->hospedaje=='1') echo 'selected' ?> value="1">Si</option>
						</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Lleva Acompañante</label>
			 		<div class="col-sm-10">
			 			<select>
							<option <?php if($user->hospedaje=='0') echo 'selected' ?> value="0">No</option>
							<option <?php if($user->hospedaje=='1') echo 'selected' ?> value="1">Si</option>
						</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Parentesco del Acompañante</label>
			 		<div class="col-sm-10">
			 			<select>
							<option <?php if($user->follow->parentestco=='1') echo 'selected' ?> value="1">Madre</option>
							<option <?php if($user->follow->parentestco=='2') echo 'selected' ?> value="2">Padre</option>
						</select>
			 		</div>
			 	</div>
			 	<div class="form-group">
			 		<label class="col-sm-2 control-label">Nombre del Acompañante</label>
			 		<div class="col-sm-10">
			 			<input type="text" class="form-control" placeholder="Nombre" id="acompana" value="<?php echo $user->follow->acompanante ?>">
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
			 			<select>
							<option <?php if($user->universidad->moneterrey == '0') echo 'selected' ?> value="0">Sí</option>
							<option <?php if($user->universidad->moneterrey == '1') echo 'selected' ?> value="1">No</option>
						</select>
			 		</div>
			 	</div>
			 	<h3>Carreras de Interés</h3>
				<div class="form-group">
			 		<label class="col-sm-2 control-label">Carrera 1</label>
			 		<div class="col-sm-10">
			 			<select>
			 			<?php foreach($carreras->listAll() as $value): ?>
							<?php if($value->id == $user->carreras[0]->id_carrera): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
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
			 			<select>
			 			<?php foreach($carreras->listAll() as $value): ?>
							<?php if($value->id == $user->carreras[1]->id_carrera): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
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
			 			<select>
			 			<?php foreach($carreras->listAll() as $value): ?>
							<?php if($value->id == $user->carreras[2]->id_carrera): ?>
							<option selected value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php else: ?>
							<option value="<?php echo $value->id ?>"><?php echo $value->nombre ?></option>
							<?php endif ?>
						<?php endforeach; ?>
			 			</select>
			 		</div>
			 	</div>
			<section>
				<p>CARRERAS DE INTERÉS</p>
		 		<select class="form-control">
					<option>Elige una carrera</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<p><br></p>
				<select class="form-control">
					<option>Elige una carrera</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<p><br></p>
				<select class="form-control">
					<option>Elige una carrera</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
		 	</section>
			<p><br></p>
			<section>
				<p>UNIVERSIDAD</p>
		 		<p>¿Tienes pensado estudiar tu carrera en el Tecnológico de Monterrey, Campus Monterrey?</p>
				<label class="radio-inline">
			  		<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">si
				</label>
				<label class="radio-inline">
			  		<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">no
				</label>
		 	</section>
			<p><br></p>
			<section>
				<p>MEDIO</p>
		 		<p>¿Cómo te enteraste del Born to be Tec?</p>
				<select class="form-control">
					<option>Elige un medio</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
		 	</section>
		</div>
		<div role="tabpanel" class="tab-pane" id="paso5">
			<p><br></p>
			<section>
				<p>ACTIVIDADES DEL VIERNES</p>
		 		<p>Elige las tres actividades a las que quieres asistir el viernes.</p>
				<select class="form-control">
					<option>Elige tu actividad de 16:30 a 17:00 horas</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<p><br></p>
				<select class="form-control">
					<option>Elige tu actividad de 17:40 a 16:30 horas</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<p><br></p>
				<select class="form-control">
					<option>Elige tu actividad de 18:40 a 19:30 horas</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
		 	</section>
			<p><br></p>
			<section>
				<p>TALLERES DEL SÁBADO</p>
		 		<p>Elige los dos talleres que quieres asistir el sábado.</p>
				<select class="form-control">
					<option>Elige tu taller de 9:00 a 11:30 horas</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				<p><br></p>
				<select class="form-control">
					<option>Elige tu taller de 11:45 a 14:15 horas</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</section>
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