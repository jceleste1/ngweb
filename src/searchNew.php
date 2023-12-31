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
				<input type="text" name="txtSearch" id="txtSearch" size=40 value="<?php echo $_REQUEST[txtSearch];  ?>" />
			</td>
			<td class="grayS"><?php echo $searchTypeAd; ?></td>
			<td>
				<?php
					$selectedS = " selected ";
					if( $_REQUEST['typeAnManual'] =="B" )
						$selectedB = " selected ";
				?>
				<select name="typeAnManual" id="typeAnManual" style="width:220px;" >
					<option value="S" <?php echo $selectedS; ?>><?php echo $searchAdSale; ?></option>
					<option value="B" <?php echo $selectedB; ?>><?php echo $searchAdBuyers; ?></option>
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
				$aSector = $classCommons->aSector();				
				reset ($aSector);
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
				<option Value='I' <?php echo $checkedI; ?>><?php echo $searchOptionIndustryAd; ?></option>
				<option Value='C' <?php echo $checkedC; ?>><?php echo $searchOptionCommerceAd; ?></option>
				<option Value='S' <?php echo $checkedS; ?>><?php echo $searchOptionServiceAd; ?></option>
				</Select>
			</td>
			</tr>
			<tr>
			<td class="grayS"><?php echo $searchRevenues; ?></td>			
			<td>  <Select ID="billing" Name="billing" >
				<optgroup>
				<option Value=''></option>
				<?php
				$aInvestimento = $classCommons->aBilling();	
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
				$aZone = $classCommons->aZone();	
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
			
			
</td>	<td  valign=top  align=top colspan=2>

					<input type=submit   class="button"  value='Pesquisar'>
			</td>

		    </tr>
		</table>
	
</form>

</div>

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
