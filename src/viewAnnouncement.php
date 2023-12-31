  <?php
	   if( $dataAnnouncement["$typeannouncement"] == "B" ){
		   $labelZone = "Local de preferência ";
		   $labelCondition = $viewAnnouncementConditionsPurchase;
		}else{
 		   $labelZone = "Local da empresa";
   		   $labelCondition = $viewAnnouncementParticipationCompany;
        }


		$price = $dataAnnouncement["priceselling"];
	    if( $dataAnnouncement[price] != 0 )
		{
				 $price =   number_format($dataAnnouncement[price], 2, ',', '.');
        }
		
?>
 <table cellpadding="1" cellspacing="5" border="0" align="center" width='95%' bgcolor='white'>
  <tr>
	<td bgcolor='white' colspan='4' align="center">
	
				<script type="text/javascript"><!--
		google_ad_client = "pub-3882370773203656";
		google_ad_width = 468;
		google_ad_height = 60;
		google_ad_format = "468x60_as";
		google_ad_type = "text_image";
		google_ad_channel = "";
		//-->
		</script>
		<script type="text/javascript"
		  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>

	
	

			<a href="#" onclick="javascript:submitFormSearch()"><img src='img/search.jpg' border=0></a>

			</td>

 </tr>
 
</table>


				
<?php if( $_SESSION["id"] ){

		include("classPayPerView.php");
		$classPayPerView = new classPayPerView();
		$classPayPerView->debit( $_SESSION["id"],$_REQUEST["id_adv"],"0" );

?>


 <table cellpadding="1" cellspacing="3" border="0" align="center" width='95%' bgcolor='white'>
 <tr><td width='90%'>

  <table cellpadding="1" cellspacing="3" border="0" align="center" width='100%' height='100%'  >
   <tr>
	   <td colspan=2>&nbsp;</td>
   </tr>

	<tr>
		<td align="center" colspan=2 class="gray"><?php echo $dataAnnouncement["title"]; ?></td>
	</tr>

	<TR>
		<TD  class="gray" width='140px'><?php echo $viewAnnouncementActivityCompany; ?></TD>
		<td  class="gray">
		<?php
		$aTypecompany = $classCommons->aTypecompany();	
		echo  $aTypecompany[ $dataAnnouncement["typecompany"] ];
		?>
		</td>
	</tr>

<tr>
	<td class="grayS">
		<?php echo $viewAnnouncementSector; ?>
	</td>
	<td class="grayS">
		<?php
		$aSector = $classCommons->aSector();	
		echo $aSector[$dataAnnouncement["sector"]];
		?>
	</td>
</tr>

<tr>
	<td  class="gray">
		<?php echo $viewAnnouncementRevenue; ?>
	</td>
	<td  class="gray">
		<?php
		$aBilling = $classCommons->aBilling();	
		echo $aBilling[ $dataAnnouncement["billing"] ];
		
		?>
		</Select>
	</td>
</tr>

<tr>
	<td class="grayS">
		<?php echo $viewAnnouncementRegion;  ?>
	</td>
	<td class="grayS">
		<?php
		$zone = $classCommons->aZone();	
		echo $zone[$dataAnnouncement["zone"]];
		
		?>
	</td>
</tr>


<TR>
	<TD   class="gray">
		<?php echo $viewAnnouncementDescription; ?>
	</TD>
	<TD  class="gray">
		<?php echo ereg_replace ("\n", "<br>",$dataAnnouncement["description"]);?>
	</TD>
</TR>




<tr>
	<td  class="grayS"><?php echo $viewAnnouncementPriceSale; ?></td>
	<td class="grayS"><?php echo $price; ?></td>
</tr>

<tr>
	<td  class="gray"><?php echo $viewAnnouncementNumberEmployee; ?></td>
	<td    class="gray"><?php  echo $dataAnnouncement["numberemployee"];?></td>
</tr>

<tr>
	<td class="grayS"><?php echo $labelCondition; ?></td>
	<td class="grayS">
		<?php echo ereg_replace ("\n", "<br>",$dataAnnouncement["conditionpart"] );?>
	</td>
</tr>


<?php if( $dataAnnouncement["confidencial"] != "N"   &&  $_SESSION["id"] ) { ?>

	<?php if( $dataAnnouncement["www"]  ) {?>
		<TR>
			<TD   class="gray">
				<?php echo $viewAnnouncementSiteCompany; ?>
			</TD>
			<TD  class="gray"><a href="<?php echo $http.$dataAnnouncement["www"];?>" target=_blank><?php echo $dataAnnouncement["www"]; ?></a>
			</TD>
		</TR>
	<?php } ?>

<tr>
	<td colspan=2 bgcolor='darkgreen' align=center><font color=white><?php echo $viewAnnouncementDataAdvertiser; ?></font></td>
</tr>


<tr>
   <td  class="gray"><?php echo $viewAnnouncementNameAdvertiser; ?></td>
	<td  class="gray">
		<?php echo $dataAnnouncement["name"]?>
	</td>
</tr>

<tr>
	<td class="grayS"><?php echo $viewAnnouncementPhone; ?></td>
	<td class="grayS">
		<?php echo $dataAnnouncement["phone"]?>
	</td>
</tr>


<tr>
	<td  class="gray"><?php echo $viewAnnouncementMobile; ?></td>
	<td  class="gray">
		<?php echo $dataAnnouncement["phonemobile"]; ?>
	</td>
</tr>

<?php } ?>

</TABLE>

</td></tr>

<tr><td colspan=2 align=center class="gray"><?php echo $dataAnnouncement["youtubelink"]; ?></td></tr>


</TABLE>

	
<?php
}





if(  $_SESSION["id"]  )
	include("contactEntrepreneur.php");
else{

	echo "<table cellpadding=\"1\" cellspacing=\"3\" border=\"0\" align=\"center\" width='90%' >";
	echo "<tr><td colspan=2  align=center><b><font color=darkgreen face=verdana>  $viewAnnouncementMsgtoLogin </font></b></td>	</tr>";
	echo "</table>";
    include("login.php");
}

?>
<br><br>

<form action="mvcAnnouncement.php" id="formSearch3" METHOD=GET>
<input type=hidden name='action' id='action' value='list'/>
<input type=hidden name='typeAnManual' id='typeAnManual' value='S'/>
</form>


<script>
function  submitFormSearch(){
	document.getElementById('formSearch3').submit();
}
</script>


