<?php
class database extends mysqli{
	private $server="127.0.0.1";
	private $username="twitter";
	private $password="K0OMT4lftY5Ue7ki";
	private $db;
	private $table;
	public $conn;
	
	function __construct($db){
    	$this->db = $db;
		$this->conn = mysqli_connect($this->server, $this->username, $this->password, $db);
		mysqli_query($this->conn, 'set names utf8');
  	}
	public function db($db_name){
		$this-> db = $db_name;
	}
	public function table($tb_name){
		$this-> table = $tb_name;
	}
	public function select_all(){
		$sql = "SELECT * FROM ".$this->table."";
		return mysqli_query($this->conn, $sql);
	}
    public function select_all_order($order){
		$sql = "SELECT * FROM ".$this->table." ORDER BY ".$order."";
		return mysqli_query($this->conn, $sql);
	}
	public function select_order($select,$order){
		$sql = "SELECT ".$select." FROM ".$this->table." ORDER BY ".$order."";
		return mysqli_query($this->conn, $sql);
	}
	public function select($select){
		$sql = "SELECT ".$select." FROM ".$this->table."";
		return mysqli_query($this->conn, $sql);
	}
	public function select_where($select, $where){
        if($select == 0){
            $select = '*';
        }
		$sql = "SELECT ".$select." FROM ".$this->table." WHERE ".$where." ";
        return mysqli_query($this->conn, $sql);
	}
	public function select_where_order($select, $where, $order){
        if($select == 0){
            $select = '*';
        }
		$sql = "SELECT ".$select." FROM ".$this->table." WHERE ".$where." ORDER BY ".$order."";
        return mysqli_query($this->conn, $sql);
	}
	public function insert($columns, $values){
		$sql = "INSERT INTO ".$this->table." (".$columns.") VALUES (".$values.")";
		return mysqli_query($this->conn, $sql);
	}
	public function update($set, $where){
		$sql = "UPDATE ".$this->table." SET ".$set." WHERE ".$where."";
		return mysqli_query($this->conn, $sql);
	}
	public function delete($where){
		$sql = "DELETE FROM ".$this->table." WHERE ".$where."";
		return mysqli_query($this->conn, $sql);
	}
	public function clear(){
		$sql = "DELETE FROM ".$this->table."";
		return mysqli_query($this->conn, $sql);
	}
	public function seq_reset(){
		$sql = "ALTER TABLE ".$this->table." AUTO_INCREMENT = 1";
		return mysqli_query($this->conn, $sql);
	}
	public function exist(){
		$sql = "SELECT * FROM ".$this->table."";
		$result = mysqli_query($this->conn, $sql);
		if($result){
			return 1;
		}else{
			return 0;
		}
	}
	public function error(){
		echo mysqli_error($this->conn);
	}
	public function status(){
		echo 'server: '.$this->server.'<br>';
		echo 'username: '.$this->username.'<br>';
		echo 'password: '.$this->password.'<br>';
		echo 'database: '.$this->db.'<br>';
		echo 'table: '.$this->table.'<br>';
	}
}
?>