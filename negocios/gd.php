<?php
// mais uma vez, mantendo a sess�o aberta

session_start();

$_SESSION["autenticagd"]=rand(10000,99999);

// fun��o do gd, para criar uma imagem, com o tamanho definido// largura, altura
$imagem = imagecreate(70, 15);

// fun��o que define a cor de fundo da imagem gerada pelo gd// em meu caso, amarelo
$fundo = imagecolorallocate($imagem, 245, 245, 0);

// fun��o que define a cor da fonte, em meu caso, preto.
$fonte = imagecolorallocate($imagem, 0, 0, 0);

// desenhando a imagem, baseada nos padr�es informados acima// verificando a sess�o aberta, para informar ao formul�rio o que foi digitado

imagestring($imagem, 4, 0, 0, $_SESSION['autenticagd'], $fonte);

// header, necess�rio

header("Content-type: image/png");

// formato da imagem, no meu caso utilizei PNG.// vc pode usar imagejpeg, imagegif, etc. Veja as refer�ncias no manual do php

imagepng($imagem);

?>