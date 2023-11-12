<div class="content-primary">

	<div class="ui-body ui-body-d ui-corner-all">

	<form action="index.php" method=post id="formContact" name="formContact" >
		<input type=hidden id='page' name='page' value='contact'/>
		<input type=hidden id='id' name='id' value='<?php echo $_POST[id];?>'/>
		<input type=hidden id='title' name='title' value='<?php echo strtoupper($_POST["title"]);?>'/>
		<input type=hidden id='work' name='work' value="<?php echo $_POST[work]?>"/>
		<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany'];?>'/>
		<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector'];?>'/>
		<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper'];?>'/>
		<input type=hidden id='idUser' name='idUser'/>
		<input type=hidden id='action' name='action' value='<?php echo $_POST[action];?>'/>
		<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn'];?>'/>
		<input type=hidden id='validRequest' name='validRequest' value='true'/>


		<div data-role="header" data-theme="d">
			<h1>Login de usuário</h1>
		</div>
		<div data-role="fieldcontain">
		<p>Entre com o seu email e senha, para acessar os serviços NegociosLucrativos.com<br><b>Serviço totalmente gratuito</b></p>
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
						<button type="button" data-theme="d" onclick='cancel()' >Cancel</button>
					</div>
					<div class="ui-block-b">
						<button type="button" data-theme="b" onclick='login()' >Submit</button>
					</div>
			</fieldset>

			<fieldset class="ui-grid-a">
				<button id="sender" type="button" data-theme="e" onclick='register()'>SE VOCÊ NÃO TEM CADASTRO CLIQUE AQUI</button>
			</fieldset>
		</div>
	</form>

	</div>
</div>
<form action="index.php" id="formCancel" name="formCancel" method="post">
	<input type=hidden id='page' name='page' value='list'/>
	<input type=hidden id='id' name='id' value='<?php echo $_POST[id];?>'/>
	<input type=hidden id='title' name='title' value='<?php echo strtoupper($_POST["title"]);?>'/>
	<input type=hidden id='work' name='work' value="<?php echo $_POST[work];?>"/>
	<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany'];?>'/>
	<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector'];?>'/>
	<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper'];?>'/>
	<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn'];?>'/>
</form>

<form action="index.php" id="formRegister" name="formRegister" method="post">
	<input type=hidden id='page' name='page' value='register'/>
	<input type=hidden id='id' name='id' value='<?php echo $_POST[id];?>'/>
	<input type=hidden id='title' name='title' value='<?php echo strtoupper($_POST["title"]);?>'/>
	<input type=hidden id='work' name='work' value="<?php echo $_POST[work];?>"/>
	<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany'];?>'/>
	<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector'];?>'/>
	<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper'];?>'/>
	<input type=hidden id='action' name='action' value='<?php echo $_POST['action'];?>'/>
	<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn'];?>'/>
</form>



<form action="index.php" id="formLogin" name="formLogin" method="post">
	<input type=hidden id='page' name='page' value='home'/>
	<input type=hidden id='action' name='action' value='homeUser'/>
	<input type=hidden id='mailL' name='mailL' />
	<input type=hidden id='pwdL' name='pwdL' />

</form>

<script>
function cancel(){
	document.getElementById('formCancel').submit();
}
function register(){
	document.getElementById('formRegister').submit();
}


function login(){
	<?php if( $_POST[action] == "homeUser" ){?>
		document.getElementById('mailL').value = document.getElementById('mail').value; ;
		document.getElementById('pwdL').value = document.getElementById('pwd').value; ;


		document.getElementById('formLogin').submit();
	<?php }else{?>
		document.getElementById('formContact').submit();
	<?php }?>
}



</script>

