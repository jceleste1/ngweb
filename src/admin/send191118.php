<font color=darkred size=5>Aguarde.....enviando....</font>
<?php 

require_once('../config.inc');
require_once('../PHPMailer51/class.phpmailer.php');

set_time_limit(0);





$qry = "SELECT mail,name FROM maillist where `datainc` = '2018-12-05' and allowed = 'Y'";

$result = fMySQL_Connect($qry);
$count = 0;
while(	$data = mysql_fetch_array( $result )  )
{
	// faço a chamada da classe12.
	$Email = new PHPMailer();

	// na classe, há a opção de idioma, setei como br14.
	$Email->SetLanguage("br");

	// esta chamada diz que o envio será feito através da função mail do php. Você mudar para sendmail, qmail, etc 
	// se quiser utilizar o programa de email do seu unix/linux para enviar o email17.

	$Email->IsMail(); 


	// ativa o envio de e-mails em HTML, se false, desativa.19.
	$Email->IsHTML(true); 

	// email do remetente da mensagem21.
	$Email->From = "contato@negocioslucrativos.com.br";
	 $Email->CharSet           = 'UTF-8';
    $Email->Mailer            = 'NegociosLucrativos.com.br';
	// nome do remetente do email
	$Email->FromName = 'NegociosLucrativos.com.br';

	// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
	
	
	$Email->AddAddress($data['mail']);
	//$Email->AddAddress("jceleste1@gmail.com");
	
	
	
	$Email->Subject = "NegociosLucrativos à vista";
   
	
	$msg  ="<html>";
	$msg .="<body>";
    $msg .="<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />";

	$msg .="<table   width='100%' cellpadding='20' cellspacing='3' align='center' border=0  bgcolor=white>";
	$msg .="<tr>";
	$msg .="<td>";
	$msg .="<table  width='100%' border=0>";
		
	$msg .="<tr><td  colspan=2>Bom dia ". $data['name']."</td></tr>";
	
	
	$msg .="<tr><td  colspan=2>2019 está se aproximando, mais ainda há tempo para fazer bons negócios em 2018.</td></tr>";
	
	$msg .="<tr><td  colspan=2>NegociosLucrativos.com.br é um site de classificados de compra e venda de empresas,</td></tr>";
	$msg .="<tr><td  colspan=2>com milhares de oportunidades de negócios.</td></tr>";
	
	
	$msg .="<tr><td  colspan=2><a href=http://www.negociosLucrativos.com.br>";
	$msg .="Acesse http://www.negocioslucrativos.com.br para saber mais.... ";
	$msg .= "</a></td></tr>";
	
	$msg .="<tr><td colspan=2></td></tr>";
	$msg .="<tr><td colspan=2></td></tr>";
	$msg .="<tr><td colspan=2></td></tr>";
	$msg .="<tr><td colspan=2></td></tr>";
	
	$msg .="<tr><td colspan=2>Caso não queria mais receber nossas notificações, por favor <a href=www.negocioslucrativos.com.br/admin/retirar.php?mail=".$data['mail'].">clique aqui</a></td></tr>";
		

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

	$Email->Body .=   eregi_replace("[\]",'',$msg );



	$sele = "";
	
	if(!$Email->Send()) {
		echo "A mensagem não foi enviada. <p>";
		echo 	"Erro: " . $mail->ErrorInfo;
		$count = $count + 1;
	

	}
	  echo  "Send email ...aguarde....<hr>";
	 flush();
	
	
	
}

echo "<b>Finalizando.....Enviado $count </b><br>";




?>


