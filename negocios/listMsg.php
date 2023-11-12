
<link rel="stylesheet" href="pagging.css">
<center>
<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  width='100%'>
  <tr>
	<td bgcolor='white' colspan='4'>&nbsp;</td>
 </tr>
  <tr>
	  <td bgcolor='white' colspan='4' align=center>
			<script type="text/javascript"><!--
		google_ad_client = "pub-3882370773203656";
		google_ad_width = 468;
		google_ad_height = 60;
		google_ad_format = "468x60_as";
		google_ad_type = "text_image";
		google_ad_channel = "";
		//-->
		</script>
		<script type="text/javascript"
		  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>	   
	   </td>
	</tr>
</table>
<br/><br/>
<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  cellpadding="1" cellspacing="3"   width='100%'>
<form action='mvcAnnouncement.php' method='post'>
<input type='hidden' name='action' value='listBusinessBuy'>



<?php
$registrosPorPagina = 10;
$registroInicial = 0;
$ultimoRegistro = 0;
/*
 if($_POST[typeMsg] =='sent' )
	$qry = "SELECT  c.id,r.name,r.mail, c.msg, r.phone, r.phonemobile,c.datainc,c.msg 
	FROM contatos c, register r
	where c.id_userof = r.id  and c.id_userto =".$_SESSION["id"]." and c.dateread is not null order by c.datainc desc ";
	
else
	$qry = "SELECT 
	               c.id,r.name,r.mail, c.msg, r.phone,
	               r.phonemobile,c.datainc,c.msg 
	FROM 
	      contatos c, register r 
	where 
	       c.id_userto = r.id and 
	       c.id_userof =$_SESSION[id] order by c.datainc desc";
*/

$qry = "SELECT  c.id,r.name,r.mail, c.msg, r.phone, r.phonemobile,c.datainc,c.msg 
	FROM contatos c, register r
	where c.id_userof = r.id  and c.id_userto =".$_SESSION["id"]."  order by c.datainc desc ";

// echo $qry;
$result2 = fMySQL_Connect($qry);	
$_rows_ = mysql_num_rows($result2);

?>


<tr>
	<td bgcolor='white' colspan=3 align=center><font class='tituloAdv'>Total de mensagens <?=$_rows_?> recebidas</font></td>	

	
</tr>


<tr>
	<td bgcolor='white' height='45 px'><font class='subtitulo3'>Nome do empresario</font></td>	
	<td bgcolor='white' height='45 px'><font class='subtitulo3'>Data da Mensagem</font> </td>
	<td bgcolor='white' height='45 px'><font class='subtitulo3'>Mensagem</font> </td>
	
</tr>


<?php


for ($i=0;$i<$_rows_;$i++)   {
	 $line=mysql_fetch_assoc($result2);

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

	  

	 $ahref= "<a href='mvcAnnouncement.php?action=viewMessage&idMsg=".$line["id"]."'>";

	 echo "<tr height='35 px'>";
	 echo "<td $bgcolor> $ahref ".$line["name"]."</a></td>";
		
	 echo "<td $bgcolor> $ahref ".format_date($line["datainc"])."</a></td>";

 	 echo "<td $bgcolor> $ahref <img src='../imagens/lupa.jpg' alt='Clique aqui para ver a mensagem' border='0'></a></td>";


	 echo "</tr>";
}
?>



</form>
</table>


</center>
