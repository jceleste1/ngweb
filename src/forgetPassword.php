<center>

<br><br><br><br><br><br>
   <table cellpadding="0" cellspacing="0" border="0" align="center" width='550 px'  bgcolor='#F8F8F8'>	
	   <form action='mvcAnnouncement.php' method='post'>
		<input type='hidden' name='action' value='forgetPassword1'>		

		<?if( $publish  == "N" ){?>
		<tr height='45 px'>			
			<td class='gray' colspan="2" align='justify' height='35 px'><font color darkred>Impossivel continuar esse email já consta em nossa base de dados</font></td>
		</tr>
		
		<? }?>


		
		<tr height='45 px'>			
			<td class='gray' colspan="2" align='justify' height='35 px'><font class='subtitulo3'>Digite seu Email</td>
		</tr>

		<tr>			
			<td colspan="2" align='justify' height='45 px'><font class='labels'>&nbsp;&nbsp;<img src='imagens/seta.jpg' border='0'>&nbsp;&nbsp;Coloque seu email no campo abaixo caso você esqueceu sua senha. 
O e-mail digitado deve ser o mesmo cadastrado no site negocioslucrativos.com</a></td>
		</tr>
		<tr>
			<td class=ashblack colspan=2></td>
		</tr>
		<tr>
			<td><font class='labels'>E-mail</td><td><input type='text' name='mail' size='40'></td>
		</tr>
		<tr>
			<td colspan=2 align='center'><input type=submit value='Enviar'></td>
		</tr>
		<tr>
			<td colspan=2><font class='labels'>&nbsp;&nbsp;<img src='imagens/seta.jpg' border='0'>&nbsp;&nbsp;Caso ainda não seja assinante do site negocioslucrativos.com.<a href='mvcAnnouncement.php?action=registerUser'> Clique aqui</a>  e cadastre-se já!</td>
		</tr>
		<tr>
			<td colspan=2> &nbsp;</td>
		</tr>

		</form>
</table>


	</center>