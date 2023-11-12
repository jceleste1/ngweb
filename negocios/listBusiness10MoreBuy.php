
<?php


$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,a.price  from announcement a where typeannouncement='B' order by viewcount DESC limit 0,20 ";
$result = fMySQL_Connect($qry);	
$rows = mysql_num_rows($result);
if( $rows ){

	
?>

<table width="100%" cellpadding="1" cellspacing="3" border="0" align="center">

<tr>
	<td bgcolor='white' colspan='4' align=center  class='grayS'><font color=darkgreen size=3><b><?php echo  $titleListInvestors; ?></font></td>
	<td bgcolor='white' colspan='2' align='right'>	&nbsp;

	</td>

	
</tr>

<tr>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328"><?php echo $subTitleAd; ?></font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328"><?php echo $subTitleSector; ?></font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328"><?php echo $subTitleCompanyAd; ?></font> </td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328"><?php echo $subTitlePriceInvestmentAd; ?></font> </td>
</tr>

<?php
$aSector = $classCommons->aSector();		
$aTypecompany =  $classCommons->aTypecompany() ;
for ($i=0;$i<$rows;$i++)   {
	 $line=mysql_fetch_assoc($result);
	 
	  $font = "<font color='darkgreen'>";
	 $bgcolor = " bgcolor='#FDFDFD'";
	 if( ($i%2)==0)  {
		 $bgcolor = " bgcolor='#E9ECF7'";
		 $font = "<font color='darkgreen'>";
	 }
	 
	 

	  $price =  $line["priceselling"];
	  if( $line[price] != 0 )
	  {
			 $price =   number_format($line[price], 2, ',', '.'); 
	  }
	  

	  if( $_SESSION["id"] ){
		  	 $ahref= "<a href=mvcAnnouncement.php?action=viewAnnouncement&id_adv=".$line["id"].">";
	  }else{
			$ahref= "<a href=logins.php>";
	  }



	 echo "<tr height='35 px'>";
	 echo "<td $bgcolor> $ahref $font ".$line["title"]."</font></a></td>";
	 echo "<td $bgcolor> $ahref $font ".$aSector[$line["sector"]]."</font></a></td>";
	 echo "<td $bgcolor> $ahref $font ".$aTypecompany[$line["typecompany"]]."</font></a></td>";
	 echo "<td $bgcolor> $ahref $font ".$price."</font></a></td>";
	 echo "</tr>";
}
?>

<tr>
	<td colspan='4' bgcolor='white'>&nbsp;</td>
</tr>

</table>

<?php }?>

