<?
echo "Processando<hr>";
flush();

$msg = "Bom dia

Estamos lançando o site Negocios Lucrativos, uma ótima ferramenta
que lhe ajudara encontrar a oportunidade certa para comprar ou
vender empresas.

Todo o sistema funciona de forma GRATUITA, oferecendo a oportunidade
de você entrar em contato com empresarios de todo o Brasil de forma
segura e sigilosa.

Possuimos sistemas que através de buscas conceituais na internet,
informam empresários que querem investir,adquirir ou vender empresas.


Fora isso estamos investindo em divulgação, para tornar o
site NegociosLucrativos.com, num grande portal de negocios.


Contamos com sua presença no site  NegociosLucrativos.com

Acesse
http://www.negocioslucrativos.com



Atenciosamente


Equipe NegociosLucrativos.com";



$AemailEnviados  = array();
include("emailEnviados.php");
$Aemail = explode("\n",$emailEnviados);
while( list( $key,$email ) = each($Aemail) ) {
	$email= trim($email);
	$AemailEnviados[$email] = $email;
}



include("emailEnviados1.php");
$Aemail = explode("\n",$emailEnviados);
while( list( $key,$email ) = each($Aemail) ) {
	$email= trim($email);
	$AemailEnviados[$email] = $email;
}




include("emailEnviados3.php");
$Aemail = explode("\n",$emailEnviados);
while( list( $key,$email ) = each($Aemail) ) {
	$email= trim($email);
	$AemailEnviados[$email] = $email;
}


include("emailEnviados4.php");
$Aemail = explode("\n",$emailEnviados);
while( list( $key,$email ) = each($Aemail) ) {
	$email= trim($email);
	$AemailEnviados[$email] = $email;
}


include("emailEnviados5.php");
$Aemail = explode("\n",$emailEnviados);
while( list( $key,$email ) = each($Aemail) ) {
	$email= trim($email);
	$AemailEnviados[$email] = $email;
}


include("emailEnviados6.php");
$Aemail = explode("\n",$emailEnviados);
while( list( $key,$email ) = each($Aemail) ) {
	$email= trim($email);
	$AemailEnviados[$email] = $email;
}

include("emailEnviados7.php");
$Aemail = explode("\n",$emailEnviados);
while( list( $key,$email ) = each($Aemail) ) {
	$email= trim($email);
	$AemailEnviados[$email] = $email;
}




$AemailEnviar = array();
include("emailEnviar.php");
$Aemail = explode("\n",$emailEnviar);
while( list( $key,$email ) = each($Aemail) ) {
	$email= trim($email);
	$AemailEnviar[$email] = $email;
}




reset($AemailEnviar);
$x = 1;
while( list( $key,$email ) = each($AemailEnviar) ) {

	$findme   = 'catho.com.br';
	$pos = strpos($email, $findme);

	$email = strtolower( $email );
	echo $email."<hr>";
	if( !$AemailEnviados[$email]  and !$pos  ) {	
		$headers  =  "To:<$email>\n";
		$headers  .=  "From: José Celeste <joseceleste@brasilforte.com.br>\n";

		mail($email,"Negocios Lucrativos",$msg,$headers );
		echo "$email<hr>";
		flush();
		$x++;
	}
}


echo "<STRONG><CENTER>FIM DO ENVIO $x</CENTER></STRONG>";

?>