<?


class classNews {



	  function classNews(){
	  }




	  function dataNews( $idEdition ){
		  $qry = "select  subject,  dateEdition , matter, matterDefault ,send from newsletters where idEdition=$idEdition";
		  $result = fMySQL_Connect($qry);
		  $dataNews = mysql_fetch_array( $result ) ;
		  return $dataNews;
	  }



	  function dataRead(){
		  $qry = "SELECT  nome, mail,id FROM newsreaderTest  where  send='N'";
		  $result = fMySQL_Connect($qry);
		  return $result;
	  }


	  function send(){


		  $dataNews = this->dataNews($idEdition);

		  $result = this->dataRead();
		  while(	$data = mysql_fetch_array( $result )  )
		  {

				// fa�o a chamada da classe12.
				$Email = new PHPMailer();

				// na classe, h� a op��o de idioma, setei como br14.
				$Email->SetLanguage("br");

				// esta chamada diz que o envio ser� feito atrav�s da fun��o mail do php. Voc� mudar para sendmail, qmail, etc
				// se quiser utilizar o programa de email do seu unix/linux para enviar o email17.

				$Email->IsMail();


				// ativa o envio de e-mails em HTML, se false, desativa.19.
				$Email->IsHTML(true);

				// email do remetente da mensagem21.
				$Email->From = "negocioslucrativos@brasilforte.com.br";


				$Email->CharSet           = 'UTF-8';

				// nome do remetente do email
				$Email->FromName = $data[nome];

				// Endere�o de destino do emaail, ou seja, pra onde voc� quer que a mensagem do formul�rio v�?

				$Email->AddAddress("jceleste1@gmail.com");
			 	 //	$Email->AddAddress($data['mail']);

				// informando no email, o assunto da mensagem
				$Email->Subject = $dataNews[subject];
				// Define o texto da mensagem (aceita HTML)


				$msg = "<html><body  width=600px><img sr='http://www.negocioslucrativos.com/img/top_logo.gif'>";
				$msg  = $dataNews[matter]."\n\n";
				$msg  = ereg_replace("\n", "<br>", $msg);
				$msg  =  putId($msg,$data[id]);
				$Email->Body .=   eregi_replace("[\]",'',$msg );
				$msg = "</body></html>";

				// verifica se est� tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
				if(!$Email->Send()) {
					echo "A mensagem n�o foi enviada. <p>";
					echo 	"Erro: " . $mail->ErrorInfo;
				}else
				{
					$qry = "update newsreaderTest   set  send='S' where  id=$data[id] 	";
					fMySQL_Connect($qry);
				}
				$x++;
			}

	  }



?>