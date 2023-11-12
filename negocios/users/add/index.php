<?php


ini_set('display_errors',0);
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

//header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
//header("Access-Control-Allow-Credentials: false");
header('Content-Type: application/json; charset=UTF-8');  

include("../../rds.conf.php"); 
include("../../database.php");

include("../classUser.php");

$data = json_decode(file_get_contents("php://input") );

$token = ""; 
foreach (getallheaders() as $name => $value) {	
   if( strtoupper(   $name ) == "XTOKEN")
       $token =  $value;
   
    if( strtoupper(   $name ) == "IDUSER")
       $idUser =  $value;
      
}
  
$classUser = new classUser( $data, $_SERVER["REQUEST_METHOD"], $_REQUEST );

if( !$idUser ){
	echo $classUser->salve($data,$token);
}else{
	echo $classUser->update($data,$token);
}
?>