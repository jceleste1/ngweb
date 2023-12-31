<?php
if( $_POST[validRequest] ) {
	if( !$_SESSION["idUser"] ) {
		
	 	
		$qry = "select id,name,mail from register where mail='".$_POST['mail']."' and password='".$_POST["pwd"]."'";

		$result = mysql( $DB , $qry );
		 $data=mysql_fetch_assoc($result);
		
		echo mysql_error();
	
		if( $data[id] ){
			$_SESSION["idUser"] = $data[id];
			$_SESSION["nameUser"]	=	$data[name];


		}
	}
}
?>

<form action="index.php" id="formSend" name="formSend" method="post">
<input type=hidden id='page' name='page' value='contactSendMsg'/>
<input type=hidden id='id' name='id' value='<?=$_POST[id]?>'/>
<input type=hidden id='title' name='title' value='<?=strtoupper($_POST["title"])?>'/>
<input type=hidden id='work' name='work' value="<?=$_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?=$_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?=$_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?=$_POST['idShipper']?>'/>
<input type=hidden id='idUser' name='idUser' value='<?=trim($_POST['idUser'])?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?=$_POST['typeAn']?>'/>

<div class="content-primary">
	<div data-role="header" data-theme="d">
	<?php
		if( $_SESSION["idUser"] ){?>
			<div data-role="header" data-theme="d">
				<h1>Tenho interesse pelo anuncio <b><?php echo $_REQUEST['title']?></b></h1>
			</div>
			<div data-role="fieldcontain">
			<p>Preencha o campo abaixo, para entrar em contato com o responsavel do anúncio</p>
				<div id="resultLog"></div>
			</div>
			<div data-role="fieldcontain">
			 <label for="foo">Descrição:</label>
			 <textarea cols="40" rows="8" name="message" id="message"></textarea>
			</div>
			<div class="ui-body ui-body-b">
				<fieldset class="ui-grid-a">
						<div class="ui-block-a">
							<button type="button" data-theme="d" onclick='cancel()'>Cancel</button>
						</div>
						<div class="ui-block-b">
							<button id="sender" type="button" data-theme="b" onclick='send()'>Submit</button>
						</div>
				</fieldset>
			</div>
		<?php }else{?>
			<div class="ui-body ui-body-b">
				<fieldset class="ui-grid-a">
						<div class="ui-block-a" ><center>

							<font color=darkred face=verdana><b>Login ou senha não encontrados</b></font> </br></br>
							<button type="button" data-theme="d" onclick='cancel()'>Voltar</button>
							</center>
						</div>

				</fieldset>
			</div>

		<?php }?>
	</div>
</div>

</form>

<form action="index.php" id="formCancel" name="formCancel" method="post">
	<input type=hidden id='page' name='page' value='list'/>
	<input type=hidden id='id' name='id' value='<?php echo $_POST[id]?>'/>
	<input type=hidden id='title' name='title' value='<?php echo strtoupper($_POST["title"])?>'/>
	<input type=hidden id='work' name='work' value="<?php echo $_POST[work]?>"/>
	<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany']?>'/>
	<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector']?>'/>
	<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper']?>'/>
	<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn']?>'/>
</form>

<script>
function cancel(){
	document.getElementById('formCancel').submit();
}

function send(){
	document.getElementById('formSend').submit();
}

</script>