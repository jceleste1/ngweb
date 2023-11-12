<?php

$AmsgSystem[1] = "Mensagem enviada com sucesso !!!";
$AmsgSystem[2] = "Senha enviada com sucesso !!!";

switch( $_REQUEST["action"] ){
	case  "sendMsg";
    	$msg = 1;
		$rotRedirect = "mvcAnnouncement.php?action=listBusinessBuy";
		if( $dataAnnouncementUser["typeannouncement"]  =="S" )
			$rotRedirect = "mvcAnnouncement.php";
			$action = "list";
		break;
	case "forgetPassword1";
		$rotRedirect = "mvcphp.php";
		$action = "logger";
		$msg = 2;
		break;
}






?>
<br><br><br><br><br><br><br><br>
<center>

<font class='msgSystem'><?php  echo $AmsgSystem[$msg]?></font>
<br>
<form action='<?php echo $rotRedirect?>' method='post'> 
	<input type="hidden" name="action"  value="<?php echo $action; ?>">
	<input type="hidden" name="typeAnManual"  value="S">

	<INPUT type="submit" value="Cliqui Aqui para voltar"> 
</form> 

</center>

		
