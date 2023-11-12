<?php


//error_reporting(0);
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: access");
//header("Access-Control-Allow-Methods: POST");
//Wheader("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json; charset=ISO-8859-1');  


include("../classCommons.php");
 
$data = json_decode(file_get_contents("php://input") );

$classCommons = new classCommons();


echo $classCommons->typeCompany();

?>