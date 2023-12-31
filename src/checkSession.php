<?php

if( ! isset($_SESSION["id"])  and isset($CONTROLSESSION)  and  isset($_REQUEST["action"]) != "viewAnnouncement" ){
	$rot = "login.php";
}

?>