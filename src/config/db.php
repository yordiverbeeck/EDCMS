<?php 

class db{
	//properties
	private $dbhost = DB_HOST;
	private $dbport = DB_PORT;
	private $dbuser = DB_USER;
	private $dbpass = DB_PASSWORD;
	private $dbname = DB_NAME;
	
	//connect

	public function connect(){
		$conString="mysql:host=$this->dbhost;port=$this->dbport;dbname=$this->dbname;charset=utf8mb4";
		$dbcon= new PDO($conString,$this->dbuser,$this->dbpass);
		$dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $dbcon;
	}
}