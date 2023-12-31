<script type="text/javascript" src="js/validAnnouncement.js"></script>
<table   width='100%' cellpadding="5px" cellspacing="0" ID="alter" align='center'>					

	<form action='mvcAnnouncement.php' method='post' name='form'  enctype="multipart/form-data" onsubmit="return valid(this)">
	<input type=hidden name='action' value="<?php echo $action?>">
	<input type=hidden name='typeannouncement' value="<?php echo $typeannouncement?>">
	<input type=hidden name='id_adv' value="<?php echo $_REQUEST["id_adv"]?>">


	<TR  class="dif">
	   <td colspan=2 align='center'><font class='subtitulo3'>Preencha o formulário abaixo, para cadastrar seu anúncio de
	   <?php
	   if( $dataAnnouncement["typeannouncement"] == "B" ){ 
	       echo "<b>  compra de empresas</b>";
		   $labelZone = "Local de preferência ";
		   $labelCondition = "Condições para a compra";
		   $labelPriceSelling = "Preço de compra ";
		}else{
   	       echo "<b>  venda de empresa</b>";	   
 		   $labelZone = "Local da empresa";
   		   $labelCondition = "Condições de Venda ou de  Participação na Empresa ";
  		   $labelPriceSelling = "Preço de Venda ";
        }

		  $price =  $dataAnnouncement["priceselling"];
		  if( $line[price] != 0 )
		  {
				 $price =   number_format($dataAnnouncement[price], 2, ',', '.'); 
		  }




	   ?></font></td>
   </tr>





	<TR  class="dif">
	   <td colspan=2>&nbsp;</td>
   </tr>		

	<tr>
		<td align="center">Titulo do anúncio</td>		
		<td><input type='text' name='title' size='60' MAXLENGTH ="70" value="<?php echo $dataAnnouncement["title"]?>"></td>
	</tr>

	<TR> 
		<TD  class="gray">Atividade da Empresa </TD>
		<td  class="gray">
		<?php
			switch( $dataAnnouncement["typecompany"] ){
				case "I":
					$checkedI = "  Checked";
					break;
				case "C":
					$checkedC = "  Checked";
					break;
				case "S":
					$checkedS = "  Checked";
					break;
				default:
					$checkedI = "  Checked";
					break;
			}



		
		?>

			<input type='radio' name='typecompany' value='I' <?php echo $checkedI?>>Indústria<br>
			<input type='radio' name='typecompany' value='C' <?php echo $checkedC?> >Comércio<br>
			<input type='radio' name='typecompany' value='S'  <?php echo $checkedS?>>Serviço<br>
		</td>
	</tr>

<tr>
	<td>
		Setor
	</td>
	<td><Select ID=0 Name="sector" Size=1>
		<option Value=''></option>
		<?php
		
		$aSector = $classCommons->aSector();
		while( list( $key,$val ) =each($aSector) ){
			$sel = "";	
			if( $key == $dataAnnouncement["sector"] )
				$sel = " selected";	

			echo "<option Value='$key' $sel >$val</option>";
			
		}	
		?>
		</Select>
	</td>
</tr>
<tr> 
	<td  class="gray">
		Faturamento Anual Bruto
	</td>
	<td  class="gray"> <Select ID=0 Name="billing" Size=1>
		<option Value=''></option>
		<?php
		
		$aBilling = $classCommons->aBilling();	
		while( list( $key,$val ) =each($aBilling) ){
			$sel = "";	
			if( $key == $dataAnnouncement["billing"] )
				$sel = " selected";	

			echo "<option Value='$key' $sel>$val</option>";
			
		}	
		?>
		</Select>
	</td>
</tr>

<tr> 
	<td>
		<?php echo $labelZone; ?>
	</td>
	<td > <Select ID=0 Name="zone" Size=1>
		<option Value=''></option>
		<?php
		$aZone = $classCommons->aZone();	
		while( list( $key,$val ) =each($aZone) ){
			$sel = "";	
			if( $key == $dataAnnouncement["zone"] )
				$sel = " selected";	

			echo "<option Value='$key' $sel>$val</option>";
			
		}	
		?>
		</Select>
	</td>
</tr>




<TR>
	<TD   class="gray">
		Descrição :
	</TD>		
	<TD  class="gray">			
		<TEXTAREA COLS='90' ROWS='11' WRAP='hard' NAME='description'><?php echo $dataAnnouncement["description"]?></TEXTAREA>
		<br><font color=darkred face=verdana size=1><b>Atenção :</b> Não coloque dados de telefone ou email neste campo, caso isso ocorra seu
		anúncio não será publicado.</font>
	</TD>
</TR>


<tr>
	<td align="center" >Site da empresa http://</td>		
	<td><input type='text' name='www' size='40' value="<?php echo $dataAnnouncement["www"]?>"></td>
</tr>


<tr>
	<td align="center"   class="gray"><?php echo $labelPriceSelling?></td>		
	<td   class="gray">

		<input type=text name='priceselling'  value="<?php echo $price?>" onKeyPress="return(formataMoeda(this,'.',',',event));">
		
	</td>
</tr>

<tr>
	<td align="center" >Número de Funcionários</td>		
	<td><input type='text' name='numberemployee' size='40' value="<?php echo $dataAnnouncement["numberemployee"]?>"></td>
</tr>

<tr>
	<td align="center" class="gray"><?php echo $labelCondition?></td>		
	<td class="gray">	
	<TEXTAREA COLS='90' ROWS='11' WRAP='hard' NAME='conditionpart'><?php echo $dataAnnouncement["conditionpart"]?></TEXTAREA>
	</td>
</tr>

<?php



$checkedN = " checked";
if( $dataAnnouncement["confidencial"]  == "S" ){
	$checkedS = " checked";
	$checkedN = "";
}

?>

<tr>
	<td align="center">Deixar visivel nome e telefone</td>		
	<td><input type='radio' name='confidencial' value="S" <?php echo $checkedS?>>Sim &nbsp;&nbsp;&nbsp;&nbsp; Não<input type='radio' name='confidencial'  value="N" <?php echo $checkedN?>></td>
</tr>


<tr>
	<td align="center" class="gray"><IMG  alt="Negócios Lucrativos" src="img/youtube.png" border=0><br>Incorpore o video do seu empreendimento que está youtube, preenchendo o campo ao lado.
	  <br><a href="https://www.youtube.com/watch?v=O0vM-I9Tf9k" target="blank"><font color=darkred size=1><b>Clique aqui, para saber como fazer isso.</font></a>
	  
	</td>		
	<td class="gray">	
	<TEXTAREA COLS='90' ROWS='5' WRAP='hard' NAME='youtubelink'><?php echo $dataAnnouncement["youtubelink"]?></TEXTAREA>
	</td>
</tr>
<tr><td align="center"></td></tr>

<tr> 
	<td colspan=2  align='center' class="gray">
	  <table>
		  <tr>
			  <td><input type='submit' name=btBack  value='<< Voltar' onclick="javascript:form.action.value='backHome'"> </td>
			  <td><input type='submit' name=btSend value='Enviar >>'></td>
		  </tr>
	  </table>
	</td>
 </tr>
</form>



</center>
</TABLE>
