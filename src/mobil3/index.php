<?php
require_once("config.php");
require_once("header.php");


if( $_POST[logout]){

	$_SESSION["name"] = "";
	$_SESSION["idUser"] = "";
	$_SESSION["mail"] = "";
}


$page = $_POST[page];
if( !$page )
	$page="indexMain";




include( "./$page".".php");

require_once("footer.php");

