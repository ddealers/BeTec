<?php
require('barcode/BarcodeBase.php');
require('barcode/Code128.php');

$string = $_GET['s'];
$bcode = new emberlabs\Barcode\Code128();
$bcode->setData($string);
$bcode->setDimensions(620, 100);
$bcode->draw();
header('Content-Type: image/png');
$bcode->output();
