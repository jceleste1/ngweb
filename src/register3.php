<?php 
 header('Content-Type: text/html; charset=ISO-8859-1');
 
 
 
?>

<TABLE cellSpacing=3 cellPadding=1  border=0 width='100%' align='center'>
 <form action="mvcAnnouncement.php" method="GET" onsubmit="return valid(this)">
 <input type=hidden name="tpclient" value="<?php echo $tpclient?>">
 <input type=hidden name="action" value="register">


 <tr>
	<td bgcolor=#EFEFEF colspan=2 align=center valign=middle height='45 px'><font class=subtitulo3>Para que possa utlizar o site<font color=darkgreen> <b>NegociosLucrativos.com.br</b></font> � necess�rio que preencha o formul�rio abaixo</td>
 </tr>	

 <tr>
	<td bgcolor=#EFEFEF colspan=2 align=center valign=middle height='45 px'><font class=msgAlert>Campos com * s�o obrigat�rios</td>
 </tr>	

  <?php  if(  $erro ) { ?>
	  <tr>
		   <td align=center colspan=2><font color=darkred><b><?php echo $Aerro[$erro];  ?></font></b></TD>
      </tr>
  <?php } ?>


  <tr>
		<td align=right><font class=msgAlert>*</font><font class='labels'> Nome :</TD>
		<td > <input type='text' name="name" size="50" value="<?php echo $dataUser["name"]?>"></td>
  </tr>

 <tr>
		<td align=right><font class=msgAlert>*</font><font class='labels'> Email :</TD>
		<td > <input type='text' name="mail" size="50"  value="<?php echo $dataUser["mail"]?>"></td>
  </tr>

   <tr>
		<td align=right><font class='labels'> Endere�o :</TD>
		<td > <input type='text' name="address" size="47"  value="<?php echo $dataUser["address"]?>"><font class='labels'> No.<input type='text' name="numberAddress" size="5" value="<?php echo $dataUser["numberaddress"]?>"> </td>
  </tr> 
  <tr>
		<td align=right><font class='labels'>  Bairro :</TD>
		<td><input type='text' name="district" size="20" value="<?php echo $dataUser["district"]?>"></td>
	 </tr>
 <tr>	
		
		<td align=right><font class='labels'> CEP : </td>
		<td> <input type='text' name="zipcode" size="10"  value="<?php echo $dataUser["zipcode"]?>"></td>
  </tr>
 <tr>
		<td align=right><font class='labels'>Cidade: </TD>
		<td ><input type='text' name="city" size="35"  value="<?php echo $dataUser["city"]?>">   </TD>
		
		 </tr>
 <tr>
		<td align=right><font class='labels'>Estado: </TD>
		<td >	
		 <select name=state><option value=>--</option>
		 <?php
		 while( list( $key,$val ) = each( $nlista_state1 )){
			 $sel = "";
			 if( $val == $dataUser["state"] )
				 $sel = " selected";

			echo "<option value='$val' $sel>$val</option>";
		 
		 }
		 ?>
		 </select>
		 </td>
 </tr>

 <tr>
		<td align=right><font class='labels'>Telefone Celular: </TD>
		<td > <input type='text' name="phonemobile" size="14" maxLength=14   value="<?php echo $dataUser["phonemobile"]?>"></td>
		 </tr>
 <tr>
		<td align=right><font class='labels'> Telefone Comercial: </TD>
		<td ><input type='text' name="phone" size="14" maxLength=14   value="<?php echo $dataUser["phone"]?>">   </td>
</tr>

<?php if(! $_SESSION["id"]) {?>

 <tr>
	<td align=right><font class='labels'>Como conheceu o site NegociosLucrativos.com : </TD>
	<td>
	 <select name=id_marketing><option value=7>--</option>
		 <?php
		 while( list( $key,$val ) = each( $aMarketing )){
		   $sel = "";
		   if(  $dataUser["id_marketing"] == $key  )
		   		   $sel = " selected";		

			echo "<option value='$key' $sel>$val</option>";
		 
		 }
		 ?>
		 </select>
	</td>
</tr>
<?php   }  ?>
 <tr>
	<td align=right><font class='labels'>* Senha : </TD>
	<td ><INPUT type=password maxLength=15 size=15  name=password>&nbsp;&nbsp;<FONT face=verdana color=darkred   size=1><B>&nbsp; </B></FONT>						
	</td>
</tr>
 <tr>
	<td align=right><font class='labels'>* Confirme a Senha : </TD>
	<td ><INPUT type=password maxLength=15 size=15  name=password1>&nbsp;&nbsp;<FONT face=verdana color=darkred   size=1><B>&nbsp; </B></FONT>						
	</td>
 </tr>

<tr>
	<td   align=center colspan=2><font class='labels'>Termo de uso :  &nbsp;&nbsp; <input type="checkbox" id="termo" name="termo"></TD>
 </tr>	
 <tr>
	<td   align=center colspan=2>
 <textarea id="w3review" name="w3review" rows="4" cols="100">
Este termo de concord�ncia traz as regras que  tornam poss�vel este servi�o f�cil e gratuito estar acess�vel. 
Registrando-se em NegociosLucrativos.com voc� estar� automaticamente concordando com todas as regras descritas 
abaixo.

Os usu�rios do site NegociosLucrativos.com s�o respons�veis pelo conte�do  dos an�ncios.
NegociosLUcrativos.com n�o � respons�vel pelo conte�do das mensagens de nenhuma publica��o dos anuncios.
NegociosLucrativos.com n�o verifica, endossa ou garante o conte�do de nenhum anunciante.
NegociosLucrativos n�o s�o permitidos an�ncios para sites contendo ou linkados a: pornografia, palavras de cal�o, explora��o
de crian�as, racismo, profana��o, incita��o ao �dio, instru��es sobre atividades ilegais, qualquer coisa ilegal ou
qualquer material que possa estar  insultando outra pessoa, empresa ou comunidade.
N�o � permitida a c�pia ou utiliza��o, mesmo que atribuindo-se os cr�ditos aos autores, de material protegido por leis de
direitos autorais sem a autoriza��o expressa dos mesmos.
NegociosLucrativos.com se reserva o direito de remover de seu banco de dados qualquer publica��o, que violar qualquer uma 
dessas regras, sem pr�vio aviso.
NegociosLucrativos.com n�o d� garantias de disponibilidade do servi�o.
NegociosLucrativos.com tamb�m n�o se responsabiliza por nenhuma perda de dados resultante de nossa dele��o de publica��es e 
not�cias, problemas na rede ou sistema, arquivos corrompidos, ou qualquer outra raz�o.NegociosLucrativos.com reserva o direito 
de alterar este termo de concord�ncia a qualquer momento sem pr�vio aviso.
</textarea>	
	</td>
 </tr>











 <tr>
	<td align='center' colspan='4'><input type=submit value=Enviar name=btRegister>   </td>
</tr>

</form>    
</table>


<script type="text/javascript" src="js/valid3.js"></script>