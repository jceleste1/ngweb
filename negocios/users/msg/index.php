<?php


ini_set('display_errors',0);
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

//header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: *");
header('Content-Type: application/json; charset=UTF-8');  

include("../../rds.conf.php"); 
include("../../database.php");
include("../classUser.php");

$payload = json_decode(file_get_contents("php://input") );
  
$classUser = new classUser( $data, $_SERVER["REQUEST_METHOD"], $_REQUEST );


$token = "####"; $idU = "";
foreach (getallheaders() as $name => $value) {	
	if(  strtoupper( $name ) == "XTOKEN")
	   $token =  $value;
	if( strtoupper(   $name ) == "IDUSER")
	   $idU =  $value;
   
    $alerta .= " - NAME  $name -  VALOR  $value"; 
}


echo $classUser->getMessage($idU,$token);
?>