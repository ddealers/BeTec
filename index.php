<?php require("sql/funciones.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>BTEC</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/1140.css" />
	<link rel="stylesheet" type="text/css" href="css/ionicons.min.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive-tables.css" />
	<link rel="stylesheet" type="text/css" href="css/perfect-scrollbar.min.css" />
	<link rel="stylesheet" type="text/css" href="css/btec.css" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/vendor/modernizr.custom.js"></script>
	<script type="text/javascript" src="js/vendor/jquery.min.js"></script>
	<script type="text/javascript" src="js/vendor/skrollr/skrollr.min.js"></script>
	<script type="text/javascript" src="js/vendor/skrollr/skrollr.menu.min.js"></script>
	<script type="text/javascript" src="js/vendor/responsive-tables.js"></script>
	<script type="text/javascript" src="js/vendor/perfect-scrollbar.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>
	<!--[if IE 9]>
<style type="text/css">
#primary_nav_wrap
{
	display:table;
	width:50%;
	border-collapse:collapse;
	border:none;
	position: relative;
	z-index: 10;
	margin-left: 350px;
}

#primary_nav_wrap ul
{
	float:none;
	display:table-row;
	text-align:center;
	list-style:none;
}

#primary_nav_wrap ul a
{
	display:block;
}

#primary_nav_wrap ul li
{
	float:none;
	display:table-cell;
	margin:0;
}

#primary_nav_wrap ul li:hover > ul
{
	display:block;
}
.social{
	float: right;
	margin-right: 100px!important;
	margin-top: -45px!important;
}

.step-area{
	float:left!important;
	margin-left:130px!important;
}
.title{
	display:table;
	border-collapse:collapse;
	border:none;
	position: relative;
	z-index: 10;
	padding-bottom: 40px;
	margin-left: 180px!important;
}
.j{
	display:inline;
}
.v{
	display:inline;
}
.s{
	display: inline;
}
.days{
	margin-top: 20px!important;
}
</style>
<![endif]-->
	<header>
		<figure>
			<a id="logo" href="#"><img src="./img/logo.png" title="Born to be TEC" /></a>
			
		</figure>
		<nav id="primary_nav_wrap">
			<ul>
				<li>
					<a data-0="font-weight:700" data-100p="font-weight:500" data-menu-top="0" href="#be_tec">BTEC</a>
				</li>
				<li>
					<a data-0="font-weight:500" data-100p="font-weight:700" data-200p="font-weight:500" data-menu-top="100p" href="#actividades">Actividades</a>
				</li>
				<li>
					<a data-100p="font-weight:500" data-200p="font-weight:700" data-300p="font-weight:500" data-menu-top="200p" href="#agenda">Agenda</a>
				</li>
				<li>
					<a  data-200p="font-weight:500" data-300p="font-weight:700" data-400p="font-weight:500" data-menu-top="300p" href="#sede">Sede</a>
				</li>
				<li>
					<a  data-300p="font-weight:500" data-400p="font-weight:700" data-500p="font-weight:500" data-menu-top="400p" href="#registrate">Regístrate</a>
				</li>
				<li>
					<a data-400p="font-weight:500" data-500p="font-weight:700" data-menu-top="500p" href="#faq">FAQ's</a>
				</li>
			</ul>
		</nav>
<!--nav id="primary_nav_wrap">
<ul>
  <li><a href="#">Menu 1</a></li>
  <li><a href="#">Menu 2</a></li>
  <li><a href="#">Menu 3</a></li>
  <li><a href="#">Menu 1</a></li>
  <li><a href="#">Menu 2</a></li>
  <li><a href="#">Menu 3</a></li>
</nav-->
		<div class="social">
			<a id="btn_registrate" href="#registro"><img src="./img/registro_boton.png"/></a>
			<div class="rs">
				<a href="http://www.facebook.com/AdmisionesTecdeMty" target="_blank"><img src="./img/face.png"></a>
				<a href="http://twitter.com/AdmisionesITESM" target="_blank"><img src="./img/tw.png"></a>
			</div>
		</div>
	</header>
	<nav class="arrows">
		<a class="prev" href="#prev" data-0="opacity:0; display:none" data-50p="display:block" data-100p="opacity:1" data-500p="opacity:1;display:block"></a>
		<a class="next" href="#next" data-400p="opacity:1;display:block" data-450p="opacity:0"></a>
	</nav>
	<section id="be_tec" data-0="transform: translate(0%,0)" data-100p="transform: translate(-100%,0)">
		<article><!--CONTENIDO_BORN_TO_BE_TEC-->
			<h1>¿QUÉ ES?</h1>
			<h2>UN EVENTO PENSADO EN <br> TI, QUE ESTÁS EN EL <br> ÚLTIMO AÑO DE PREPA.</h2>
			<p>BORN TO BE TEC es un evento diseñado para que tengas la oportunidad de<br>vivir un día como alumno del Tecnológico de Monterrey.<br><br>Podrás hacer nuevos amigos, conocer el campus, interactuar con alumnos<br>actuales, líderes estudiantiles, y descubrir toda la oferta educativa que podrías<br>estudiar en el Campus Monterrey.<br><br>Te apoyaremos en la elección de carrera a través de una experiencia diseñada<br>por cada director de los programas académicos.<br><br>Te esperamos este 21 y 22 de noviembre en el Tecnológico de Monterrey,<br>en el Campus Monterrey. Cupo limitado ¡Regístrate ahora!</p>
		</article>
	</section>
	<section id="actividades" data-0="transform: translate(100%,0)" data-100p="transform: translate(0%,0)" data-200p="transform: translate(-100%,0)">
		<article><!--CONTENIDO_ACTIVIDADES-->
			<h1>ACTIVIDADES</h1>
			<!--h2>¿TE PREGUNTAS LO QUE <br> VAS A HACER DURANTE <br> ESTOS 2 DÍAS?</h2-->
			<!--p>Te tenemos preparadas muchas actividades para que conozcas el Tecnológico <br> de Monterrey y todo lo que el Campus Monterrey tiene que ofrecerte.</p-->
			<div class="container12">
			 	<div class="column3">
			 		<img src="./img/feria.png">
			 		<p class="col">Feria Estudiantil <br>con alumnos de<br> todas las carreras</p>
			 	</div>
			  	<div class="column3">
			  		<img src="./img/herramientas.png">
			  		<p class="col">Talleres<br> interactivos de<br> carreras</p>
			  	</div>
			  	<div class="column3">
			  		<img src="./img/bici.png">
			  		<p class="col">Tours por el <br>campus</p>
			  	</div>
			  	<div class="column3">
			  		<img src="./img/person.png">
			  		<p class="col">Conferencia<br> Magistral</p>
			  	</div>
			</div>
			<div class="container12">
			 	<div class="column3">
			 		<img src="./img/chat.png">
			 		<p class="col">Charla:  “No<br> tengo idea qué<br> carrera elegir”</p>
			 	</div>
			  	<div class="column3">
			  		<img src="./img/i.png">
			  		<p class="col">Sesiones <br>informativas</p>
			  	</div>
			  	<div class="column3">
			  		<img src="./img/pareja.png">
			  		<p class="col">Pláticas para<br> padres</p>
			  	</div>
			  	<div class="column3">
			  	</div>
			</div>
		</article>
	</section>
	<section id="agenda" data-100p="transform: translate(100%, 0)" data-200p="transform: translate(0%, 0)" data-300p="transform: translate(-100%, 0)">
		<article><!--CONTENIDO_AGENDA-->
			<h1>AGENDA</h1>
			<h2>CONOCE EL PROGRAMA</h2>
<!-- ============================== table  PARTE JUEVES-->
			<div class="calendar">
				<div class="header">
					<!--a class="prev" href="#prev"></a-->
					<div class="title">
						<div class="titles">
							<p class="j">JUEVES 20 DE NOVIEMBRE</p>
							<p class="v">VIERNES 21 DE NOVIEMBRE</p>
							<p class="s">SÁBADO 22 DE NOVIEMBRE</p>
						</div>
					</div>
					<!--a class="next" href="#next"></a-->
				</div>
				<div class="days">
					<div class="day">
						<table class="jueves">
							<tr>
								<td class="act">ACTIVIDADES</td>
								<td class="hr" colspan="2">3<span>pm</span></td>
								<td class="hr" colspan="2">4<span>pm</span></td>
								<td class="hr" colspan="2">5<span>pm</span></td>
								<td class="hr" colspan="2">6<span>pm</span></td>
								<td class="hr" colspan="2">7<span>pm</span></td>
								<td class="hr" colspan="2">8<span>pm</span></td>
								<td class="hr" colspan="2">9<span>pm</span></td>
								<td class="hr" colspan="2">10<span>pm</span></td>
							</tr>
							<tr>
								<td>Recepción de foráneos</td>
								<td colspan="8" class="uno">EXCLUSIVO FORÁNEOS</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Meet & Grill<br>(exclusivo foráneos)</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="6" class="seis">EXCLUSIVO FORÁNEOS</td>
								<td></td>
							</tr>
						</table>
						<div class="container12">
							<div class="column6">
								<img src="./img/icon.png">
					 			<p class="textJ"><span class="negritas">ASISTENTES FORÁNEOS:</span><br>Las actividades programadas para ti inician el jueves por la<br>noche. Tu registro será en el edificio de Residencias III,<br>ubicado en Av. Fernando García Roel esquina con Junco de<br>la Vega, de ahí te transladeremos al hotel sede. </p>
					 		</div>
					  		<div class="column6">
					  			<!--img src="./img/foco.png"-->
					  			<p class="textJ"><span class="negritas">ASISTENTES FORÁNEOS Y LOCALES:</span><br>El registro para las actividades del viernes por la tarde<br>y sábado, serán para todos en el Centro Estudiantil del<br>Campus Monterrey.</p>
					  		</div>
						</div>
						<div class="container12">
							<div class="column6 top">
								<img src="./img/foco.png">
					 			<p class="textJ"><span class="negritas">ASISTENTES LOCALES:</span><br>Las actividades para ti inician el viernes 21 de<br>noviembre a partir de las 14:30 horas. Consulta las<br>actividades del viernes para más detalles de la agenda.</p>
					 		</div>
					  		<div class="column6">
					  		</div>
						</div>
					</div>
					<div class="day">
						<table class="viernes">
							<tr>
								<td class="act">ACTIVIDADES</td>
								<td class="hr" colspan="2">9<span>AM</span></td>
								<td class="hr" colspan="2">10<span>AM</span></td>
								<td class="hr" colspan="2">11<span>AM</span></td>
								<td class="hr" colspan="2">12<span>AM</span></td>
								<td class="hr" colspan="2">1<span>PM</span></td>
								<td class="hr" colspan="2">2<span>PM</span></td>
								<td class="hr" colspan="2">3<span>PM</span></td>
								<td class="hr" colspan="2">4<span>PM</span></td>
								<td class="hr" colspan="2">5<span>PM</span></td>
								<td class="hr" colspan="2">6<span>PM</span></td>
								<td class="hr" colspan="2">7<span>PM</span></td>
								<td class="hr" colspan="2">8<span>PM</span></td>
							</tr>
							<tr>
								<td>Tour por la ciudad<br> (exclusivo foráneos)</td>
								<td colspan="6" class="uno">EXCLUSIVO FORÁNEOS</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Comida<br> (exclusivo foráneos)</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="4" class="dos">EXCLUSIVO FORÁNEOS</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Registro de locales<br> y foráneos</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="2" class="tres"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Platica de <br>bienvenida</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="2" class="cuatro"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Primera ronda de<br> actividades</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td ></td>
								<td></td>
								<td colspan="2" class="cinco"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Segunda ronda de<br> actividades</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="2" class="seis"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Tercera ronda de<br> actividades</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="2" class="siete"></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Cena / Cierre de viernes</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td colspan="3" class="ocho"></td>
							</tr>
						</table>
					</div>
					<div class="day">
<!-- ============================== table  PARTE SÁBADO-->
						<table class="sabado">
							<tr>
								<td class="act">ACTIVIDADES</td>
								<td class="hr" colspan="2">9<span>AM</span></td>
								<td class="hr" colspan="2">10<span>AM</span></td>
								<td class="hr" colspan="2">11<span>AM</span></td>
								<td class="hr" colspan="2">12<span>AM</span></td>
								<td class="hr" colspan="2">1<span>PM</span></td>
								<td class="hr" colspan="2">2<span>PM</span></td>
							</tr>
							<tr>
								<td>Primera ronda de talleres</td>
								<td colspan="4" class="siete">TALLERES INTERACTIVOS<br> DE LAS 40 CARRERAS</td>
								<td class="siete"></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Segunda ronda de talleres</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="cuatro"></td>
								<td colspan="5" class="cuatro">TALLERES INTERACTIVOS<br> DE LAS 40 CARRERAS></td>
							</tr>
						</table>
					</div>
				</div>		
			</div>
		</article>
	</section>
	<section id="sede" data-200p="transform: translate(100%, 0)" data-300p="transform: translate(0%, 0)" data-400p="transform: translate(-100%, 0)">
		<article><!--CONTENIDO_SEDE-->
			<h1>SEDE</h1>
			<h2>BORN TO BE TEC ES LLEVADO A <br> CABO EN EL TECNOLÓGICO DE <br> MONTERREY, CAMPUS MONTERREY,<br> <span> UBICADO EN AV. EUGENIO GARZA SADA <br>#2501. </span> </h2>
			<div class="image">
				<a target="_blank" href="https://www.google.com.mx/maps/place/Tecnol%C3%B3gico+de+Monterrey/@25.651565,-100.28954,15z/data=!4m2!3m1!1s0x0:0xab5b4cc298e6fe08">
					<img src="./img/circle1.png" class="uno">
				</a>
				<img src="./img/circle2.png" class="dos">
				<img src="./img/circle3.png" class="tres">
				<img src="./img/circle4.png" class="cuatro">
				<img src="./img/circle5.png" class="cinco">
				<a target="_blank" href="https://www.google.com.mx/maps/place/Centro+Estudiantil,+Luis+Elizondo,+Tecnol%C3%B3gico+de+Monterrey,+Tecnol%C3%B3gico,+64849+Monterrey,+NL/@25.6486964,-100.2897986,17z/data=!3m1!4b1!4m2!3m1!1s0x8662bfb96b8bc3c9:0x227db37e58a10fe1">
					<img src="./img/circle6.png" class="seis">
				</a>
				<a target="_blank" href="https://www.google.com.mx/maps/place/Residencias+III,+Av+Fernando+Garc%C3%ADa+Roel,+Tecnol%C3%B3gico+de+Monterrey,+Tecnol%C3%B3gico,+Monterrey,+NL/@25.6535164,-100.290541,17z/data=!3m1!4b1!4m2!3m1!1s0x8662bfc77e813f3b:0xc8e774422e4056d0">
					<img src="./img/circle7.png" class="siete">
				</a>
			</div>	
		</article>
	</section>
	<section id="registrate" data-300p="transform: translate(100%, 0)" data-400p="transform: translate(0%, 0)" data-500p="transform: translate(-100%, 0)">
		<article><!--CONTENIDO_REGISTRATE-->
			<h1>REGÍSTRATE</h1>
			<h2>NO LO PIENSES MÁS Y REGÍSTRATE AHORA PARA<br>QUE PUEDAS PARTICIPAR. EL REGISTRO CIERRA EL<br>MARTES 18 DE NOVIEMBRE A LAS 23:59 HORAS.</h2>
			<div class="container12">
				<div class="column12">
					<p>Llena el siguiente formulario con todos tus datos, asegúrate de contar con la<br> Carta Compromiso correctamente llenada y firmada por tus papás. Si aún no la<br> tienes, aquí te facilitamos el formato, ¡descárgalo! <br><br> Si eres foráneo, descarga el formato de referencias bancarias para realizar tu<br> pago, deposita en el banco de tu preferencia y pide que agreguen tu nombre<br> a la referencia para que puedas subirla escaneada al registro.</p>
				</div>
			 	<div class="column3">
			 		<a target="_blank" href="./download/Formato_CuentaBancaria.jpg" download="Formato_CuentaBancaria.jpg">
			 			<img src="./img/descarga.png">
			 			<p>Descargar formato<br> de referencias bancarias</p>
			 		</a>
			 	</div>
			  	<div class="column3">
			  		<a target="_blank" href="./download/FormatodeCartaCompromiso_2014_BTEC.pdf" download="FormatodeCartaCompromiso_2014_BTEC.pdf">
			  			<img src="./img/descarga.png">
			  			<p>Descargar formato de<br> Carta Compromiso</p>
			  		</a>
			  	</div>
			  	<div class="column3 registro">
			  		<a id="btn_registro" data-menu-top="600p" href="#registro">
			  			<img src="./img/registro.png">
			  			<p>Iniciar registro</p>
			  		</a>
			  	</div>		  	
			</div>
		</article>
	</section>
	<section id="faq" data-400p="transform: translate(100%, 0)" data-500p="transform: translate(0%, 0)">
	<!--section id="faq" data-400p="transform: translate(100%, 0)" data-500p="transform: translate(0%, 0)" data-600p="transform: translate(-100%, 0)"-->
		<article><!--CONTENIDO_FAQ-->
			<h1>PREGUNTAS FRECUENTES</h1>
			<div class="texto">
				<p class="bold">Hicimos esta sección para aclarar tus dudas.</p>
				<p>Si requieres ayuda personalizada, escribe, llama o contáctanos vía redes sociales.</p>
			</div>
			<div class="container12 contacto">
			 	<div class="column6">
					<a href="mailto:btec.mty@servicios.itesm.mx" class="escribenos">Escribenos:<br />btec.mty@servicios.itesm.mx</a>
			 	</div>
			  	<div class="column6">
					<a href="tel:01 800 832 33 689" class="llamanos">Llámanos<br />01 800 832 33 689 / (81) 8158 2269</a>
			  	</div>
			</div>
			<div class="container12 faqs">
			 	<div class="column6">
			 		<p><span>¿Quiénes pueden asistir?</span><br />
			 		Born to Be Tec está diseñado para chavos de último año de prepa de todo el país.</p>
			 		<p><span>¿Puedo invitar a alguien más?</span><br />
			 		Sí, no dudes en invitar a tus compañeros o a tus<br> amigos de último año de prepa, ellos deberán llenar<br> su propio registro.</p>
			 		<p><span>¿Hay cupo limitado?</span><br />
					Sí, Born To Be Tec se ha vuelto en un evento con mucha participación de chavos de todo el país, debido a la demanda contamos con cupo limitado por lo que te invitamos a que te registres lo antes posible y realices tu pago en caso de ser foráneo.</p>
					<p><span>Si soy foráneo, ¿cuándo tengo que llegar a Monterrey?</span><br />
					Te recomendamos llegar a Monterrey desde el 20 de noviembre para que te instales cómodamente, asistas a la Meet&Grill y al tour por la ciudad.</p>
					<p><span>¿Cuál es el costo del evento?</span><br />
					Éste es un evento sin costo alguno.
					</p>
					<p><span>¿Por qué los foráneos pagamos $500 pesos?</span><br />
					Es una cuota simbólica de recuperación, debido a que te ofrecemos las comidas, traslados internos, hospedaje y actividades durante el evento.
					</p>
					<p><span>¿La cuota de los $500 pesos para los foráneos es reembolsable?</span><br />
					No, en ninguno de los casos será reembolsable.
					</p>
					<p><span>¿Hasta qué fecha tengo para reservar mi lugar y/o mi habitación de hotel?</span><br />
					Tendrás hasta el 18 de noviembre a las 23:59hrs para hacerlo, de haber pasado esa fecha y querer reservar, tendrás que marcar a los siguientes números para pedir informes: 01-800-832-33689 o al (81)81582269, también podrás escribir a btec.mty@servicios.itesm.mx. *Sujeto a disponibilidad.
					</p>
					<p><span>¿Pueden venir mis papás conmigo?</span><br />
					Sí, podrá acompañarte solo uno de ellos en caso de que te quedes en el hotel sede y lo registres desde el formulario de inscripción.
					</p>
					<p><span>¿Cuántos acompañantes pueden venir conmigo?</span><br />
					Si quieres aprovechar las noches gratis que te ofrecemos en el hotel sede, solo podrá acompañarte un familiar directo (Papá o Mamá).
					</p>
			 	</div>
			  	<div class="column6">
			  		<p><span>¿Qué tipos de pagos se aceptan?</span> <br />
			  		Solo depósitos bancarios a través de BBVA Bancomer,  Banorte, HSBC, Santander y Banamex. <a href="./download/Formato_CuentaBancaria.jpg">Imprime este formato</a>, deposita en la sucursal bancaria que prefieras con las referencias del formato y pide que agreguen tu nombre dentro de la referencia.
			  		</p>
			  		<p><span>Tengo dudas sobre el proceso de Admisión, ¿qué hago?</span><br />
			  		Llámanos al 01 800 TEC DE MTY (01 800 832 33689) o al (81)81582269, también podrás escribir a <a href="mailto:admisiones.mty@itesm.mx">admisiones.mty@itesm.mx</a>
			  		</p>
			  		<p><span>Si soy foráneo, ¿Puedo registrarme sin quedarme en el hotel sede?</span><br />
			  		Sí, puedes hacerlo, pero si deseas asistir con más familiares tendrás que reservar un hotel por tu cuenta.
			  		</p>
			  		<p><span>¿Qué pasa si llego tarde al evento?</span><br />
			  		No pasa nada, lo ideal es que estés desde el inicio, sin embargo de tener un contratiempo con el horario deberás dirigirte al módulo de información que estará ubicado en el Jardín de las Carreras dentro del Campus y ahí te darán instrucciones precisas.
			  		</p>
			  		<p><span>¿Qué necesito para ingresar al TEC?</span><br />
			  		Tendrás que mostrar a los guardias de acceso tu identificación (IFE o Credencial de tu Preparatoria) y tu confirmación de registro impreso.
			  		</p>
			  		<p><span>¿En qué lugar será el registro el viernes?</span><br />
			  		El registro se realizará en el Centro Estudiantil dentro del Campus, dirígete al lugar con tu confirmación de registro impresa.
			  		</p>
			  		<p><span>¿Qué pasa si no asisto al tour por Monterrey?</span><br />
			  		No pasa nada, sin embargo te recomendamos que no te lo pierdas si eres foráneo y quieres conocer la ciudad.
			  		</p>
			  		<p><span>Si soy foráneo, ¿cómo subo mi comprobante de pago y carta compromiso firmada?</span><br />
			  		En tu mail de confirmación vendrán las instrucciones 2 dos botones desde donde podrás subir ambos documentos.
			  		</p>
			  		<p><span>¿Los locales también necesitamos una carta compromiso y el comprobante de pago?</span><br />
			  		No, para los locales no existen estos requisitos.
			  		</p>
			  	</div>
			</div>
		</article>
	</section>
	<section id="registro">
		<article><!--CONTENIDO_REGISTRO-->
			<h1 class="registro">REGISTRO</h1>
			<h2 class="experiencia">¡ESTÁS MUY CERCA DE<br> VIVIR LA EXPERIENCIA TEC!</h2>
			<p class="iniciemos">Iniciemos con el registro ahora mismo. Por favor proporciona<br>los siguientes datos:</p>
			<form method="POST" action="sql/save.php" >
				<div class="step">
					<div class="step-area genero">
						<p class="info">TU GÉNERO</p>
						<input type="hidden" name="genero" id="genero" value="0">
						<div class="choose">
							<div class="option selected" id="generoH">
								<img src="./img/hombre_on.png" class="caballero">
								<p>HOMBRE</p>
							</div>
							<p class="o">o</p>
							<div class="option" id="generoM">
								<img src="./img/mujer_off.png" class="dama">
								<p>MUJER</p>
							</div>
						</div>
					</div>
					<div class="clearborder">
						<p class="info"></p>
						<div class="border"></div>
					</div>
					<div class="step-area datos">
						<p class="info">
							TU NOMBRE
							<img class="lapiz"src="./img/lapiz.png">
						</p>
						<div class="step-data">
							<input class="textonly" type="text" placeholder="Nombre(s)*" name="nombre" id="nombre" />
							<input class="textonly" type="text" placeholder="Apellido paterno*" name="apaterno" id="apaterno" />
							<input class="textonly" type="text" placeholder="Apellido materno*" name="amaterno" id="amaterno" />
						</div>
					</div>
					<div class="step-area cumple">
						<p class="info">
							TU CUMPLEAÑOS
							<img src="./img/regalo.png">
						</p>
						<div class="step-data">
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="ndia" id="ndia">
									<option value="">Día*</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
							</label>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="nmes" id="nmes">
									<option value="">Mes*</option>
									<option value="1">Enero</option>
									<option value="2">Febrero</option>
									<option value="3">Marzo</option>
									<option value="4">Abril</option>
									<option value="5">Mayo</option>
									<option value="6">Junio</option>
									<option value="7">Julio</option>
									<option value="8">Agosto</option>
									<option value="9">Septiembre</option>
									<option value="10">Octubre</option>
									<option value="11">Noviembre</option>
									<option value="12">Diciembre</option>
								</select>
							</label>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="nanio" id="nanio">
									<option value="">Año*</option>
									<option value="1986">1986</option>
									<option value="1987">1987</option>
									<option value="1988">1988</option>
									<option value="1989">1989</option>
									<option value="1990">1990</option>
									<option value="1991">1991</option>
									<option value="1992">1992</option>
									<option value="1993">1993</option>
									<option value="1994">1994</option>
									<option value="1995">1995</option>
									<option value="1996">1996</option>
									<option value="1997">1997</option>
									<option value="1998">1998</option>
								</select>
							</label>
						</div>
					</div>
				</div>
				<div class="step">
					<div class="step-area contacto">
						<p class="info">
							DATOS DE CONTACTO
							<img class="lapiz"src="./img/tel.png">
						</p>
						<div class="step-data">
							<input type="email" placeholder="Correo electrónico*" name="email" id="email" >
							<input type="tel" placeholder="Lada*" name="lada" id="lada" >
							<input type="tel" placeholder="Teléfono fijo*" name="tel" id="tel" >
							<input type="tel" placeholder="Celular*" name="cel" id="cel" >
						</div>
					</div>
					<div class="clearborder">
						<p class="info"></p>
						<div class="border"></div>
					</div>
					<div class="step-area residencia">
						<p class="info">
							¿DÓNDE ESTUDIAS?
							<img class="lapiz"src="./img/ubi.png">
						</p>
						<div class="step-data">
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="estado" id="estado" class="option" onchange="estadoCity(this,'ciudadMX')">
									<option value=''>Estado donde estudio*</option>
									<?php echo selectEstados(); ?>
								</select>
							</label>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="ciudad" id="ciudadMX" class="option" onchange="citySchool(this,'prepaMX')">
									<option value=''>Ciudad donde estudio*</option>
								</select>
							</label>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="prepa" class="option" id="prepaMX">
									<option value=''>Prepa donde estudio*</option>
								</select>
							</label>
							<input type="text" placeholder="Nombre de la prepa*" name="nomprepa" id="nomprepa">
						</div>
					</div>
					<div class="step-area prepa">
						<p class="info">
							INGRESO
							<img class="lapiz"src="./img/cal.png">
						</p>
						<div class="step-data">
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="gradua" id="gradua" class="option inputPrepa">
									<option value="">Fecha esperada de ingreso a carrera*</option>
									<option value="2015">Agosto 2015</option>
									<option value="2016-1">Enero 2016</option>
									<option value="2016-2">Agosto 2016</option>
								</select>
							</label>
						</div>
					</div>
				</div>
				<div class="step">
					<div class="step-area hospedaje">
						<p class="info hospedaje">
							TU HOSPEDAJE
							<img class="lapiz"src="./img/casa.png">
						</p>
						<div class="step-data">
							<p>¿Necesitas hospedaje en Monterrey?<br>ahora que asistirás al Born To Be Tec*</p>
							<div class="bool-choose">
								<input type="hidden" name="hospedaje" id="hospedaje" value=""/>
								<div class="option noActivo" id="hotelS">
									<p>SÍ</p>
								</div>
								<div class="option activo" id="hotelN">
									<p>NO</p>
								</div>
							</div>
						</div>
					</div>
					<div class="clearborder">
						<p class="info"></p>
						<div class="border"></div>
					</div>
					<div class="step-area compania">
						<p class="info">
							TU ACOMPAÑANTE
							<img class="lapiz"src="./img/al.png">
						</p>
						<div class="step-data">
							<p>¿Vendrás con un acompañante?*</p>
							<div class="bool-choose">
								<input type="hidden" name="acompanante" id="acompanante" value=""/>
								<div class="option noActivo" id="soloS">
									<p>SÍ</p>
								</div>
								<div class="option activo" id="soloN">
									<p>NO</p>
								</div>
							</div>
							<label id="parentesco-cont">
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="parentesco" id="parentesco" class="option">
									<i class="icon ion-ios7-arrow-down"></i>
									<option value="">Parentesco*</option>
									<option value="1">Madre</option>
									<option value="2">Padre</option>
								</select>
							</label>
							<input class="textonly" type="text" placeholder="Nombre completo*" name="nomcomp" id="nomcomp">
						</div>
					</div>
				</div>
				<div class="step">
					<div class="step-area carrera">
						<p class="info carrera">
							ELECCIÓN DE CARRERA
							<img class="lapiz"src="./img/lista.png">
						</p>
						<div class="step-data">
							<p>¿Ya decidiste qué carrera estudiar?</p>
							<div class="bool-chooser" data-input="carrera">
								<input type="hidden" name="carrera" id="carrera"/>
								<div class="option noActivo" id="carreraS" data-val="0">
									<p>SÍ</p>
								</div>
								<div class="option noActivo" id="carreraN" data-val="1">
									<p>NO</p>
								</div>
							</div>
						</div>
					</div>
					<div class="step-area campus">
						<p class="info campus">
							UNIVERSIDAD
							<img class="lapiz"src="./img/libro.png">
						</p>
						<div class="step-data">
							<p>¿Tienes pensado estudiar tu carrera en el <br>Tecnológico de Monterrey, Campus Monterrey?</p>
							<div class="bool-chooser" data-input="campus">
								<input type="hidden" name="campus" id="campus"/>
								<div class="option noActivo" id="campusS" data-val="0">
									<p>SÍ</p>
								</div>
								<div class="option noActivo" id="campusN" data-val="1">
									<p>NO</p>
								</div>
							</div>
							<div class="step-data">
								<input  class="textonly" type="text" placeholder="¿En qué universidad piensas estudiar?*" name="campus_escuela" id="campus_escuela" />
							</div>
						</div>
					</div>
					<div class="clearborder">
						<p class="info"></p>
						<div class="border"></div>
					</div>
					<div class="step-area carreras">
						<p class="info">
							CARRERAS DE INTERÉS
							<img class="lapiz"src="./img/doc.png">
						</p>
						<div class="step-data">
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="carrera1" id="carrera1" class="option" requerid>
									<option value="">Elige una carrera*</option>
									<?php echo selectCarreras(); ?>
								</select>
							</label>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="carrera2" id="carrera2" class="option">
									<option value="">Elige una carrera</option>
									<?php echo selectCarreras(); ?>
								</select>
							</label>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="carrera3" id="carrera3" class="option">
									<option value="">Elige una carrera</option>
									<?php echo selectCarreras(); ?>
								</select>
							</label>
						</div>
					</div>
					<div class="step-area evento">
						<p class="info">
							MEDIO
							<img class="lapiz"src="./img/evento.png">
						</p>
						<div class="step-data">
							<p>¿Cómo te enteraste del Born to be Tec?</p>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="evento" id="evento" class="option eve">
									<option value="">Elige un medio*</option>
									<?php echo selectEventos(); ?>
								</select>
							</label>
						</div>
					</div>
				</div>
				<div class="step">
					<div class="step-area viernes">
						<p class="info">
							ACTIVIDADES<br />
							DEL VIERNES
							<img class="lapiz"src="./img/ecualizador.png">
						</p>
						<div class="step-data">
							<p class="elige">Elige las tres actividades a las que quieres asistir el viernes,<br><span class="instrucciones">ASEGÚRATE DE ELEGIR CORRECTAMENTE PORQUE NO EXISTIRÁN CAMBIOS.</span></p></p>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="vopt1" id="vopt1" class="option">
									<option value="">Elige tu actividad de 16:30 a 17:20 horas*</option>
									<?php echo selectTalleresV(1,1); ?>
								</select>
							</label>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="vopt2" id="vopt2" class="option">
									<option value="">Elige tu actividad de 17:40 a 18:30 horas*</option>
									<?php echo selectTalleresV(0,2); ?>
								</select>
							</label>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="vopt3" id="vopt3" class="option">
									<option value="">Elige tu actividad de 18:40 a 19:30 horas*</option>
									<?php echo selectTalleresV(0,3); ?>
								</select>
							</label>
						</div>
					</div>
					<div class="step-area sabado">
						<p class="info">
							TALLERES<br />
							DEL SÁBADO
							<img class="lapiz"src="./img/ecualizador.png">
						</p>
						<div class="step-data">
							<p class="elige">Elige los dos talleres que quieres asistir el sábado,<br><span class="instrucciones">ASEGÚRATE DE ELEGIR CORRECTAMENTE PORQUE NO EXISTIRÁN CAMBIOS.</span></p></p>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="sopt1" id="sopt1" class="option">
									<option value="">Elige tu taller de 9:00 a 11:30 horas*</option>
									<?php echo selectTalleresS(4); ?>
								</select>
							</label>
							<label>
								<i class="icon ion-ios7-arrow-down"></i>
								<select name="sopt2" id="sopt2" class="option">
									<option value="">Elige tu taller de 11:45 a 14:15 horas*</option>
									<?php echo selectTalleresS(5); ?>
								</select>
							</label>
						</div>
					</div>
					<div class="clearborder">
						<p class="info"></p>
						<div class="border"></div>
					</div>
					<div class="step-area acepto">
						<p class="info">
							<label><input type="checkbox" id="acepto"></label>
							ACEPTO
						</p>
						<div class="step-data">
							El Instituto Tecnológico y de Estudios Superiores de Monterrey, con domicilio en Av. Eugenio Garza Sada #2501 Sur, Col. Tecnológico, en la ciudad de Monterrey, N.L., utilizará sus datos personales aquí recabados para fines de seguimiento y promoción de eventos exclusivos del Tecnológico de Monterrey, así como para dar seguimiento al proceso de admisión e inscripción a cualquiera de los campus o sedes del Tecnológico de Monterrey. Para mayor información acerca del tratamiento y de los derechos que puede ejercer, por favor acceder al Aviso de Privacidad completo en la página hospedada en la siguiente dirección electrónica: www.itesm.edu.  Acepto y autorizo que el Instituto Tecnológico y de Estudios Superiores de Monterrey utilice la información aquí proporcionada para los fines anteriormente señalados. Si desea eliminar su registro de nuestra base de datos, favor de enviar un correo con la palabra BAJA a la dirección: siem@servicios.itesm.mx
						</div>
					</div>
				</div>
				<!--input type="submit" value="GUARAD"-->
			</form>
		</article>
		<div class="siguiente">
			<a class="next" href="#next">Siguiente<i class="icon ion-arrow-right-c"></i></a>
			<a class="prev" href="#prev">ATRÁS<i class="icon ion-arrow-left-c"></i></a>
		</div>
		<div class="footer"></div>
	</section>
	<section id="end">
		<article><!--CONTENIDO_REGISTRO_TERMINADO-->
			<div class="registroT">
				<h1>¡BIEN HECHO!</h1>
				<h2>TU REGISTRO ESTÁ COMPLETO.</h2>
				<div class="response foraneoA">
					<!--img src="./img/img.png"-->
					<ol>
						<p class="sigue">Ahora sólo sigue estas instrucciones:</p>
						<li>Descarga la Carta Compromiso <span><a target="_blank" href="./download/FormatodeCartaCompromiso_2014_BTEC.pdf" download="FormatodeCartaCompromiso_2014_BTEC.pdf">aquí</a></span> llénala y que firmen tus papás.</li>
						<li>Descarga la ficha de pago <span><a target="_blank" href="./download/Formato_CuentaBancaria.jpg" download="Formato_CuentaBancaria.jpg">aquí</a></span> y realiza el depósito de $500.00 pesos en<br>el banco de tu preferencia.<br></li>
						<li>Sube ambos documentos comprobantes al link que te enviamos por correo.</li>
					</ol>
				</div>
				<!-- ========================= REGISTRO TERMINADO PASO 2-->
				<div class="response foraneoB">
					<!--img src="./img/img.png"-->
					<ol>
						<p class="sigue">Ahora sólo sigue estas instrucciones:</p>
						<li>Descarga la Carta Compromiso <span><a target="_blank" href="./download/FormatodeCartaCompromiso_2014_BTEC.pdf" download="FormatodeCartaCompromiso_2014_BTEC.pdf">aquí</a></span> llénala y que firmen tus papás.</li>
						<li>Sube el documento al link que te enviamos por correo</li-->
					</ol>
				</div>
				<!-- ========================= REGISTRO TERMINADO PASO 3-->
				<div class="response local">
					<p>Enviaremos a tu correo una confirmación, sólo tendrás que descargarla y presentarla impresa el día del evento junto con tu identificación oficial.<br><br>¡Te esperamos en BORN TO BE TEC 2014!</p-->
				</div>
				<div class="redesS">
					<div>
						<a id="comparte_fb" href="#"></a>
						<a id="comparte_tw" href="#"></a>
					</div>
					<p>¡COMPARTE EN REDES SOCIALES!</p>
				</div>
			</div>
		</article>
	</section>
	<section id="aviso_legal">
		<article><!--CONTENIDO_AVISO_LEGAL-->
			<h1>AVISO LEGAL</h1>
			<h2 class="terminos">TÉRMINOS Y CONDICIONES DE USO DEL SITIO</h2>
			<a class="close" href="#close"></a>
			<div class="info">
				<h3>Identidad y domicilio del Responsable</h3>
				<p>El Responsable de los datos personales que usted proporciona es El Instituto Tecnológico y de Estudios Superiores de Monterrey (en lo sucesivo “ITESM”) con domicilio ubicado en Av. Eugenio Garza Sada Sur No. 2501, colonia Tecnológico en Monterrey, Nuevo León. C.P. 64849.</p>
				<h3>Datos personales y datos personales sensibles tratados por ITESM</h3>
				<p>ITESM como parte de su registro de prospectos recabará y tratará datos personales de identificación, datos personales de contacto, datos personales académicos y en algunos casos datos laborales.</p>
				<p>Asimismo, le informamos que para cumplir con las finalidades primarias y necesarias señaladas en el presente Aviso, ITESM no recabará ni tratará datos personales sensibles.</p>
				<p>Por otro lado, le informamos que ITESM podrá recabar y tratar datos personales de identificación, datos personales de contacto y datos personales laborales de sus familiares y/o terceros  con los que usted tenga una relación, ya sea que ejerzan su patria potestad o que le brinden apoyo económico con el propósito de cumplir con las finalidades primarias y necesarias de la relación jurídica establecida con usted. De este modo, al proporcionar los datos personales necesarios relacionados con sus familiares y/o terceros usted reconoce tener el consentimiento de éstos para que ITESM trate éstos para cumplir con las finalidades primarias y necesarias señaladas en el presente Aviso.</p>
				<h3>Finalidades primarias</h3>
				<p>ITESM tratará sus datos personales para cumplir con las siguientes finalidades primarias y necesarias:</p>
				<ul>
					<li>Para contactarle con el propósito de ofrecerle nuestros servicios educativos.</li>
					<li>Para dar seguimiento a sus solicitudes de información sobre los servicios que ofrecemos.</li>
				</ul>
				<p>Para la aplicación de exámenes de admisión.</p>
				<h3>Finalidades secundarias</h3>
				<p>De manera adicional, si usted llega a ser alumno de ITESM sus datos pasarán a formar parte de su expediente académico. No obstante, en caso de no llegar a formar parte de ITESM, si usted no se opone, ITESM mantendrá su información personal para las siguientes finalidades que no son necesarias para el servicio que nos solicita, pero que nos permiten y facilitan brindarle una mejor atención:</p>
				<ul>
					<li>Para posibles contactos posteriores.</li>
					<li>Para enviarle información promocional de cursos, diplomados, seminarios, simposios,  talleres extra-académicos y eventos.</li>
					<li>Para la aplicación de encuestas y evaluaciones para mejorar la calidad de los productos y servicios que ofrecemos.</li>
					<li>Para enviarle publicidad y comunicaciones con fines de mercadotecnia, tele-marketing o campañas financieras.</li>
				</ul>
				<p>En caso de que no desee que sus datos personales sean tratados para alguna o todas las finalidades adicionales, desde este momento usted nos puede comunicar lo anterior al correo <a href="mailto:datospersonales@itesm.mx">datospersonales@itesm.mx</a></p>
				<p>La negativa para el uso de sus datos personales para fines adicionales, no podrá ser un motivo para negarle los servicios solicitados o dar por terminada la relación establecida con nosotros.</p>
				<h3>Transferencias</h3>
				<p>ITESM para cumplir las finalidades necesarias anteriormente descritas u otras aquellas exigidas legalmente o por las autoridades competentes, sólo transferirá los datos necesarios en los casos legalmente previstos y para los cuales no es necesario su consentimiento.</p>
				<h3>Derechos ARCO y/o revocación del consentimiento</h3>
				<p>Usted o su representante legal podrá ejercer cualquiera de los derechos de acceso, rectificación, cancelación u oposición (en lo sucesivo “derechos arco”), así como revocar su consentimiento para el tratamiento de sus datos personales enviando un correo electrónico al Departamento de Datos Personales de ITESM a la dirección electrónica <a href="mailto:datospersonales@itesm.mx">datospersonales@itesm.mx</a> En este sentido, puede informarse sobre los procedimientos, requisitos y plazos para el ejercicio de sus Derechos ARCO y/o revocación del consentimiento en nuestra página de internet <a href="http://www.itesm.edu/procedimientoarcorc">http://www.itesm.edu/procedimientoarcorc</a>.</p>
				<h3>Limitación y/o Divulgación de sus datos</h3>
				<p>Usted podrá limitar el uso o divulgación de sus datos personales enviando su solicitud a la ITESM a la dirección <a href="mailto:datospersonales@itesm.mx">datospersonales@itesm.mx</a>. En caso de que su Solicitud sea procedente se le registrará en el listado de exclusión propio de ITESM. <span>Cambios al Aviso de Privacidad.</span></p>
				<p>ITESM le notificará de cualquier cambio a su aviso de privacidad a través de la liga http://www.itesm.edu y posteriormente accediendo a su <span>aviso de privacidad.</span></p>
			</div>
		</article>
	</section>
	<footer>
		<div>
			<img src="./img/tec-logo.png">
			<a href="http://www.itesm.mx/" class="tec"><p>Tecnológico de Monterrey</p></a>
			<a class="aviso-legal" href="#aviso_legal">Aviso Legal</a>
		</div>
		<a href="#faq" data-menu-top="500p" class="icon-help"></a>
	</footer>
	<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TFRWXJ"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-TFRWXJ');</script>
	<!-- End Google Tag Manager -->
</body>
</html>