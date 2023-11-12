<?php


header("Content-Type: application/json; charset=UTF-8"); 
//header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: false");

include("../../rds.conf.php");
include("../../database.php");

include("../classUser.php");
 

$data = json_decode(file_get_contents("php://input") );
  
$classUser = new classUser( $data, $_SERVER["REQUEST_METHOD"], $_REQUEST );

echo $classUser->login();
$message = $classUser->login();


?>