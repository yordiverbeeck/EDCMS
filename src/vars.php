<?php 
$root="http://localhost:8080";
$imagePath="images/";
defined("ROOT")
	or define("ROOT", realpath(dirname(__FILE__)));

defined("PAGES")
	or define("PAGES", realpath(dirname(__FILE__).'/pages'));

defined("TEMPLATE")
	or define("TEMPLATE", realpath(dirname(__FILE__).'/template'));
