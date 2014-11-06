/*
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
*/
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

//	console.log(genero + nombre + cumple + email + tel +' <> '+cel+' <> '+medio+' <> '+estado+' <> '+ciudad+' <> '+prepa+' <> '+ingreso +' <hospedaje> '+ hotel +' <> '+ solo +' <> '+ perentesco+' <> '+acompana+' <tecnologico> '+ tecno+' <> '+car1+' <> '+car2+' <> '+car3+' <talleres> '+tav1+' <> '+tav2+' <> '+tav3+' <> '+tas1+' <> '+tas2);
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
		alert("Se ha actualizado correctamente");
	});
}

function sendTicket(){
	//get mail, 
	var idu		= $("#idu").val();
	var nombre	= $("#nombre").val();
	var email	= $("#email").val();
	var correo	= $("#correo").val();

	$.ajax({
		type: 'POST',
		url: './boleto.php',
		data: {idu:idu, nombre:nombre, email:email, correo:correo }
	}).done(function(res){
		if(res){
			alert("Se ha enviado el mail.");
		}
	});
}

$(document).ready(function(){
	$('#myTab a').click(function (e) {
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