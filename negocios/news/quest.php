<? 
$nivel = "../";
include("../config.inc");
include("../top.php");


$qry = "select id from register where id=".$_REQUEST[id];
$result = fMySQL_Connect($qry);

if( mysql_num_rows($result) ) { ?>
	<table width=780px align=center height=400px>
	<tr> <td align=center>
	<font color=darkgreen face=verdana>Questionário já respondido<br/><br/>
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
1 - Você aceita receber mensalmente um boletim dos anuncios divulgados no site NegociosLucrativos.com  ?
</td></tr>
<tr><td>
Sim <INPUT TYPE="RADIO" NAME="resp1" value=S checked>
Não <INPUT TYPE="RADIO" NAME="resp1" value=N>
</td></tr>

<tr><td>
2 - Dentro em breve estaremos lançando uma versão do site NegociosLucrativos.com em inglês. Você estaria
interessado em fazer uma cotação para tradução do seu anuncio em inglês ?
</td></tr>
<tr><td>
Sim <INPUT TYPE="RADIO" NAME="resp2" value=S checked>
Não <INPUT TYPE="RADIO" NAME="resp2" value=N>
</td></tr>





<tr><td>
3 - Utilize o campo abaixo se você tem alguma  sugestão para ser implementada no site NegociosLucrativos.com
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


