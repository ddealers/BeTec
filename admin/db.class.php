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
	protected function _delete( $condition ){
		$r = $this->mysqli->query( "DELETE FROM " . $this->table . "WHERE $condition" );
		return true;
	}
	private function $getError(){
		if($this->mysqli->connect_errno){
			return $mysqli->connect->errno . " :: " . $mysqli->connect->error;
		}
	}
}
