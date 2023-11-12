<?php
	session_start();

	error_reporting(0);


   header('Content-Type: text/html; charset=ISO-8859-1');

// header("Expires: -1");
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");

     include("rds.conf.php");

	if( $_SESSION["version"]  == "eng" ){
	   include("config_eng.inc"); 
   }else{	   
		include("config.inc");   
   }
	

	if( ! $conexao ) {
		$conexao =  mysql_connect( $RDS_URL, $RDS_user,$RDS_pwd);
	}
		
	require_once "ismobile/ismobile.class.php";
	$ismobi = new IsMobile();
	
	include("commons/classCommons.php");
    $classCommons = new classCommons();
	
	$rot = "";
	switch( $_REQUEST["action"] ){
		case "postAnnouncementBuy":
				$_SESSION["addAnnouncement"] = true;
				$action = "recAnnouncement";
				$rot = "formAnnouncement.php";
				$typeannouncement = "B";
				break;
		case "postAnnouncementSelling":
				$_SESSION["addAnnouncement"] = true;
				$action = "recAnnouncement";
				$rot = "formAnnouncement.php";
				$typeannouncement = "S";
				break;

		case "modifyAnnouncement":
				$qry = sprintf("select title,typecompany,sector,billing,description,
				datainc,status,typeannouncement,priceselling,numberemployee,
				conditionpart,zone,confidencial,price,www,youtubelink  from announcement 
				where id='%s' and id_user='".$_SESSION["id"]."'", 
				mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );				
				
				$result = fMySQL_Connect($qry);

				$dataAnnouncement = mysql_fetch_array( $result ) ;
				$action = "updateAnnouncement";
				$rot = "formAnnouncement.php";
				break;

		case "deleteAnnouncement";
				$qry = sprintf("delete from announcement where 
				id='%s' and id_user='".$_SESSION["id"]."'", 
				mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );				
				
				$result = fMySQL_Connect($qry);
				$rot = "inhomLFFe.php";
				break;
		case "recAnnouncement":
				if( $_SESSION["addAnnouncement"] ) {

					$price =   str_replace(".", "",  $_REQUEST["priceselling"]);
					$price =   str_replace(",", ".", $price);
				
                    $youtubelink = filter_var( $_REQUEST["youtubelink"], FILTER_SANITIZE_MAGIC_QUOTES);
				
					if( !$price)
					   $price="0.0";

					$qry = "insert into  announcement ( title,typecompany,sector,billing,description,datainc,status,typeannouncement,id_user,priceselling,numberemployee,conditionpart,zone,confidencial,price,www,publish,youtubelink )values( \"".$_REQUEST[title]."\",\"".$_REQUEST['typecompany']."\",".$_REQUEST[sector].",".$_REQUEST[billing].",\"".$_REQUEST['description']."\",now(),'V',\"".$_REQUEST[typeannouncement]."\" ,".$_SESSION["id"].",\"".$price."\",\"".$_REQUEST["numberemployee"]."\",\"".$_REQUEST["conditionpart"]."\",\"".$_REQUEST["zone"]."\",'".$_REQUEST["confidencial"]."','".$price."',\"".$_REQUEST["www"]."\",'Y', \"".$youtubelink."\"  )";
					fMySQL_Connect($qry);

				}
				$_SESSION["addAnnouncement"] = false;
				$rot = "inhome.php";
				$idAnnouncement = mysql_insert_id();


				break;

		case "recAnnouncementSearch":
		//		if( $_REQUEST["confirmacao"] !=  $_SESSION['autenticagd']   ){
		//		    $ErroConfirm = "true";
		//		    $rot = "formAnnouncementSearch.php";
		//			break;
		//		}
		
				$publish = PUBLISH;			     
				if( $_REQUEST[name] ){

					$qry = "select name,mail,password,id from register where mail='".$_REQUEST['mail']."'"; 
					$result = fMySQL_Connect($qry);
					$dataUser = mysql_fetch_array( $result ) ;					
					$idUser = $dataUser[id];
					if( !$idUser ){
						$qry = "insert into register( name,mail , password ,datainc  ) values( \"".$_REQUEST["name"]."\",\"".$_REQUEST["mail"]."\", \"".$_REQUEST[password]."\", now() )";
						fMySQL_Connect($qry);
						
						$_SESSION["nameUser"] = $name;
						$idUser =  mysql_insert_id();
						$_SESSION["id"] =  $idUser;
						$_SESSION["mail"] = $_REQUEST["mail"];
						$_SESSION["nameUser"] = $_REQUEST["name"];
						
						$hash = base64_encode( $_REQUEST["name"]."".$_REQUEST["mail"]."".$idUser );
						$qry = "update register set	hash='$hash'  where id='".$idUser."'";
						fMySQL_Connect($qry);
					}else{
						$publish ="N";	
					}	
				}
				else{
					$idUser	 = $_SESSION["id"];
				}
						
				$price =   str_replace(".", "",  $_REQUEST["priceselling"]);
				$price =   str_replace(",", ".", $price);
				
				if( $publish != 'N' ){
					if($price< 100)
					   $price="";

					$qry = "insert into  announcement ( title,typecompany,sector,billing,description,datainc,status,typeannouncement,id_user,priceselling,numberemployee,conditionpart,zone,confidencial,price,www, publish, youtubelink )values( \"".$_REQUEST[txtSearch]."\",\"".$_REQUEST['typecompany']."\",".$_REQUEST[sector].",".$_REQUEST[billing].",\"".$_REQUEST['description']."\",now(),'V',\"".$_REQUEST[typeannouncement]."\" ,$idUser,\"".$price."\",\"".$_REQUEST["numberemployee"]."\",\"".$_REQUEST["conditionpart"]."\",\"".$_REQUEST["zone"]."\",'".$_REQUEST["confidencial"]."','".$price."',\"".$_REQUEST["www"]."\",'$publish')";
					fMySQL_Connect($qry);
					
					$idAnnouncement = mysql_insert_id();
					$viewMessagePostAnnounce = "true";
				}	
				if( !$dataUser[id] )				
					$rot = "inhome.php";
				else	
					$rot = "forgetPassword.php";
				
				break;
				
				
		case "updateAnnouncement":

				$price =   str_replace(".", "",  $_REQUEST["priceselling"]);
				$price =   str_replace(",", ".", $price);				
				
				$youtubelink = filter_var( $_REQUEST["youtubelink"], FILTER_SANITIZE_MAGIC_QUOTES);

				
				
				if($price< 100)
					   $price="";
	   
				$qry = sprintf( "update   announcement set  	
				                 title =\"".$_REQUEST["title"]."\",
								 typecompany=\"".$_REQUEST["typecompany"]."\",
								 sector='".$_REQUEST["sector"]."',	
								 billing=\"".$_REQUEST["billing"]."\",
								 description=\"".$_REQUEST["description"]."\",
								 youtubelink=\"".$youtubelink."\",				
								 priceselling=\"".$price."\",
								 numberemployee=\"".$_REQUEST["numberemployee"]."\",
								 conditionpart=\"".$_REQUEST["conditionpart"]."\",
								 zone=\"".$_REQUEST["zone"]."\",
								 confidencial='".$_REQUEST["confidencial"]."',
								 price='".$price."', 
								 dtmodify=now(),
								 datainc=now(),
								 www =\"".$_REQUEST["www"]."\" 
								 where id_user='".$_SESSION["id"]."' and  
								 id='%s'", mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );
								 
							
				fMySQL_Connect($qry);

				$rot = "inhome.php";
				break;

		case "viewAnnouncement":
				if($ismobi->CheckMobile()) {
					echo "<META HTTP-EQUIV='REFRESH' CONTENT=0;URL='http://www.negocioslucrativos.com.br/mobil/demos/docs/forms/view.php?id=$_REQUEST[id_adv]'>";
					exit;
				}

				$CONTROLSESSION = true;
				
				$qry = sprintf("select a.title,a.typecompany,a.sector,a.billing, 
				                 a.description,a.datainc,a.status,a.typeannouncement,
								 a.priceselling,a.numberemployee,a.conditionpart,a.zone,
								 a.viewcount,a.confidencial,r.name,r.phonemobile,r.phone,
								 a.price,a.www , a.youtubelink from announcement a, register r 
								 where  a.id_user =r.id and    a.id='%s'", mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );				
					
				$result = fMySQL_Connect($qry);
				$dataAnnouncement = mysql_fetch_array( $result ) ;

				$viewcount = ( $dataAnnouncement["viewcount"] +1 ) ;

				$rot = "viewAnnouncement.php";

				$qry = sprintf("update  announcement set viewcount=$viewcount where id='%s'", 
				mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );				

				$res = fMySQL_Connect($qry);
				break;
		case "sendMsg":
	
				require_once('PHPMailer51/class.phpmailer.php');
				$Email = new PHPMailer();
				$Email->SetLanguage("br");
				$Email->IsMail();

				$Email->IsHTML(true); 
				//$Email->Host =     "email-smtp.us-east-1.amazonaws.com";
				//$Email->isSMTP();
				//$Email->SMTPDebug = 0;
				//$Email->Hostname =     "email-smtp.us-east-1.amazonaws.com";   
				//$Email->Port = 587;
				//$Email->SMTPAuth   = true;
				//$Email->SMTPSecure =  "tls";
				//$Email->Username   = "AKIAQBGMQYEXEFKMZGAE";
				//$Email->Password   = "BPtDm+U0bPE+BQDa88HojniKst94FrFsHxhUveMz+16E"; 


                                // email do remetente da mensagem21.
				$Email->From = "contato@negocioslucrativos.com.br";
				$Email->CharSet           = 'UTF-8';
				$Email->Mailer            = 'mail';
				// nome do remetente do email
				$Email->FromName = 'NegociosLucrativos';
				$Email->Sender = "contato@negocioslucrativos.com.br";
		
				$qry = "select a.id_user,r.name,r.mail, a.title,a.typeannouncement from announcement  a,register r  where a.id='".$_REQUEST['id_adv']."' and a.id_user=r.id";

		         	$result = fMySQL_Connect($qry);
				$dataAnnouncementUser = mysql_fetch_array( $result ) ;
				$subjectMail = "Interessado sobre o anuncio ".$dataAnnouncementUser["title"]  ;
				$subject .= "Interessado sobre o anuncio ".$dataAnnouncementUser["title"].""   ;

				$msg .= $subject."<br><br><br>";

				$msg .= "Prezado ".$dataAnnouncementUser["name"]."  <br><br><br>"   ;

				$msg .= "Estamos direcionando para você um e-mail referente ao seu anúncio.<br>";
				$msg .= "Para visualizar a mensagem completa, por favor acesse o site,<br>  ";
				$msg .= "http://www.negocioslucrativos.com.br <br>";
				$msg .= "Digite seu login e senha e acesse o link  'Novas mensagens'<br><br>";


//				$msg .= "Nome: ".$_SESSION["nameUser"]."";
//				$msg .= "E-mail: ".$_SESSION["mail"]."";
				$msg .= "Mensagem: ".substr($_REQUEST["message"], 0, 7)." ....";

//				if( $_REQUEST["dddcom"] and	$_REQUEST["fonecom"] )
//					$msg .= "Fone (".$_REQUEST["dddcom"].")  ".$_REQUEST["fonecom"]."<hr>";

				$msg .=  "";
				$msg .= "<br><br> Atenciosamente <br>";
				$msg .= "http://www.negocioslucrativos.com.br<br>";
				$Email->AddAddress($dataAnnouncementUser["mail"]);
				$Email->Subject =    utf8_encode ( $subjectMail );
				$Email->Body .=  utf8_encode(   $msg );
				if(!$Email->Send()) {
					echo "A mensagem não foi enviada. <p>";
					echo 	"Erro: " . $Email->ErrorInfo;
				}
				
				$Email->Send();
				$qry = "insert into contatos ( id_userto,msg,datainc,id_userof ) values (  '";
				$qry .= $dataAnnouncementUser["id_user"]."','".$_REQUEST["message"]."',now(),'".$_SESSION["id"]."')";
				$result = fMySQL_Connect($qry);
				
				$Email->AddAddress("jceleste1@gmail.com");
				$Email->Send();

				$msg = 1;
				$rot = "msgSystem.php";
				break;

	case "listBusinessBuy":
		$dataAnnouncement["title"] = "Compra e venda de empresas franquias";
		break;
	case "listBusiness10More":
		$dataAnnouncement["title"] = "Compra e venda de empresas franquias";
		break;
	case "list":
		$dataAnnouncement["title"] = "Compra e venda de empresas franquias";
		break;
	case "backHome";
		$rot = "inhome.php";
		break;
	case "viewMatter";			
		$rot = "viewMatter.php";
		break;	
	case "image";
		$rot = "imageEnterprise.php";
		break;
	case "viewMessage";
		$rot = "viewMsg.php";
		break;
	case "msgList";
		$rot = "listMsg.php";
		break;
		
	case "login":
        	$erro = 1;

			$rot = "msgErro.php";
			
			$qry = sprintf( "select id,name,mail from
			register where mail='%s' 
			and password='%s'",mysql_real_escape_string( $_REQUEST['mail'] ),
			mysql_real_escape_string( $_REQUEST['password']),$conexao );
			$result = fMySQL_Connect($qry);
			
			$aUser = mysql_fetch_array( $result ) ;	
			if( $aUser[id]    ){


				header("Expires: -1");
				header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
				
				header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
				header("Cache-Control: post-check=0, pre-check=0", false);
				header("Pragma: no-cache");

				
				$_SESSION["nameUser"] = $aUser["name"];
				$_SESSION["id"] = $aUser["id"];
				$_SESSION["mail"] = $aUser["mail"];
				$rot = "inhome.php";


				header('Location: ./mvcAnnouncement.php?action=inhome');

			} 
			break;
		case "forgetPassword":
			$rot = "forgetPassword.php";
			break;
		case "forgetPassword1":

			$qry = sprintf( "select name,mail,password from 
			register where mail='%s'",
			mysql_real_escape_string($_REQUEST['mail'],$conexao) );
			
			$result = fMySQL_Connect($qry);
			if( mysql_num_rows($result ) ){
				$aUser = mysql_fetch_array( $result ) ;

				$msg = "Prezado Sr(a) ".$aUser["name"]." \n"; 
				$msg .= "Estamos lhe enviando a senha para acessar o site http://www.negocioslucrativos.com.br \n";
				$msg .= "Senha : ".$aUser["password"]." \n\n";
				$msg .= "Atenciosamente \n";
				$msg .= "Equipe http://negocioslucrativos.com \n";
			    $subject = "Senha de acesso  para o site negocioslucrativos.com.br";
				
				require_once('PHPMailer51/class.phpmailer.php');
				$Email = new PHPMailer();
				$Email->SetLanguage("br");
				$Email->IsMail();
				$Email->IsHTML(true); 
				$Email->From = "contato@negocioslucrativos.com.br";
				$Email->CharSet           = 'UTF-8';
				$Email->Mailer            = 'mail';
				// nome do remetente do email
				$Email->FromName = 'NegociosLucrativos';
				$Email->Sender = "contato@negocioslucrativos.com.br";
				
				$Email->AddAddress($aUser["mail"]);
				$Email->Subject =    utf8_encode ( $subject);
				$Email->Body =  utf8_encode(   $msg );
				if(!$Email->Send()) {
					echo "A mensagem não foi enviada. <p>";
					echo 	"Erro: " . $Email->ErrorInfo;
				}
				
		
				$rot = "msgSystem.php";
			} else{
				$erro = 3;
				$rot = "msgErro.php";
			}
			break;
		case "logger":
			$rot = "login.php";			
			break;
        case "home";
			
				$rot = "inhome.php";
			
			break;
		case "logout":
			$_SESSION["name"] = "";
			$_SESSION["id"] = "";
			$_SESSION["mail"] = "";
			$rot = "thank.php";
			break;
		case "loadData":
			$qry = "select * from register where id='".$_SESSION["id"]."'";
			$result = fMySQL_Connect($qry);
			$dataUser = mysql_fetch_array( $result ) ;
			$action = "updateDataUser";
			
			$rot = "register.php";
			break;

		case "updateDataUser":
			$qry = "update register set	name=\"".$_REQUEST[name]."\",		mail=\"".$_REQUEST[mail]."\" ,address= \"".$_REQUEST[address]."\",	numberaddress=\"".$_REQUEST[numberAddress]."\" ,	district=\"".$_REQUEST[district]."\",		zipcode=\"".$_REQUEST[zipcode]."\" ,	city=\"".$_REQUEST[city]."\" , state=\"".$_REQUEST[state]."\",	phonemobile=\"".$_REQUEST[phonemobile]."\"  ,		phone=\"".$_REQUEST[phone]."\"	where id='".$_SESSION["id"]."'";
			fMySQL_Connect($qry);
			

			$action = "updateDataUser";
			$rot = "inhome.php";			
			
			break;
        case "register":
		
            $erro = ""; 
			$qry = sprintf( "select mail from register where mail='%s'",
			mysql_real_escape_string($_REQUEST['mail'],$conexao) );
	
			$result = fMySQL_Connect($qry);
            $action = "register";
			$rot = "register.php";
		
			if(  mysql_num_rows($result )  ){
	                         $erro = 2;			
			}
			if( !$_REQUEST[password] or !$_REQUEST[password1]  )  {
					 $erro = 9;  
			}

			if( $_REQUEST[password]  !=  $_REQUEST[password1]    )  {
			   $erro = 5;
			 }  
			
			
			if(  $erro    )  {
			 
				$dataUser["name"] = $_REQUEST["name"] ;
				$dataUser["mail"] = $_REQUEST["mail"] ;
				$dataUser["numberAddress"] = $_REQUEST["numberAddress"] ;
				$dataUser["address"] = $_REQUEST["address"];
				$dataUser["district"] = $_REQUEST["district"];
				$dataUser["zipcode"] = $_REQUEST["zipcode"];
				$dataUser["city"] = $_REQUEST["city"];
				$dataUser["state"] = $_REQUEST["state"];
				$dataUser["phonemobile"] = $_REQUEST["phonemobile"];
				$dataUser["phone"] = $_REQUEST["phone"];
				$dataUser["phonemobile"] = $_REQUEST["phonemobile"];
				$dataUser["id_marketing"]  = $_REQUEST["id_marketing"];
			}
			if(! $erro ){
				$qry = "insert into register(	name,mail ,	address ,	numberaddress ,	district,zipcode ,	city ,	state,phonemobile ,	phone ,	cpfcnpj ,password ,datainc,tpclient,id_marketing,dateperday,viewperday,hash ) values( \"".$_REQUEST["name"]."\",\"".$_REQUEST["mail"]."\",\"".$_REQUEST[address]."\", \"".$_REQUEST[numberAddress]."\",\"".$_REQUEST[district]."\",\"".$_REQUEST[zipcode]."\",\"".$_REQUEST[city]."\" ,	\"".$_REQUEST[state]."\",\"".$_REQUEST[phonemobile]."\" ,	\"".$_REQUEST[phone]."\" ,	\"".$_REQUEST[cpfcnpj]."\" ,\"".$_REQUEST[password]."\", now(),'".$_REQUEST[tpclient]."','".$_REQUEST[id_marketing]."',now(),100,'' )";
				fMySQL_Connect($qry);	
				$idUser = mysql_insert_id();

				$hash = base64_encode( $_REQUEST["name"]."".$_REQUEST["mail"]."".$idUser);
				$qry = "update register set	hash='$hash'  where id='".$idUser."'";
				fMySQL_Connect($qry);		


				$_SESSION["nameUser"] = $name;
				$_SESSION["id"] = $idUser;
				$_SESSION["mail"] = $_REQUEST["mail"];
				$rot = "inhome.php";
			}
			break;
	
		case "registerUser":
		    $nlista_state1 = $classCommons->state();
		
		
			$rot = "register.php";
			$action = "register"; 
			break;	
	
		case "contact":
			$rot = "contato.php";
			break;
		case "contact1":
			$rot = "contato1.php";
			break;
		
		case "forgetPassword":
			$rot = "forgetPassword.php";
			break;			
		case "TermodeUso":
			$rot = "TermodeUso.html";
			break;			

		case "condicao":
			$rot = "condicao.php";
			break;		
	
	}
	if( !$rot )
		$rot = $_REQUEST["action"].".php";


	include("checkSession.php")	;

	include("nlTemplate.php");







?>
