<form action="index.php" id="formBack" name="formBack" method="post">
<input type=hidden id='page' name='page' value='list'/>
<input type=hidden id='work' name='work' value="<?php echo $_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper']?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn']?>'/>

<div class="content-primary">
	<div data-role="header" data-theme="d">
		<h1>Mensagem enviada com sucesso. </b></h1>
	</div>

	<div data-role="fieldcontain"><p></p>
	<?php

	$qry = "select a.id_user,r.name,r.mail, a.title,a.typeannouncement from announcement  a,register r  where a.id='".$_POST['id']."'";
	$qry .= " and a.id_user=r.id";
	$result = mysql( $DB , $qry );
	if( mysql_error() ){
		 $msg = "DB ERROR NegociosLucrativos mobile \n Page : contactSendMsg \n";
		 $msg .= "UserAgent: ".$ismobi->getUserAgent()."\n \n" ;
		 $msg .= "Mobile: ".$ismobi->getMobileDevice()."\n $qry" ;
	}



	$dataAnnouncementUser = mysql_fetch_array( $result ) ;

	$subjectMail = "Interessado sobre o anuncio ".$dataAnnouncementUser["title"]  ;
	$subject .= "Interessado sobre o anuncio ".$dataAnnouncementUser["title"]."<br>"   ;

	$msg .= $subject."<br><br><br>";

	$msg .= "Prezado ".$dataAnnouncementUser["name"]."<br><br>"   ;

	$msg .= "Estamos direcionando para você um e-mail referente ao seu anúncio.<br>";
	$msg .= "Para visualizar a mensagem completa, por favor acesse o site,  <br>";
	$msg .= "http://www.negocioslucrativos.com.br <br>";
	$msg .= "Digite seu login e senha e acesse o link  'Novas mensagens' .<br><br>";
	$msg .= "Mensagem: ".substr($_REQUEST["message"], 0, 7)." ....<br>";


	$msg .=  "<br><br><br>";
	$msg .= " Atenciosamente <br><br>";


	$msg .= "http://www.negocioslucrativos.com.br";
	$msg .= "<br>### Mensagem enviada através de dispositivo movel ###";


	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

	$headers .= "From: NegociosLucrativos.com.br<jceleste1@gmail.com>\n\r";
	$headers .= "To: ".$dataAnnouncementUser["name"]."<".$dataAnnouncementUser["mail"].">\n\r";

	@mail($dataAnnouncementUser["mail"],$subjectMail,$msg,$headers);
	@mail("jceleste1@gmail.com",$subjectMail,$msg,$headers);

	$qry = "insert into contatos ( id_userto,msg,datainc,id_userof ) values (  '";
	$qry .= $dataAnnouncementUser["id_user"]."','".$_REQUEST["message"]."',now(),'".$_SESSION["idUser"]."')";

	$result = mysql( $DB , $qry );

	?>
		<fieldset class="ui-grid-a">
			<button id="sender" type="button" data-theme="e" onclick='back()'>Voltar</button>
		</fieldset>
	</div>
</div>

</form>

<script>
function back(){
	document.getElementById('formBack').submit();
}
</script>
