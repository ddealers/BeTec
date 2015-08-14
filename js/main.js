window.fbAsyncInit = function() {
    FB.init({
      appId      : '706985549396891',
      xfbml      : true,
      version    : 'v2.1'
    });
  };

  (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

$(document).ready(function () {
  	//===== Init Skrollr =====
  	if($(window).width() > 640){
  		var s = skrollr.init({
			smoothScrolling: true,
			mobileDeceleration: 0.004,
			constants:{
				sparkles: '0p'
			}
		});
		skrollr.menu.init(s);
  	}

	//===== Container Auto Height =====
	function updateContainer(){
		$('div.container').height($(window).height());
	}
	$(window).on('resize', updateContainer);
	updateContainer();

	//===== Navigation =====
	var sections = ['be_tec','actividades','agenda','sede','registrate','faq'];
	var sindex = 0, sel;
	$('.arrows .next').on('click', function(e){
		e.preventDefault();
		sindex++;
		if(sindex >= sections.length){
			sindex = 0;
		}else{
			sel = $('header nav ul li').eq(sindex).children('a');
		}
		skrollr.menu.click(sel[0]);
	});
	$('.arrows .prev').on('click', function(e){
		e.preventDefault();
		sindex--;
		if(sindex < 0){
			sindex = sections.length - 1;
		}else{
			sel = $('header nav ul li').eq(sindex).children('a');
		}
		skrollr.menu.click(sel[0]);
	});
	$('header nav ul li a').on('click', function(e){
		e.preventDefault();
		$('#end').hide();
	});

	$('footer .aviso-legal').on('click', function(e){
		e.preventDefault();
		TweenMax.set('header',{'z-index': 1});
		TweenMax.set('#aviso_legal',{display: 'block', 'z-index':15, opacity: 1, scale: 1});
		TweenMax.from('#aviso_legal', 0.5, {opacity: 0, scale: 0.5, ease: Back.easeOut});

	});

	$('#aviso_legal .close').on('click', function(e){
		e.preventDefault();
		TweenMax.to('#aviso_legal', 0.5, {opacity: 0, scale: 0.5, ease: Back.easeOut, onComplete: function(){
			TweenMax.set('#aviso_legal',{display: 'none', 'z-index':0});
			TweenMax.set('header',{'z-index': 10});
		}});
	});

	//===== Mobile Navigation =====
	if($(window).width() < 640){
		showSection('#be_tec');
  		$('#primary_nav_wrap ul li a').on('click', function(){
  			showSection($(this).attr('href'));
  		});
  	}


  	function showSection(section){
  		TweenMax.to("section", 0.8, {opacity: 0, onComplete:function(){
  			$("section").css('z-index', 0);
  			$(section).css('z-index', 1);
  		}});
  		TweenMax.set(section, {scale: 0, y: -100});
  		TweenMax.to(section, 0.5, {y: 0, scale: 1, opacity: 1});
  	}

	//===== Calendar =====
	var index = 0;
	
	$('.titles p').on('click', function(e){
		e.preventDefault();
		setCalendarDay($(this).index());
	});
	function setCalendarDay(next){
		$(".titles p").removeClass('active');
		$(".days .day").hide();

		var n = $(".titles p").eq(next),
			nd = $(".days .day").eq(next);
		
		n.addClass('active');
		nd.show();
		
		TweenMax.to('.titles p', 0.3, {'background-color': 'rgba(255,255,255,0)'});
		TweenMax.to(n, 0.3, {'background-color': 'rgba(255,255,255,0.3)'});
		TweenMax.from(nd, 0.3, {opacity: 0, y: -10});
	}
	setCalendarDay(0);

	//===== Scrollbars =====
	$('.faqs').perfectScrollbar();
	$('#aviso_legal .info').perfectScrollbar();

	//===== Registro =====
	function initRegistro(e){
		e.preventDefault();
		//alert("Gracias por tu interés, el registro se ha terminado. Te esperamos en BTEC 2015.");
		//return;
		carrerasList = {carrera1:null, carrera2: null, carrera3: null};
		viernesList = {vopt1:null, vopt2: null, vopt3: null};
		sabadoList = {sopt1:null, sopt2: null};
		form_data = {};
		index_form = 0;
		setFormStep(0);
		updateLists(carrerasList, ['carrera1','carrera2', 'carrera3']);
		updateLists(viernesList, ['vopt1','vopt2', 'vopt3']);
		updateLists(sabadoList, ['sopt1','sopt2']);
		$('.siguiente .next').html('Siguiente<i class="icon ion-arrow-right-c">');
		$('select').val('');
		$('input').val('');
		$(".compania").hide();
		$('#campus_escuela').hide();
		$('#parentesco-cont').hide();
		$('#nomcomp').hide();
		$("#nomprepa").hide();
		$('.bool-choose .option').removeClass('activo');
		$('.bool-choose .option').addClass('noActivo');
		$('.bool-chooser .option').removeClass('activo');
		$('.bool-chooser .option').addClass('noActivo');
		$('#acepto').attr('checked', false);
		TweenMax.to('header .social', 0.5, {opacity:0});
		TweenMax.to('nav ul', 0.5, {opacity:0});
		TweenMax.to('.arrows', 0.5, {opacity:0});
		TweenMax.set('#registro', {display:'block', opacity: 1});
		TweenMax.from('#registro', 0.5, {opacity:0});
	}
	$('#btn_registrate').on('click', initRegistro);
	$('#btn_registro').on('click', initRegistro);
	$('#logo').on('click', function(e){
		TweenMax.to('header .social', 0.5, {opacity:1});
		TweenMax.to('nav ul', 0.5, {opacity:1});
		TweenMax.to('.arrows', 0.5, {opacity:1});
		TweenMax.set('#registro', {display:'none'});
		TweenMax.set('#end', {display:'none'});
	});


	//===== Form =====
	var carrerasList,
		viernesList,
		sabadoList,
		form_data,
		index_form;
	setFormStep(0);

	function textonly(e){
		var patt = /[^0-9]/ig;
		var code, character;
		if(e.keyCode) code = e.keyCode;
		else if(e.which) code = e.which;
		character = String.fromCharCode(code);
		if(!patt.test(character)) return false;
	}
	$('.textonly').on('keypress', textonly);

	function validate( key, msg, type ){
		var patt;
		if(!type){
			if(key == ''){
				alert(msg);
				return false;
			}
			return true;
		}else if(type == 'email'){
			patt = /([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}/igm;
			if(key == ''){
				alert('Te hace falta ingresar tu correo electrónico.');
				return false;
			}else if(!patt.test(key)){
				alert(msg);
				return false;
			}
			return true;
		}else if(type == 'lada'){
			patt = /\d{1,3}/;
			if(key == ''){
				alert('Te hace falta ingresar la clave lada.');
				return false;
			}else if(!patt.test(key)){
				alert(msg);
				return false;
			}
			return true;
		}else if(type == 'tel'){
			patt = /\d{8,10}/;
			if(key == ''){
				alert('Te hace falta ingresar tu número telefónico.');
				return false;
			}else if(!patt.test(key)){
				alert(msg);
				return false;
			}
			return true;
		}else if(type == 'cel'){
			patt = /\d{8,10}/;
			if(key == ''){
				alert('Te hace falta ingresar tu número celular.');
				return false;
			}else if(!patt.test(key)){
				alert(msg);
				return false;
			}
			return true;
		}

	}
	$("#registro .prev").hide();
	$("#registro .prev").on("click", function(e){
		if(index_form == 1){
			$("#registro .iniciemos").show();
			$("#registro .prev").hide();
		}
		if(index_form == 3){
			if(form_data.city == 986){
				index_form--;
			}
		}
		if(index_form == 4){
			$('.siguiente .next').html('Siguiente<i class="icon ion-arrow-right-c"></i>');
		}
		e.preventDefault();
		index_form--;
		if(index_form >= 0){
			setFormStep(index_form);	
		}else{
			index_form = 0;
		}
	});
	$("#registro .next").on("click", function(e){
		$('#registro .iniciemos').hide();
		e.preventDefault();
		prev = index_form;
		//index_form++;
		//setFormStep(index_form);

		//index++;
		if(index_form == 0){
			var genero = $("#genero").val();
			form_data.genero = genero;
			var name = $("#nombre").val();
			var apat = $("#apaterno").val();
			var amat = $("#amaterno").val();
			var dia = $("#ndia").val();
			var anio = $("#nanio").val();
			var mes = $("#nmes").val();
			
			if( !validate(name, 'Te hace falta ingresar tu nombre.') ){
				return;
			}
			if( !validate(apat, 'Te hace falta ingresar tu apellido paterno.') ){
				return;
			}
			if( !validate(amat, 'Te hace falta ingresar tu apellido materno.') ){
				return;
			}
			if( !validate(dia, 'Te hace falta ingresar tu día de nacimiento.') ){
				return;
			}
			if( !validate(mes, 'Te hace falta ingresar tu mes de nacimiento.') ){
				return;
			}
			if( !validate(anio, 'Te hace falta ingresar tu año de nacimiento.') ){
				return;
			}
			var nombre = name + ' ' + apat + ' ' + amat;
			form_data.nombre = nombre;
			var cumple = anio + '-' + mes +'-'+ dia;
			form_data.cumple = cumple;
			index_form++;
			$("#registro .prev").show();
		}else if(index_form == 1){
			var email = $("#email").val();
			form_data.email = email;
			var lada  = $("#lada").val();
			var tel   = $("#tel").val();
			var cel   = $("#cel").val();
			form_data.cel = cel;
			var state = $("#estado").val();
			form_data.state = state;
			var city  = $("#ciudadMX").val();
			form_data.city = city;
			var prep  = $("#prepaMX").val();
			var nomprepa = $("#nomprepa").val();
			form_data.prep = prep;
			form_data.nomprepa = nomprepa;
			var grad  = $("#gradua").val();
			form_data.grad = grad;

			if( !validate(email, 'Ingresa un correo válido.', 'email') ){
				return;
			}
			if( !validate(lada, 'Ingresa una clave lada válida(Entre 1 y 3 dígitos).', 'lada') ){
				return;
			}
			if( !validate(tel, 'Ingresa un número de teléfono válido(Entre 8 y 10 dígitos).', 'tel') ){
				return;
			}
			if( !validate(cel, 'Ingresa un número de celular válido(Entre 8 y 10 dígitos).', 'cel') ){
				return;
			}
			if( !validate(state, 'Te hace falta seleccionar tu estado.') ){
				return;
			}
			if( !validate(city, 'Te hace falta seleccionar tu ciudad.') ){
				return;
			}
			if( !validate(prep, 'Te hace falta seleccionar tu prepa.') ){
				return;
			}
			if( !validate(grad, 'Te hace falta seleccionar tu fecha esperada de ingreso.') ){
				return;
			}
			if(prep == '#'){
				if( !validate(nomprepa, 'Te hace falta ingresar el nombre de tu prepa.') ){
					return;
				}
			}
			var numero = lada + tel;
			form_data.numero = numero;
			index_form++;
			if(form_data.city == 986){
				form_data.hotel = '';
				form_data.solo = '';
				form_data.pare = '';
				form_data.namep = '';
				index_form++;
			}
		}else if(index_form == 2){
			var hotel = $("#hospedaje").val();
			form_data.hotel = hotel;
			var solo  = $("#acompanante").val();
			form_data.solo = solo;
			var pare  = $("#parentesco").val();
			form_data.pare = pare;
			var namep = $("#nomcomp").val();
			form_data.namep = namep;

			if( !validate(hotel, 'Debes indicar si necesitas hospedaje.') ){
				return;
			}
			if(hotel == '1'){
				if( !validate(solo, 'Debes indicar si vendrás con acompañante.') ){
					return;
				}
			}
			if(hotel == '1' && solo == '1'){
				if( !validate(pare, 'Indica el parentesco de tu acompañante.') ){
					return;
				}
				if( !validate(namep, 'Ingresa el nombre de tu acompañante.') ){
					return;
				}
			}
			index_form++;
		}else if(index_form == 3){
			var carrera = $("#carrera").val();
			form_data.carrera = carrera;
			var car1  = $("#carrera1").val();
			form_data.car1 = car1;
			var car2  = $("#carrera2").val();
			form_data.car2 = car2;
			var car3  = $("#carrera3").val();
			form_data.car3 = car3;
			var	campus = $("#campus").val();
			form_data.campus = campus;
			var	campusEscuela = $("#campus_escuela").val();
			form_data.campus_escuela = campusEscuela;
			var	eventos = $("#evento").val();
			form_data.eventos = eventos;

			if( !validate(carrera, 'Es necesario que indiques si ya decidiste qué carrera estudiar.') ){
				return;
			}
			if( !validate(campus, 'Es necesario que indiques si tienes pensado estudiar en Tecnológico de Monterrey, Campus Monterrey.') ){
				return;
			}
			if(campus == '1'){
				if( !validate(campusEscuela, 'Es necesario que indiques en qué Universidad tienes pensado estudiar.') ){
					return;
				}
			}
			if( !validate(car1, 'Es obligatorio que selecciones la primer carrera de interés.') ){
				return;
			}
			if( !validate(eventos, 'Es obligatorio que selecciones por qué medio te enteraste del evento.') ){
				return;
			}
			$('.siguiente .next').html('Enviar<i class="icon ion-paper-airplane"></i>');
			index_form++;
		}else if(index_form == 4){
			var vopt1  = $("#vopt1").val();
			form_data.vopt1 = vopt1;
			var vopt2  = $("#vopt2").val();
			form_data.vopt2 = vopt2;
			var vopt3  = $("#vopt3").val();
			form_data.vopt3 = vopt3;
			var sopt1   = $("#sopt1").val();
			form_data.sopt1 = sopt1;
			var sopt2   = $("#sopt2").val();
			form_data.sopt2 = sopt2;
			var evento = $("#evento").val();
			form_data.evento = evento;

			if(!$("#acepto").is(':checked') == true){
				alert('Debes aceptar los Términos y Condiciones.');
				return;
			}
			if( !validate(vopt1, 'Es necesario que selecciones tu actividad de las 16:30 horas del viernes.') ){
				return;
			}
			if( !validate(vopt2, 'Es necesario que selecciones tu actividad de las 17:40 horas del viernes.') ){
				return;
			}
			if( !validate(vopt3, 'Es necesario que selecciones tu actividad de las 18:40 horas del viernes.') ){
				return;
			}
			if( !validate(sopt1, 'Es necesario que selecciones tu taller de las 9:00 horas del sábado.') ){
				return;
			}
			if( !validate(sopt2, 'Es necesario que selecciones tu taller de las 11:45 horas del sábado.') ){
				return;
			}
			console.log(form_data);
			$.ajax({
				type: 'POST',
				url: 'sql/save.php',
				data:form_data,
				success: function(response){
					if(response == 'true'){
						$('.registroT .response').hide();
						console.log(form_data.city, form_data.hotel);
						if(form_data.city == 986){
							$('.registroT h2').text('TU REGISTRO ESTÁ COMPLETO.');
							$('.registroT .local').show();
						}else if(form_data.hotel == 0){
							$('.registroT h2').text('TU REGISTRO ESTÁ CASI COMPLETO.');
							$('.registroT .foraneoB').show();
						}else{
							$('.registroT h2').text('TU REGISTRO ESTÁ CASI COMPLETO.');
							$('.registroT .foraneoA').show();
						}
						$('#end').show();
						TweenMax.from('#end', 1, {opacity: 0, scale: 0.5, ease: Back.easeOut});
						return;
					}else if(response == 'badMail'){
						alert("Este email ya ha sido registrado, vuelve a realizar el registro con una cuenta de correo nueva.");
						console.log(response);
					}else if(response.error){
						alert(error);
						console.log(response);
					}else{
						alert("Lo sentimos tu registro no se pudo completar");
						console.log(response);
					}
				},
				error: function(){
					alert("Lo sentimos tu registro no se pudo completar, escríbenos a btec.mty@servicios.itesm.mx \n o llámanos al 01 800 832 33689 o al (81) 81582269 para ayudarte.");
					console.log(response);
				}
			});
			return;
		}
		setFormStep(index_form);
	});

	function setFormStep(next){
		$(".step").hide();
		var ns = $(".step").eq(next);
		ns.show();
		TweenMax.from(ns, 0.3, {opacity: 0, y: 100});
	}
	
	//===== Acciones en select ===== //
	function updateLists(all, lists){
		$.each(lists, function(){
			var list = this;
			$('#'+list+' option').show();
			$.each(all, function(key, value){
				if(key != list){
					$('#'+list+' option[value="'+value+'"]').hide();
				}
			});
		});
	}

	$('#carrera1').on('change', function(){
		carrerasList.carrera1 = $(this).val();
		updateLists(carrerasList, ['carrera2', 'carrera3']);
	});
	$('#carrera2').on('change', function(){
		carrerasList.carrera2 = $(this).val();
		updateLists(carrerasList, ['carrera1', 'carrera3']);
	});
	$('#carrera3').on('change', function(){
		carrerasList.carrera3 = $(this).val();
		updateLists(carrerasList, ['carrera1', 'carrera2']);
	});
	$('#vopt1').on('change', function(){
		viernesList.vopt1 = $(this).val();
		updateLists(viernesList, ['vopt2', 'vopt3']);
	});
	$('#vopt2').on('change', function(){
		viernesList.vopt2 = $(this).val();
		updateLists(viernesList, ['vopt1', 'vopt3']);
	});
	$('#vopt3').on('change', function(){
		viernesList.vopt3 = $(this).val();
		updateLists(viernesList, ['vopt1', 'vopt2']);
	});
	$('#sopt1').on('change', function(){
		sabadoList.sopt1 = $(this).val();
		updateLists(sabadoList, ['sopt2']);
	});
	$('#sopt2').on('change', function(){
		sabadoList.sopt2 = $(this).val();
		updateLists(sabadoList, ['sopt1']);
	});

	//===== Acciones en choose ===== //
	$("#generoM").click(function() {
		if($(this).hasClass("selected")){
			console.log("ya tiene la clase!!");
		}else{
			$(this).addClass("selected");
			$(this).find('img').attr('src','./img/mujer_on.png');
			$("#generoH").removeClass("selected");
			$("#generoH").find('img').attr('src','./img/hombre_off.png');
			$("#genero").val('1');
		}
	})
	$("#generoH").click(function() {
		if($(this).hasClass("selected")){
			console.log("ya tiene la clase!!");
		}else{
			$(this).addClass("selected");
			$(this).find('img').attr('src','./img/hombre_on.png');
			$("#generoM").removeClass("selected");
			$("#generoM").find('img').attr('src','./img/mujer_off.png');
			$("#genero").val('0');
		}
	})
	$("#hotelS").click(function() {
		if($(this).hasClass("activo")){
			console.log("ya esta activo");
		}else{
			$("#hotelN").removeClass("activo");
			$("#hotelN").addClass("noActivo");
			$("#hotelS").addClass("activo");
			$("#hospedaje").val('1');
			TweenMax.set('.compania',{display: 'inline-flex'});
			TweenMax.from('.compania', 0.3, {opacity: 0});
		}
	})
	$("#hotelN").click(function() {
		if($(this).hasClass("activo")){
			console.log("esta activo");
		}else{
			$("#hotelS").removeClass("activo");
			$("#hotelS").addClass("noActivo");
			$("#hotelN").addClass("activo");
			$("#hospedaje").val('0');
			TweenMax.to('.compania', 0.3, {opacity: 0, onComplete: function(){
				TweenMax.set('.compania', {display:'none', opacity: '1'});
			}});
		}
	})
	$("#soloS").click(function() {
		if($(this).hasClass("activo")){
			console.log("ya esta activo");
		}else{
			$("#soloN").removeClass("activo");
			$("#soloN").addClass("noActivo");
			$("#soloS").addClass("activo");
			$("#acompanante").val('1');
			TweenMax.set(['#parentesco-cont','#nomcomp'],{display: 'inline-block'});
			TweenMax.from(['#parentesco-cont','#nomcomp'], 0.3, {opacity: 0});
		}
	})
	$("#soloN").click(function() {
		if($(this).hasClass("activo")){
			console.log("esta activo");
		}else{
			$("#soloS").removeClass("activo");
			$("#soloS").addClass("noActivo");
			$("#soloN").addClass("activo");
			$("#acompanante").val('0');
			TweenMax.to(['#parentesco-cont','#nomcomp'], 0.3, {opacity: 0, onComplete: function(){
				TweenMax.set(['#parentesco-cont','#nomcomp'], {display:'none', opacity: '1'});
			}});
		}
	})
	$('#campusN').on('click', function(e){
		TweenMax.set('#campus_escuela',{display: 'block'});
		TweenMax.from('#campus_escuela', 0.3, {opacity: 0});
	});
	$('#campusS').on('click', function(e){
		TweenMax.to('#campus_escuela', 0.3, {opacity: 0, onComplete: function(){
			TweenMax.set('#campus_escuela', {display:'none', opacity: '1'});
		}});
	});
	$('.bool-chooser .option').on('click', function(e){
		e.preventDefault();
		var input = $('#'+$(this).parent().data('input'));

		$(this).parent().find('.option').removeClass('activo').addClass('noActivo');
		$(this).addClass('activo');
		
		input.val($(this).data('val'));
	});

	//===== Share ===== //
 	$('#comparte_fb').on('click', function(e){
	    e.preventDefault();
	    pname = 'Born To Be Tec';
		pcaption = 'YA ME REGISTRÉ PARA VIVIR LA EXPERIENCIA BORN TO BE TEC EN TECNOLÓGICO DE MONTERREY, CAMPUS MONTERREY';
		pdesc = '¿Quieres ser parte de este evento? Haz click aquí, regístrate y no pierdas esta increíble oportunidad de conocer todo lo que el Tecnológico de Monterrey tiene para ti.';
		plink = 'http://borntobetec.mty.itesm.mx';
		ppicture = 'http://borntobetec.mty.itesm.mx/img/logo.png';
		FB.ui({
		  method: 'feed',
		  name: pname,
		  caption: pcaption,
		  description: pdesc,
		  link: plink,
		  picture: ppicture
		},
		function(response) {
			//addShare(response['post_id'],1);
		});
	    //window.open('http://www.facebook.com/sharer.php?u=YA ME REGISTRÉ PARA VIVIR LA EXPERIENCIA BORN TO BE TEC EN TECNOLÓGICO DE MONTERREY, CAMPUS MONTERREY'+url, 'Compartir en Facebook','width=480, height=320');
  	});
  	$('#comparte_tw').on('click', function(e){
    	e.preventDefault();
    	url = encodeURIComponent('http://borntobetec.mty.itesm.mx');
    	window.open('https://twitter.com/share?text=Ya me registré para vivir la experiencia Born To Be Tec, regístrate tú aquí %23BornToBeTec', 'Compartir en Twitter','width=480, height=320');
  	});

  	//===== Adjuntar ===== //
  	$('input[name="carta"]').on('change', function(e){
  		$('#carta_upload').submit();
   	});
  	$('input[name="banco"]').on('change', function(e){
  		$('#banco_upload').submit();
  	});
});

function estadoCity(s,id){
	var est = $(s).val();
	var opc = 'estadoCity';
	$.ajax({
		type: 'GET',
		url: 'sql/funciones.php',
		data: {opc:opc, est:est},
		success: function(response){
			if(id != undefined){
				$("#"+id).html(response);
			}
		},
		error: function(){
			alert('Algo salio mal, selecciona tu estado de nuevo.');
		}
	});
}

function citySchool(s,id){
	var idc = $(s).val();
	var opc = 'citySchool';
	$.ajax({
		type: 'GET',
		url: 'sql/funciones.php',
		data: {opc:opc, idc:idc},
		success: function(response){
			if(id != undefined){
				$("#nomprepa").hide();
				$("#"+id).html(response);
				$('#'+id).on('change', function(e){
					if($(this).val() == '#'){
						$("#nomprepa").show();	
					}else{
						$("#nomprepa").hide();
					}
				});
			}
		},
		error: function(){
			alert('Algo salio mal, selecciona tu ciudad de nuevo.');
		}
	});
}
