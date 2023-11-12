<style type="text/css">
	#imgpos {
		position:absolute;
		left:41%;
		top:15%;
		margin-left:1px;
		margin-top:20px;
		}
</style>



<div id="divSearch">
<form action="mvcAnnouncement.php" id="formSearch"   METHOD=GET>
<input type=hidden name='action' value="list">
<input type=hidden name='lupa_x' value="1">


	<table   width='95%' cellpadding="3" cellspacing="1" border=0  align='center'>
		<tr>
			<td colspan=4 align=center  class='grayS'><?php echo $searchFilterAd; ?></td>
		</tr>
		<tr>
			<td class="grayS"><?php echo $searchKeyAd; ?></td>
			<td align=left>
				<input type="text" name="txtSearch" id="txtSearch" size=40 value="<?=$_REQUEST[txtSearch]?>" />
			</td>
			<td class="grayS"><?php echo $searchTypeAd; ?></td>
			<td>
				<?php
					$selectedS = " selected ";
					if( $_REQUEST['typeAnManual'] =="B" )
						$selectedB = " selected ";
				?>
				<select name="typeAnManual" id="typeAnManual" style="width:220px;" >
					<option value="S" <?=$selectedS?>><?php echo $searchAdSale; ?></option>
					<option value="B" <?=$selectedB?>><?php echo $searchAdBuyers; ?></option>
				</select>
			</td>
			</tr>

			<tr>		
			<td class="grayS"><?php echo $searchSector ?></td>			
			<td>
			 <Select ID="sector" Name="sector"  style="width:300px;" >
			    <optgroup>
				<option Value=''></option>
				<?php
				reset($aSector);
				while( list( $key,$val ) =each($aSector) ){
					$sel = "";
					if( $key == $_REQUEST["sector"] )
						$sel = " selected";

					echo "<option Value='$key' $sel >$val</option>";
				}
				?>
				</optgroup>
				</Select>
			</td>
			<TD nowrap=nowrap class="grayS"><?php echo $searchActivityCompany; ?> </TD>			
			<td align=left>
			<Select ID="typecompany" Name="typecompany" Size=1 >
				<option Value=''></option>
				<option Value='I' <?=$checkedI?>><?php echo $searchOptionIndustryAd; ?></option>
				<option Value='C' <?=$checkedC?>><?php echo $searchOptionCommerceAd; ?></option>
				<option Value='S' <?=$checkedS?>><?php echo $searchOptionServiceAd; ?></option>
				</Select>
			</td>
			</tr>
			<tr>
			<td class="grayS"><?php echo $searchRevenues; ?></td>			
			<td>  <Select ID="billing" Name="billing" >
				<optgroup>
				<option Value=''></option>
				<?php
				while( list( $key,$val ) =each($aInvestimento) ){
					$sel = "";
					if( $key == $_REQUEST["billing"] )
						$sel = " selected";

					echo "<option Value='$key' $sel>$val</option>";
				}
				?>
				</optgroup>
				</Select>
			</td>
			<td class="grayS">
				<?php echo $searchRegion; ?>
			</td>
			<td> <Select ID="zone" Name="zone" Size=1 >
			    <optgroup>
				<option Value=''></option>
				<?php
				while( list( $key,$val ) =each($aZone) ){
					$sel = "";
					if( $key == $_REQUEST["zone"] )
						$sel = " selected";

					echo "<option Value='$key' $sel>$val</option>";
				}
				?>
				</optgroup>
				</Select>
			</td>
			<?php
				switch( $_REQUEST["typecompany"] ){
						case "I":
							$checkedI = "  selected";
							break;
						case "C":
							$checkedC = "  selected";
							break;
						case "S":
							$checkedS = "  selected";
							break;
						default:
							break;
				}

			?>
			</tr>
			<tr>
			<td  valign=top  align=top colspan=2>
			
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
</td>	<td  valign=top  align=top colspan=2>

					
			</td>

		    </tr>
		</table>
	
</form>

</div>
<img src="../img/search.png"  alt="logo do site Maujor" id="imgpos" />


<form action="mvcAnnouncement.php" id="formSearch2" METHOD=POST>
<input type=hidden name='action' id='action' value='list'/>
<input type=hidden name='txtSearch' id='txtSearch2'/>
<input type=hidden name='sector' id='sector2'/>
<input type=hidden name='typecompany' id='typecompany2'/>
<input type=hidden name='billing' id='billing2'/>
<input type=hidden name='zone' id='zone2'/>
<input type=hidden name='lupa_x' id='lupa_x2'/>
<input type=hidden name='typeAnManual' id='typeAnManual2'/>
</form>

<form action="mvcAnnouncement.php" id="formAnn" METHOD=POST>
<input type=hidden name='action' id='action' value='formAnn'/>
<input type=hidden name='txtSearch' id='txtSearch3'/>
<input type=hidden name='sector' id='sector3'/>
<input type=hidden name='typecompany' id='typecompany3'/>
<input type=hidden name='billing' id='billing3'/>
<input type=hidden name='zone' id='zone3'/>
<input type=hidden name='lupa_x' id='lupa_x3'/>
<input type=hidden name='typeAnManual' id='typeAnManual3'/>
</form>