function validate( key, msg, type ){
	var patt;
	if(!type){
		if(key == ''){
			alert(msg);
			return false;
		}
		return true;
	}else if(type == 'birth'){
		patt = /[0-9]{4}-[0-9]{2}-[0-9]{2}/;
		if(key == ''){
			alert('Te hace falta ingresar el campo fecha de nacimiento.');
			return false;
		}else if(!patt.test(key)){
			alert(msg);
			return false;
		}
		return true;
	}else if(type == 'email'){
		patt = /([\w\.\-_]+)?\w+@[\w-_]+(\.\w+){1,}/igm;
		if(key == ''){
			alert('Te hace falta ingresar el campo correo electrónico.');
			return false;
		}else if(!patt.test(key)){
			alert(msg);
			return false;
		}
		return true;
	}else if(type == 'lada'){
		patt = /\d{1,3}/;
		if(key == ''){
			alert('Te hace falta ingresar el campo clave lada.');
			return false;
		}else if(!patt.test(key)){
			alert(msg);
			return false;
		}
		return true;
	}else if(type == 'tel'){
		patt = /\d{8,10}/;
		if(key == ''){
			alert('Te hace falta ingresar el campo número telefónico.');
			return false;
		}else if(!patt.test(key)){
			alert(msg);
			return false;
		}
		return true;
	}else if(type == 'cel'){
		patt = /\d{8,10}/;
		if(key == ''){
			alert('Te hace falta ingresar el campo número celular.');
			return false;
		}else if(!patt.test(key)){
			alert(msg);
			return false;
		}
		return true;
	}
}
function Update(){
	var idu 	= $("#idu").val();
	var genero 	= $("#genero").val();
	var nombre 	= $("#nombre").val();
	var cumple 	= $("#cumple").val();
	var email 	= $("#email").val();
	var tel 	= $("#tel").val();
	var cel 	= $("#cel").val();
	var medio 	= $("#medio").val();
	var estado 	= $("#estado").val();
	var ciudad 	= $("#ciudad").val();
	var prepa 	= $("#prepa").val();
	var nomprepa= $("#nomprepa").val();
	var ingreso = $("#ingreso").val();
	//Hospedaje
	var hotel 		= $("#hotel").val();
	var solo 		= $("#solo").val();
	var perentesco 	= $("#perentesco").val();
	var acompana 	= $("#acompana").val();
	//tecnologico
	var tecno 	= $("#tecno").val();
	var car1 	= $("#car1").val();
	var car2 	= $("#car2").val();
	var car3 	= $("#car3").val();
	//talleres
	var ptav1 	= $("#pvopt1").val();
	var tav1 	= $("#vopt1").val();
	var ptav2 	= $("#pvopt2").val();
	var tav2 	= $("#vopt2").val();
	var ptav3 	= $("#pvopt3").val();
	var tav3 	= $("#vopt3").val();
	var ptas1 	= $("#psopt1").val();
	var tas1 	= $("#sopt1").val(); 
	var ptas2 	= $("#psopt2").val();
	var tas2 	= $("#sopt2").val();
	$.ajax({
		type: 'POST',
		url: './update.php',
		data: {
			genero:genero,
			nombre:nombre,
			cumple:cumple,
			email:email,
			tel:tel,
			cel:cel,
			medio:medio,
			estado:estado,
			ciudad:ciudad,
			prepa:prepa,
			nomprepa:nomprepa,
			ingreso:ingreso,
			hotel:hotel,
			solo:solo,
			perentesco:perentesco,
			acompana:acompana,
			tecno:tecno,
			car1:car1,
			car2:car2,
			car3:car3,
			ptav1:ptav1,
			tav1:tav1,
			ptav2:ptav2,
			tav2:tav2,
			ptav3:ptav3,
			tav3:tav3,
			ptas1:ptas1,
			tas1:tas1,
			ptas2:ptas2,
			tas2:tas2,
			idu:idu
		}
	}).done(function(res){
		console.log(res);
		alert("Se ha actualizado correctamente");
	});
}

function saveNew(){
	var genero 	= $("#genero").val();
	var nombre 	= $("#nombre").val();
	var cumple 	= $("#cumple").val();
	var email 	= $("#email").val();
	var tel 	= $("#tel").val();
	var cel 	= $("#cel").val();
	var medio 	= $("#medio").val();
	var estado 	= $("#estado").val();
	var ciudad 	= $("#ciudad").val();
	var prepa 	= $("#prepa").val();
	var nomprepa= $("#nomprepa").val();
	var ingreso = $("#ingreso").val();
	//Hospedaje
	var hotel 		= $("#hotel").val();
	var solo 		= $("#solo").val();
	var perentesco 	= $("#perentesco").val();
	var acompana 	= $("#acompana").val();
	//tecnologico
	var tecno 	= $("#tecno").val();
	var car1 	= $("#car1").val();
	var car2 	= $("#car2").val();
	var car3 	= $("#car3").val();
	//talleres
	var ptav1 	= $("#pvopt1").val();
	var tav1 	= $("#vopt1").val();
	var ptav2 	= $("#pvopt2").val();
	var tav2 	= $("#vopt2").val();
	var ptav3 	= $("#pvopt3").val();
	var tav3 	= $("#vopt3").val();
	var ptas1 	= $("#psopt1").val();
	var tas1 	= $("#sopt1").val(); 
	var ptas2 	= $("#psopt2").val();
	var tas2 	= $("#sopt2").val();
	
	if( !validate(genero, 'Te hace falta ingresar el campo género.') ) return;
	if( !validate(nombre, 'Te hace falta ingresar el campo nombre.') ) return;
	if( !validate(cumple, 'No has ingresado una fecha de nacimiento correcta.', 'birth') ) return;
	if( !validate(email, 'No has ingresado una cuenta de correo correcta.', 'email') ) return;
	if( !validate(tel, 'No has ingresado un número telefónico correcto.', 'tel') ) return;
	if( !validate(cel, 'No has ingresado un número celular correcto.', 'cel') ) return;
	if( !validate(medio, 'Te hace falta ingresar el campo ¿Cómo te enteraste?') ) return;
	if( !validate(estado, 'Te hace falta hacer una selección en el campo estado.') ) return;
	if( !validate(ciudad, 'Te hace falta hacer una selección en el campo ciudad.') ) return;
	if( !validate(prepa, 'Te hace falta hacer una selección en el campo preparatoria.') ) return;
	if(prepa == '#'){
		if( !validate(nomprepa, 'Te hace falta ingresar el campo nombre de otra preparatoria.') ) return;
	}
	if( !validate(ingreso, 'Te hace falta hacer una selección en el campo fecha de ingreso al nivel superior.') ) return;
	if( !validate(hotel, 'Debes indicar si se necesita hospedaje.') ) return;
	if( !validate(solo, 'Debes indicar si se existe un acompañante.') ) return;
	if(hotel == '1' && solo == '1'){
		if( !validate(perentesco, 'Indica el parentesco del acompañante.') ) return;
		if( !validate(acompana, 'Ingresa el nombre del acompañante.') ) return;
	}
	if( !validate(tecno, 'Debes indicar si el visitante ha elegido el Tec como universidad.') ) return;
	if( !validate(car1, 'Es obligatorio que selecciones por lo menos la primer carrera de interés.') ) return;
	if( !validate(tav1, 'Es necesario que selecciones la actividad de las 16:30 horas del Viernes.') ) return;
	if( !validate(tav2, 'Es necesario que selecciones la actividad de las 17:40 horas del Viernes.') ) return;
	if( !validate(tav3, 'Es necesario que selecciones la actividad de las 18:40 horas del Viernes.') ) return;
	if( !validate(tas1, 'Es necesario que selecciones la taller de las 9:00 horas del Sábado.') ) return;
	if( !validate(tas2, 'Es necesario que selecciones la taller de las 11:45 horas del Sábado.') ) return;

	$.ajax({
		type: 'POST',
		url: './save.php',
		data: {
			genero:genero,
			nombre:nombre,
			cumple:cumple,
			email:email,
			tel:tel,
			cel:cel,
			medio:medio,
			estado:estado,
			ciudad:ciudad,
			prepa:prepa,
			nomprepa: nomprepa,
			ingreso:ingreso,
			hotel:hotel,
			solo:solo,
			perentesco:perentesco,
			acompana:acompana,
			tecno:tecno,
			car1:car1,
			car2:car2,
			car3:car3,
			tav1:tav1,
			tav2:tav2,
			tav3:tav3,
			tas1:tas1,
			tas2:tas2
		}
	}).done(function(res){
		//alert("Se ha actualizado correctamente");
		if(res.error){
			alert(error);
		}
	});
}

function sendTicket(){
	var data;
	//get mail,
	if(arguments.length > 0){
		data = {action:'byID', id: arguments[0]}
	}else{
		data = {
			idu: $("#idu").val(),
			nombre: $("#nombre").val(),
			email: $("#email").val(),
			correo: $("#correo").val()
		}
	}
	$.ajax({
		type: 'POST',
		url: './boleto.php',
		data: data
	}).done(function(res){
		if(res){
			alert("Se ha enviado el mail.");
		}
	});
}

//OrangeBox
oB.settings.addThis = false;

$(document).ready(function(){
	function checkinOff(e){
		var span = $(this);
		var id = $(this).data('id');
		$.ajax({
			type: 'POST',
			url: './checkin.php',
			data: {action: 'remove', id: id}
		}).done(function(res){
			span.removeClass('checkin-on');
			span.removeClass('glyphicon-ok-circle');
			span.addClass('checkin-off');
			span.addClass('glyphicon-remove-circle');
			span.off('click');
			span.on('click', checkinOn);
		});
	}
	function checkinOn(e){
		var span = $(this);
		var id = $(this).data('id');
		$.ajax({
		type: 'POST',
		url: './checkin.php',
		data: {action: 'add', id: id}
		}).done(function(res){
			span.addClass('checkin-on');
			span.addClass('glyphicon-ok-circle');
			span.removeClass('checkin-off');
			span.removeClass('glyphicon-remove-circle');
			span.off('click');
			span.on('click', checkinOff);
		});
	}
	$('span.checkin-on').on('click', checkinOff);
	$('span.checkin-off').on('click', checkinOn);
	$('.from label input').on('change', function(e){
		var target = $(e.currentTarget);
		$("#filters").submit();
	});
	$('.foreign label input').on('change', function(e){
		var target = $(e.currentTarget);
		if(target.attr('name') == 'comp'){
			if(target.prop('checked')){
				$("input[name='hab']").attr('checked', true);	
			}
		}
		if(target.attr('name') == 'hab'){
			if(!target.prop('checked')){
				$("input[name='comp']").attr('checked', false);	
			}
		}
		$("#filters").submit();
	});
	$('#myTab a').on('click', function (e) {
		e.preventDefault()
		$(this).tab('show')
	});
	$('.btn-delete').on('click', function(e){
		e.preventDefault();
		var r = confirm("Este registro se borrará permanentemente y no podrá recuperarse");
		if(r){
			var id = location.search.replace('?u=','');
			$.ajax({
				type: 'POST',
				url: './delete.php',
				data: {id: id}
			}).done(function(res){
				location.href='./index.php';
			});
		}
	});
	$('#estado').on('change', function(e){
		var es = $(this).val();
		$('#ciudad option.estado').hide();
		$('#ciudad option.estado'+es).show();
	});
	$('#ciudad').on('change', function(e){
		var es = $(this).val();
		$('#prepa option.ciudad').hide();
		$('#prepa option.ciudad'+es).show();
	});
	$('#prepa').on('change', function(e){
		var es = $(this).val();
		if(es == '#'){
			$('#nomprepa').show();
		}else{
			$('#nomprepa').hide();
		}
	});
	if($('#nomprepa').val() == ''){
		$('#nomprepa').hide();
	}
	//===== Acciones en select ===== //
	var carrerasList = {},
		viernesList = {},
		sabadoList = {};

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

	$('#car1').on('change', function(){
		carrerasList.carrera1 = $(this).val();
		updateLists(carrerasList, ['car2', 'car3']);
	});
	$('#car2').on('change', function(){
		carrerasList.carrera2 = $(this).val();
		updateLists(carrerasList, ['car1', 'car3']);
	});
	$('#car3').on('change', function(){
		carrerasList.carrera3 = $(this).val();
		updateLists(carrerasList, ['car1', 'car2']);
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
});