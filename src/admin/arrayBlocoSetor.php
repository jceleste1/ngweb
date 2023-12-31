<?
include_once("../config.inc");

$qry = "select count(*) count,sector  from announcement  group by sector";
$result = fMySQL_Connect($qry);	
$rows = mysql_num_rows($result);
$aResultSector = array();

for ($i=0;$i<$rows;$i++)   {
	  $line=mysql_fetch_assoc($result);
	  
	  $aResultSector[] = array( $line["sector"],$line["count"] );
	  $total +=  $line["count"];
}


$fp = fopen('../countSector.txt', 'w');
while( list( $key,$val ) = each($aResultSector) ){
	$string .=  "$val[0] => $val[1],";
}

$string=substr($string, 0, strlen($string)-1);

fwrite($fp, $string);
fclose($fp);


$fp = fopen('../total.txt', 'w');
fwrite($fp, $total);
fclose($fp);

$handle = fopen('../countSector.txt', "rb");

while (!feof($handle)) {
  $array .= fread($handle, 8192);
  
}

fclose($handle);

$aResultSector = explode(",",$array);
reset($aResultSector);
while( list( $key,$val ) = each($aResultSector) ){
  
	$value = explode("=>",$val);
	echo "Sector $value[0] result $value[1]<br>";
}


?>