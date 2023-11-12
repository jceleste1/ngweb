
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
<br><br><br>

<font class='tituloAdv'>Interessado sobre seu empreendimento</font>
<br><br><br>
<table  style="width: 450px;  padding:1em; background-color:#e7f1f6; border:1px solid #FF0000">
<form action='mvcAnnouncement.php' method='post'>


<?php




if( !$_REQUEST[idMsg] )
	$qry = "SELECT  c.id,r.name,r.mail, c.msg, r.phone, r.phonemobile,
  	c.datainc 
		FROM contatos c, register r 
	where 
		c.id_userof = r.id  and 
		c.id_userto =".$_SESSION["id"]." and 
		c.dateread is null";
else
	$qry = "SELECT  
				c.id,r.name,r.mail, c.msg, r.phone,
				r.phonemobile, c.datainc 
			FROM 
				contatos c, register r 
			where 
				c.id_userof = r.id AND c.id=".$_REQUEST[idMsg];



$result2 = fMySQL_Connect($qry);	
$_rows_ = mysql_num_rows($result2);

$line=mysql_fetch_assoc($result2);



echo "<tr>";
echo "<td bgcolor='white' width='130px'> Nome do empresario </td>";
echo "<td $bgcolor> <b>".$line["name"]."</td>";
echo "</tr>";


echo "<tr>";
echo "<td bgcolor='white' width='130px'>Data da Mensagem </td>";
echo "<td> <b>".format_date($line["datainc"])."</td>";
echo "</tr>";



echo "<tr>";
echo "<td bgcolor='white' width='130px'>Email</td>";
echo "<td> <b>".$line['mail']."</td>";
echo "</tr>";


echo "<tr>";
echo "<td bgcolor='white' width='130px'>Telefone </td>";
echo "<td> <b>".$line[phone]."</td>";
echo "</tr>";


echo "<tr>";
echo "<td bgcolor='white' width='130px'>Telefone celular </td>";
echo "<td> <b>".$line[phonemobile]."</td>";
echo "</tr>";


echo "<tr>";
echo "<td bgcolor='white' width='130px'>Mensagem </td>";
echo "<td> <b>".$line[msg]."</td>";
echo "</tr>";

echo "</tr>";



$qry = "update contatos  set dateread=now() where id=".$line["id"];
fMySQL_Connect($qry);	


include("classPayPerView.php");
		$classPayPerView = new classPayPerView();
		$classPayPerView->debit( $_SESSION["id"],"0", $line["id"]);

?>


</form>
</table>
