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
	var sindex = 0;
	$('.arrows .next').on('click', function(e){
		e.preventDefault();
		sindex++;
		if(sindex >= sections.length){
			sindex = 0;
		}
		var sel = $('header nav ul li').eq(sindex).children('a');
		skrollr.menu.click(sel[0]);
	});
	$('.arrows .prev').on('click', function(e){
		e.preventDefault();
		sindex--;
		if(sindex < 0){
			sindex = sections.length - 1;
		}
		var sel = $('header nav ul li').eq(sindex).children('a');
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

	//===== Form =====
	var form_data = {};
	var index_form = 0;
	setFormStep(0);

	$("#registro .next").on("click", function(e){
		e.preventDefault();
		prev = index;
		if(index == 0){
			var genero = $("#genero").val();
			form_data.genero = genero;
			var name = $("#nombre").val();
			var apat = $("#apaterno").val();
			var amat = $("#amaterno").val();
			var dia = $("#ndia").val();
			var anio = $("#nanio").val();
			var mes = $("#nmes").val();
			
			if(name != '' && apat != '' && amat != '' && dia != '' && mes != '' && anio != ''){
					var nombre = name + ' ' + apat + ' ' + amat;
					form_data.nombre = nombre;
					var cumple = anio + '-' + mes +'-'+ dia;
					form_data.cumple = cumple;
					index++;
			}else{
				alert("todos los datos son requeridos");
				return;
			}
		}else if(index == 1){
			var email = $("#email").val();
			form_data.email = email;
			var lada  = $("#lada").val();
			var tel   = $("#tel").val();
			var cel   = $("#cel").val();
			form_data.cel = cel;
			var car1  = $("#carrera1").val();
			form_data.car1 = car1;
			var car2  = $("#carrera2").val();
			form_data.car2 = car2;
			var car3  = $("#carrera3").val();
			form_data.car3 = car3;
			var state = $("#estado").val();
			form_data.state = state;
			var city  = $("#ciudadMX").val();
			form_data.city = city;
			var prep  = $("#prepaMX").val();
			form_data.prep = prep;
			var grad  = $("#gradua").val();
			form_data.grad = grad;

			if(email != '' && lada != '' && tel != '' && cel != '' && car1 != '' && car2 != '' && car3 != '' && state != '' && city != '' && prep != '' && grad != ''){
				var numero = lada + tel;
				form_data.numero = numero;
				index++;
				console.log(form_data.city);
				if(form_data.city == 986){
					form_data.hotel = '';
					form_data.solo = '';
					form_data.pare = '';
					form_data.namep = '';
					index++;
					setFormStep(index);
					return;
				}
			}else{
				alert("todos los datos son requeridos");
				return;
			}
		}else if(index == 2){
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
					index++;
				}else{
					alert("Nombre y Parentesco son necesarios");
				}
			}else{
				index++;
			}
		}else if(index == 3){
			var vopt1  = $("#vopt1").val();
			form_data.vopt1 = vopt1;
			var vopt2  = $("#vopt2").val();
			form_data.vopt2 = vopt2;
			var vopt3  = $("#vopt3").val();
			form_data.vopt3 = vopt3;
			var sopt   = $("#sopt").val();
			form_data.sopt = sopt;
			var evento = $("#evento").val();
			form_data.evento = evento;

			if($("#acepto").is(':checked') === true && vopt1 != '' && vopt2 != '' && vopt3 != '' && sopt != '' && evento != ''){
				//cotinuar
				console.log(form_data);
				$.ajax({
					type: 'POST',
					url: 'sql/save.php',
					data:form_data,
					success: function(response){
						if(response == 'true'){
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
			}else{
				alert("Debes aceptar terminos y condiciones");
				return;
			}
		}
		setFormStep(index);
	});

	function setFormStep(next){
		$(".step").hide();

		var ns = $(".step").eq(next);
		
		ns.show();
		
		TweenMax.from(ns, 0.3, {opacity: 0, y: 100});
	}

	//===== Calendar =====
	var index = 0;
	setCalendarDay(0);

	$(".calendar .next").on("click", function(e){
		e.preventDefault();
		prev = index;
		index++;
		if(index > 2){
			index = 0;
		}
		setCalendarDay(index);
	});
	$(".calendar .prev").on("click", function(e){
		e.preventDefault();
		prev = index;
		index--;
		if(index < 0){
			index = 2;
		}
		setCalendarDay(index);
	});

	function setCalendarDay(next){
		$(".titles p").hide();
		$(".days .day").hide();

		var n = $(".titles p").eq(next),
			nd = $(".days .day").eq(next);
		
		n.show();
		nd.show();
		
		TweenMax.from(n, 0.3, {opacity: 0, y: -10});
		TweenMax.from(nd, 0.3, {opacity: 0, y: -10});
	}

	//===== Tables =====
	var sx = 1366 / $(window).width();
	var sy = 864 / $(window).height();
	//$("table.jueves").css({width: 850 * sx, height: 130 * sy});
	//$("table.viernes").css({width: 1020 * sx, height: 440 * sy});
});

//===== Acciones en registrar ===== //
$( document ).ready(function(){
	$("#generoM").click(function() {
		if($(this).hasClass("selected")){
			console.log("ya tiene la clase!!");
		}else{
			$(this).addClass("selected");
			$("#generoH").removeClass("selected");
			$("#genero").val('1');
		}
	})
	$("#generoH").click(function() {
		if($(this).hasClass("selected")){
			console.log("ya tiene la clase!!");
		}else{
			$(this).addClass("selected");
			$("#generoM").removeClass("selected");
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
		}
	})
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
