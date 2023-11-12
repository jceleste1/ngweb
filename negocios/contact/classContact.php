 <?php

class classContact {
    private $conn;
	
	private $payload;
	
	private $method;
	
	private $request;
	
	function  classContact(  $payload, $method, $request ){
		$this->payload  = $payload;
		$this->method = $method;
		$this->request = $request;
	}
	
	function salve($payload){
		//$qry = "insert into contatos ( id_userto,msg,datainc,id_userof ) values (  ";
		//$qry .= $dataAnnouncementUser["id_user"].",\"".$_REQUEST["message"]."\",".$_SESSION["id"].")";
		
		$qry = "insert into contatos ( id_userto,msg,datainc,id_userof ) values (  ";
		$qry .= $payload->id_userto.",\"".$payload->message."\", now(),".$payload->idUser.")";
		$result = $db->result($qry);
	}
	
	function send($payload){
		$db = new Database();
	
		$qry = "select a.id_user,r.name,r.mail, a.title,a.typeannouncement,r.registration from announcement  a,register r  where a.id='".$payload->id."' and a.id_user=r.id";
		$result = $db->result($qry);	
		$dataAnnouncementUser = mysql_fetch_assoc($result);
		
		if( !$dataAnnouncementUser["registration"] ) {		
			$resultResource = $this->email($dataAnnouncementUser,$payload->message );
		}else{
			$resultResource = $this->notification($dataAnnouncementUser,$payload->message );
		}
		
		// registrado contato 
		$qry = "insert into contatos ( id_userto,msg,datainc,id_userof ) values (  ";
		$qry .= $dataAnnouncementUser["id_user"].",\"".$payload->message."\", now(),".$payload->idUser.")";
		$result = $db->result($qry);	
		
		
		http_response_code(200);
		$users_arr=array();
		$users_arr["return"] =array( "message" => $this->jsonLastError( json_last_error() ) );
		
		
		$users_arr["return"] = array( "code" =>  "01", "message" => $resultResource );
		return json_encode(  $users_arr );
	}
	
	function email($dataAnnouncementUser,$message){
		
		require_once('../PHPMailer51/class.phpmailer.php');
		$Email = new PHPMailer();
		$Email->SetLanguage("br");
		$Email->IsHTML(true); 
	
		// email do remetente da mensagem21.
		$Email->From = "contato@negocioslucrativos.com.br";
		$Email->CharSet           = 'UTF-8';
		//$Email->Mailer            = 'smtp';
		$Email->Mailer            = 'mail';
		// nome do remetente do email
		$Email->FromName = 'NegociosLucrativos';
		$Email->Sender = "contato@negocioslucrativos.com.br";
		
		
		$subjectMail = "Interessado sobre o anuncio ".$dataAnnouncementUser["title"]  ;
		$subject .= "Interessado sobre o anuncio ".$dataAnnouncementUser["title"].""   ;

		$msg .= $subject."<br><br><br>";

		$msg .= "Prezado ".$dataAnnouncementUser["name"]."  <br><br><br>"   ;

		$msg .= "Estamos direcionando para você um e-mail referente ao seu anúncio.<br>";
		$msg .= "Para visualizar a mensagem completa, por favor acesse o site,<br>  ";
		$msg .= "http://www.negocioslucrativos.com.br <br>";
		$msg .= "Digite seu login e senha e acesse o link  'Novas mensagens'<br><br>";
 
		$msg .= "Mensagem: ".substr(  $message, 0, 12)." ....";

		
		$msg .= "<br><br> Atenciosamente <br>";
		$msg .= "http://www.negocioslucrativos.com.br<br>";
		
		$msg .= "<br>Termo de uso: <br>";
		$msg .= "http://www.negocioslucrativos.com.br/mvcAnnouncement.php?action=condicao<br>";
		

		$Email->AddAddress($dataAnnouncementUser["mail"]);
		$Email->Subject =    utf8_encode ( $subjectMail );
		$Email->Body .=  utf8_encode( $msg );
		$result = "";
		if(  $Email->Send() ) {
			$result = "OK";
		}else{
			$result =  $Email->ErrorInfo;
		}
		return $result;
	}
	
	function notification($dataAnnouncementUser,$message){
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "{
			\"to\" : \"".$dataAnnouncementUser["registration"]."\",
			\"notification\" : {
				\"body\" : \"".substr(  $message, 0, 12)."\",
				\"title\" : \"Interessado sobre seu anúncio\",
				\"subtitle\" : \"http://www.negocioslucrativos.com.br\"
			}
		}");
		
		$headers = array();
		$headers[] = 'Accept: application/json';
	//	$headers[] = 'Authorization: key=AAAA7iIJs_s:APA91bEGa2dSO3gR9_hgbgNZic7j5CjKmQflkKAwcPu7JtgcMs0KXx_LxSmQERTe5feizXLc1PVBJjTR0uGCe8uDxLYm8kwMeHRuabAkGTF4GS1ySULasrxh43gEXoB0aX8kvSE6dew-';
		$headers[] = 'Authorization: key=AAAA3ayryZI:APA91bHDvXx2cLIlvh3yjH5pZKoum6OKMSFRjz_DlPdGClMFVN0NFnwsjsfzLDeidPwsga7XN9xcVC8oKavE3pWwToKJtBtxUugdCBqkFiLaCu9PxDcelgdMdq9u5DwlThwrDGo2V6T8';
		
		$headers[] = 'Content-Type: application/json';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			$result = 'Error:' . curl_error($ch);
		}else{
			$result   = "OK .... ";
		//		echo $result;
		}
		curl_close($ch);
		
		return $result;
	}
	
	
	function registration($registration,$idUser){
		$db = new Database();
	
		$qry = "update register set registration='$registration'  where id='$idUser'";
		$result = $db->result($qry);	
	
		http_response_code(200);
		$reg_arr=array();
		$reg_arr["return"] =array( "message" => $this->jsonLastError( json_last_error() ) );
		$reg_arr["return"] = array( "code" =>  "01", "message" => "$qry" );
		return json_encode(  $reg_arr );
	}
	
	
	function  jsonLastError($error  ){
		$msg = "";
	    $nessage = array();	
		switch ( $error ) {
			case JSON_ERROR_NONE:
				$message = array( "code" =>  "01", "message" =>  utf8_encode("Transação efetuada com sucesso !!!" ) );
			break;
			case JSON_ERROR_DEPTH:
				$message = array( "code" =>  "02", "message" =>  "Maximum stack depth exceeded");
			break;
			case JSON_ERROR_STATE_MISMATCH:
				$message = array( "code" =>  "03", "message" =>  "Underflow or the modes mismatch");
			break;
			case JSON_ERROR_CTRL_CHAR:
				$message = array( "code" =>  "04", "message" =>  "Unexpected control character found");
			break;
			case JSON_ERROR_SYNTAX:
				$message = array( "code" =>  "04", "message" =>  "Syntax error, malformed JSON");
			break;
			case JSON_ERROR_UTF8:
				$message = array( "code" =>  "05", "message" =>  "Malformed UTF-8 characters, possibly incorrectly encoded");
			break;
			default:
				$message = array( "code" =>  "05", "message" =>  "Unknown error");
			break;
		}
	
		return  $message;
	}
}
?>