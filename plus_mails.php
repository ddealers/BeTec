<?php
require_once('admin/usuarios.class.php');
$key = 'BornToBeTec321_';
$count = 0;
function encriptarURL($string, $key){
	$result = '';
	for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return base64_encode($result);
}
$userInst = new Usuario();
$users = $userInst->rows();
?>
<html>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>Mail</th>
			<th>Token</th>
		<tr>
		<?php 
		foreach ($users as $key => $value): 
			$enc = encriptarURL($value->correo, $key);
			if(stripos($enc, '+')):
				$count++;
		?>
		<tr>
			<td><?php echo $value->id ?></td>
			<td><?php echo $value->correo ?></td>
			<td><?php echo $enc ?></td>
		</tr>
		<?php endif; ?>
		<?php endforeach ?>
	</table>
	<h2><?php echo $count ?></h2>
</body>
</html>