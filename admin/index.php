<?php 

require_once('header.php');
if(isset($_SESSION['user']) && $_SESSION['user'] != NULL){
	require_once('usuarios.class.php');
	$usuarios = new Usuarios;
	//echo $_SESSION['user']->s_login_user;
?>
		<a href="./admin.class.php?logout">Salir</a><br />
		<br />
		<!-- Row usuarios -->
		<section>
			<table class="table table-bordered">
				<tr>
					<td>ID</td>
					<td>Nombre</td>
					<td>Correo</td>
					<td>Modificar</td>
				</tr>
				<tr>

				</tr>
				
				<?php
					echo utf8_decode($usuarios->rowUsuarios());
				?>
				</tr>
			</table>
		</section>	
		<!-- ROW usuarios -->
		<p><br></p>
		<ul class="nav nav-tabs" role="tablist" id="myTab">
		 	<li role="presentation" class="active"><a href="#paso1" role="tab" data-toggle="tab">PASO 1</a></li>
		 	<li role="presentation"><a href="#paso2" role="tab" data-toggle="tab">PASO 2</a></li>
		 	<li role="presentation"><a href="#paso3" role="tab" data-toggle="tab">PASO 3</a></li>
		 	<li role="presentation"><a href="#paso4" role="tab" data-toggle="tab">PASO 4</a></li>
		 	<li role="presentation"><a href="#paso5" role="tab" data-toggle="tab">PASO 5</a></li>
		</ul>
		<div class="tab-content">
		 	<div role="tabpanel" class="tab-pane active" id="paso1">
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
				<p><br></p>
				<section>
					<p>TU NOMBRE</p>
					<input type="text" class="form-control" placeholder="Nombre(s)" id="nombre"><br>
					<input type="text" class="form-control" placeholder="Apellido paterno" id="paterno"><br>
					<input type="text" class="form-control" placeholder="Apellido materno" id="materno">
				</section>
				<p><br></p>
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
					</select><br>
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
					</select><br>
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
			<div role="tabpanel" class="tab-pane" id="paso2">
				<p><br></p>
				<section>
					<p>DATOS CONTACTO</p>
					<input type="email" class="form-control" placeholder="Correo electrónico"><br>
					<div class="row">
					  	<div class="col-md-6">
					  		<input type="tel" class="form-control" placeholder="Lada">
					  	</div>
					  	<div class="col-md-6">
					  		<input type="tel" class="form-control" placeholder="Teléfono fijo"><br>
					  	</div>
					</div>
					<input type="tel" class="form-control" placeholder="Celular">
				</section>
				<p><br></p>
				<section>
					<p>¿DONDE ESTUDIAS?</p>
					<select class="form-control">
						<option>Estado donde estudio</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
					<p><br></p>
					<select class="form-control">
						<option>Ciudad donde estudio</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
					<p><br></p>
					<select class="form-control">
						<option>Prepa donde estudio</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</section>
				<p><br></p>
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
			</div>
			<div role="tabpanel" class="tab-pane" id="paso3">
				<p><br></p>
				<section>
					<p>TU HOSPEDAJE</p>
			 		<p>¿Necesitas hospedaje en Monterrey? ahora que asistirás al Born To Be Tec*</p>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">si
					</label>
					<label class="radio-inline">
						<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">no
					</label>
				</section>
			</div>
			<div role="tabpanel" class="tab-pane" id="paso4">
				<p><br></p>
				<section>
					<p>ELECCIÓN DE CARRERA</p>
					<p>¿Ya decidiste que carrera estudiar?</p>
					<label class="radio-inline">
				  		<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">si
					</label>
					<label class="radio-inline">
			  			<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">no
					</label>		
				</section>
				<p><br></p>
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
<?php
}else{ ?>
		<form role="form" action="./admin.class.php?login" method="POST">
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
	
<?php } ?>