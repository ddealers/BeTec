<?php
require_once('header.php');
if(isset($_GET['e']) && $_GET['e'] == '100'){
	$response = "<div class='alert alert-success' role='alert'>Se ha enviado un mail con tu nueva contraseña</div>";
}elseif (isset($_GET['e']) && $_GET['e'] == '101') {
	$response = "<div class='alert alert-warning' role='alert'>Debe ser un mail válido</div>";
}elseif (isset($_GET['e']) && $_GET['e'] == '68') {
	$response = "<div class='alert alert-danger' role='alert'>Ocurrió un error, refresca y trata de nuevo</div>";
}
else{
	$response = "<div></div>";
}
?>

<section>
	<h3>Recuperar contraseña</h3>
	<?php echo $response; ?>
	<form class="form-inline" role="form" action="./login.php?recuperar" method="post" >
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="correo" name="correo" placeholder="Email">
			</div>
		</div>
		<button type="submit" class="btn btn-default">Enviar</button>
	</form>
</section>