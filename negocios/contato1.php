<?php

	$headers  = "From: ".$_REQUEST[nm_contato]."<".$_REQUEST[email].">\n\r";
	$headers .= "To: Negocios Lucrativos <jceleste1@gmail.com>\n\r";

	$msg = "Contato Atraves de Negocios Lucrativos. ";

 
	$msg .= " Empresa  : ".$_REQUEST[nm_empresa];
	$msg .= " Contato  : ".$_REQUEST[nm_contato];
	$msg .= " Email    : ".$_REQUEST[email];
	$msg .= " Fone de Contato :  ".$_REQUEST[dddcom]." ".$_REQUEST[fonecom]." Ramal : ".$_REQUEST[ramal_com];
	$msg .= " Assunto : ".$_REQUEST[assunto];
	
	
	require_once('PHPMailer51/class.phpmailer.php');
	$Email = new PHPMailer();
	$Email->SetLanguage("br");
	$Email->IsMail();


	$Email->IsHTML(true); 
	//$Email->Host =     "email-smtp.us-east-1.amazonaws.com";
	//$Email->isSMTP();
	//$$Email->SMTPDebug = 0;
	//$$Email->Hostname =     "email-smtp.us-east-1.amazonaws.com";   
	//$$Email->Port = 587;
	//$$Email->SMTPAuth   = true;
	//$$Email->SMTPSecure =  "tls";
	//$$Email->Username   = "AKIAQBGMQYEXEFKMZGAE";
	//$$Email->Password   = "BPtDm+U0bPE+BQDa88HojniKst94FrFsHxhUveMz+16E"; 


					// email do remetente da mensagem21.
	$Email->From = "contato@negocioslucrativos.com.br";
	$Email->CharSet           = 'UTF-8';
	$Email->Mailer            = 'mail';
	// nome do remetente do email
	$Email->FromName = 'NegociosLucrativos';
	$Email->Sender = "contato@negocioslucrativos.com.br";
	$Email->AddAddress("jceleste1@gmail.com");
	
	$Email->Subject =    utf8_encode ( "Contato Negocios Lucrativos");
	$Email->Body .=  utf8_encode(   $msg );
	if(!$Email->Send()) {
		echo "A mensagem não foi enviada. <p>";
		echo 	"Erro: " . $Email->ErrorInfo;
	}

   echo "<br><br><br><br><br><br><center><b>Seus dados foram enviados com sucesso<br><br>Em breve entraremos em contato<br><br>Atenciosamente<br><br><br>http://www.negocioslucrativos.com</b>";



?>				


