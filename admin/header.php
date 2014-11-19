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
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/orangebox.css" />
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/admin.css"/>
	<script type="text/javascript" src="../js/vendor/jquery.min.js"></script>
	<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./bootstrap/js/orangebox.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
	<style type="text/css">
		.checkin-on{
			color:green; font-size: 30px;
		}
		.checkin-off{
			color:orange; font-size: 30px
		}
	</style>
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
					<a class="navbar-brand" href="index.php"><img height="200%" src="../img/logo.png"></a>
					<?php if(isset($_SESSION['user']) && $_SESSION['user'] != NULL): ?>
					<?php endif; ?>
				</div>
				<?php if(isset($_SESSION['user']) && $_SESSION['user'] != NULL): ?>
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav nav-pills" role="tablist">
						<li role="presentation"><a href="./index.php?checkin">Checkin</a></li>
						<li role="presentation"><a href="./index.php">Registros</a></li>
						<?php if($_SESSION['user']->s_login_permission == 1): ?>
						<li role="presentation"><a href="./index.php?admin">Admin</a></li>
						<?php endif; ?>
						<!--li role="presentation"><a href="#">Messages</a></li-->
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="./login.php?logout">Salir</a></li>
					</ul>
					<script type="text/javascript">
					$(document).ready(function(){
						barcode = '';
						$(document).keypress(function(e) {
							var code = (e.keyCode ? e.keyCode : e.which);
							if(code==13){
								$('#bccheck').submit();
							}else{
								barcode=barcode+String.fromCharCode(code);
							}
							$('#bc').val(barcode);
					    });
					    setTimeout(function(){
							$('.alert').fadeOut();
						},500);
					});
					</script>
					<form action="./index.php" method="get" class="navbar-form navbar-right" role="search">
						<?php 
						parse_str($_SERVER['QUERY_STRING'], $vars);
						foreach ($vars as $key => $value): 
						if($key != 's'):?>
						<input type="hidden" name="<?php echo $key ?>" value="<?php echo $value ?>">
						<?php 
						endif;
						endforeach; ?>
						<div class="form-group">
							<input name="s" type="text" class="form-control" placeholder="Buscar registro">
						</div>
						<button type="submit" class="btn btn-default">Buscar</button>
					</form>
					<form action="./index.php" id="bccheck" class="navbar-form navbar-right" role="form" method="get">
						<div class="form-group">
							<div class="col-sm-10">
								<input type="text" class="form-control" id="bc" name="bc" placeholder="Barcode">
							</div>
						</div>
					</form>
				</div>
				<?php endif; ?>
			</div>
		</nav>