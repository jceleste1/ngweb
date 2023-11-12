<?php

error_reporting(1);
//error_reporting(1);
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);


header("Content-Type: application/json; charset=ISO-8859-1"); 
//header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
//header("Access-Control-Allow-Credentials: false");
  


include("../../rds.conf.php");
include("../../database.php");
include("../../commons/classCommons.php");

include("../classAnnouncement.php");
$classAnnouncement = new classAnnouncement();

$data = json_decode(file_get_contents("php://input") );




echo $classAnnouncement->save(  $data  );


?>