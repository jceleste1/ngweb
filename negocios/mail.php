$subjectMail  = "teste  teste"; <br>
$msg = "teste  teste"; <br>
mail("<?php echo $_REQUEST["mail"]; ?>",$subjectMail,$msg); <br>

<b>DEVERIA ENVIAR O EMAIL </B>
<?php

$subjectMail  = "teste  teste";
$msg = "teste  teste";

$mail =  "jceleste1@gmail.com";
if(  $_REQUEST["mail"]  ){
	
	$mail =  $_REQUEST["mail"] ;
}

echo mail($mail ,$subjectMail,$msg);



?>
