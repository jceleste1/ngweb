<form action="index.php" id="formContact" name="formContact" method="post">

<input type=hidden id='id' name='id' value='<?php echo $_POST[id]?>'/>
<input type=hidden id='page' name='page' value='salveUser'/>
<input type=hidden id='title' name='title' value='<?php echo strtoupper($_POST["title"])?>'/>
<input type=hidden id='work' name='work' value="<?php echo $_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper']?>'/>
<input type=hidden id='action'  name='action' value='<?php echo $_POST[action]?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn']?>'/>

<div class="content-primary">
	<div data-role="header" data-theme="d">
		<h1>Login de usuário</h1>
	</div>
	<div data-role="fieldcontain">
	<p>Para que possa utlizar o site NegociosLucrativos.com é necessário que preencha formulário abaixo.</p>
		<div id="resultLog"></div>
	</div>
	<div data-role="fieldcontain">
	 <label for="foo">Nome:</label>
	 <input type="text" name="name" id="name" size="32"/>
	</div>
	<div data-role="fieldcontain">
	 <label for="foo">Email:</label>
	 <input type="text" name="mail" id="mail" size="30"/>
	</div>

	<div data-role="fieldcontain">
	 <label for="foo">Password:</label>
	 <input type="password" name="pwd" id="pwd" size="10"/>
	</div>
	<div class="ui-body ui-body-b">
		<fieldset class="ui-grid-a">
				<div class="ui-block-a">
					<button type="button" data-theme="d" onclick='cancel()' >Cancel</button>
				</div>
				<div class="ui-block-b">
					<button id="button" type="button" data-theme="b"  onclick='salveUser()'>Submit</button>
				</div>
		</fieldset>
	</div>
</div>
</form>

<form action="index.php" id="formHomeUser" name="formHomeUser" method="post">
	<input type=hidden id='page' name='page' value='home'/>
</form>

<form action="index.php" id="formHome" name="formHome" method="post">
</form>

<script>
function cancel(){
	document.getElementById('formHome').submit();
}

function home(){
	document.getElementById('formHome').submit();
}
function salveUser(){

	if( document.getElementById('name').value == ""  ){
		alert("Preencha o campo nome ");
		return false;
	}

	if( document.getElementById('mail').value == ""  ){
		alert("Preencha o campo email");
		return false;
	}


	if( document.getElementById('pwd').value == ""  ){
		alert("Preencha o campo password");
		return false;
	}
	document.getElementById('formContact').submit();
}
</script>

