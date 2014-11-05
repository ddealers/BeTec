
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
	var tav1 	= $("#tav1").val(); 
	var tav2 	= $("#tav2").val();
	var tav3 	= $("#tav3").val();
	var tas1 	= $("#tas1").val(); 
	var tas2 	= $("#tas2").val();

//	console.log(genero + nombre + cumple + email + tel +' <> '+cel+' <> '+medio+' <> '+estado+' <> '+ciudad+' <> '+prepa+' <> '+ingreso +' <hospedaje> '+ hotel +' <> '+ solo +' <> '+ perentesco+' <> '+acompana+' <tecnologico> '+ tecno+' <> '+car1+' <> '+car2+' <> '+car3+' <talleres> '+tav1+' <> '+tav2+' <> '+tav3+' <> '+tas1+' <> '+tas2);
	
	$.ajax({
		type: 'POST',
		url: './update.php',
		data: {genero:genero,nombre:nombre,cumple:cumple,email:email,tel:tel,cel:cel,medio:medio,estado:estado,ciudad:ciudad,prepa:prepa,ingreso:ingreso,hotel:hotel,solo:solo,perentesco:perentesco,acompana:acompana,tecno:tecno,car1:car1,car2:car2,car3:car3,tav1:tav1,tav2:tav2,tav3:tav3,tas1:tas1,tas2:tas2, idu:idu}
	}).done(function(res){
		alert("Se ha actualizado correctamente");
	});
}