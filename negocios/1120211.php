<?php


header('Content-Type: text/html; charset=ISO-8859-1');

include("rds.conf.php"); 
include("config.inc");
include("commons/classCommons.php");
$classCommons = new classCommons();
$aSector = $classCommons->aSector();
$aTypecompany  = $classCommons->aTypecompany();
include('PHPMailer51/class.phpmailer.php');



$Email = new PHPMailer();

$Email->IsHTML(true); 
$Email->Host =     "email-smtp.us-east-1.amazonaws.com";
$Email->isSMTP();

$Email->SMTPDebug = 0;
$Email->Hostname =     "email-smtp.us-east-1.amazonaws.com";   
$Email->Port = 587;

$Email->SMTPAuth   = true;
$Email->SMTPSecure =  "tls";

$Email->Username   = "AKIAQBGMQYEXEFKMZGAE";
$Email->Password   = "BPtDm+U0bPE+BQDa88HojniKst94FrFsHxhUveMz+16E"; 

// na classe, h? op? de idioma, setei como br14.
$Email->SetLanguage("br");

$Email->From = "contato@negocioslucrativos.com.br";
$Email->CharSet           = 'UTF-8';
$Email->Mailer            = 'mail';
// nome do remetente do email
$Email->FromName = 'NegociosLucrativos';
$Email->Sender = "contato@negocioslucrativos.com.br";

// Endere?de destino do emaail, ou seja, pra onde voc?uer que a mensagem do formul?o v?

$Email->AddAddress("jceleste1@gmail.com" );


$message =  "ACESSOU ".$_SERVER["REMOTE_ADDR"];

// informando no email, o assunto da mensagem
$Email->Subject = $message;
// Define o texto da mensagem (aceita HTML)

$Email->Body .=   eregi_replace("[\]",'',$message );

$Email->Send();







$datainc = '2021-10-01';


$qry =   "select a.id,a.title,a.sector,a.typecompany,a.priceselling,a.price, a.datainc from announcement a where ";
$qry .= "  ( a.datainc > '$datainc' ) order by datainc desc";

$result = fMySQL_Connect($qry);	


$rows = mysql_num_rows($result);
if( $rows ){

	
?>


<table width="100%" cellpadding="1" cellspacing="3" border="0" align="center">
<tr><td bgcolor='white' align=left colspan=6><a href='http://www.negocioslucrativos.com.br/mvcphp.php?action=condicao'>
<font color=darkred size=3>Termo de uso</a></td></tr>
<tr><td bgcolor='white' align=center colspan=6>
<div id="divGoogl" style=' text-align:center; float:center; clear:both;'>
	<a href="https://accounts.binance.com/pt-BR/register?ref=294512525"><img src="../imagens/cripto.gif"></a>
	

</td></tr>

<tr>
	<td bgcolor='white' colspan='4' align=center><font color=darkgreen size=3><b>Oportunidades de negócios de outubro de 2021 - www.negocioslucrativos.com.br</b></font></td>
	<td bgcolor='white' colspan='2' align='right'>	&nbsp;

	</td>

	
</tr>

<tr>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Anúncio</font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Setor</font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Atividade da Empresa</font> </td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Valor</font> </td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328">Data</font> </td>
</tr>

<?php

for ($i=0;$i<$rows;$i++)   {
	 $line=mysql_fetch_assoc($result);
	 $font = "<font color='#24486C'>";
	 $bgcolor = " bgcolor='#FDFDFD'";
	 if( ($i%2)==0)  {
		 $bgcolor = " bgcolor='#E9ECF7'";
	 	 $font = "<font color='#24486C'>";
	 }

	  $price =  $line["priceselling"];
	 if( $line[price] != 0 )
	 {
		 $price =   number_format($line[price], 2, ',', '.'); 
     }

	 $ahref= "<a href=mvcAnnouncement.php?action=viewAnnouncement&id_adv=".$line["id"]."><font color=darkgreen>";

	 echo "<tr height='35 px'>";
	 echo "<td $bgcolor> $ahref ".$line["title"]."</font></a></td>";
	 echo "<td $bgcolor> $ahref ".$aSector[$line["sector"]]."</font></a></td>";
	 echo "<td $bgcolor> $ahref ".$aTypecompany[$line["typecompany"]]."</font></a></td>";
	 echo "<td $bgcolor> $ahref ".$price."</font></a></td>";
	 
	  echo "<td $bgcolor> $ahref ".substr( $line[datainc], 8,2 )."-".substr( $line[datainc], 5,2 )."-".substr( $line[datainc], 0,4 )."</font></a></td>";
	 echo "</tr>";
}
?>

<tr>
	<td colspan='4' bgcolor='white'>&nbsp;</td>
</tr>

</table>

<?php }?>