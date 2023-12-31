<div class="content-primary">

	<form method="post"  action="index.php" id="formContact" name="formContact">
		<input type=hidden id='page' name='page' value='contact'/>
		<input type=hidden id='id' name='id' value='<?=$_POST[id]?>'/>
		<input type=hidden id='title' name='title' value='<?=strtoupper($_POST["title"])?>'/>
		<input type=hidden id='work' name='work' value="<?=$_POST[work]?>"/>
		<input type=hidden id='typeCompany' name='typeCompany' value='<?=$_POST['typeCompany']?>'/>
		<input type=hidden id='idSector' name='idSector' value='<?=$_POST['idSector']?>'/>
		<input type=hidden id='idShipper' name='idShipper' value='<?=$_POST['idShipper']?>'/>
		<input type=hidden id='idUser' name='idUser'/>
		<input type=hidden id='action' name='action' value='<?=$_POST[action]?>'/>
		<input type=hidden id='typeAn' name='typeAn' value='<?=$_POST['typeAn']?>'/>

		<div data-role="header" data-theme="d">
			<h1>Login de usuário</h1>
		</div>
		<div data-role="fieldcontain">
		<p>Entre com o seu email e senha, para acessar os serviços NegociosLucrativos.com<br><b>Serviço totalmente gratuito alterado</b></p>
			<div id="resultLog"></div>
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
						<button type="button" data-theme="d" onclick='home()' >Cancel</button>
					</div>
					<div class="ui-block-b">
						<li data-theme="a"><a href="#" onclick=submit()>Submitting forms</a></li>

					</div>
			</fieldset>

			<fieldset class="ui-grid-a">
				<button id="sender" type="button" data-theme="e" onclick='register()'>SE VOCÊ NÃO TEM CADASTRO CLIQUE AQUI</button>
			</fieldset>
		</div>
	</form>
</div>
<form action="index.php" id="formCancel" name="formCancel" method="post">
	<input type=hidden id='page' name='page' value='list'/>
	<input type=hidden id='id' name='id' value='<?=$_POST[id]?>'/>
	<input type=hidden id='title' name='title' value='<?=strtoupper($_POST["title"])?>'/>
	<input type=hidden id='work' name='work' value="<?=$_POST[work]?>"/>
	<input type=hidden id='typeCompany' name='typeCompany' value='<?=$_POST['typeCompany']?>'/>
	<input type=hidden id='idSector' name='idSector' value='<?=$_POST['idSector']?>'/>
	<input type=hidden id='idShipper' name='idShipper' value='<?=$_POST['idShipper']?>'/>
	<input type=hidden id='typeAn' name='typeAn' value='<?=$_POST['typeAn']?>'/>
</form>

<form action="index.php" id="formRegister" name="formRegister" method="post">
	<input type=hidden id='page' name='page' value='register'/>
	<input type=hidden id='id' name='id' value='<?=$_POST[id]?>'/>
	<input type=hidden id='title' name='title' value='<?=strtoupper($_POST["title"])?>'/>
	<input type=hidden id='work' name='work' value="<?=$_POST[work]?>"/>
	<input type=hidden id='typeCompany' name='typeCompany' value='<?=$_POST['typeCompany']?>'/>
	<input type=hidden id='idSector' name='idSector' value='<?=$_POST['idSector']?>'/>
	<input type=hidden id='idShipper' name='idShipper' value='<?=$_POST['idShipper']?>'/>
	<input type=hidden id='action' name='action' value='<?=$_POST['action']?>'/>
	<input type=hidden id='typeAn' name='typeAn' value='<?=$_POST['typeAn']?>'/>
</form>

<form action="index.php" id="formFilter" name="formFilter" method="post">
	<input type=hidden id='page' name='page' value='filter'/>
	<input type=hidden id='typeAn' name='typeAn' value='<?=$_POST['typeAn']?>'/>
</form>

<form action="index.php" id="formHome" name="formHome" method="post">
</form>


<form action="index.php" id="formHomeUser" name="formHomeUser" method="post">
	<input type=hidden id='page' name='page' value='home'/>
	<input type=hidden id='action' name='action' value='homeUser'/>
</form>

<script>
function cancel(){
	document.getElementById('formCancel').submit();
}
function register(){
	document.getElementById('formRegister').submit();
}

function filter(){
	document.getElementById('formFilter').submit();
}
function home(){
	document.getElementById('formHome').submit();
}

function submit(){


    if( document.getElementById('pwd').value == ""  ){
  		alert("Preencha o campo password");
  		return false;
  	}

  	if( document.getElementById('mail').value == ""  ){
  		alert("Preencha o campo email");
  		return false;
  	}
	return true;
}
</script>

