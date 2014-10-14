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
		$('#end').hide();
	});
	//===== Form =====
	var index_form = 0;
	setFormStep(0);

	$("#registro .next").on("click", function(e){
		e.preventDefault();
		prev = index;
		index++;
		if(index > 3){
			$('#end').show();
			//alert("registro completo");
			TweenMax.from('#end', 1, {opacity: 0, scale: 0.5, ease: Back.easeOut});
			return;
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
		url: '../sql/funciones.php',
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
		url: '../sql/funciones.php',
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

function save(){
	if($("input:checked")){
		console.log("ya esta chekeado");
	}else{
		alert("Debes acptar terminos y condiciones D: ");
	}
}
