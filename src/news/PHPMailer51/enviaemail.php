<?
// chamada da classe phpmailer2.

require_once('class.phpmailer.php');
// resgatando os dados passados pelo form5.

$nomeusuario = $_POST['nome'];
$emailusuario = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['msg'];

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

$Email->From = $emailusuario;

// nome do remetente do email

$Email->FromName = $nomeusuario;
// Endere�o de destino do emaail, ou seja, pra onde voc� quer que a mensagem do formul�rio v�?

$Email->AddAddress("jceleste1@gmail.com");

// informando no email, o assunto da mensagem




$Email->Subject = $assunto;
// Define o texto da mensagem (aceita HTML)





$Email->Body .=   eregi_replace("[\]",'',$mensagem);



// verifica se est� tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.

if(!$Email->Send()) {
	echo "A mensagem n�o foi enviada. <p>";
echo 
	"Erro: " . $mail->ErrorInfo;
	}











?>

Processando