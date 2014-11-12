<?
require_once('config.php');

class MYDB{
	private $mysqli;
	protected $table;
	
	protected function __construct(){
		$this->mysqli = new mysqli(HOST,USR,PWD,DB);
		$this->getError();
	}
	
	protected function _custom( $q ){
		$result = array();
		$this->mysqli = new mysqli(HOST,USR,PWD,DB);
		$r = $this->mysqli->query( $q );
		
		if(isset($this->mysqli->insert_id) && $this->mysqli->insert_id > 0){
			return new MYResult($this->mysqli->insert_id);
		}elseif($r && $r !== TRUE){
			while( $row = $r->fetch_object() ){
				$result[] = $row;
			}
			return new MYResult( $result );
		}else{
			return new MYResult( NULL );
		}
		$this->mysqli->close();
	}
	
	protected function _all( $fields, $order = NULL ){
		$result = array();
		$this->mysqli = new mysqli(HOST,USR,PWD,DB);
		$r = $this->mysqli->query( "SELECT $fields FROM " . $this->table . " " . $order );
		if($r){
			while( $row = $r->fetch_object() ){
				$result[] = $row;
			}
			return new MYResult( $result );
		}else{
			return new MYResult( NULL );
		}
		$this->mysqli->close();
	}
	
	protected function _where( $fields, $condition ){
		$result = array();
		$this->mysqli = new mysqli(HOST,USR,PWD,DB);
		$r = $this->mysqli->query( "SELECT $fields FROM " . $this->table . " WHERE $condition" );
		if($r){
			while( $row = $r->fetch_object() ){
				$result[] = $row;
			}
			return new MYResult( $result );
		}else{
			return new MYResult( NULL );
		}
		$this->mysqli->close();
	}
	
	protected function _insert( $data ){
		$fields = array();
		$values = array();
		$this->mysqli = new mysqli(HOST,USR,PWD,DB);
		foreach ($data as $key => $value) {
			$fields[] = $key;
			$values[] = "'$value'";
		}
		$fieldsstr = implode( ', ', $fields);
		$fieldsval = implode( ', ', $values);
		$r = $this->mysqli->query( "INSERT INTO " . $this->table . " ( $fieldsstr ) VALUES ( $fieldsval )" );
		return $this->mysqli->insert_id;
		$this->mysqli->close();
	}
	protected function _update( $data, $condition ){
		$fields = array();
		$values = array();
		$this->mysqli = new mysqli(HOST,USR,PWD,DB);
		foreach($data as $key=>$value){
			$fields[] = "$key = '$value'";
		}
		$fieldsstr = implode( ', ', $fields );
		$r = $this->mysqli->query( "UPDATE " . $this->table . " SET $fieldsstr WHERE $condition" );
		return $this->mysqli->affected_rows;
		$this->mysqli->close();
	}
	protected function _delete( $condition ){
		$this->mysqli = new mysqli(HOST,USR,PWD,DB);
		$r = $this->mysqli->query( "DELETE FROM " . $this->table . " WHERE $condition" );
		return true;
		$this->mysqli->close();
	}
	private function getError(){
		if($this->mysqli->connect_errno){
			return $mysqli->connect->errno . " :: " . $mysqli->connect->error;
		}
	}
}

class MYResult 
{
	private $result;
	
	function __construct($result)
	{
		$this->result = $result;
	}

	public function get(){
		return $this->result;
	}


	public function first(){
		if($this->count() > 0) return $this->result[0];
		else return false;
	}

	public function count(){
		return count($this->result);
	}

	public function average($field){
		$total = 0;
		foreach ($this->result as $value) {
			$total += $value->field;
			if($this->count()<= 0){
				return 0;
			}
		}
		return $total/$this->count();
	}

}

?>