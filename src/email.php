<?
	include("config.inc");

	$qry = "SELECT name m, mail  FROM `register` ";
	// echo $qry;
	$result2 = fMySQL_Connect($qry);	
	$_rows_ = mysql_num_rows($result2);
	
	
 exit;

$msg = "Informamos aos usuarios que o site http://www.negocioslucrativos.com.br esta disponivel para \n\r";
$msg .= "para que voce possa usa-lo para fazer um otimo negocio !!! \n\r";
$msg .= "Outra informacao muito importante para quem possa interessar, e que o site http://wwww.negocioslucrativos.com.br \n\r";
$msg .= "esta disponivel para venda.\n\r";
$msg .= "Atenciosamente \n\r  \n\r\n\r";
$msg .= "Jose Celeste \n\r";
$msg .= "jceleste1@gmail.com \n\r";
$msg .= "Tel 11 98248-3175 \n\r";
 
	
	for ($i=0;$i<$_rows_;$i++)   {
			$line=mysql_fetch_assoc($result2);
		
			
			$headers  = "From: Jose Celeste <jceleste1@gmail.com> \n\r";
			$headers .= "To:  $line[m] <$line[mail]> \n\r";

			$msgOla = "Ola  $line[m]\n\r";
			$msgOla .= $msg ;
			
			
			@mail(  $line[mail] ,"Noticia Importante NegociosLucrativos.com.br",$msgOla,$headers );
	
			echo "Enviando $line[m]  -  email $line[mail]<hr>";
			$repetidos++;
		
	}

echo "repetidos $repetidos<hr>";
?>