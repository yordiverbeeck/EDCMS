<?php 
function loginRequired(){

	if(!isset($_SESSION['signedIn']) && $_SESSION['signedIn'] != true){
		header('Location: index.php');
		exit();
	}

}