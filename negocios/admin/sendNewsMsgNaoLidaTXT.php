<font color=darkred size=5>Aguarde.....enviando....</font>
<?php 

require_once('../config.inc');
require_once('../PHPMailer51/class.phpmailer.php');







$x = 0;


$qry = "SELECT id_userto, COUNT( id_userto ) mailOportunidade FROM contatos WHERE dateread IS NULL GROUP BY id_userto limit 0,1";

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
	$Email->IsHTML(false); 

	// email do remetente da mensagem21.
	$Email->From = "jceleste1@gmail.com";
	 $Email->CharSet           = 'UTF-8';
    $Email->Mailer            = 'smtp';
	// nome do remetente do email
	$Email->FromName = 'Negocios Lucrativos';

	// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
	
	
	$qry = "SELECT  name, mail,id FROM register  where id=".$data['id_userto'];
    $resultRegister = fMySQL_Connect($qry);
	$dataRegister = mysql_fetch_array(  $resultRegister  );
	echo "enviando para ".$dataRegister['mail']."<hr>";
	//$Email->AddAddress($dataRegister['mail']);
	
	$Email->AddAddress("jceleste1@gmail.com");
	
	
	$Email->Subject = "Sobre sua proposta de negócio";
   
	

	if( $data["mailOportunidade"] > 0 ){
		$interessado = "interessados";
	}else{	
		$interessado = "interessado";
	}
	

	$msg .="Voce tem exatamente ".$data["mailOportunidade"]." $interessado sobre o seu anuncio publicado em NegociosLucrativos.com.br \n\r";
	

	$msg .="Acesse www.negocioslucrativos.com.br para saber mais.... \n\r";
	
	
	// Define o texto da mensagem (aceita HTML)

	$Email->Body .= $msg;



	$sele = "";
	
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


