<?php

include("config.inc");


		$qry = "select count(countmov) from  mobilestat where datamov='".date("Y")."-".date("m")."-".date("d")."' and type=1";

	echo $qry;
	
	
//$query = "DELETE  FROM announcement   WHERE  id =".$_GET["id"];

//$result = fMySQL_Connect($query);	


x

?>