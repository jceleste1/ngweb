<? 
$nivel = "../";
include("../config.inc");
include("../top.php");


$qry = "select id from register where id=".$_REQUEST[id];
$result = fMySQL_Connect($qry);

if( mysql_num_rows($result) ) { ?>
	<table width=780px align=center height=400px>
	<tr> <td align=center>
	<font color=darkgreen face=verdana>Question�rio j� respondido<br/><br/>
	Atenciosamente<br/><br/>
	NegociosLucrativos.com
	</font>
	</td></tr>
	</table>
<?	exit;
}
?>


<table width=780px align=center>
<FORM NAME="radioForm" action='questRec.php'>
<input type=hidden name=idUser value=<?=$_REQUEST[id]?>>


<tr><td>
1 - Voc� aceita receber mensalmente um boletim dos anuncios divulgados no site NegociosLucrativos.com  ?
</td></tr>
<tr><td>
Sim <INPUT TYPE="RADIO" NAME="resp1" value=S checked>
N�o <INPUT TYPE="RADIO" NAME="resp1" value=N>
</td></tr>

<tr><td>
2 - Dentro em breve estaremos lan�ando uma vers�o do site NegociosLucrativos.com em ingl�s. Voc� estaria
interessado em fazer uma cota��o para tradu��o do seu anuncio em ingl�s ?
</td></tr>
<tr><td>
Sim <INPUT TYPE="RADIO" NAME="resp2" value=S checked>
N�o <INPUT TYPE="RADIO" NAME="resp2" value=N>
</td></tr>





<tr><td>
3 - Utilize o campo abaixo se voc� tem alguma  sugest�o para ser implementada no site NegociosLucrativos.com
</td></tr>
<tr><td>
			<textarea name=resp3  id=resp3 rows=10 cols=67 wrap=virtual ></textarea>
</td></tr>





<tr><td colspan=2>
<INPUT TYPE="submit"  VALUE="Enviar">
</td></tr>
</FORM>

</table>

<SCRIPT LANGUAGE="JavaScript"><!--
function showAnswers() {

   
}
//--></SCRIPT>


