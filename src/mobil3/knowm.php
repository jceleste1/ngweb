<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

@mail("jceleste@brasilforte.com.br","mobile knowm","")	;				

?>
<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NegociosLucrativos.com</title>
	<link rel="stylesheet"  href="../../jquery.mobile-1.0.min.css" />
	<link rel="stylesheet" href="../_assets/css/jqm-docs.css"/>
	<script src="../../jquery.js"></script>
	<script src="../../experiments/themeswitcher/jquery.mobile.themeswitcher.js"></script>
	<script src="../_assets/js/jqm-docs.js"></script>
	<script src="../../jquery.mobile-1.0.min.js"></script>
</head>
<body>


<div data-role="page" class="type-interior">
	<div data-role="header" data-theme="f">
		<h1>Negocios Lucrativos </h1>
		<a href="javascript:home()" data-icon="home" data-iconpos="notext" data-direction="reverse" class="ui-btn-right jqm-home">Home</a>
	</div><!-- /header -->

	<div data-role="content">
			<div class="content-primary">
			<h2>NegociosLucrativos.com oferece:</h2>
			<ul>
				<li><strong>Serviço totalmente gratuito.</li></strong>
				<li><strong>Várias oportunidades de negócios postadas mensalmente.</li></strong>
				<li><strong>Cadastro de oportunidades de negócios gratuito.</li></strong>
				<li><strong>Possibilidade de entrar em contato com um investidor, para investir no seu empreendimento.</li></strong>
				<li><strong>Possibilidade de entrar em contato com um empresário que está negociando a empresa a qual a ele pertence, gratuitamente</li></strong>
			</ul>	
			<h3>Tempo é dinheiro, por isso não perca tempo. Clique no botão abaixo para cadastrar-se:</h3>

			<div class="ui-body ui-body-b">
				<fieldset class="ui-grid-a">
					<button id="sender" type="button" data-theme="e" onclick='register()'>Quero me cadastrar-se</button>
				</fieldset>
			</div>
	</div>	
	
	<form action="../forms/register.php" id="formRegister" name="formRegister" method="post">
	</form>
	
</div>
	<script>
	function home(){
		document.getElementById('formHome').submit();
	}
	
	function register(){
		document.getElementById('formRegister').submit();
	}	
	
	</script>


</body>
</html>
	
	