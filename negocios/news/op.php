<? 
session_start(); 
$nivel = "../";
include("../config.inc");
include("../top.php");




$_SESSION[monthsEdition]  = $_REQUEST[m] ;
$_SESSION[yearEdition] =   $_REQUEST[y] ;




?>

<TABLE cellSpacing=0 cellPadding=0 width=766 align=center border=0 height="500" >
 <TR vAlign=middle>
    <TD align=center>
<?include("blocoSetorMonths.php");?>
	</td>
   </tr>
</table>



<?include("../bottom.php");?>