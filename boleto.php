<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT);
require_once("config.php");
require('./sql/funciones.php');
require('pdf/fpdf.php');
/*function info(){
	$mysqli = new mysqli('localhost','root','olamund0','test');
	$string = $_GET['s'];
	$key = 'BornToBeTec321_';

	$mail = desencriptarURL($string, $key);

	if($mail){
		$q = "SELECT id, nombre FROM usuarios WHERE correo = '$mail' ";
		$v = $mysqli->query($q);

		if($v){
			if($v->num_rows > 0){
				while ($row = $v->fetch_assoc()) {
					$data = $row;
				}

				$idu = $data['id'];
				$full_name = $data['nombre'];

				$t = "SELECT talleres.dia, talleres.nombre FROM talleres, usuario_taller WHERE usuario_taller.id_usuario = '$idu' AND usuario_taller.id_taller = talleres.id ORDER BY talleres.dia ASC ";
				$vt = $mysqli->query($t);

				if($vt){
					if($vt->num_rows > 0){
						while ($rows = $vt->fetch_assoc()) {
							$info[] = $rows;
						}
					}

					$tv1 = $info[0]['nombre'];
					$tv2 = $info[1]['nombre'];
					$tv3 = $info[2]['nombre'];
					$ts1 = $info[3]['nombre'];
				}
			}
		}
	}
}*/
	class PDF extends FPDF
	{
		function Header()
		{
$mysqli = new mysqli(HOST,USR,PWD,DB);
$string = $_GET['s'];
$key = 'BornToBeTec321_';
$mail = desencriptarURL($string, $key);
if($mail){
$q = "SELECT id, nombre FROM usuarios WHERE correo = '$mail' ";
$v = $mysqli->query($q);
if($v){
if($v->num_rows > 0){
while ($row = $v->fetch_assoc()) {
$data = $row;
}
$idu = $data['id'];
$full_name = $data['nombre'];
$t = "SELECT talleres.dia, talleres.nombre FROM talleres, usuario_taller WHERE usuario_taller.id_usuario = '$idu' AND usuario_taller.id_taller = talleres.id ORDER BY talleres.dia ASC ";
$vt = $mysqli->query($t);
if($vt){
if($vt->num_rows > 0){
while ($rows = $vt->fetch_assoc()) {
$info[] = $rows;
}
}
$tv1 = $info[0]['nombre'];
$tv2 = $info[1]['nombre'];
$tv3 = $info[2]['nombre'];
$ts1 = $info[3]['nombre'];
}
}
}
}
			//cabecera
			$this->Image('./img/impresora.png',77,12,6);
			$this->SetFont('Arial','',8);
			$this->Cell(80);
			$this->Cell(30,10,'imprimir y traer el dia del evento',0,0,'C');
			$this->Ln(10);

			$this->SetLineWidth(0.5);
			$this->Cell(190, 90, '', 1,0,'B');
			$this->Image('./img/logo.png',16,26,35);
			$this->SetY(32);
			$this->SetX(65);
			$this->SetFont('Arial','B',25);
			$this->Write(5, 'BORN TO BE TEC 2014');


			//Lineas
			$this->SetTextColor(207,207,207);
			$this->SetFont('Arial','',7);
			$this->SetY(50);
			$this->SetX(15);
			$this->Write(0, '- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ');
			$this->SetFont('Arial','',5);
			$this->SetY(30);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			$this->Ln(3);
			$this->SetX(170);
			$this->Write(1, '|');
			
			//Indicadores
			$this->SetFont('Arial','',8);
			$this->SetY(55);
			$this->SetX(-355);
			$this->Cell(0,0,'Participante:',0,0,'C');
			$this->SetY(68);
			$this->SetX(-345);
			$this->Cell(0,0,'Talleres del Viernes:',0,0,'C');
			$this->SetY(95);
			$this->SetX(-362);
			$this->Cell(0,0,'Lugar:',0,0,'C');
			$this->SetY(68);
			$this->SetX(-210);
			$this->Cell(0,0,'Talleres de Sábado:',0,0,'C');
			$this->SetY(90);
			$this->SetX(-208);
			$this->Cell(179,10,'Fecha:',0,0,'C');
			$this->SetY(175);
			$this->SetX(-210);
			$this->Cell(175,-137,'http://borntobetec.mty.itesem.mx/',0,0,'C');

			// Escuela
			$this->Image('./img/tmty.png',165,98,30);

			//Contenido Dinamico
			$this->SetTextColor(0,0,0);
			$this->SetFont('Arial','B',12);
				//Talleres Viernes
			$this->SetY(60);
			$this->SetX(-300);
			$this->Cell(0,0, $full_name, 0,0,'C');
			$this->SetFont('Arial','B',8);
			$this->SetY(75);
			$this->SetX(-315);
			$this->Cell(0,0, '1. '.$tv1, 0,0,'C');
			$this->ln(7);
			$this->Cell(69,0, '2. '.$tv2, 0,0,'C');
			$this->ln(7);
			$this->Cell(49,0, '3. '.$tv3, 0,0,'C');

				//Luagr
			$this->SetY(99);
			$this->SetX(-326);
			$this->SetFont('Arial','',7);
			$this->Cell(0,0, '-Centro Estudiantil de Tecnológico de', 0,0,'C');
			$this->Ln(3);
			$this->Cell(56,0, 'Monterrey, Campus Monterrey.', 0,0,'C');
				//Fecha
			$this->SetY(99);
			$this->SetX(-200);
			$this->SetFont('Arial','',7);
			$this->Cell(0,0, '- 21 de noviembre (14:30 horas)', 0,0,'C');
			$this->Ln(3);
			$this->Cell(190,0, '- 22 de noviembre (09:00 horas)', 0,0,'C');

				//Talleres Sabado
			$this->SetFont('Arial','B',8);
			$this->SetY(75);
			$this->SetX(-170);
			$this->Cell(0,0, '1. '.$ts1, 0,0,'C');
			$this->ln(10);
			$this->Cell(220,0, '2. '.$ts1, 0,0,'C');


			
		}
		function Footer()
		{
$mysqli = new mysqli(HOST,USR,PWD,DB);
$string = $_GET['s'];
$key = 'BornToBeTec321_';
$mail = desencriptarURL($string, $key);
if($mail){
$q = "SELECT id, nombre FROM usuarios WHERE correo = '$mail' ";
$v = $mysqli->query($q);
if($v){
if($v->num_rows > 0){
while ($row = $v->fetch_assoc()) {
$data = $row;
}
$idu = $data['id'];
$full_name = $data['nombre'];
list($n1, $n2, $n3, $n4) = explode(' ', $full_name);

$t = "SELECT talleres.dia, talleres.nombre FROM talleres, usuario_taller WHERE usuario_taller.id_usuario = '$idu' AND usuario_taller.id_taller = talleres.id ORDER BY talleres.dia ASC ";
$vt = $mysqli->query($t);
if($vt){
if($vt->num_rows > 0){
while ($rows = $vt->fetch_assoc()) {
$info[] = $rows;
}
}
$tv1 = $info[0]['nombre'];
$tv2 = $info[1]['nombre'];
$tv3 = $info[2]['nombre'];
$ts1 = $info[3]['nombre'];
}
}
}
}
			$this->SetY(-188);
			$this->SetX(-356);
			$this->Image('./img/instrucciones.png', 8,112,8);
			$this->SetFont('Arial','B',8);
			$this->Cell(0,10,'Instrucciones:',0,0,'C');
			$this->SetY(-185);
			$this->SetX(-193);
			$this->SetFont('Arial','',7);
			$this->Cell(0,10, 'Una vez que presentes tu boleto en el registro, dobla la hoja a la mitad y después de izquierda a derecha para usar el diseño del recuadro de',0,0,'L');
			$this->Ln(3);
			$this->SetX(-193);
			$this->Cell(0,10, 'abajo como gafete por el frente y contar por el reverso con los nombre de los talleres a los que te registraste.', 0,0,'L');

			//Caja_Agenda
			$this->SetY(125);
			$this->SetX(-200);
			$this->SetDrawColor(207,207,207);
			$this->SetLineWidth(1);
			$this->Cell(190, 160, '', 1,0,'B');
			$this->Line(103, 125, 103, 285);

			//Agenda Viernes
			$this->SetX(-295);
			$this->SetFont('Arial','B',20);
			$this->Cell(0,16,'MI AGENDA',0,0,'C');
			$this->Ln(5);
			$this->SetTextColor(207,207,207);
			$this->SetFont('Arial','B',17);
			$this->Cell(90,19,'VIERNES',0,0,'C');
			$this->Ln(20);
			$this->SetFont('Arial','B',10);
			$this->Cell(50,0,'Taller de 16:30 - 17:20',0,0,'C');
			$this->Ln(20);
			$this->Cell(50,0,'Taller de 17:40 - 18:30',0,0,'C');
			$this->Ln(20);
			$this->Cell(80,0,'Cierre primer dia / Cena de 19:40 - 21:00',0,0,'C');
			
			$this->SetY(-141);
			$this->SetX(-305);
			$this->SetTextColor(0,0,0);
			$this->SetFont('Arial','B',11);
			$this->Cell(0,0,'- '.$tv1,0,0,'C');
			$this->Ln(20);
			$this->Cell(77,0,'- '.$tv2,0,0,'C');
			$this->Ln(20);
			$this->Cell(60,0,'- '.$tv3,0,0,'C');

			//Agenda Sabado
			$this->SetX(-201);
			$this->SetTextColor(207,207,207);
			$this->SetFont('Arial','B',17);
			$this->Cell(85,30,'SABADO',0,0,'C');
			$this->Ln(30);
			$this->SetFont('Arial','B',10);
			$this->Cell(50,0,'Taller de 09:00 - 11:30',0,0,'C');
			$this->Ln(30);
			$this->Cell(50,0,'Taller de 11:45 - 14:15',0,0,'C');
			$this->Ln(20);

			$this->SetY(-65);
			$this->SetX(-305);
			$this->SetTextColor(0,0,0);
			$this->SetFont('Arial','B',11);
			$this->Text(17,235,'- '.$ts1);
			//$this->Text(17,240,'Negocios, Ciencias Sociales y Humanidades.');
			$this->Ln(30);
			$this->Text(17,265,'- '.$ts1);
			//$this->Text(17,270,'Nacional de Medicina.');

			//Imagen Gafete
			$this->SetY(-188);
			$this->SetX(-356);
			$this->Image('./img/gafete.png', 105,130,90);

			$this->SetTextColor(26, 89, 184);
			$this->SetFont('Arial','B',24);
			$this->Text(132,195,$n2);
			$this->Text(135,205,$n3);
		}
	}

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);
	$pdf->Output();
?>