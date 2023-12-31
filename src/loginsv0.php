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

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="754434331865-2fbinnckkr8jfj3qorgpj31s4b4rhs08.apps.googleusercontent.com">
	<script src="https://apis.google.com/js/api:client.js"></script>
	
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
		  var googleUser = {};
		  var startApp = function() {
			gapi.load('auth2', function(){
			  // Retrieve the singleton for the GoogleAuth library and set up the client.
			  auth2 = gapi.auth2.init({
				// client_id: '754434331865-2fbinnckkr8jfj3qorgpj31s4b4rhs08.apps.googleusercontent.com',
				client_id: '754434331865-cmqcjp7cmas77offq167ofbqtl3q8kea.apps.googleusercontent.com',
				
				cookiepolicy: 'single_host_origin',
				// Request scopes in addition to 'profile' and 'email'
				//scope: 'additional_scope'
			  });
			  attachSignin(document.getElementById('customBtn'));
			});
		  };

		  function attachSignin(element) {
			console.log(element.id);
			auth2.attachClickHandler(element, {},
				function(googleUser) {
				  document.getElementById('name').innerText = "Signed in: " +
					  googleUser.getBasicProfile().getName();
					  
					var id_token = googleUser.getAuthResponse().id_token;
					var media = "google";
					if( id_token != "" ){
						var dados = {
							name: googleUser.getBasicProfile().getName()+ " "+googleUser.getBasicProfile().getFamilyName(),
							mail: googleUser.getBasicProfile().getEmail(),
							media:media
						}
						//$.post("http://localhost/ng/v1/users/medialogin/",dados,function(retorna){
						//       window.location.href="http://localhost/ng/v1/mvcAnnouncement.php?action=inhome";
						//});
						
						
						$.post("http://www.negocioslucrativos.com.br/users/medialogin/",dados,function(retorna){
						       window.location.href="http://www.negocioslucrativos.com.br/mvcAnnouncement.php?action=inhome";
						});
						
						
						console.log("ID Token: " + id_token);
					}
					  
				}, function(error) {
				  alert(JSON.stringify(error, undefined, 2));
				});
		  }
		  
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
	
<br><br><br>
	<table cellpadding="1" cellspacing="3" border="0" align="center" width='90%' ><tr><td colspan=2  align=center><b><font color=darkgreen face=verdana>  Para entrar em contato com  o empresário e necessário estar cadastrado no site NegociosLucrativos.com.br </font></b></td>	</tr></table><br><br>


	   <table cellpadding="1" cellspacing="3" border="0" align="center" width='90%' bgcolor='#E2EADF'>	
	   <tr><td width='50%' valign=top>
		   <table cellpadding="1" cellspacing="3" border="0" align="center" width='100%' height='100%' bgcolor='#F8F8F8' >	
				<form action='mvcAnnouncement.php' method='post'>
				<input type='hidden' name='action' value='login'>		
				
				<tr  height='45 px'>			
					<td  colspan="2" align='left' class="grayS" ><font color=darkgreen><b>Se você já é cadastrado </font></td>
				</tr>
				<tr>
					<td class=ashblack colspan=2></td>
				</tr><tr>
					<td class="grayS">E-mail</td><td><input type=text name=mail></td></tr>
				<tr>
					<td class="grayS">Senha</td><td><input type=password name=password ></td></tr>
				<tr>
					<td colspan=2 align='center'><input type=submit value='Enviar'></td></tr>
				<tr>
					<td class=ashblack colspan=2></td>
				</tr>

				<tr>
					<td colspan=2>&nbsp;</td>
				</tr>
			
				<tr>
					<td colspan=2 height="20"><a href='mvcAnnouncement.php?action=forgetPassword'>Esqueceu a senha ?</a></td>
				</tr>

				<tr  height='106 px'>
					<td colspan=2></td>
				</tr>

			 </form>
		   </table>
		</td><td valign=top>
		
		
		
		<table cellpadding="1" cellspacing="3" border="0" align="center" width='100%' bgcolor='#F8F8F8' >	

			<tr height='45 px'>		
				<td><font class='subtitulo3'>Se você NÃO é cadastrado</a></td>			
			</tr>	

			<tr>			
				<td><font class=labels><b>Cinco Bons motivos para se cadastrar</font></b></td>			
			</tr>	

			<tr>			
				<td  class="grayS"><li>Serviço totalmente gratuito</td>		
			</tr>
			<tr>			
				<td  class="grayS"><li>Publicação de anúncios com sigilo absoluto de informações pessoais.</td>			
			</tr>
			<tr>			
				<td class="grayS"><li>Possuimos um banco de dados com milhares de emails de empresarios e investidores.</td>		
			</tr>
			<tr>			
				<td class="grayS"><li>Investimos em diversos tipos de marketing ( web-marketing,jornais e revistas )</td>		
			</tr>

			<tr>			
				<td class="grayS"><li>Possuimos sistemas que através de buscas conceituais na internet,
informam empresários que querem investir,adquirir ou vender empresas</td>		
			</tr>


			<tr>			
				<td>&nbsp;</td>		
			</tr>

			<tr>			
				<td bgcolor='white' height="20"><a href='mvcAnnouncement.php?action=registerUser'> <img border="0" src="img/ico_cad.gif" align="right" width="113" height="25"></a></td>			
			</tr>	

		</table>
		
		
		<!--
		   <table cellpadding="1" cellspacing="3" border="0" align="center" width='100%' bgcolor='#F8F8F8' >	
				<tr height='45 px' >		
					<td bgcolor=darkgreen colspan=2><font color=white><b>Não tem cadastrado ? </font></td>			
				</tr>	
				<tr height='45 px'>		
					<td align="left"><a href='mvcAnnouncement.php?action=condicao'> <img border="0" src="img/ico_cad.gif"  width="113" height="25"></a></td>			
				</tr>
				<tr height='45 px'>		
					<td bgcolor="darkred" colspan=2><font color=white><b>Entre utilizando</font></b></td>	
				</tr>
				<tr height='45 px'>		
					<td colspan="2">
					 <div id="gSignInWrapper">
						<span class="label"> </span>
						<div id="customBtn" class="customGPlusSignIn">
						  <span class="icon"></span>
						  <span class="buttonText"></span>
						</div>
					  </div>
					  <div id="name"></div>
					  <script>startApp();</script>		
					</td>		
					<td>
					<fb:login-button data-size="medium" data-button-type="login_with"    scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>
					</td> 
					
					</tr>
				</table>
				-->
			</td>
			</tr>
		 </table>

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
