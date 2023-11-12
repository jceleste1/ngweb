<br>

Bem vindo <b><?php echo $_SESSION["nameUser"]?></b>

<table align='center'>
<?php

$qry = sprintf( "select id  from contatos c where c.id_userto ='%s' and c.dateread is null",mysql_real_escape_string( $_SESSION["id"] ), mysql_real_escape_string(  $_SESSION["id"]  ),$conexao );
		
$result = fMySQL_Connect($qry);
$rows = mysql_num_rows($result ) ;

if( $rows ) {
?>

<tr>
	<td align='center' colspan=2 valign="top">
			<p align='justify' valign="top"><a href="mvcAnnouncement.php?action=viewMessage"><img src='./img/msg_unread.gif' border=0>&nbsp;&nbsp; Existem mensagens novas para você</p>
			<p>&nbsp;</p>
	</td>
</tr>
<?php }?>


<?php if( $viewMessagePostAnnounce ){?>
<tr>
	<td align='center' colspan=2>Inclusão de anuncio feita com sucesso</td>
</tr>
<?php }?>


<td ><b>BAIXE O APP NegociosLucrativos</b> </td>
<td  colspan='2' align=left><a href="https://play.google.com/store/apps/details?id=com.br.negocioslucrativos.mob"> <img src="./imagens/googleplay.png" ></a></td>
</tr>



<tr>
	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:1em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcAnnouncement.php?action=loadData'>Alterar meus dados</a></div>
	</td>

	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:1em;  padding:1em; background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcAnnouncement.php?action=logout'>Sair</a> </div>
	</td>
</tr>

<tr>
	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:4em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcAnnouncement.php?action=postAnnouncementBuy'>Incluir anúncio de Compra de Empresas</a></div>
	</td>

	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:4em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcAnnouncement.php?action=postAnnouncementSelling'>Incluir anúncio de Venda de Empresas</a></div>
	</td>

	</tr>

	<tr>
	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:1em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a href='mvcAnnouncement.php?action=msgList'>Mensagens Lidas</a></div>
	</td>

	<td align='center'>
		<div style="width:15em; margin: 10px 0; height:1em; padding:1em;  background-color:#e7f1f6; border:1px solid #FF0000"><a  href='mvcAnnouncement.php?action=publicidade'>Anuncie aqui</a></div>  
	</td>
	</tr>


</table>
</table>
<center>
<br/>
<?php




$qry = sprintf( "select a.id,a.title,a.sector,a.typecompany,viewcount  from announcement a where id_user='%s'",mysql_real_escape_string( $_SESSION["id"] ), mysql_real_escape_string(  $_SESSION["id"]  ),$conexao );
		
$result = fMySQL_Connect($qry);
$rows = mysql_num_rows($result ) ;



if( $rows ){
?>
<font class='tituloAdv'>Meus anúncios</font>
<br/>
<table width="95%" cellpadding="1" cellspacing="3" border="0" align="center" bgcolor='white'>
<tr>
	<td bgcolor='white'><font class='subtitulo3'>Título do anúncio</td>
	<td bgcolor='white'><font class='subtitulo3'>Atividade da Empresa</td>
	<td bgcolor='white'><font class='subtitulo3'>Setor </td>
	<td bgcolor='white'><font class='subtitulo3'>Visualizações</td>
	<td bgcolor='white'>&nbsp;&nbsp; </td>
	<td bgcolor='white'>&nbsp;&nbsp; </td>
	<td bgcolor='white'>&nbsp;&nbsp; </td>

</tr>
<?php $i = 0;
	$aSector = $classCommons->aSector();		
	$aTypecompany =  $classCommons->aTypecompany() ;


	for ($i=0;$i<$rows;$i++)   {
		 $line=mysql_fetch_assoc($result);


	
		 $font = "<font color=darkblue>";
		 $bgcolor = " bgcolor='#FDFDFD'";
		 if( ($i%2)==0)  {
			 $bgcolor = " bgcolor='#E9ECF7'";
			 $font = "<font color=darkgreen>";
		 }
	
	
		
		 echo "<tr>";
		 echo "<td  $bgcolor>$font".$line["title"]."</td>";
		 echo "<td  $bgcolor>$font".$aSector[$line["sector"]]."</td>";
		 echo "<td  $bgcolor>$font".$aTypecompany[$line["typecompany"]]."</td>";
		 echo "<td align=center  $bgcolor>$font".$line["viewcount"]."</td>";
		 echo "<td  $bgcolor><a href=mvcAnnouncement.php?action=modifyAnnouncement&id_adv=".$line["id"].">$font Alterar</a></td>";
		 echo "<td  $bgcolor><a href=\"javascript:go_erase(".$line["id"].");\">$font Excluir</a></td>";
//		 echo "<td  align=center  $bgcolor><a href=mvcAnnouncement.php?action=image&id_adv=".$line["id"]."><b>$font FOTOS DO EMPREENDIMENTO</b></a></td>";
		 echo "</tr>";
	}
?>
</table>
<?php }
?>


</center>


<script>
	function go_erase(id_adv) {
	   msg="Deseja realmente apagar anúncio ?";
	   if(confirm(msg))
			self.location="mvcAnnouncement.php?action=deleteAnnouncement&id_adv="+id_adv;
	 }
 </script>
