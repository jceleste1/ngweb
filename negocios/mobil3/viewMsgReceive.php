<?php


$qry = "update contatos  set dateread=now() where id=".$_POST[idMsg];
$result2 = mysql($DB,$qry);	


$qry = "SELECT  c.id,r.name,r.mail, c.msg, r.phone, r.phonemobile, c.datainc
FROM contatos c, register r
where c.id_userof = r.id AND c.id=".$_POST[idMsg];
// echo $qry;
$result2 = mysql($DB,$qry);
$line=mysql_fetch_assoc($result2);



include("../config.inc");
include("../classPayPerView.php");
$classPayPerView = new classPayPerView();
$classPayPerView->debit( $_SESSION["idUser"],"0",$_POST[idMsg],"M");




?>

<div class="content-primary">
	<h3>Mensagem enviada por <b><?=$line["name"]?></b></h3>

	<form action="index.php" id="formListMsg" name="formListMsg">
	<input type=hidden id='page' name='page' value='listMsgReceive'/>


	<div data-role="fieldcontain">
	 <label for="foo">Data da Mensagem:</label>
	 <?=$line["datainc"]?>
	</div>

	<div data-role="fieldcontain">
	 <label for="foo">Email:</label>
	 <?=$line["mail"]?>
	</div>

	<div data-role="fieldcontain">
	 <label for="foo">Telefone:</label>
	 <?=$line[phone]?>
	</div>


	<div data-role="fieldcontain">
	 <label for="foo">Telefone Celular:</label>
	 <?=$line[phonemobile]?>
	</div>

	<div data-role="fieldcontain">
	 <label for="foo">Mensagem:</label>
	 <?=$line[msg]?>
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