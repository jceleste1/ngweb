<?php
$errorRegister = true;

$qry = "select mail from register where mail='".$_POST["mail"]."'";
$result = mysql( $DB , $qry );
if(  !mysql_num_rows($result )  ){
	$qry = "insert into register(	name,mail ,	password ,datainc,id_marketing ) values( \"".$_POST["name"]."\",\"".$_POST["mail"]."\",\"".$_POST[pwd]."\", now(),'9' )";
	$result = mysql( $DB , $qry );

	$_SESSION["nameUser"] = $_POST["name"];
	$_SESSION["idUser"] = mysql_insert_id();
	$_SESSION["mail"] = $_POST["mail"];
	$errorRegister = false;
}


?>

<form action="index.php" id="formContact" name="formContact" method="post">
<input type=hidden id='page' name='page' value='contact'/>
<input type=hidden id='id' name='id' value='<?php echo $_POST[id]?>'/>
<input type=hidden id='title' name='title' value='<?php echo strtoupper($_POST["title"])?>'/>
<input type=hidden id='work' name='work' value="<?php echo $_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper']?>'/>
<input type=hidden id='action'  name='action' value='<?php echo $_POST[action]?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn']?>'/>


<div class="content-primary">
	<?php if( !$errorRegister ){?>
		<div data-role="header" data-theme="d">
			<h1>Seu cadastro foi feito com sucesso!</h1>
		</div>
	<?php
		if( $_POST[action] == "homeUser" ){?>
			<fieldset class="ui-grid-a">
				<p><strong>Clicando em Minha Home, você será direcionado para area administrativa da sua conta no site NegociosLucrativos.com</strong></p>
				<button  type="button" data-theme="e" onclick="homeUser()">Minha Home</button>
			</fieldset>
		<?php } else {?>
			<div class="ui-body ui-body-b">
				<p><strong>Clique em Continuar, para carregar o formulário que será enviado para o resposavel do anúncio, <?=strtoupper($_POST["title"])?> </strong></p>
				<fieldset class="ui-grid-a">
						<div class="ui-block-a">
							<button type="button" data-theme="d" onclick='homeUser()'>Cancelar</button>
						</div>
						<div class="ui-block-b">
							<button xtype="button" data-theme="b"   onclick='nextSend()'>Continuar >></button>
						</div>
				</fieldset>
			</div>
		<?php }
	}else{?>
			<fieldset class="ui-grid-a">
				<p><strong>O email <?=$_POST["mail"]?> já consta na base do site NegociosLucrativos.com </br></strong></p>
				<button  type="button" data-theme="e" onclick="login()"><< Voltar</button>
			</fieldset>

	<?php }?>
</div>
</form>

<form action="index.php" id="formHomeUser" name="formHomeUser" method="post">
<input type=hidden id='page' name='page' value='home'/>
</form>

<form action="index.php" id="formHome" name="formHome" method="post">
</form>

<form action="index.php" id="formLogin" name="formLogin" method="post">
<input type=hidden id='page' name='page' value='login'/>
</form>

<script>
function nextSend(){
	document.getElementById('formContact').submit();
}
function homeUser(){
	document.getElementById('formHomeUser').submit();
}
function login(){
	document.getElementById('formLogin').submit();
}

</script>