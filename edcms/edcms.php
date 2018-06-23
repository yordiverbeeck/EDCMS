<?php
include "src/config/config.php";
include "src/config/db.php";

/**
* easyDesignerCMS front end class
*/
class edcms{
	public $var = '';
	private $db;

	public function __construct($database){
		$this->db=$database->connect();
	}

	public function get_text($name){
		//get DB object
		$sql="SELECT `FTText` FROM `field_text` WHERE `FTTitle`='$name'"; //needs prepared statement
		$stmt=$this->db->query($sql);

		if ($stmt->rowCount()>0){
			$return= $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $return[0]["FTText"];
		}else{
			if(SCANDB==true){
				//if scandb is set to true in config.php file
				//-> if the field does not exist, create it!
				$sqlInsert="INSERT INTO `field_text` (FTTitle) VALUES (:title)";
				$stmt=$this->db->prepare($sqlInsert);
				$stmt->bindParam(':title',$name);
				$stmt->execute();
			}
			return "";
		}
		return true;
	}
	public function getText($name){
		return $this->get_text($name);
	}
	public function get($name){
		return $this->get_text($name);
	}

	public function get_image($name){
		//get DB object
		$sql="SELECT `FIName` FROM `field_Image` WHERE `FITitle`='$name'"; //needs prepared statement
		$stmt=$this->db->query($sql);

		if ($stmt->rowCount()>0){
			$return= $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $return[0]["FIName"];
		}else{
			return "";
		}
		return true;
	}
	public function getImage($name){
		return $this->get_image($name);
	}

	private function scan4text($name){

	}
}
// working commands are:
// get_text() OR getText() 
// get_image() OR getImage()

$db=new db();
$cms=new edcms($db);