<?php 
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	include_once(TEMPLATE.'/loginPage.php');
	exit();

}else{
	if(empty($_POST['username']) OR empty($_POST['password'])){
		$errors[]="Please fill in both fields.";

		include_once(TEMPLATE.'/loginPage.php');
		exit();
	}else{
		$username=$_POST['username'];
		$password=$_POST['password'];
		if(preg_match('/[^a-z0-9]/i', $username)){
			$errors[]="Invalid username.";
		};
		if(preg_match('/[^a-z0-9]\.\-\!\@/i', $password)){
			$errors[]="Invalid password.";
		};
		//$passwordC=md5($password);

		try{
			$db=new db();
			$db=$db->connect();

			$sql = "SELECT `userId`,`userName`,`userAdmin` FROM `users`
				WHERE `userName` =:userName
				AND `userPass` = :userPass";

			$stmt=$db->prepare($sql);

			$stmt->bindParam(":userName",$username);
			$stmt->bindParam(":userPass",$password);
			
			$stmt->execute();
			if ($stmt->rowCount()==0){
				$errors[]="Wrong username or password.";
				include_once(TEMPLATE.'/loginPage.php');
				exit();
			}else{
				$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
				$result=$result[0];
				$_SESSION['signedIn'] = true;
				$_SESSION['userId'] 	= $result['userId'];
				$_SESSION['userName'] 	= $result['userName'];
				$_SESSION['userAdmin'] 	= $result['userAdmin'];

				header('Location: index.php');
			}
		} catch (PDOException $e){
			$errors[]=$e->getMessage();
		} catch (Exception $e){
			$errors[]=$e->getMessage();
		}
		
	}

}
