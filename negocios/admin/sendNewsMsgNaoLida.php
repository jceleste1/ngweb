<font color=darkred size=5>Aguarde.....enviando....</font>
<?php 
set_time_limit(0);
require_once("../rds.conf.php");
require_once('../config.inc');
require_once('../PHPMailer51/class.phpmailer.php');



$x = 0;


$qry = "SELECT id_userto, COUNT( id_userto ) mailOportunidade FROM contatos WHERE dateread IS NULL GROUP BY id_userto";

$result = fMySQL_Connect($qry);
$count = 0;
while(	$data = mysql_fetch_array( $result )  )
{
	// faço a chamada da classe12.
	$Email = new PHPMailer();

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
	
	$qry = "SELECT  name, mail,id FROM register  where id=".$data['id_userto'];
    $resultRegister = fMySQL_Connect($qry);
	$dataRegister = mysql_fetch_array(  $resultRegister  );
	echo "enviando para ".$dataRegister['mail']."<hr>";
	$Email->AddAddress($dataRegister['mail']);
	$Email->Subject = "Sobre sua proposta de negócio";
   
	
	$msg  ="<html>";
	$msg .="<body>";
	$msg .="<table   width='100%' cellpadding='20' cellspacing='3' align='center' border=0  bgcolor=white>";
	$msg .="<tr>";
	$msg .="<td>";
	$msg .="<table  width='100%' border=0>";
	
	$msg .="<tr><td  colspan=2></td></tr>";
	
	$msg .="<tr>";
	$msg .="<td colspan=2><b><a href=http://www.negociosLucrativos.com.br><font color=darkgreen size=3>www.negociosLucrativos.com.br</a></font></b></td>";
	$msg .="</tr>";
	$msg .="<tr><td  colspan=2><a href=http://www.negociosLucrativos.com.br><font color=darkgreen>";
	
	if( $data["mailOportunidade"] > 0 ){
		$interessado = "interessados";
	}else{	
		$interessado = "interessado";
	}
	
	$msg .="<tr><td  colspan=2></td></tr>";
	$msg .="<tr><td  colspan=2></td></tr>";
	$msg .="Voce tem exatamente <b>".$data["mailOportunidade"]."</b> $interessado sobre o seu anuncio publicado em NegociosLucrativos.com.br ";
	$msg .= "</font> </a></td></tr>";
	
	$msg .="<tr><td  colspan=2></td></tr>";
	
	$msg .="<tr><td  colspan=2><a href=http://www.negociosLucrativos.com.br><font color=darkgreen>";
	$msg .="Acesse www.negocioslucrativos.com.br para saber mais.... ";
	$msg .= "</font> </a></td></tr>";
	
	$msg .="<tr><td  colspan=2 >";
	$msg .="<b>BAIXE O APP NegociosLucrativos</b>";
	$msg .="<a href=https://play.google.com/store/apps/details?id=com.br.negocioslucrativos.mob> <img src=https://www.negocioslucrativos.com.br/imagens/googleplay.png></a></td>";
	$msg .="</tr>";
	
	//$msg .="<tr><td  colspan=2>Voce postou as  seguintes oportunidades  em NegociosLucrativos.com.br</td></tr>";
	//$qry = "SELECT title  FROM  announcement where id_user=".$data["id_userto"];
	//$resultAnnoun = fMySQL_Connect($qry);
	//while/	$dataAnnoun = mysql_fetch_array($resultAnnoun) ) {
//$msg .="<tr><td  colspan=2>".$dataAnnoun["title"]."</td></tr>";
	//}
	
		

	$msg .=	"</table>";
	$msg .=	"</td>";
	$msg .=	"</tr>";
	$msg .=	"</table>";
	$msg .=	"</td>";
	$msg .=	"</tr>";
	$msg .=	"</table>";
	$msg .="</body>";
	$msg .="</html>";	
		
	
	// Define o texto da mensagem (aceita HTML)

	$Email->Body .=   eregi_replace("[\]",'',   utf8_encode( $msg ) );



	$sele = "";
	echo "Enviando .... $count";
	flush();
	
	if(!$Email->Send()) {
		echo "A mensagem não foi enviada. <p>";
		echo 	"Erro: " . $mail->ErrorInfo;
	//}else
	//{
	//	$qry = "update newsreaderTest   set  send='S' where  id=$data[id] 	";
	//	fMySQL_Connect($qry);
		$count = $count + 1;

	}
	$x++;
}

echo "<b>Finalizando.....</b><br>";




?>


