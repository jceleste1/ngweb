<? 

$nivel = "../";
include("../config.inc");

$qry = "SELECT count( name ) , name, count( mail ) , mail FROM register  GROUP BY mail";
$result = fMySQL_Connect($qry);
while(	$dataAnnouncement = mysql_fetch_array( $result )  )
{
	$stringData  .= $dataAnnouncement[name]." | ".$dataAnnouncement["mail"] ."\n";
}

$myFile = "/var/www/virtual/brasilforte.com.br/www_negocioslucrativos_com/htdocs/readers.txt";

$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $stringData);
fclose($fh);

?>