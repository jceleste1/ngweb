<?php	
    session_start();
	error_reporting(0);
    header('Content-Type: text/html; charset=ISO-8859-1');
	
	if( $_SESSION["version"]  == "eng" ){
	   include("config_eng.inc"); 
    }else{	   
		include("config.inc");   
    }
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
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<script src="https://accounts.google.com/gsi/client" async defer></script>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
 
	
	<style type="text/css">
    #customBtn {
      display: inline-block;
      background: white;
      color: #444;
      width: 190px;
      border-radius: 5px;
      border: thin solid #888;
      box-shadow: 1px 1px 1px grey;
      white-space: nowrap;
    }
    #customBtn:hover {
      cursor: pointer;
    }
    span.label {
      font-family: serif;
      font-weight: normal;
    }
    span.icon {
      background: url('img/btn_google_signin_dark_focus_web.png') transparent 5px 50% no-repeat;
      display: inline-block;
      vertical-align: middle;
      width: 190px;
      height: 25px;
    }
    span.buttonText {
      display: inline-block;
      vertical-align: middle;
      padding-left: 39px;
      padding-right: 42px;
      font-size: 14px;
      font-weight: bold;
      /* Use the Roboto font that is loaded in the <head> */
      font-family: 'Roboto', sans-serif;
    }
  </style>


	<?php include("styles.php")?>
	<?php include("scripts.php")?>
	
	
	 <script>
	 
	 
	

		  window.fbAsyncInit = function() {
			FB.init({
			  // appId            : '181100470395079',
			  appId            : '135660238121531',
			  autoLogAppEvents : true,
			  xfbml            : true,
			  version          : 'v9.0'
			});
		  };
		  
		 function statusChangeCallback(response) {  // Called with the results from FB.getLoginStatus().
			console.log('statusChangeCallback');
			console.log(response);                   // The current login status of the person.
			if (response.status === 'connected') {   // Logged into your webpage and Facebook.
			  testAPI();  
			} else {                                 // Not logged into your webpage or we are unable to tell.
			  document.getElementById('status').innerHTML = 'Please log ' +
				'into this webpage.';
			}
		}
		  
		  
		function checkLoginState() {               // Called when a person is finished with the Login Button.
			FB.getLoginStatus(function(response) {   // See the onlogin handler
			  statusChangeCallback(response);
			});
		}
		
		
		function testAPI() {                      // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
			console.log('Welcome!  Fetching your information.... ');
			FB.api('/me', { locale: 'pt_BR', fields: 'name, email' }, function(response) {
	
		
			var media = "facebook";	
			var dados = {
					name: response.name,
					mail: response.email,
					media:media
			}
			//$.post("http://localhost/ng/v1/users/medialogin/",dados,function(retorna){
			//	   window.location.href="http://localhost/ng/v1/mvcAnnouncement.php?action=inhome";
			//});
				
			$.post("../users/medialogin/",dados,function(retorna){
				   window.location.href="../mvcAnnouncement.php?action=inhome";
			});
				
			});
		}
		  
		  
  </script>
	
	
</head>
<body>
 

<div id="wrap">
	<div id="header"><?php include("header.php")?></h1></div>
	
	<div  id="main"  class="clearfix" >
	
<br><br>
	<table cellpadding="1" cellspacing="3" border="0" align="center" width='90%' ><tr><td colspan=2  align=center><b><font color=darkgreen face=verdana>  Para entrar em contato com  o empres�rio e necess�rio estar cadastrado no site NegociosLucrativos.com.br </font></b></td>	</tr></table><br><br>

<tr><td>
	   <table cellpadding="1" cellspacing="3" border="0" align="center" width='90%' bgcolor='#E2EADF'>	
	   <tr><td  valign=top>
		   <table cellpadding="1" cellspacing="3" border="0" align="center" width='100%' height='100%' bgcolor='#F8F8F8' >	
			 <form action='mvcAnnouncement.php' method='post'>
				<input type='hidden' name='action' value='login'>		
				
				<tr  height='45 px'>			
					<td  colspan="2" align='left' class="grayS" ><font color=darkgreen><b>Se voc� j� � cadastrado </font></td>
				</tr>
				<tr>
					<td class=ashblack colspan=2></td>
				</tr><tr>
					<td class="grayS">E-mail</td><td class="grayS" align=left ><input type=text name=mail></td></tr>
				<tr>
					<td class="grayS">Senha</td><td class="grayS"><input type=password name=password ></td></tr>
				<tr>
					<td  align='left'><input type=submit value='Enviar'></td>
					
					<td align=right ><a href='mvcAnnouncement.php?action=forgetPassword'>Esqueceu a senha ?</a></td>
				</tr>
			 </form>
		 </table>
			 
		<table cellpadding="1" cellspacing="3" border="0" align="center" width='100%' height='100%' bgcolor='#F8F8F8' >	

			 	<tr>		
					<td bgcolor="#88a38e" colspan=2><font color=white><b>Entre utilizando</font></b></td>	
				</tr>
				<tr>		
					<td align="center">


<div id="g_id_onload"
     data-client_id="1022773277691-i4s3d5dscqr6e4mr518j99ss9gfadje3.apps.googleusercontent.com"
     data-context="signin"
     data-ux_mode="redirect"
     data-login_uri="https://www.negocioslucrativos.com.br/users/usersocial/login.php?jwt=yes_nois_temos_banana"
     data-auto_prompt="false">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-shape="rectangular"
     data-theme="filled_blue"
     data-text="signin_with"
     data-size="large"
     data-logo_alignment="left">
</div>
					</td>
					
						

					<td align="left">

						<fb:login-button size="xlarge" max-rows="1" scope="public_profile,email" size="large" onlogin="checkLoginState();">	</fb:login-button>


					</td>

					
					</tr>
					
					<tr>		
						<td bgcolor=#88a38e colspan=2><font color=white><b>N�o tem cadastrado ? </font></td>			
					</tr>	
					<tr>		
						<td align="left"><a href='mvcAnnouncement.php?action=condicao'> <img border="0" src="img/ico_cad.gif"  width="113" height="25"></a></td>			
					</tr>
		   </table>
	
	
	</td></tr>
	
	
 </table>
 
 <br><br>
	</div>
	<div id="sidebar">
	    <?php include("menu.php");?>
	</div>
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
