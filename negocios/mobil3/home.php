<?php

if( !$_SESSION["idUser"] ) {
	$qry = "select id,name,mail from register where mail='".$_POST['mailL']."' and password='".$_POST["pwdL"]."'";
	
	$result = mysql( $DB , $qry );
	$data = mysql_fetch_array( $result ) ;
	if( $data[id] ){
		$_SESSION["idUser"] = $data[id];
		$_SESSION["nameUser"]	=	$data[name];
	}
}


if( $_POST[action]  == "salveAnnouncement" ){
	$price =   str_replace(".", "",  $_POST["priceselling"]);
	$price =   str_replace(",", ".", $price);

	if( !$_POST[id] )
		$qry = "insert into  announcement ( title,typecompany,sector,billing,description,datainc,status,typeannouncement,id_user,priceselling,numberemployee,conditionpart,zone,confidencial,price,www )values( \"".$_POST[title]."\",\"".$_POST['typecompany']."\",".$_POST[sector].",".$_POST[billing].",\"".$_POST['description']."\",now(),'V',\"".$_POST[typeannouncement]."\" ,".$_SESSION["idUser"].",\"".$_POST["priceselling"]."\",\"".$_POST["numberemployee"]."\",\"".$_POST["conditionpart"]."\",\"".$_POST["zone"]."\",'".$_POST["confidencial"]."','".$price."',\"".$_POST["www"]."\")";
	else
		$qry = "update   announcement set  	title =\"".$_POST["title"]."\",typecompany=\"".$_POST["typecompany"]."\",sector='".$_POST["sector"]."',	billing=\"".$_POST["billing"]."\",	description=\"".$_POST["description"]."\", priceselling=\"".$_POST["priceselling"]."\",	numberemployee=\"".$_POST["numberemployee"]."\",				conditionpart=\"".$_POST["conditionpart"]."\", zone=\"".$_POST["zone"]."\",confidencial='".$_POST["confidencial"]."',price='".$price."', dtmodify=now(), datainc=now(), www =\"".$_POST["www"]."\",  typeannouncement='$_POST[typeannouncement]'    where id_user='".$_SESSION["idUser"]."' and  id='".$_POST["id"]."'";

	mysql($DB,$qry);
}



?>



<div class="content-primary">

	<?php if( !$_SESSION["idUser"] ) {?>
	<div class="ui-body ui-body-b">
		<fieldset class="ui-grid-a">
				<div class="ui-block-a" ><center>

					<font color=darkred face=verdana><b>Login ou senha não encontrados</b></font> </br></br>
					<button type="button" data-theme="d" onclick='logout()'>Voltar</button>
					</center>
				</div>

		</fieldset>
	</div>
	<?php }else{?>
		<h2>Bem vindo <b><?php echo $_SESSION["nameUser"]?></b></h2>	</br>
		<ul data-role="listview">
			<li><a href="#" onclick="javascript:listMsgReceive()"><img src="email_go.png" alt="" class="ui-li-icon">Mensagens Recebidas</a></li>
			<li><a href="#" onclick="javascript:postAnn()" ><img src="page_white_edit.png" alt="" class="ui-li-icon">Postar anúncios</a></li>
			<li><a href="#" onclick="javascript:listMsgSent()" ><img src="email_open.png" alt="" class="ui-li-icon">Mensagens Enviadas</a></li>
			<li><a href="#" onclick="javascript:listMyAnn()"><img src="layout_content.png" alt="" class="ui-li-icon">Meus anúncios </a></li>
			<li><a href="#" onclick="javascript:filter()"><img src="sport_raquet.png" alt="" class="ui-li-icon">Procurar anúncios</a></li>
			<li><a href="#" onclick="javascript:logout()"><img src="delete.png" alt="" class="ui-li-icon">Logout</a></li>
		</ul>
	<?php }?>


	<form action="index.php" id="formListMsgSent" name="formListMsgSent" method="post">
		<input type=hidden id='page' name='page' value='listMsgSent'/>

	</form>
	<form action="index.php" id="formMyAnn" name="formMyAnn" method="post">
		<input type=hidden id='page' name='page' value='listAnnouncement' />
	</form>
	<form action="index.php" id="formListMsgReceive" name="formListMsgSent" method="post">
		<input type=hidden id='page' name='page'  value='listMsgReceive'/>
	</form>
	<form action="index.php" id="formPostAnn" name="formPostAnn" method="post">
		<input type=hidden id='page' name='page' value='formAnnouncement' />
	</form>
	<form action="index.php" id="formLogout" name="formLogout" method="post">
		<input type=hidden id='logout' name='logout' value='true'/>
	</form>
	<form action="index.php" id="formHome" name="formHome" method="post">
		<input type=hidden id='page' name='page'  value='listAnnouncement'/>
	</form>
	<form action="index.php" id="formFilter" name="formFilter" method="post">
		<input type=hidden id='page' name='page' value='listAnnouncement' />
	</form>




</div>


<script>
	function listMsgSent(){
		 document.getElementById('formListMsgSent').submit();
	}

	function listMyAnn(){
		 document.getElementById('formMyAnn').submit();
	}
	function filter(){
		 document.getElementById('formFilter').submit();
	}
	function listMsgReceive(){
		 document.getElementById('formListMsgReceive').submit();
	}
	function logout(){
		 document.getElementById('formLogout').submit();
	}
	function home(){
		 document.getElementById('formHome').submit();
	}

	function postAnn(){
		 document.getElementById('formPostAnn').submit();
	}



</script>