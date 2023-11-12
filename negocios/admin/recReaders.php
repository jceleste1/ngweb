<? 


$qry = "TRUNCATE TABLE newsreader";
fMySQL_Connect($qry);


$qry = "SELECT count( name ) , name, count( mail ) , mail,id  FROM register  GROUP BY mail LIMIT 0 , 1";
$result = fMySQL_Connect($qry);
while(	$data = mysql_fetch_array( $result )  )
{
	$qry = "insert into newsreader ( nome,mail,send, id ) values (\"".$data[name]."\",\"".$data['mail']."\",'N','$data[id]' )";
	fMySQL_Connect($qry);	
}

$qry = "select count(*) send from newsreader";
$result = fMySQL_Connect($qry);	
$send = mysql_num_rows($result);

$qry = "update  newsletters set  send=$send     where idEdition=$idEdition";
fMySQL_Connect($qry);


?>
