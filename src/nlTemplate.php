<?php
   include("controlSearch.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<title><?php echo $title?></title>
	<meta name="description" content="<?=$description?>" >
	<META NAME="Description" language="english" CONTENT="NegociosLucrativos.com is the right place to buy and sell small, medium and large business. Work with Venture capital, Investment Banks , Project Finance and Private Equity">
	<meta name="keywords" content="<?=$keywords?>">
	<Meta name="author" content="Brasil Forte Consultoria Ass. Ltda">
	<meta name="classification" content="Empresas">
	<meta name="subject" content="ecommerce">
	<meta name="rating" content="general">
	<meta name="roboots" content="index, all">
	<meta name="robots" content="index, follow">
	<meta name="revisit-after" content="1 days">
	<meta name="copyrigth" content="Brasil Forte Consultoria Ass. Ltda">
	<META name="GOOGLEBOT" content="INDEX, FOLLOW">
	<meta name="audience" content="all">
	<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="754434331865-2fbinnckkr8jfj3qorgpj31s4b4rhs08.apps.googleusercontent.com">



	<?php include("styles.php")?>
	<?php include("scripts.php")?>
</head>
<body>


<div id="wrap">
	<div id="header"><?php include("header.php")?></h1></div>


	<div id="nav">
	
	<?php if( $_SESSION["id"] ) { ?>
	 <a class="botonMenu" href="mvcAnnouncement.php?action=home"><img src='imagens/home.jpg' border='0'>Home</a>				
	<?php } else { ?>

		<ul>
			<form action='mvcAnnouncement.php' method='post'>
			<input type='hidden' name='action' value='login'>	
			<input type='hidden' name='reclam' value='yes'>	
			<font color="#9CC328">Email</font> <input type=text name=mail style="font-size:8pt; margin:1; border-width:1; border-color:black; border-style:outset;" size="10">
&nbsp;&nbsp;&nbsp;
			<font color="#9CC328">Senha </font> <input type=password name=password style="font-size:8pt; margin:1; border-width:1; border-color:black; border-style:outset;" size="10">
			<input type=submit value='Enviar'>
&nbsp;&nbsp;&nbsp;
			<a  href="mvcAnnouncement.php?action=forgetPassword">
			<font color="#24486C">Esqueceu a senha ?</font></a>
			</form>		
		</ul>
	<?php }  ?>
	</div>

	<div  id="main"  >
		<?php  include("$rot");?>	
	</div>
	 <?php 
		
			echo "<div id='sidebar'>";
			include("menu.php");
			echo "</div>";
	
	?>
	
	<div id="footer">
		<p><font color=darkgreen face=verdana size=1><b>Todos os direitos reservados NegociosLucrativos.com.br  aws  <a href=index_eng.php>.</a> <a href=index_pt.php>.</a></b></font></p>
	</div>
</div>
</body>
</html>


<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
	_uacct = "UA-1200114-1";
	urchinTracker("<?=$rot?>");
</script>
