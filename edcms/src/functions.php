<?php
//basic query but really short, return results
function query($sql){
	try {
		$db=new db();
		$db=$db->connect();

		$stmt=$db->query($sql);

		if ($stmt->rowCount()>0){
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}else{
			return false;
		}

	}catch (Exception $e){
		echo json_encode(array("error"=>$e->getMessage()));
	}
}

