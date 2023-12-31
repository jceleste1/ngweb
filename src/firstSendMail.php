<?
include("config.inc");


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


if( !$_REQUEST["faixa"] )
	$faixa = 0;


$qry = "select count(*)  from pessoajuridicatemp5";
echo $qry;
$result = fMySQL_Connect($qry);	
List( $rows )= mysql_fetch_row($result);


$qry = "select email   from pessoajuridicatemp5  limit $faixa,4000 ";
$result = fMySQL_Connect($qry);	
$rowsLimit = mysql_num_rows($result);

for ($i=0;$i<$rowsLimit;$i++)   {
	$line=mysql_fetch_assoc($result);

	$email = $line["email"];
	$findme   = 'catho.com.br';
	$pos = strpos($email, $findme);
	$email = strtolower( $email );

	if( $email and !$pos  ) {	
		$headers  =  "To:<$email>\n";
		$headers  .=  "From: José Celeste <joseceleste@brasilforte.com.br>\n";

		mail($email,"Negocios Lucrativos",$msg,$headers );
		echo "$x - $email<hr>";
		flush();
		$x++;
	}
}


$faixa = $_REQUEST["faixa"]+5000;
registerFaixa($faixa);

if(  $_REQUEST["faixa"] < $rows ){
 	 echo "<center><strong>TOTAL DE ENVIOS $x</strong></center>";
	 echo "<META HTTP-EQUIV='REFRESH' CONTENT=10;URL='sendEmailDB.php?faixa=$faixa'>";
}else
	echo "<center><strong>FIM DO PROCESSAMENTO</strong></center>";




function registerFaixa($faixa){
	   $somecontent = "Vai processar a faixa ".$faixa;    
	   $handle = fopen("faixa.txt", 'wb');    
        // Escrevendo $somecontent para o arquivo aberto.
	   if (!fwrite($handle, $somecontent)) {
		   print "Erro escrevendo no arquivo ($filename)";
	       exit;
	   }
        fclose($handle);
}

?>





