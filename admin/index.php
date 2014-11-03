<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>BTEC</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<img src="../img/logo.png">
		</nav>
		<form role="form" action="./admin.class.php?login" method="POST">
  			<div class="form-group">
    			<label for="exampleInputEmail1">Email address</label>
    			<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="usuario" id="usuario">
 			</div>
  			<div class="form-group">
    			<label for="exampleInputPassword1">Password</label>
    			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="clave" id="clave">
  			</div>
  			<button type="submit" class="btn btn-default">Submit</button>
		</form>
		<p><br></p>
		<ul class="nav nav-tabs" role="tablist" id="myTab">
		 	<li role="presentation" class="active"><a href="#genero" role="tab" data-toggle="tab">PASO 1</a></li>
		 	<li role="presentation"><a href="#nombre" role="tab" data-toggle="tab">PASO 2</a></li>
		 	<li role="presentation"><a href="#cumpleaños" role="tab" data-toggle="tab">PASO 3</a></li>
		</ul>
		<div class="tab-content">
		 	<div role="tabpanel" class="tab-pane active" id="genero">
		 		<section>
		 			<p><br></p>
		 			<p>GÉNERO</p>
					<label class="radio-inline">
			  			<input type="radio" name="inlineRadioOptions" id="genero" value="option1"> HOMBRE
					</label>
					<label class="radio-inline">
			  			<input type="radio" name="inlineRadioOptions" id="genero" value="option2"> MUJER
					</label>
				</section>
		 	</div>
		 	<div role="tabpanel" class="tab-pane" id="nombre">
		 		<section>
		 			<p><br></p>
					<p>TU NOMBRE</p>
					<input type="text" class="form-control" placeholder="Nombre(s)" id="nombre">
					<input type="text" class="form-control" placeholder="Apellido paterno" id="paterno">
					<input type="text" class="form-control" placeholder="Apellido materno" id="materno">
				</section>
		 	</div>
		 	<div role="tabpanel" class="tab-pane" id="cumpleaños">
		 		<section>
		 			<p><br></p>
					<p>FECHA DE NACIMIENTO</p>
					<select class="form-control">
						<option>Día*</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
						<option>13</option>
						<option>14</option>
						<option>15</option>
						<option>16</option>
						<option>17</option>
						<option>18</option>
						<option>19</option>
						<option>20</option>
						<option>21</option>
						<option>22</option>
						<option>23</option>
						<option>24</option>
						<option>25</option>
						<option>26</option>
						<option>27</option>
						<option>28</option>
						<option>29</option>
						<option>30</option>
						<option>31</option>
					</select>
					<select class="form-control">
						<option>Mes*</option>
						<option>Enero</option>
						<option>Febrero</option>
						<option>Marzo</option>
						<option>Abril</option>
						<option>Mayo</option>
						<option>Junio</option>
						<option>Julio</option>
						<option>Agosto</option>
						<option>Septiembre</option>
						<option>Octubre</option>
						<option>Noviembre</option>
						<option>Diciembre</option>
					</select>
					<select class="form-control">
						<option>Año*</option>
						<option>1986</option>
						<option>1987</option>
						<option>1988</option>
						<option>1989</option>
						<option>1990</option>
						<option>1991</option>
						<option>1992</option>
						<option>1993</option>
						<option>1994</option>
						<option>1995</option>
						<option>1996</option>
						<option>1997</option>
						<option>1998</option>
					</select>
				</section>
		 	</div>
		</div>
		<p><br></p>
		<p>PASO 2</p>
		<ul class="nav nav-tabs" role="tablist" id="myTab">
			<li role="presentation" class="active"><a href="#contacto" role="tab" data-toggle="tab">PASO 4</a></li>
			<li role="presentation"><a href="#estudios" role="tab" data-toggle="tab">PASO 5</a></li>
			<li role="presentation"><a href="#ingreso" role="tab" data-toggle="tab">PASO 6</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="contacto">
				<section>
					<p><br></p>
					<p>DATOS CONTACTO</p>
					<input type="email" class="form-control" placeholder="Correo electrónico">
						<input type="email" class="form-control" placeholder="Correo electrónico">
						<div class="row">
						  	<div class="col-md-6">
						  		<input type="tel" class="form-control" placeholder="Lada">
						  	</div>
						  	<div class="col-md-6">
						  		<input type="tel" class="form-control" placeholder="Teléfono fijo">
						  	</div>
						</div>
						<input type="tel" class="form-control" placeholder="Celular">
				</section>
			</div>
			<div role="tabpanel" class="tab-pane" id="estudios">
				<section>
					<select class="form-control">
						<option>Estado donde estudio</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
					<select class="form-control">
						<option>Ciudad donde estudio</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
					<select class="form-control">
						<option>Prepa donde estudio</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</section>
				<section>
					<p>INGRESO</p>
					<select class="form-control">
						<option>Fecha esperada de ingreso a carrera</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</section>	
			</div>
			<div role="tabpanel" class="tab-pane" id="ingreso">
				<section>
					<select class="form-control">
						<option>Fecha esperada de ingreso a carrera</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</section>
			</div>
		</div>
		<p><br></p>
		<p>PASO 3</p>
		<ul class="nav nav-tabs" role="tablist" id="myTab">
		 	<li role="presentation" class="active"><a href="#hospedaje" role="tab" data-toggle="tab">HOSPEDAJE</a></li>
		</ul>
		<div class="tab-content">
		 	<div role="tabpanel" class="tab-pane active" id="hospedaje">
		 		<section>
		 			<p>¿Necesitas hospedaje en Monterrey? <br>ahora que asistirás al Born To Be Tec*</p>
					<label class="radio-inline">
			  			<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">si
					</label>
					<label class="radio-inline">
			  			<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">no
					</label>
				</section>
		 	</div>
		</div>
		<p><br></p>
		<p>PASO 4</p>
		<ul class="nav nav-tabs" role="tablist" id="myTab">
		 	<li role="presentation" class="active"><a href="#elegir_carrera" role="tab" data-toggle="tab">ELECCIÓN DE CARRERA</a></li>
		 	<li role="presentation"><a href="#carreras_interes" role="tab" data-toggle="tab">CARRERAS DE INTERÉS</a></li>
		 	<li role="presentation"><a href="#uni" role="tab" data-toggle="tab">UNIVERSIDAD</a></li>
		 	<li role="presentation"><a href="#medio" role="tab" data-toggle="tab">MEDIO</a></li>
		</ul>
		<div class="tab-content">
		 	<div role="tabpanel" class="tab-pane active" id="elegir_carrera">
		 		<section>
		 			<p>¿Ya decidiste que carrera estudiar?</p>
					<label class="radio-inline">
			  			<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">si
					</label>
					<label class="radio-inline">
			  			<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">no
					</label>
		 		</section>
		 	</div>
		 	<div role="tabpanel" class="tab-pane" id="carreras_interes">
		 		<section>
		 			<select class="form-control">
						<option>Elige una carrera</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
					<select class="form-control">
						<option>Elige una carrera</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
					<select class="form-control">
						<option>Elige una carrera</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
		 		</section>
		 	</div>
		 	<div role="tabpanel" class="tab-pane" id="uni">
		 		<section>
		 			<p>¿Tienes pensado estudiar tu carrera en el Tecnológico de Monterrey, Campus Monterrey?</p>
					<label class="radio-inline">
			  			<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">si
					</label>
					<label class="radio-inline">
			  			<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">no
					</label>
		 		</section>
		 	</div>
		 	<div role="tabpanel" class="tab-pane" id="medio">
		 		<section>
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
		</div>
		<p><br></p>
		<p>PASO 5</p>
		<ul class="nav nav-tabs" role="tablist" id="myTab">
		 	<li role="presentation" class="active"><a href="#viernes" role="tab" data-toggle="tab">ACTIVIDADES VIERNES</a></li>
		 	<li role="presentation"><a href="#sabado" role="tab" data-toggle="tab">TALLERES SÁBADO</a></li>
		</ul>

		<div class="tab-content">
		 	<div role="tabpanel" class="tab-pane active" id="viernes">
		 		<section>
		 			<p>Elige las tres actividades a las que quieres asistir el viernes.</p>
						<select class="form-control">
							<option>Elige tu actividad de 16:30 a 17:00 horas</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						<select class="form-control">
							<option>Elige tu actividad de 17:40 a 16:30 horas</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
						<select class="form-control">
							<option>Elige tu actividad de 18:40 a 19:30 horas</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
		 		</section>
		 	</div>
		 	<div role="tabpanel" class="tab-pane" id="sabado">
		 		<section>
		 			<p>Elige los dos talleres que quieres asistir el sábado.</p>
					<select class="form-control">
						<option>Elige tu taller de 9:00 a 11:30 horas</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
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





		<script>
		  $(function () {
		    $('#myTab a:last').tab('show')
		  })
		</script>



			<!--p>TU GÉNERO</p>
			<label class="radio-inline">
	  			<input type="radio" name="inlineRadioOptions" id="genero" value="option1"> HOMBRE
			</label>
			<label class="radio-inline">
	  			<input type="radio" name="inlineRadioOptions" id="genero" value="option2"> MUJER
			</label>
		</section-->
		<!--section>
			<p>TU NOMBRE</p>
			<input type="text" class="form-control" placeholder="Nombre(s)" id="nombre">
			<input type="text" class="form-control" placeholder="Apellido paterno" id="paterno">
			<input type="text" class="form-control" placeholder="Apellido materno" id="materno">
		</section>
		<section>
			<p>FECHA DE NACIMIENTO</p>
			<select class="form-control">
				<option>Día*</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>
				<option>7</option>
				<option>8</option>
				<option>9</option>
				<option>10</option>
				<option>11</option>
				<option>12</option>
				<option>13</option>
				<option>14</option>
				<option>15</option>
				<option>16</option>
				<option>17</option>
				<option>18</option>
				<option>19</option>
				<option>20</option>
				<option>21</option>
				<option>22</option>
				<option>23</option>
				<option>24</option>
				<option>25</option>
				<option>26</option>
				<option>27</option>
				<option>28</option>
				<option>29</option>
				<option>30</option>
				<option>31</option>
			</select>
			<select class="form-control">
				<option>Mes*</option>
				<option>Enero</option>
				<option>Febrero</option>
				<option>Marzo</option>
				<option>Abril</option>
				<option>Mayo</option>
				<option>Junio</option>
				<option>Julio</option>
				<option>Agosto</option>
				<option>Septiembre</option>
				<option>Octubre</option>
				<option>Noviembre</option>
				<option>Diciembre</option>
			</select>
			<select class="form-control">
				<option>Año*</option>
				<option>1986</option>
				<option>1987</option>
				<option>1988</option>
				<option>1989</option>
				<option>1990</option>
				<option>1991</option>
				<option>1992</option>
				<option>1993</option>
				<option>1994</option>
				<option>1995</option>
				<option>1996</option>
				<option>1997</option>
				<option>1998</option>
			</select>
		</section>
		<section>
			<!--p>DATOS DE CONTACTO</p>
			<input type="email" class="form-control" placeholder="Correo electrónico">
			<input type="email" class="form-control" placeholder="Correo electrónico">
			<div class="row">
			  	<div class="col-md-6">
			  		<input type="tel" class="form-control" placeholder="Lada">
			  	</div>
			  	<div class="col-md-6">
			  		<input type="tel" class="form-control" placeholder="Teléfono fijo">
			  	</div>
			</div>
			<input type="tel" class="form-control" placeholder="Celular">
		</section>
		<section>
			<p>¿DÓNDE ESTUDIAS?</p>
			<select class="form-control">
				<option>Estado donde estudio</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<select class="form-control">
				<option>Ciudad donde estudio</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<select class="form-control">
				<option>Prepa donde estudio</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</section>
		<section>
			<p>INGRESO</p>
			<select class="form-control">
				<option>Fecha esperada de ingreso a carrera</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</section>




		<section>
			<p>HOSPEDAJE</p>
			<label class="radio-inline">
	  			<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">si
			</label>
			<label class="radio-inline">
	  			<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">no
			</label>
		</section>
		<section>



			<p>ELECCIÓN DE CARRERA</p>
			<p>¿Ya decidiste que carrera estudiar?</p>
			<label class="radio-inline">
	  			<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">si
			</label>
			<label class="radio-inline">
	  			<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">no
			</label>>
		</section>
		<section>
			<p>CARERRAS DE INTERÉS</p>
			<select class="form-control">
				<option>Elige una carrera</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<select class="form-control">
				<option>Elige una carrera</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<select class="form-control">
				<option>Elige una carrera</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</section>
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
			<select class="form-control">
				<option>Elige tu actividad de 17:40 a 16:30 horas</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
			<select class="form-control">
				<option>Elige tu actividad de 18:40 a 19:30 horas</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</section>
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
			<select class="form-control">
				<option>Elige tu taller de 11:45 a 14:15 horas</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</section>
		<section>
			<table class="table table-bordered">
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Correo</td>
					<td>Modificar</td>
				</tr>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td><button type="button" class="btn btn-primary btn-xs">Modificar</button></td>
				</tr>
				<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td><button type="button" class="btn btn-primary btn-xs">Modificar</button></td>
				</tr>
			</table>
			
		</section>	
		<section>
			<p>Recuperar contraseña</p>
			<form class="form-horizontal" role="form">
			  	<div class="form-group">
			    	<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			    	<div class="col-sm-10">
			      		<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
			    	</div>
			  	</div>
			  	<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</section>
	</div>
</body>
</html>
