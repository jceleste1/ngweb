<?php


include("../rds.conf.php");

include("../config.inc");   



$qry = "select id,name,mail from register  where id=5"; 	
$result2 = fMySQL_Connect($qry);
$_rows_ = mysql_num_rows($result2);
for ($i=0;$i<$_rows_;$i++)   {
	$line=mysql_fetch_assoc($result2);


    $hash = $line["id"].$line["name"].$line["mail"] ;

	$hash =  hash('ripemd160', $hash);

    $qry = "update register set hash='$hash'    where id =".$line['id'];
	echo $qry;
	fMySQL_Connect($qry);
					

}

?>
