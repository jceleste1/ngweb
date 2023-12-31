<?php

include("../rds.conf.php");
include("../database.php");
include("classContact.php");


$db = new Database();

$qry = "select a.id_user,r.name,r.mail, a.title,a.typeannouncement,r.registration from announcement  a,register r  where a.id=5451 and a.id_user=r.id";
$result = $db->result($qry);	

$dataAnnouncementUser = mysql_fetch_assoc($result);
	echo "resultado >>>>> ".$dataAnnouncementUser["registration"];



		
?>