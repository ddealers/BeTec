<?php
require_once('db.class.php');
class Lugares extends MyDB{ 
	var $mydb = NULL;

	public function __construct(){
		parent::__construct();
	}
	public function talleres($horario){
		switch ($horario) {
			case 1:
				return $this->_custom("SELECT * FROM talleres WHERE dia=1")->get();
				break;
			case 2:
			case 3:
				return $this->_custom("SELECT * FROM talleres WHERE id != 46 AND dia=1")->get();
			default:
				return $this->_custom("SELECT * FROM talleres WHERE dia=2")->get();
				break;
		}
			
	}
	public function getTotal($id_taller, $horario_taller){
		return $this->_custom("SELECT * FROM usuario_taller WHERE id_taller = $id_taller AND horario_taller=$horario_taller")->count();
	}
};

$l = new Lugares();
for ($i=1; $i <= 5; $i++) { 
	switch($i){
		case 1:
		echo "<h5>Taller Viernes de 16:30 a 17:20</h5>";
		break;
		case 2:
		echo "<h5>Taller Viernes de 17:40 a 18:30</h5>";
		break;
		case 3:
		echo "<h5>Taller Viernes de 18:40 a 19:30</h5>";
		break;
		case 4:
		echo "<h5>Taller Sábado de 9:00 a 11:30</h5>";
		break;
		case 5:
		echo "<h5>Taller Sábado de 11:45 a 14:15</h5>";
		break;
	}
	
	echo "<table>";
	foreach ($l->talleres($i) as $key => $value) {
		echo "<tr>";
		echo "<td>" . $value->nombre . "</td>" . "<td>" . $l->getTotal($value->id, $i) . "</td>";
		echo "</tr>";
	}
	echo "</table>";
}