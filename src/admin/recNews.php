<?php


$dateEdition = substr( $_POST["calendar"] ,6,4 )."-".substr( $_POST["calendar"] ,3,2)."-".substr( $_POST["calendar"] ,0,2 );



if( !$_POST[idEdition] )
{
	$qry = "insert into newsletters (subject ,  dateEdition ,  dtSend ,  matter,status ) values(\"".$_POST["subject"]."\",";
	$qry .= " '$dateEdition', now(),   \"".$_POST["editor"]."\",'P' )";
	fMySQL_Connect($qry);
	$idEdition =  mysql_insert_id();
}else {
	
	
	$qry = "update newsletters set subject= \"".$_POST["subject"]."\" ,";
	$qry .= " dateEdition ='$dateEdition',  matter = \"".$_POST["editor"]."\", ";
	$qry .= " status='P' where  idEdition=".$_POST[idEdition];
	fMySQL_Connect($qry);
	
}






?>



<META HTTP-EQUIV='REFRESH' CONTENT=0;URL='index.php?rot=listNews'>
