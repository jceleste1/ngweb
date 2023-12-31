<?
	session_start();
	
	$conexao =  mysql_connect( "localhost","root","Isr0704@");
	$DB = "brasilforte";

	
	if( $_POST[action] == "salveUser" ){
	
		$qry = "select mail from register where mail='".$_POST["mail"]."'";		
		$result = mysql( $DB , $qry );
		if(  !mysql_num_rows($result )  ){
			$qry = "insert into register(	name,mail ,	password ,datainc,id_marketing ) values( \"".$_POST["name"]."\",\"".$_POST["mail"]."\",\"".$_POST[pwd]."\", now(),'9' )";
			$result = mysql( $DB , $qry );
			
			$_SESSION["nameUser"] = $_POST["name"];
			$_SESSION["idUser"] = mysql_insert_id();
			$_SESSION["mail"] = $_POST["mail"];
		}
	}else{
		$qry = "select id,name,mail from register where mail='".$_POST['mail']."' and password='".$_POST["pwd"]."'";
		$result = mysql( $DB , $qry );
		$data = mysql_fetch_array( $result ) ;
		if( $data[id] ){
			$_SESSION["idUser"] = $data[id];
			$_SESSION["nameUser"]	=	$data[name];				
		}
	}

	
	echo trim($data[id]);
		
?>