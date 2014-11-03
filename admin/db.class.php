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
		$r = $this->mysqli->query( $q );
		if($r){
			while( $row = $r->fetch_object() ){
				$result[] = $row;
			}
			return new MYResult( $result );
		}else{
			return new MYResult( NULL );
		}
	}
	
	protected function _all( $fields ){
		$result = array();
		$r = $this->mysqli->query( "SELECT $fields FROM " . $this->table );
		if($r){
			while( $row = $r->fetch_object() ){
				$result[] = $row;
			}
			return new MYResult( $result );
		}else{
			return new MYResult( NULL );
		}
	}
	
	protected function _where( $fields, $condition ){
		$result = array();
		$r = $this->mysqli->query( "SELECT $fields FROM " . $this->table . " WHERE $condition" );
		if($r){
			while( $row = $r->fetch_object() ){
				$result[] = $row;
			}
			return new MYResult( $result );
		}else{
			return new MYResult( NULL );
		}
	}
	
	protected function _insert( $data ){
		$fields = array();
		foreach ($data as $key => $value) {
			$fields[] = $key;
		}
		$fieldsstr = implode( ', ', $fields);
		$fieldsval = ':' . implode( ', ', $fields);
		$this->mysqli->prepare("INSERT INTO " . $this->table . " ( $fieldsstr, created_at ) value ( $fieldsval, NOW() )");
		$this->mysqli->execute();
	}
	protected function _delete( $condition ){
		$r = $this->mysqli->query( "DELETE FROM " . $this->table . "WHERE $condition" );
		return true;
	}
	private function getError(){
		if($this->mysqli->connect_errno){
			return $mysqli->connect->errno . " :: " . $mysqli->connect->error;
		}
	}
}


/**
* 
*/
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