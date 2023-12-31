<?

include("config.inc");

$qry = "delete from announcement  where id='".$_REQUEST["ida"]."'";
$result = fMySQL_Connect($qry);	


?>