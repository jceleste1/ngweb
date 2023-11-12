<?php


//error_reporting(0);
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

//header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");
//header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json; charset=UTF-8');  


include("../classCommons.php");
 
$data = json_decode(file_get_contents("php://input") );

$classCommons = new classCommons();


echo $classCommons->zone();

?>