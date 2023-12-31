<?php
session_start(); 
$nivel = "../";
include("../rds.conf.php");
   
include("../config.inc");
include("../top.php");


if( $_SESSION["id"]  != 5 ) {
     echo  "<center><font color=darkred size=5><b> ACESSO NEGADO !!! </font></center>";
     exit;	 
}
	
	

?>

<TABLE cellSpacing=0 cellPadding=0 width=766 align=center border=0 height="500" >
 <TR vAlign=top>
    <TD align=center>
<?php

    $rot =  $_REQUEST[rot];
	if(!$rot)
	    $rot =  "listNews";

		include($rot.".php");
?>
	</td>
   </tr>
</table>



<?php include("../bottom.php");?>