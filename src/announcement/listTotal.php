<?php

$to      = 'jceleste1@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



error_reporting(0);
//ini_set('display_errors',1);
//ini_set('display_startup_erros',1);
//error_reporting(E_ALL);
//header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header('Content-Type: application/json; charset=UTF-8');  


$typeAnManual  =  isset($_REQUEST[typeAnManual]) ? $_REQUEST[typeAnManual] : "S" ;
$sector  =   isset($_REQUEST[sector]) ? $_REQUEST[sector] : "" ;
$typecompany  =  isset($_REQUEST[typecompany]) ? $_REQUEST[typecompany] : "" ;
$billing  = isset($_REQUEST[billing]) ? $_REQUEST[billing] : "" ;
$zone  =  isset($_REQUEST[zone]) ? $_REQUEST[zone] : "" ;
$lupa_x  = isset($_REQUEST[lupa_x]) ? $_REQUEST[lupa_x] : "" ;
$txtSearch  = isset($_REQUEST[txtSearch]) ? $_REQUEST[txtSearch] : "" ;
$page  = isset($_REQUEST[page]) ? $_REQUEST[page] : 1 ;

$typeAnManual  = ($typeAnManual != "undefined" ) ? $typeAnManual : "S" ;
$sector  = $sector != "undefined" ? $sector : "" ;
$typecompany  = $typecompany != "undefined"? $typecompany : "" ;
$billing  =  $billing != "undefined"?  $billing : "" ;
$zone  = $zone != "undefined"  ? $zone : "" ;
$txtSearch  = $txtSearch != "undefined"  ? $txtSearch : "" ;


$typeAnManual  = ($typeAnManual != "null" ) ? $typeAnManual : "S" ;
$sector  = $sector != "null" ? $sector : "" ;
$typecompany  = $typecompany != "null"? $typecompany : "" ;
$billing  =  $billing != "null"?  $billing : "" ;
$zone  = $zone != "null"  ? $zone : "" ;
$txtSearch  = $txtSearch != "null"  ? $txtSearch : "" ;


include("../commons/classCommons.php");
include("../classFilter.php");
$filter = new classFilter();


$txtSearch= mb_convert_encoding($txtSearch, "ISO-8859-1");

$qryWhere = $filter->queryFilter(  $typeAnManual,
								   $sector ,
								   $typecompany,
								   $billing ,
								   $zone ,
								   $lupa_x,
								   $txtSearch );
								   
include("../rds.conf.php");  
include("../database.php");
include("classAnnouncement.php");



$data = json_decode(file_get_contents("php://input") );

$classAnnouncement = new classAnnouncement();

echo $classAnnouncement->lists( $qryWhere, $page,  30 );
?>