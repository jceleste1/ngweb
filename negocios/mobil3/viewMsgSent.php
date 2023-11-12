<?php 

if( $line[id] ){
	$qry = "update contatos  set dateread=now() where id=".$_POST[idMsg];
	fMySQL_Connect($qry);	
}



$qry = "SELECT  c.id,r.name,r.mail, c.msg, r.phone, r.phonemobile, c.datainc FROM contatos c, register r where c.id_userto = r.id AND c.id=".$_POST[idMsg];
// echo $qry;
$result2 = mysql($DB,$qry);
$line=mysql_fetch_assoc($result2);


?>


<form action="index.php" id="formListMsg" name="formListMsg">
<div class="content-primary">
	<input type=hidden id='page' name='page' value='listMsgSent'/>
	<h3>Mensagem enviada para <b><?php echo line["name"]?></b></h3>
	<div data-role="fieldcontain">
	 <label for="foo">Data da Mensagem:</label>
	 <?php echo $line["datainc"]?>
	</div>
	<div data-role="fieldcontain">
	 <label for="foo">Email:</label>
	 <?php echo  $line["mail"]?>
	</div>
	<div data-role="fieldcontain">
	 <label for="foo">Telefone:</label>
	 <?php echo $line[phone]?>
	</div>
	<div data-role="fieldcontain">
	 <label for="foo">Telefone Celular:</label>
	 <?php echo $line[phonemobile]?>
	</div>
	<div data-role="fieldcontain">
	 <label for="foo">Mensagem:</label>
	 <?php echo $line[msg]?>
	</div>
	<div data-role="fieldcontain">
		<div class="content-primary">
			<a href="#" data-role="button" data-inline="true" onclick="back()"><< Voltar</a>
		</div>
	</div>
</div>
</form>

<script>
	function back(){
		document.getElementById('formListMsg').submit();
	}

	</script>
</body>
</html>


