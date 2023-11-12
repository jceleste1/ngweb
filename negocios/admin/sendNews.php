<font color=darkred size=5>Aguarde.....enviando....</font>
<?php 

require_once('../PHPMailer51/class.phpmailer.php');

$qry = "select  subject,  dateEdition , matter, send from newsletters where  idEdition=$_REQUEST[idEdition]";
$result = fMySQL_Connect($qry);
$dataNews = mysql_fetch_array( $result ) ; 


$msg  ="<html>";
$msg .="<body>";
$msg .="<table   width='100%' cellpadding='20' cellspacing='3' align='center' border=0  bgcolor=white>";
$msg .="<tr>";
$msg .="<td>";
$msg .="<table  width='100%' border=0>";
$msg .="<tr>";
$msg .="<td colspan=2><b><a href=http://www.negociosLucrativos.com.br><font color=darkgreen size=3>www.negociosLucrativos.com.br</a></font></b></td>";
$msg .="</tr>";
$msg .="<tr><td  colspan=2><font color=darkgreen>";
$matter  = $dataNews[matter]."\n\n";
$matter  = ereg_replace("\n", "<br>", $matter);
$matter  = putId($matter,$data[id]);
$msg .= $matter;
$msg .=	"</font> </td></tr>";


$msg .=	"</table>";
$msg .=	"</td>";
$msg .=	"</tr>";
$msg .=	"</table>";
$msg .=	"</td>";
$msg .=	"</tr>";
$msg .=	"</table>";
$msg .="</body>";
$msg .="</html>";




$x = 0;


$email_testar = "jceleste1@gmail.com";
$qry_testar = " " ;
if( $_REQUEST["testar"] ){ 
	$qry_testar = " limit 0,1 " ;    
}
if( $_REQUEST["emailt"] )
	$email_testar = $_REQUEST["emailt"]; 

$qry = "SELECT  name, mail,id FROM register $qry_testar ";

$result = fMySQL_Connect($qry);
$count = 0;
while(	$data = mysql_fetch_array( $result )  )
{
	// faço a chamada da classe12.
	$Email = new PHPMailer();

	$Email->IsHTML(true); 
	
	// $Email->Host =     "email-smtp.us-east-1.amazonaws.com";
	// $Email->isSMTP();
	// $Email->SMTPDebug = 0;
	// $Email->Hostname =     "email-smtp.us-east-1.amazonaws.com";   
	// $Email->Port = 587;
	// $Email->SMTPAuth   = true;
	// $Email->SMTPSecure =  "tls";
	// $Email->Username   = "AKIAQBGMQYEXEFKMZGAE";
	// $Email->Password   = "BPtDm+U0bPE+BQDa88HojniKst94FrFsHxhUveMz+16E"; 

	// na classe, há a opção de idioma, setei como br14.
	$Email->SetLanguage("br");

	$Email->From = "contato@negocioslucrativos.com.br";
	$Email->CharSet           = 'UTF-8';
	//$Email->Mailer            = 'smtp';
	$Email->Mailer            = 'mail';
	
	// nome do remetente do email
	$Email->FromName = 'NegociosLucrativos';
	$Email->Sender = "contato@negocioslucrativos.com.br";

	// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
	
	if( !$_REQUEST["testar"] ) {
		$Email->AddAddress($data['mail']);
	}else{
		$Email->AddAddress($email_testar);
	}

	

	// informando no email, o assunto da mensagem
	$Email->Subject = $dataNews[subject];
	// Define o texto da mensagem (aceita HTML)

	$Email->Body .=   eregi_replace("[\]",'',$msg );



	$sele = "";
	
	if(!$Email->Send()) {
		echo "A mensagem não foi enviada. <p>";
		echo 	"Erro: " . $mail->ErrorInfo;
	}else{
	//	$qry = "update newsreaderTest   set  send='S' where  id=$data[id] 	";
	//	fMySQL_Connect($qry);
		$count = $count + 1;
	}
	$x++;
}

echo "<br><br><font color=darkred size=5>Finalizando.....</b><br>";
//$qry = "select count(*) sent from newsreaderTest where  send='S'";
//$result = fMySQL_Connect($qry);	
//$dataSent = mysql_fetch_array( $result );

if( !$_REQUEST["testar"] ) { 
	$qry = "update newsletters set status='E',sent='$count'  where  idEdition=$_REQUEST[idEdition]";
	$result = fMySQL_Connect($qry);
}

function putId($text,$id)
{
//	$pos = strpos($text,"idUser") ;
//	return substr( $text,0, $pos ).$id.substr( $text, $pos+6, strlen($text) ) ;

	return	eregi_replace("idUser", "$id", $text);
}




function temAnuncio(){



}


?>

<META HTTP-EQUIV='REFRESH' content="0;URL='index.php?rot=listNews'>