<font color=darkred size=5>Seu email foi retirado da lista. Obrigado</font>
<?php 


	include("../config.inc");
	
	
$conexao =  mysql_connect( "localhost","negocioslu_user","Isr0704@");

$qry = sprintf("update maillist  set  allowed='N' 	where mail='%s' ",	mysql_real_escape_string($_REQUEST["mail"],$conexao) );	




$result = fMySQL_Connect($qry);


?>