
<form action="index.php" id="formFilter" name="formFilter" method="POST">
	<input type=hidden id='page' name='page' value='list'/>
	<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_GET['typeAn']?>'/>

	<div class="content-primary">
		<div class="ui-body ui-body-d ui-corner-all">

		<div data-role="fieldcontain">
			 <label for="foo">Palavra Chave:</label>
			 <input type="text" name="work" id="work" value="<?php echo $_GET['work']?>"/>
		</div>

		<?php
			$selectedS = " selected ";
			if( $_POST['typeAn'] =="B" )
				$selectedB = " selected ";
		?>

		<div data-role="fieldcontain">
				<select name="typeAnManual" id="typeAnManual">
					<option value="S" <?php echo $selectedS?>>Anúncios de empresas a venda</option>
					<option value="B" <?php echo $selectedB?>>Anúncios de investidores e compradores</option>
				</select>
		</div>


		<div data-role="fieldcontain">
				<select name="typeCompany" id="typeCompany">
					<option value="">Selecione a Atividade da empresa</option>
					<option value="I">Indústria</option>
					<option value="C">Comércio</option>
					<option value="S">Serviço</option>
				</select>
		</div>


		<div data-role="fieldcontain">
			<select name="idSector" id="idSector">
				<option value="">Selecione um setor</option>
				<?php
				while( list( $key,$val ) =each($aSector) ){
					$sel = "";
					if( $key == $_GET["idSector"] )
						$sel = " selected";

					echo "<option value='$key' $sel>$val</option>";

				}
				?>

			</select>
		</div>
		<div data-role="fieldcontain">
			<select name="idShipper" id="idShipper">
				<option value="">Selecione um  faturamento</option>
				<?php
				while( list( $key,$val ) =each($aInvestimento) ){
					$sel = "";
					if( $key == $dataAnnouncement["billing"] )
						$sel = " selected";

					echo "<option Value='$key' $sel>$val</option>";
				}
				?>
			</select>
		</div>

		<div class="ui-body ui-body-b">
		<fieldset class="ui-grid-a">
			<div class="ui-block-a">
				<a href="#" data-role="button" data-inline="true" data-theme="d" onclick='home()' >Cancel</a>
				<a href="#" data-role="button" data-inline="true" data-theme="b" onclick='filter()'>Pesquisar oportunidades</a>
			</div>
		</fieldset>
		</div>
		</div>
 	</div>
</form>


<form action="index.php" id="formHome" name="formHome" method="post">
</form>

<script>
		function filter(){
			 document.getElementById('formFilter').submit();
		}
		function home(){
			 document.getElementById('formHome').submit();
		}
</script>
