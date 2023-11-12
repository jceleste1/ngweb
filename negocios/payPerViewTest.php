<?php


// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

include("config.inc");
include("classPayPerView.php");

  
$classPayPerView = new classPayPerView();

$classPayPerView->salve("1","1","3");

$classPayPerView->debit( "5","0","0" );


$balance =  $classPayPerView->getBalance( 5 );
echo "Saldo -> ". $balance["credit"];





?>