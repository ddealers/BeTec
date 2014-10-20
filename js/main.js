$(document).ready(function(){
	//===== Init Skrollr =====
	var s = skrollr.init({
		smoothScrolling: true,
		mobileDeceleration: 0.004,
		constants:{
			sparkles: '0p'
		}
	});
	skrollr.menu.init(s);

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
		TweenMax.set('#aviso_legal',{display: 'block', opacity: 1, scale: 1});
		TweenMax.from('#aviso_legal', 0.5, {opacity: 0, scale: 0.5, ease: Back.easeOut});
	});

	$('#aviso_legal .close').on('click', function(e){
		e.preventDefault();
		TweenMax.to('#aviso_legal', 0.5, {opacity: 0, scale: 0.5, ease: Back.easeOut, onComplete: function(){
			TweenMax.set('#aviso_legal',{display: 'none'});
		}});
	});

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
	$('#btn_registrate').on('click', function(e){
		e.preventDefault();
		index_form = 0;
		setFormStep(0);
		$('.siguiente .next').html('Siguiente<i class="icon ion-arrow-right-c">');
		$('select').val('');
		$('input').val('');
		TweenMax.to('header .social', 0.5, {opacity:0});
		TweenMax.to('nav ul', 0.5, {opacity:0});
		TweenMax.to('.arrows', 0.5, {opacity:0});
		TweenMax.set('#registro', {display:'block'});
		TweenMax.from('#registro', 0.5, {opacity:0});
	});
	$('#btn_registro').on('click', function(e){
		e.preventDefault();
		index_form = 0;
		setFormStep(0);
		$('.siguiente .next').html('Siguiente<i class="icon ion-arrow-right-c">');
		$('select').val('');
		$('input').val('');
		TweenMax.to('header .social', 0.5, {opacity:0});
		TweenMax.to('nav ul', 0.5, {opacity:0});
		TweenMax.to('.arrows', 0.5, {opacity:0});
		TweenMax.set('#registro', {display:'block'});
		TweenMax.from('#registro', 0.5, {opacity:0});
	});
	$('#logo').on('click', function(e){
		TweenMax.to('header .social', 0.5, {opacity:1});
		TweenMax.to('nav ul', 0.5, {opacity:1});
		TweenMax.to('.arrows', 0.5, {opacity:1});
		TweenMax.set('#registro', {display:'none'});
		TweenMax.set('#end', {display:'none'});
	});


	//===== Form =====
	var form_data = {};
	var index_form = 0;
	setFormStep(0);

	$("#registro .next").on("click", function(e){
		e.preventDefault();
		prev = index_form;
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
			
			if(name != '' && apat != '' && amat != '' 
				&& dia != '' && mes != '' && anio != ''){
					var nombre = name + ' ' + apat + ' ' + amat;
					form_data.nombre = nombre;
					var cumple = anio + '-' + mes +'-'+ dia;
					form_data.cumple = cumple;
					index_form++;
			}else{
				alert("Todos los datos son requeridos");
				return;
			}
		}else if(index_form == 1){
			var email = $("#email").val();
			form_data.email = email;
			var lada  = $("#lada").val();
			var tel   = $("#tel").val();
			var cel   = $("#cel").val();
			form_data.cel = cel;
			/*
			var car1  = $("#carrera1").val();
			form_data.car1 = car1;
			var car2  = $("#carrera2").val();
			form_data.car2 = car2;
			var car3  = $("#carrera3").val();
			form_data.car3 = car3;
			*/
			var state = $("#estado").val();
			form_data.state = state;
			var city  = $("#ciudadMX").val();
			form_data.city = city;
			var prep  = $("#prepaMX").val();
			form_data.prep = prep;
			var grad  = $("#gradua").val();
			form_data.grad = grad;

			if(email != '' 
				&& lada != '' && tel != '' 
				&& cel != '' 
				/*
				&& car1 != '' 
				&& car2 != '' 
				&& car3 != '' 
				*/
				&& state != '' && city != '' 
				&& prep != '' && grad != ''){
				var numero = lada + tel;
				form_data.numero = numero;
				index_form++;
				if(form_data.city == 986){
					form_data.hotel = '';
					form_data.solo = '';
					form_data.pare = '';
					form_data.namep = '';
					index_form++;
					setFormStep(index);
					return;
				}
			}else{
				alert("Todos los datos son requeridos");
				return;
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
			if(solo == '1'){
				if(pare != '' && namep != ''){
					index_form++;
				}else{
					alert("Nombre y Parentesco son necesarios");
				}
			}else{
				index_form++;
			}
		}else if(index_form == 3){
			var carrera = $("#carrera").val(),
				carrera1 = $("#carrera1").val(),
				carrera2 = $("#carrera2").val(),
				carrera3 = $("#carrera3").val(),
				campus = $("#campus").val(),
				campusEscuela = $("#campus_escuela").val(),
				evento = $("#evento").val();
			if(carrera != ''
				&& carrera1 != ''
				&& carrera2 != ''
				&& carrera3 != ''
				&& campus != ''
				&& evento != ''){
				form_data.carrera = carrera;
				form_data.car1 = carrera1;
				form_data.car2 = carrera2;
				form_data.car3 = carrera3;
				form_data.campus = campus;
				form_data.evento = evento;
				if(campus == 1){
					if(campusEscuela != ''){
						form_data.campus_escuela = campusEscuela;
					}else{
						alert("Es necesario indicar que escuela se ha elegido");
						return;
					}
				}
				$('.siguiente .next').html('Enviar<i class="icon ion-paper-airplane"></i>');
				index_form++;
			}else{
				alert("Todos los datos son requeridos");
				return;
			}
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

			if($("#acepto").is(':checked') === true 
				&& vopt1 != '' 
				&& vopt2 != '' 
				&& vopt3 != '' 
				&& sopt1 != ''
				&& sopt2 != ''
				&& evento != ''){
				//cotinuar
				console.log(form_data);
				$.ajax({
					type: 'POST',
					url: 'sql/save.php',
					data:form_data,
					success: function(response){
						if(response == 'true'){
							$('.registroT .response').hide();
							console.log(form_data.city, form_data.hotel);
							if(form_data.city != 986 && form_data.hotel == '1'){
								$('.registroT .foraneoA').show();
							}else if(form_data.city != 986 && form_data.hotel == '0'){
								$('.registroT .foraneoB').show();
							}else{
								$('.registroT .local').show();
							}
							$('#end').show();
							TweenMax.from('#end', 1, {opacity: 0, scale: 0.5, ease: Back.easeOut});
							return;
						}else{
							alert("Lo sentimos tu registro no se pudo completar");
							console.log(response);
						}
					},
					error: function(){
						alert('Algo salio mal, recarga y trata de nuevo.');
						console.log(response);
					}
				});
				return;
			}else{
				alert("Debes aceptar terminos y condiciones");
				return;
			}
		}
		setFormStep(index_form);
	});

	function setFormStep(next){
		$(".step").hide();
		var ns = $(".step").eq(next);
		ns.show();
		TweenMax.from(ns, 0.3, {opacity: 0, y: 100});
	}
	
	//===== Acciones en registrar ===== //
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
	//$("#genero").val('0');

	$(".compania").hide();
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
	//$("#hospedaje").val('0');

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
	$('#campus_escuela').hide();
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
	//$("#acompanante").val('0');
})


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
			console.log(response);
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
				$("#"+id).html(response);
			}
		},
		error: function(){
			console.log(response);
			alert('Algo salio mal, selecciona tu estado de nuevo.');
		}
	});
}
