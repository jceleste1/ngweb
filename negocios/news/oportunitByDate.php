<? 
session_start(); 
$nivel = "../";
include("../config.inc");
include("../top.php");




if( $_REQUEST["idEdition"] )
{
	$_SESSION[idEdition] = $_REQUEST["idEdition"];	
	$idEdition = $_REQUEST["idEdition"];
}else{	
	$idEdition = $_SESSION[idEdition]; 
}

if(!$idEdition )
{
	echo "<META HTTP-EQUIV='REFRESH' CONTENT=0;URL=../index2.php>"; 
	exit;
}


$qry = "select subject,dateEdition,matter from newsletters a where   a.idEdition ='".$idEdition."'";	
$result = fMySQL_Connect($qry);	
List( $subject  ,$dateEdition , $matter  )= mysql_fetch_row($result);

$_SESSION[monthsEdition]  =  (int)  substr( $dateEdition , 5,2 );
$_SESSION[yearEdition] =   (int) substr( $dateEdition , 0,4 );



?>

<TABLE cellSpacing=0 cellPadding=0 width=766 align=center border=0 height="500" >
 <TR vAlign=middle>
    <TD align=center>
<?include("blocoSetorMonths.php");?>
	</td>
   </tr>
</table>



<?include("../bottom.php");?>