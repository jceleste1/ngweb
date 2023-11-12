<?php


ini_set('display_errors',0);
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json; charset=UTF-8');  

include("../../rds.conf.php"); 
include("../../database.php");

include("../classUser.php");
 
// $data = json_decode(file_get_contents("php://input") );

$mail = $_REQUEST["mail"];
$name = $_REQUEST["name"];
$phonemobile = "";

  
$classUser = new classUser( $data, $_SERVER["REQUEST_METHOD"], $_REQUEST );
$response = $classUser->socialLogin($mail,$name,$phonemobile,"google");
$return =  $response["return"];

if ( $return["code"] == "01" ) {
	session_start();

	header("Expires: -1");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	
	$user =   $response["user"];
	$_SESSION["nameUser"] = $user["name"] ;
	$_SESSION["id"] = $user["id"] ;
	$_SESSION["mail"] =  $user["mail"] ;
}

echo json_encode(  $response, JSON_PRETTY_PRINT );

?>