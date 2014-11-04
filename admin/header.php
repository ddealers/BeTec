<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>BTEC</title>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/admin.css"/>
	<script type="text/javascript" src="../js/vendor/jquery.min.js"></script>
	<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#myTab a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
		});
	});
	</script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<?php if(isset($_SESSION['user']) && $_SESSION['user'] != NULL): ?>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php endif; ?>
					<a class="navbar-brand" href="#"><img height="200%" src="../img/logo.png"></a>
				</div>
				<?php if(isset($_SESSION['user']) && $_SESSION['user'] != NULL): ?>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="./login.php?logout">Salir</a></li>
					</ul>
					<form class="navbar-form navbar-right" role="search">
						<div class="form-group">
							<input name="s" type="text" class="form-control" placeholder="Buscar registro">
						</div>
						<button type="submit" class="btn btn-default">Buscar</button>
					</form>
				</div>
				<?php endif; ?>
			</div>
		</nav>