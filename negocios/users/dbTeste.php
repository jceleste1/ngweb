<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include("../config.inc");
include("../database.php");

$database = new Database();
 $database->getConnection();


$field = " r.name, r.mail,r.phone, r.phonemobile, r.id, r.address, r.numberaddress, r.district, r.zipcode, r.city, r.state, r.password , r.datainc ";
		
	
$qry = "SELECT  ".$field." FROM register  r  limit 0,15";
		
		
$result = $database->result($qry);	
$rows = mysql_num_rows($result);
		

while ($row = mysql_fetch_assoc($result)) {

	echo $row["mail"]."<hr>";


}



?>