<?php
require_once('admin.class.php');
$admin = new AdminClass();
if(isset($_REQUEST['id'])){
	$res = $admin->delete($_REQUEST['id']);
	echo $res;
}