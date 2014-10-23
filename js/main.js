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
	function initRegistro(e){
		e.preventDefault();
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
		$('.bool-choose .option').removeClass('activo');
		$('.bool-choose .option').addClass('noActivo');
		$('.bool-chooser .option').removeClass('activo');
		$('.bool-chooser .option').addClass('noActivo');
		$('#acepto').attr('checked', false);
		TweenMax.to('header .social', 0.5, {opacity:0});
		TweenMax.to('nav ul', 0.5, {opacity:0});
		TweenMax.to('.arrows', 0.5, {opacity:0});
		TweenMax.set('#registro', {display:'block'});
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
				alert("Todos los datos son requeridos, revisa cual es el campo que te falta completar.");
				return;
			}
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

			if(email != '' 
				&& lada != '' && tel != ''  && cel != ''  && state != '' && city != ''  && prep != '' && grad != ''){
				if(prep == '#'){
					if(nomprepa == ''){
						alert("Todos los datos son requeridos, revisa cual es el campo que te falta completar.");
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
					setFormStep(index_form);
					return;
				}
			}else{
				alert("Todos los datos son requeridos, revisa cual es el campo que te falta completar.");
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
			if(hotel == '1' && solo == '1'){
				if(pare != '' && namep != ''){
					index_form++;
				}else{
					alert("El Nombre y Parentesco de tu acompañante son necesarios, proporciona los datos.");
				}
			}else{
				index_form++;
			}
		}else if(index_form == 3){
			var carrera = $("#carrera").val();
				form_data.carrera = carrera;
			var car1  = $("#carrera1").val();
				form_data.car1 = car1;
			var car2  = $("#carrera2").val();
				form_data.car2 = car2;
			var car3  = $("#carrera3").val();
				form_data.car3 = car3;
				
				campus = $("#campus").val();
					form_data.campus = campus;
				campusEscuela = $("#campus_escuela").val();
					form_data.campus_escuela = campusEscuela;
				eventos = $("#evento").val();
					form_data.eventos = eventos;

			if(carrera != '' && car1 != '' && car2 != '' && car3 != '' && campus != '' && eventos != ''){
				form_data.carrera = carrera;
				form_data.car1 = car1;
				form_data.car2 = car2;
				form_data.car3 = car3;
				if(campus == 1){
					if(campusEscuela != ''){
						form_data.campus_escuela = campusEscuela;
					}else{
						alert("Es necesario indicar la universidad en la que piensas estudiar");
						return;
					}
				}
				$('.siguiente .next').html('Enviar<i class="icon ion-paper-airplane"></i>');
				index_form++;
			}else{
				alert("Todos los datos son requeridos, revisa cual es el campo que te falta completar.");
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

			if($("#acepto").is(':checked') === true  && vopt1 != ''  && vopt2 != ''  && vopt3 != '' && sopt1 != '' && sopt2 != '' && evento != ''){
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
							if(form_data.city == 986){
								$('.registroT .local').show();
							}else if(form_data.hotel == 0){
								$('.registroT .foraneoB').show();
							}else{
								$('.registroT .foraneoA').show();
							}
							$('#end').show();
							TweenMax.from('#end', 1, {opacity: 0, scale: 0.5, ease: Back.easeOut});
							return;
						}else if(response == 'badMail'){
							alert("Este email ya ha sido registrado, vuelve a realizar el registro con una cuenta de correo nueva.");
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
			}else{
				alert("Debes aceptar los Términos y Condiciones.");
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
	/*$('#vopt1').on('change', function(){
		viernesList.vopt1 = $(this).val();
		updateLists(viernesList, ['vopt2', 'vopt3']);
	});*/
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
					}
				});
			}
		},
		error: function(){
			alert('Algo salio mal, selecciona tu ciudad de nuevo.');
		}
	});
}
