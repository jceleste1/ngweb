<?php

// ´mantendo a sessão aberta
session_start();

// resgatando os valores enviados pelo formulário: nome e numero de segurança digitados

$NOME=$_POST['nome'];

$conf1=$_POST['confirmacao'];// resgatando a sessão anterior, aberta no form.php

$conf2=$_SESSION['autenticagd'];

// verificando: Se o campo onde o usuário digitou o número de segurança, for igual// aos valores dentro da imagem gerada pelo GD, informa ao usuário. // caso não seja, retorna o erro

if ($conf1==$conf2) 
{	echo $NOME . ", o número de segurança digitado está correto!";}

else 
{	echo $NOME . ", o número de segurança digitado está incorreto!";}?>