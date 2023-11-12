
<TABLE cellSpacing=3 cellPadding=1  border=0 width='100%' align='center'>
 <form action="mvcAnnouncement.php" id="formRegister" name="formRegister">
 <input type=hidden name="tpclient" value="<?php echo $tpclient?>">
 <input type=hidden name="action" id="action" value="<?php echo $action?>">


 <tr>
	<td bgcolor=#EFEFEF colspan=4 align=center valign=middle height='45 px'><font class=subtitulo3>Para que possa utlizar o site NegociosLucrativos.com é necessário que preencha o formulário abaixo</td>
 </tr>	



  <?php  if(  $erro ) { ?>
	  <tr>
		   <td align=center colspan=4><font color=darkred><b><?php echo $Aerro[$erro];  ?></font></b></TD>
      </tr>
  <?php } ?>


  <tr>
		<td align=left><font class=msgAlert>*</font><font class='labels'> Nome :</TD>
		<td colspan=3> <input type='text' name="name" id="name" size="50" value="<?php echo $dataUser["name"]?>"></td>
  </tr>

 <tr>
		<td align=left><font class=msgAlert>*</font><font class='labels'> Email :</TD>
		<td colspan=3> <input type='text' name="mail" id="mail" size="50"  value="<?php echo $dataUser["mail"]?>"></td>
  </tr>

   <tr>
		<td align=left><font class='labels'> Endereço :</TD>
		<td colspan=3> <input type='text' name="address" size="47"  value="<?php echo $dataUser["address"]?>"><font class='labels'> No.<input type='text' name="numberAddress" size="5" value="<?php echo $dataUser["numberaddress"]?>"> </td>
  </tr> 
  <tr>
		<td align=left><font class='labels'>  Bairro :</TD>
		<td><input type='text' name="district" size="20" value="<?php echo $dataUser["district"]?>"></td>
   </tr>
  <tr>  
		<td align=left><font class='labels'> CEP : </td>
		<td> <input type='text' name="zipcode" size="10"  value="<?php echo $dataUser["zipcode"]?>"></td>
  </tr>
 <tr>
		<td align=left><font class='labels'>Cidade: </TD>
		<td ><input type='text' name="city" size="35"  value="<?php echo $dataUser["city"]?>">   </TD>
  </tr>	
 <tr>
 	<td align=left><font class='labels'>Estado: </TD>
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
		<td align=left><font class='labels'>Telefone Celular: </TD>
		<td > <input type='text' name="phonemobile" size="14" maxLength=14   value="<?php echo $dataUser["phonemobile"]?>"></td>
 </tr>
 <tr> 
		<td align=left><font class='labels'> Telefone Comercial: </TD>
		<td ><input type='text' name="phone" size="14" maxLength=14   value="<?php echo $dataUser["phone"]?>">   </td>
</tr>

<?php if(! $_SESSION["id"]) {?>

 <tr>
	<td align=left><font class='labels'>Como conheceu o site NegociosLucrativos.com : </TD>
	<td>
	 <select name=id_marketing id="id_marketing"><option value=7>--</option>
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
	<td align=left><font class='labels'>* Senha : </TD>
	<td ><INPUT type=password maxLength=15 size=15 id="password" name=password>&nbsp;&nbsp;<FONT face=verdana color=darkred   size=1><B>&nbsp; </B></FONT>						
	</td>
</tr>
 <tr>
	<td align=left><font class='labels'>* Confirme a Senha : </TD>
	<td ><INPUT type=password maxLength=15 size=15 id="password1"  name=password1>&nbsp;&nbsp;<FONT face=verdana color=darkred   size=1><B>&nbsp; </B></FONT>						
	</td>
 </tr>
 
 
 
<tr>
	<td   align=center colspan=4><font class='labels'>Termo de uso :  &nbsp;&nbsp; <input type="checkbox" id="termo" name="termo"></TD>
 </tr>	
 <tr>
	<td align=center colspan=4>
 <textarea id="w3review" name="w3review" rows="4" cols="110">
Este termo de concordância traz as regras que  tornam possível este serviço fácil e gratuito estar acessível. 
Registrando-se em NegociosLucrativos.com você estará automaticamente concordando com todas as regras descritas 
abaixo.

Os usuários do site NegociosLucrativos.com são responsáveis pelo conteúdo  dos anúncios.
NegociosLUcrativos.com não é responsável pelo conteúdo das mensagens de nenhuma publicação dos anuncios.
NegociosLucrativos.com não verifica, endossa ou garante o conteúdo de nenhum anunciante.
NegociosLucrativos não são permitidos anúncios para sites contendo ou linkados a: pornografia, palavras 
de calão, exploração de crianças, racismo, profanação, incitação ao ódio, instruções sobre atividades 
ilegais, qualquer coisa ilegal ou qualquer material que possa estar  insultando outra pessoa, empresa 
ou comunidade.
Não é permitida a cópia ou utilização, mesmo que atribuindo-se os créditos aos autores, de material 
protegido por leis de direitos autorais sem a autorização expressa dos mesmos.
NegociosLucrativos.com se reserva o direito de remover de seu banco de dados qualquer publicação, 
que violar qualquer uma dessas regras, sem prévio aviso.
NegociosLucrativos.com não dá garantias de disponibilidade do serviço.
NegociosLucrativos.com também não se responsabiliza por nenhuma perda de dados resultante de nossa 
deleção de publicações e 
notícias, problemas na rede ou sistema, arquivos corrompidos, ou qualquer outra razão.NegociosLucrativos.com
reserva o direito de alterar este termo de concordância a qualquer momento sem prévio aviso.
</textarea>	
	</td>
 </tr>

 <tr>
	<td align='center' colspan='4'><input type=button value=Enviar name=btRegister  onclick="submitRegister(this);">   </td>
</tr>

</form>    
</table>
