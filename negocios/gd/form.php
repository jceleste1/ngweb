<?php
// abro uma sess�o cujo nome ser� utilizado pelo GD na hora de // formatar uma imagem �nica para esta sess�o

session_start();// o rand siginfica que entre o primeiro e o segundo valor, // ele deve gerar um numero qualquer com esta quantidade de 
caracteres.// neste caso, usei 8 caracteres

$_SESSION["autenticagd"]=rand(0,10000);?>


<html><body><!-- aqui temos um formul�rio simples, que enviar� o nome do usu�rioe a confirma��o do c�digo de seguran�a mostrado pela imagem -->

<form action="form2.php" method="POST">  
  Seu nome: 	<input type="text" name="nome">	<br>
  N&uacute;mero de seguran&ccedil;a: 	<input type="text" name="confirmacao">&nbsp;<img src="gd.php">
  <br><br>
  <input type="submit" value="Enviar">
</form>

</body>

</html>