<?php 
include_once("src/init.php");

if(isset($_SESSION['signedIn']) && $_SESSION['signedIn'] == true){
	include_once('main.php');
}else{
	include_once(PAGES.'/login.php');
}
