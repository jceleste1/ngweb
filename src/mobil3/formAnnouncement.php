<?php


if( $_POST[action]  == "load" ){

	$qry = "select title,typecompany,sector,billing,description,datainc,status,typeannouncement,priceselling,numberemployee,conditionpart,zone,confidencial,price,www from announcement where id=".$_POST["id"]." and id_user='".$_SESSION["idUser"]."'";
	$result = mysql($DB,$qry);

	$dataAnnouncement = mysql_fetch_array( $result ) ;

	$price =  $dataAnnouncement["priceselling"];
	if( $line[price] != 0 )
	{
		$price =   number_format($dataAnnouncement[price], 2, ',', '.');
	}



}

?>

<div class="content-primary">
	<form action="index.php"  name="formAnnouncement" id="formAnnouncement" method="post">
		<input type="hidden" name="action" id="action"  value="salveAnnouncement" />
		<input type="hidden" name="id" id="id" value="<?php echo $_POST[id]?>"/>
		<input type="hidden" name="page" id="page" value="home"/>


		<h2>Anuncie gratuitamente </h2>
		<p>Lembrando que todas as informa��es pessoais realizadas no cadastro do site NegociosLucrativos.com <b>n�o s�o publicadas no an�ncio.</p>


		<?php
			$selectedS = " selected ";
			if( $dataAnnouncement["typeannouncement"] =="B" )
				$selectedB = " selected ";
		?>

		<div data-role="fieldcontain">
				<select name="typeannouncement" id="typeannouncement">
					<option value="S" >Clique aqui para Selecionar o tipo de anuncio</option>
					<option value="S" <?=$selectedS?>>An�ncios de empresas a venda</option>
					<option value="B" <?=$selectedB?>>An�ncios de investidores e compradores</option>
				</select>
		</div>

		<div data-role="fieldcontain">
		 <label for="name">Titulo do an�ncio: </label>
		 <input type='text' name='title' size='60' MAXLENGTH ="70" value="<?php echo $dataAnnouncement["title"]?>">
		</div>

		<?php
		switch( $dataAnnouncement["typecompany"] ){
			case "I":
				$checkedI = " checked='Checked'";
				break;
			case "C":
				$checkedC =  " checked='Checked'";
				break;
			case "S":
				$checkedS =  " checked='Checked'";
				break;
			default:
				$checkedI =  " checked='Checked'";
		}
	?>

	<div data-role="fieldcontain">
			<fieldset data-role="controlgroup">
				<legend>Atividade da Empresa:</legend>
					<input type="radio" name="typecompany" id="radio-choice-1" value="Ind�stria" <?php echo $checkedI?> />
					<label for="radio-choice-1">Ind�stria</label>

					<input type="radio" name="typecompany" id="radio-choice-2" value="Com�rcio"  <?php echo $checkedC?>  />
					<label for="radio-choice-2">Com�rcio</label>

					<input type="radio" name="typecompany" id="radio-choice-3" value="Servi�o"  <?php echo $checkedS?> />
					<label for="radio-choice-3">Servi�o</label>

			</fieldset>
		</div>

	<div data-role="fieldcontain">
			<label for="select-choice-1" class="select">Setor:</label>
			<select name="sector" id="sector">

			<?php
			$aSector[1]="Aeron�utica";
			$aSector[2]="Agr�cola";
			$aSector[3]="Alimento";
			$aSector[4]="Automotivo";
			$aSector[5]="Banco / Finan�as / Seguros";
			$aSector[6]="Concession�ria / Posto de Gasolina";
			$aSector[7]="Constru��o";
			$aSector[8]="Consultoria";
			$aSector[9]="Cosm�ticos";
			$aSector[10]="Couro";
			$aSector[11]="Educacional";
			$aSector[12]="Eletro / Eletr�nico";
			$aSector[13]="Embalagens";
			$aSector[14]="Farmac�utico";
			$aSector[15]="Higiene / Limpeza";
			$aSector[16]="Impress�o / Publica��o";
			$aSector[17]="Inform�tica / Informa��o";
			$aSector[18]="M�quinas / Equipamentos";
			$aSector[19]="Medicina / Sa�de";
			$aSector[20]="Metal�rgico";
			$aSector[21]="Minera��o";
			$aSector[22]="M�veis";
			$aSector[23]="Naval";
			$aSector[24]="Pl�stico / Borracha";
			$aSector[25]="Petroqu�mico";
			$aSector[26]="Publicidade";
			$aSector[27]="Qu�mico";
			$aSector[28]="Seguran�a";
			$aSector[29]="Supermercado / Loja de Departamento";
			$aSector[30]="Telecomunica��o";
			$aSector[31]="T�xtil";
			$aSector[32]="Transporte";
			$aSector[33]="Turismo / Lazer / Hotel";
			$aSector[34]="Vestu�rio";
			$aSector[35]="Veterin�rio";
			$aSector[36]="Outros";
			$aSector[37]="Cal�ados";

			while( list( $key,$val ) =each($aSector) ){
				$sel = "";
				if( $key == $_POST["idSector"] )
					$sel = " selected";

				echo "<option value='$key' $sel>$val</option>";

			}
				?>
			</select>
		</div>

	<div data-role="fieldcontain">
			<label for="select-choice-1" class="select">Faturamento bruto:</label>
			<select name="billing" id="billing">
			<?php
			$aInvestimento[1] = "Abaixo de R$ 100 mil";
			$aInvestimento[2] = "R$ 100 mil  a  1 milh�o";
			$aInvestimento[3] = "R$ 1 milh�o a R$ 2,5 milh�es";
			$aInvestimento[4] = "R$ 10 milh�es a R$ 15 milh�es";
			$aInvestimento[5] = "R$ 15 milh�es a R$ 20 milh�es";
			$aInvestimento[6] = "R$ 2,5 milh�es a R$ 5 milh�es";
			$aInvestimento[7] = "R$ 20 milh�es a R$ 30 milh�es";
			$aInvestimento[8] = "R$ 5 milh�es a R$ 7,5 milh�es";
			$aInvestimento[9] = "R$ 7,5 milh�es a R$ 10 milh�es";
			$aInvestimento[10] = "Acima de R$ 30 milh�es";

			while( list( $key,$val ) =each($aInvestimento) ){
				$sel = "";
				if( $key == $dataAnnouncement["billing"] )
					$sel = " selected";

				echo "<option Value='$key' $sel>$val</option>";
			}
			?>
			</select>
	</div>

	<div data-role="fieldcontain">
			<label for="select-choice-3" class="select">Local:</label>
			<select name="zone" id="zone">
			<option Value=''></option>
			<?php
			$aZone[1] =" CentroOeste- Distrito Federal ";
			$aZone[2] =" CentroOeste- Goias   ";
			$aZone[3] =" CentroOeste- Mato Grosso ";
			$aZone[4] =" CentroOeste- Mato Grosso do Sul   ";
			$aZone[5] =" Nordeste - Alagoas   ";
			$aZone[6] =" Nordeste - Bahia   ";
			$aZone[7] =" Nordeste - Ceara   ";
			$aZone[8] =" Nordeste - Maranhao   ";
			$aZone[9] =" Nordeste - Paraiba   ";
			$aZone[10] =" Nordeste - Piaui   ";
			$aZone[11] =" Nordeste - Recife   ";
			$aZone[12] =" Nordeste - Rio Grande   ";
			$aZone[13] =" Nordeste - Sergipe   ";
			$aZone[14] =" Norte - Acre   ";
			$aZone[15] =" Norte - Amapa   ";
			$aZone[16] =" Norte - Am$aZones   ";
			$aZone[17] =" Norte - Para   ";
			$aZone[18] =" Norte - Rondonia   ";
			$aZone[19] =" Norte - Roraima   ";
			$aZone[20] =" Norte- Tocantins   ";
			$aZone[21] =" Sudeste - Espirito Santo   ";
			$aZone[22] =" Sudeste - Minas Gerais   ";
			$aZone[23] =" Sudeste - Rio de Janeiro   ";
			$aZone[24] =" Sudeste - Sao Paulo   ";
			$aZone[25] =" Sul - Parana   ";
			$aZone[26] =" Sul - Rio Grande do Sul   ";
			$aZone[27] =" Sul - Sta Catarina   ";

			while( list( $key,$val ) =each($aZone) ){
				$sel = "";
				if( $key == $dataAnnouncement["zone"] )
					$sel = " selected";

				echo "<option Value='$key' $sel>$val</option>";

			}
			?>
		</select>
	</div>

	<div data-role="fieldcontain">
		 <label for="name">Descri��o: </label>
		 <textarea cols="40" rows="8" name="description" id="description"><?php echo$dataAnnouncement["description"]?></textarea>
	</div>


	<div data-role="fieldcontain">
		 <label for="name">Site da empresa: </label>
		 <input type='text' name='www' id="www"  value="<?php echo $dataAnnouncement["www"]?>">

	</div>

	<div data-role="fieldcontain">
		 <label for="name">Valor: </label>
		 <input type=text name='priceselling'  id="priceselling" value="<?php echo $price?>" onKeyPress="return(formataMoeda(this,'.',',',event));">
	 </div>


	<div data-role="fieldcontain">
	 <label for="name">No de Funcion�rios: </label>
	 <input type='text' name='numberemployee' id="numberemployee"  value="<?php echo $dataAnnouncement["numberemployee"]?>">
	</div>


	<div data-role="fieldcontain">
	 <label for="name">Condi��es para negocia��o: </label>
	 <input type='text' name='conditionpart' id="conditionpart"  value="<?php echo $dataAnnouncement["conditionpart"]?>">
	</div>


	<div class="ui-body ui-body-b">
		<fieldset class="ui-grid-a">
		<div class="ui-block-a">
			<a href="#" data-role="button" data-inline="true" data-theme="b"  onclick='home()' >Cancel</a>
		</div>
		<div class="ui-block-b">
			<a href="#" data-role="button" data-inline="true" data-theme="a" onclick='submit()'>Enviar</a>
		</div>
		</fieldset>
	</div>

</div><!--/content-primary -->

</form>

<form action="index.php" id="formHome" name="formHome" method="post">
</form>

<script>
	function submit(){
		document.getElementById("formAnnouncement").submit();
	}
	function home(){
	 document.getElementById('formHome').submit();
	}



</script>

</body>
</html>