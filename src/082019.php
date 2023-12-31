<?php


header('Content-Type: text/html; charset=ISO-8859-1');



include("rds.conf.php");  
include("config.inc");




$datainc = '2019-08-01';


$qry =   "select a.id,a.title,a.sector,a.typecompany,a.priceselling,a.price, a.datainc from announcement a where ";
$qry .= "  ( a.datainc > '$datainc' ) order by datainc desc";

$result = fMySQL_Connect($qry);	


$rows = mysql_num_rows($result);
if( $rows ){

	
?>


<table width="100%" cellpadding="1" cellspacing="3" border="0" align="center">
<tr><td bgcolor='white' align=left colspan=6><a href='http://www.negocioslucrativos.com.br/mvcphp.php?action=condicao'>
<font color=darkred size=3>Termo de uso</a></td></tr>
<tr>
	<td bgcolor='white' colspan='4' align=center><font color=darkgreen size=3><b>Oportunidades de negócios do agosto de 2019 - www.negocioslucrativos.com.br</b></font></td>
	<td bgcolor='white' colspan='2' align='right'>	&nbsp;

	</td>

	
</tr>

<tr>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Anúncio</font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Setor</font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Atividade da Empresa</font> </td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Valor</font> </td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Data</font> </td>
</tr>

<?php

for ($i=0;$i<$rows;$i++)   {
	 $line=mysql_fetch_assoc($result);
	 $font = "<font color='#24486C'>";
	 $bgcolor = " bgcolor='#FDFDFD'";
	 if( ($i%2)==0)  {
		 $bgcolor = " bgcolor='#E9ECF7'";
	 	 $font = "<font color='#24486C'>";
	 }

	  $price =  $line["priceselling"];
	 if( $line[price] != 0 )
	 {
		 $price =   number_format($line[price], 2, ',', '.'); 
     }

	 $ahref= "<a href=mvcAnnouncement.php?action=viewAnnouncement&id_adv=".$line["id"]."><font color=darkgreen>";

	 echo "<tr height='35 px'>";
	 echo "<td $bgcolor> $ahref ".$line["title"]."</font></a></td>";
	 echo "<td $bgcolor> $ahref ".$aSector[$line["sector"]]."</font></a></td>";
	 echo "<td $bgcolor> $ahref ".$aTypecompany[$line["typecompany"]]."</font></a></td>";
	 echo "<td $bgcolor> $ahref ".$price."</font></a></td>";
	 
	  echo "<td $bgcolor> $ahref ".substr( $line[datainc], 8,2 )."-".substr( $line[datainc], 5,2 )."-".substr( $line[datainc], 0,4 )."</font></a></td>";
	 echo "</tr>";
}
?>

<tr>
	<td colspan='4' bgcolor='white'>&nbsp;</td>
</tr>

</table>

<?php }?>