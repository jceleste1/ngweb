<?php

// �mantendo a sess�o aberta
session_start();

// resgatando os valores enviados pelo formul�rio: nome e numero de seguran�a digitados

$NOME=$_POST['nome'];

$conf1=$_POST['confirmacao'];// resgatando a sess�o anterior, aberta no form.php

$conf2=$_SESSION['autenticagd'];

// verificando: Se o campo onde o usu�rio digitou o n�mero de seguran�a, for igual// aos valores dentro da imagem gerada pelo GD, informa ao usu�rio. // caso n�o seja, retorna o erro

if ($conf1==$conf2) 
{	echo $NOME . ", o n�mero de seguran�a digitado est� correto!";}

else 
{	echo $NOME . ", o n�mero de seguran�a digitado est� incorreto!";}?>