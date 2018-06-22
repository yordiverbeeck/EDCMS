<?php
require 'src/init.php';
loginRequired();
try {
	if($_SESSION['userAdmin']!=1){
		throw new Exception("No access!");
	}
	$db=new db();
	$db=$db->connect();
	if($_POST['type']=="text"){
		$textId=$_POST['textId'];
		$textNew=$_POST['textNew'];
		if(empty($textId) OR !is_numeric($textId)){
			throw new Exception("No ID given.");
		}
		if(empty($textNew)){
			throw new Exception("No text entered.");
		}

	    $stmt = $db->prepare("UPDATE field_text SET FTText = :textNew WHERE FTId = :textId");
	    $stmt->bindParam(':textNew', $textNew);
	    $stmt->bindParam(':textId', $textId);

	}elseif($_POST['type']=="image"){
		$imageId=$_POST['imageId'];
		$imageNew=$_POST['imageNew'];
		if(empty($imageId) OR !is_numeric($imageId)){
			throw new Exception("No ID given.");
		}
		if(empty($imageNew)){
			throw new Exception("No image given.");
		}

	    $stmt = $db->prepare("UPDATE field_image SET FIName = :imageNew WHERE FIId = :imageId");
	    $stmt->bindParam(':imageNew', $imageNew);
	    $stmt->bindParam(':imageId', $imageId);
	}

	$stmt->execute();
	if($stmt->affected_rows>=0){
		echo json_encode(array("success"=>"Saved!"));
	}else{
		throw new Exception("Something went wrong.");
	}
	

} catch (Exception $e) {
	echo json_encode(array("error"=>$e->getMessage()));
}