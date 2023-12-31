<?php

error_reporting(0);
//error_reporting(1);
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);

//header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: false");
header('Content-Type: application/json; charset=UTF-8');  

include("../commons/classCommons.php");

include("../rds.conf.php");
include("../database.php");
include("classAnnouncement.php");
$classAnnouncement = new classAnnouncement();
$string = "";
$token = "####"; $idU = "";
foreach (getallheaders() as $name => $value) {	
	if( strcmp( "XToken", $name  )   == 0 ){
       $token =  $value;
	}
	if( strcmp( "idUser", $name  )   == 0 ){
         $idU =  $value;
	}

      
}

$data = json_decode(file_get_contents("php://input") );
  
$token = $string;

echo $classAnnouncement->getAnnouncement($_REQUEST["id"] ,$idU,$token );

?>