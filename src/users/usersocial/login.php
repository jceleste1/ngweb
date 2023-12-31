<?php

header('Content-Type: application/json; charset=UTF-8');  
$post = file_get_contents('php://input');
$userInfo = explode("=",$post);
//print_r( $userInfo );
$ch = curl_init();
// set url// create curl resource

curl_setopt($ch, CURLOPT_URL, "http://www.negocioslucrativos.com.br:82/jwt/".base64_encode($userInfo[3]));
//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
// $output contains the output string
$output = curl_exec($ch);
// close curl resource to free up system resources

curl_close($ch);    

$npos =  strpos($output , "_Sucess"); // outputs 6

if( $npos > 0 ){
	
	include("../../rds.conf.php"); 
	include("../../database.php");
	include("../classUser.php");
	
	$manage = json_decode($output, true);
	$user = $manage['user'];
	$phonemobile = "";
	$classUser = new classUser( $data, $_SERVER["REQUEST_METHOD"], $_REQUEST );
	$response = $classUser->socialLogin( $user["email"] ,$user["name"],$phonemobile,"google");
	$userInfo =   $response["user"];
	
	http_response_code(200);  

	session_start();
	
	$_SESSION["nameUser"] = $$userInfo["name"];
	$_SESSION["id"] = $userInfo["id"] ;
	$_SESSION["mail"] =  $userInfo["mail"] ;
	
	header('Location: http://www.negocioslucrativos.com.br/mvcAnnouncement.php?action=home');
	
	
}else{
	http_response_code(403);  
}

?>