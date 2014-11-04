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
		<nav class="navbar navbar-default">
			<img src="../img/logo.png">
		</nav>