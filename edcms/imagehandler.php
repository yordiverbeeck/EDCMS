<?php 
$baseFromJavascript = $_POST['base64'];
$base_to_php = explode(',', $baseFromJavascript);
$data = base64_decode($base_to_php[1]);
$filepath = "../edcms_images/";
$filename=$_POST["imageName"];
//if folder doens't exist, make it
if (!file_exists($filepath)) {
    mkdir($filepath, 0777, true);
}
if(!empty($filename)){
	file_put_contents($filepath.$filename,$data);
	echo json_encode(array(
		'status' => 'ok',
		"url"=>$filepath.$filename
	));
}else{
	echo json_encode(array(
		'status' => 'error'));
}
