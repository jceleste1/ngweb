<?php


class classUser   {
    private $conn;
	
	private $payload;
	
	private $method;
	
	private $request;

	function  classUser(  $payload, $method, $request  ){
		$this->payload  = $payload;
		$this->method = $method;
		$this->request = $request;
	}
	
	function processRequest(){
		$response = "";
		switch ( $this->method  ) {
            case 'GET':
                    $response = $this->getUser( $this->request["userCode"]  );
                break;
            case 'POST':
		     	if( !$this->payload->userCode ) {
					$response = $this->salve($this->payload);
				}else{
					$response = $this->update($this->payload);
				}
			break;
		}
        return $response;
	}

	function getUser($userCode,$token ,$string ){
		$users_arr=array();
		$users_arr["users"]=array();
		$hash = "";

		$db = new Database();
		$field = " r.name, r.mail,r.phone, r.phonemobile, r.id,r.cpfcnpj, r.address, r.numberaddress, r.district, r.zipcode, r.city, r.state, r.password , r.datainc,r.hash, r.credit ";
		$qry =sprintf( "SELECT  ".$field." FROM register  r WHERE  r.id='%s'", mysql_real_escape_string($userCode,$db->getConnection()) );		
		
	
		$result = $db->result($qry);	
		$rows = mysql_num_rows($result);
		while ($row = mysql_fetch_assoc($result)) {
		   $hash =  $row["hash"];
		   array_push( $users_arr["users"] ,
                		   array( "id" => $row["id"],
               		              "name" =>  utf8_encode ( $row["name"] ),
                                  "mail" => $row["mail"],
                                  "phonemobile"	 =>	 $row["phonemobile"],
		 					      "address"	 =>	 utf8_encode ( $row["address"] ),
		 					      "numberaddress"	 =>	utf8_encode ($row["numberaddress"] ),
		 					      "district"	 =>	 utf8_encode ( $row["district"] ),
							      "zipcode"	 =>	 $row["zipcode"],
							      "city"	 =>	 utf8_encode ( $row["city"] ),
		 						   "state"	 =>	 $row["state"],
		 						   "cpfcnpj"	 =>	 $row["cpfcnpj"],
								  "password"	 =>	 $row["password"],
								  "datainc"	 =>	 $row["datainc"],
		 					      "phone"	 =>	 $row["phone"],
								  "credit"	 =>	 $row["credit"]								  
								  ) );
		}
						
		if(  $hash  <>  $token ){		
			$announcement_arr["return"] =array( "message" =>array( "code" =>  "401", "message" =>  utf8_encode("NAO AUTORIZADO" ) ) );				
			return json_encode(  $announcement_arr, JSON_PRETTY_PRINT );			
	    }	
		
		http_response_code(200);
		
		
		$users_arr["return"] =array( "message" =>$this->jsonLastError( json_last_error() ) );
		 	
		return json_encode(  $users_arr, JSON_PRETTY_PRINT );

	}
	function salve($payload,$token){
		
		$db = new Database();
		$qry = "select id,hash from register where mail='".$payload->mail."'";
		$result = $db->result($qry);
		$hash = "";
		$rows = mysql_num_rows($result);
		if( $rows ){
			while ($row = mysql_fetch_assoc($result)) {
				$hash = $row["hash"];
			}				
		}
		
		if(  $hash ){	
	        http_response_code(200);
			$users_arr=array();
			$users_arr["code"]  = "02";
			$users_arr["message"]  = "Email Ja cadastrado";		
			return json_encode(  $users_arr, JSON_PRETTY_PRINT );
	    }
		$msg = "";
			
		$qry = "insert into register(name,mail,address,numberaddress,district,zipcode,city,state,phonemobile,phone,cpfcnpj,password,datainc,tpclient,id_marketing,media,dateperday,viewperday,hash) ";
		$qry .= " values( '".$payload->name."','".$payload->mail."','".$payload->address."','";
		$qry .= $payload->numberAddress."','".$payload->district."','".$payload->zipcode."','";
		$qry .= $payload->city."','".$payload->state."','".$payload->phonemobile."','".$payload->phone."','";
		$qry .= $payload->cpfcnpj."' ,'".$payload->password."', now(),'".$payload->tpclient."','".$payload->id_marketing."','".$payload->media."',now(),0 ,'')";
		$result = $db->result($qry);	
		$msg = mysql_error();
		
		$idUser = mysql_insert_id();

		
		$hash = base64_encode( $payload->name."".$payload->mail."".$idUser );
		$qry = "update register set	hash='$hash'  where id='$idUser'";
		$result = $db->result($qry);	
				
		
		$users_arr=array();
		$users_arr["user"]  = array( "id"=>$idUser,  
		                                        "name"=>utf8_encode($payload->name),
		                                        "mail"=>$payload->mail,
												"hash"=> $hash )  ;	
												
	    http_response_code(200);
		$users_arr["code"]  = "01";
		$users_arr["message"]  = "01".$msg;		

		return json_encode(  $users_arr );
	}
	
	
	function update($payload,$token){
		
		$db = new Database();
		$qry = "select id,hash from register where mail='".$payload->mail."'";
		$result = $db->result($qry);
		$hash = "";
		$rows = mysql_num_rows($result);
		if( $rows ){
			while ($row = mysql_fetch_assoc($result)) {
				$payload->idUser = $row["id"];
				$hash = $row["hash"];
			}				
		}
		
		if(  $hash  !=  $token  ){	
	        http_response_code(421);
			$users_arr=array();
			$users_arr["code"]  = "421";
			$users_arr["message"]  = "NAO AUTORIZADO";		
			return json_encode(  $users_arr, JSON_PRETTY_PRINT );
	    }
			
		$qry = "update register set	name='".htmlspecialchars($payload->name)."', mail='". htmlspecialchars( $payload->mail )."',phonemobile='".htmlspecialchars($payload->phonemobile)."',phone='".htmlspecialchars($payload->phone)."',id_marketing= '".$payload->id_marketing."', password='".$payload->password."' where id='".$payload->idUser."'";
		$result = $db->result($qry);	
	
		$users_arr=array();
		$users_arr["user"]  = array( "id"=>$payload->idUser,  
		                                        "name"=>utf8_encode($payload->name),
		                                        "mail"=>$payload->mail,
												"hash"=> $hash )  ;	
												
	    http_response_code(200);
		$users_arr["code"]  = "01";
		$users_arr["message"]  = "01 Atualizado com sucesso"	;	
												
			

		return json_encode(  $users_arr );
	}
	
	
	
	
	
	function updateBkp($payload){
		$db = new Database();
		
		$qry = "update register set	name='".htmlspecialchars($payload->name)."', mail='". htmlspecialchars( $payload->mail )."' ,phonemobile='".htmlspecialchars($payload->phonemobile)."' where id='".$payload->idUser."'";
		$result = $db->resuldt($qry);	
		

		http_response_code(200);
		
		$users_arr=array();
		$users_arr["return"] =array( "message" => $this->jsonLastError( json_last_error() ) );
		return json_encode(  $users_arr );
		
	}
	
	function deleteUser($data){
		$qry = "delete from register  WHERE r.id=".$data->userCode;
		fMySQL_Connect($qry);
			

		http_response_code(200);
		
		$users_arr=array();
		$users_arr["return"] =array( "message" => $this->jsonLastError( json_last_error() ) );
		return json_encode(  $users_arr );
		
	}
	
	
	function login(){
		$db = new Database();
		$conn =  $db->getConnection();
		
		$qry = sprintf( "select id,name,mail,hash    from
		register where mail='%s' 
		and password='%s'",mysql_real_escape_string( $this->payload->mail ),
		mysql_real_escape_string( $this->payload->password , $conn )  );
			
		$result = $db->result($qry);	
		$aLogin =  array( "id"   => "" ,"name" => "", "hash" => "", "mail" => "","code" => "","message" => ""  ) ;
		
		while ($row = mysql_fetch_assoc($result)) {		
              $aLogin =   		   array( "id"   => $row["id"] ,
						          "name" => utf8_encode($row["name"]),
								  "hash" => utf8_encode($row["hash"]),
                                  "mail" => utf8_encode($row["mail"]),
								  "code" => "01",
								  "message" => "OK"  ) ;
		}
		http_response_code(200);
		if( !$aLogin["id"]  ){
			$aLogin["code"] =  "421";
			$aLogin["message"] =  "ACESSO NEGADO"  ;
		}else{
			$hash = base64_encode( $aLogin["name"]."".$aLogin["mail"]."".$aLogin["id"] );
			$qry = "update register set	hash='$hash', registration='".$this->payload->registrationFirebase."' where id='".$aLogin["id"]."'";
			$db->result($qry);	
			
			session_start();
			$_SESSION["id"] =  $aLogin["id"];
			$_SESSION["mail"] = $aLogin["mail"];
			$_SESSION["nameUser"] = $aLogin["name"];
			$_SESSION["hash"] = $aLogin["hash"];
			
		}
		
		return json_encode(  $aLogin, JSON_PRETTY_PRINT );
	}

	
	function mediaSalve($mail,$name,$phonemobile,$media){
		
		$db = new Database();
		
		$qry = "insert into register(name,mail,phonemobile,datainc,media) ";
		$qry .= " values( '".utf8_encode($name)."','".$mail."','".$phonemobile."',now(),'".$media."')";
		$result = $db->result($qry);
	    $idUser = mysql_insert_id();
		
		$user  = array( "id"=>$idUser, "name"=>utf8_encode($name),"mail"=>$mail );

		return  $user;
	}


	function socialLogin($mail,$name,$phonemobile,$media){
		$db = new Database();
		$conn =  $db->getConnection();
		
		$qry = sprintf( "select id,name,mail,media from register where mail='%s'",
		mysql_real_escape_string( $mail,$conn ) );
		$mediaCheck = "";
		$result = $db->result($qry);	
		
		$aLogin["user"] =array();
		while ($row = mysql_fetch_assoc($result)) {
			$aLogin["user"]=array( "id"   => $row["id"] ,
						           "name" => utf8_encode($row["name"]),
						           "mail" => $row["mail"]  )  ;
			$mediaCheck= "registrado";
		}
		if(!$mediaCheck){
			$userMedia = $this->mediaSalve($mail,$name,$phonemobile,$media);
			$aLogin["user"] = array( "id"   => $userMedia["id"] ,
						             "name" => $userMedia["name"],
							         "mail" => $userMedia["mail"] );
		}
	
		http_response_code(200);
		$aLogin["return"] = array( "code" =>  "01", "message" =>  "Sucesso" );
		

		if( empty( $aLogin["user"] )){
			http_response_code(500);
			$aLogin["return"] = array( "code" =>  "51", "message" =>  "Acesso Negado !" );
 		}
		
		return $aLogin;
	}

	function getMyAnnouncement($idUser,$token,$string){
		$db = new Database();
		$conn =  $db->getConnection();
			
		$qry = sprintf( "select a.id,a.title,a.sector,a.typecompany,viewcount,r.hash  from announcement a, register r where  a.id_user=r.id and  a.id_user='%s'", mysql_real_escape_string($idUser,$db->getConnection()) );		
		$result = $db->result($qry);	

		$hash = "";
		$ann =array();
		$ann["announcements"]=array();
		while ($row = mysql_fetch_assoc($result)) {
			$hash = $row["hash"];
			array_push( $ann["announcements"] ,
                		   array( "id" => $row["id"],
						           "title"     => utf8_encode( $row["title"] ),
								   "sector"     => $row["sector"],
								   "typecompany"     => $row["typecompany"],
								   "viewcount"     => $row["viewcount"] ) );
		}

		if(  $hash  !=  $token ){	
	        http_response_code(202);
			$announcement_arr["return"] =array( "message" =>array( "code" =>  "401", "message $string" =>  utf8_encode("NAO AUTORIZADO" ) ) );				
			return json_encode(  $announcement_arr, JSON_PRETTY_PRINT );
			
	    }
	
	
		http_response_code(200);
		$ann["return"] =array( "message" =>$this->jsonLastError( json_last_error() ) );
		return json_encode(  $ann, JSON_PRETTY_PRINT );
		
	}
	
	function getMessage($idUser,$token){
		$db = new Database();
		$conn =  $db->getConnection();
	
		$qry = sprintf( "SELECT  c.id,r.name,r.mail, c.msg, r.phone, r.phonemobile,c.datainc,r.hash 
		FROM contatos c, register r where c.id_userof = r.id  and c.id_userto ='%s' order 
		by c.datainc desc ", mysql_real_escape_string( $idUser , $conn ) );
		
		$result = $db->result($qry);	
	    $hash = "";
		$msgA =array();
		$msgA["messages"]=array();

		while ($row = mysql_fetch_assoc($result)) {
		    $hash = $row["hash"];
		    array_push( $msgA["messages"] ,
                		   array( "id" => $row["id"],
						          "name" => utf8_encode( $row["name"] ),
						          "mail" => $row["mail"],
								  "msg" =>utf8_encode(  $row["msg"] ),
								  "phone" => $row["phone"],
								  "phonemobile" => $row["phonemobile"],
								  "datainc" => $row["datainc"] )
								   );
		}
		
		if(  $hash  != $token ){		
			$announcement_arr["return"] =array( "message" =>array( "code" =>  "401", "message" =>  utf8_encode("NAO AUTORIZADO" ) ) );				
			return json_encode(  $announcement_arr, JSON_PRETTY_PRINT );
	    }	
		
	
		http_response_code(200);
		
		$msgA["return"] =array( "message" =>$this->jsonLastError( json_last_error() ) );
		return json_encode(  $msgA, JSON_PRETTY_PRINT );
	}
	
	
	function esqueciPwd($mail){
		$db = new Database();
		$conn =  $db->getConnection();
		
		$qry = sprintf( "select name,mail,password from 
		register where mail='%s'",
		mysql_real_escape_string($mail,$conn) );
	
		$result = $db->result($qry);	
		if( mysql_num_rows($result ) ){
			$aUser = mysql_fetch_array( $result ) ;

			$msg = "Prezado Sr(a) ".$aUser["name"]." <br>"; 
			$msg .= "Estamos lhe enviando a senha para acessar o site http://www.negocioslucrativos.com.br <br>";
			$msg .= "Senha : ".$aUser["password"]."<br>";
			$msg .= "Atenciosamente <br>";
			$msg .= "Equipe http://negocioslucrativos.com.br <br>";
			$subject = "Senha de acesso  para o site negocioslucrativos.com.br";
			
			require_once('../../PHPMailer51/class.phpmailer.php');
			$Email = new PHPMailer();
			$Email->SetLanguage("br");
			$Email->IsMail();
			$Email->IsHTML(true); 
			$Email->From = "contato@negocioslucrativos.com.br";
			$Email->CharSet           = 'UTF-8';
			$Email->Mailer            = 'mail';
			// nome do remetente do email
			$Email->FromName = 'NegociosLucrativos';
			$Email->Sender = "contato@negocioslucrativos.com.br";
			
			$Email->AddAddress($aUser["mail"]);
			$Email->Subject =    utf8_encode ( $subject);
			$Email->Body =  utf8_encode(   $msg );
			if(!$Email->Send()) {
				echo "A mensagem não foi enviada. <p>";
				echo 	"Erro: " . $Email->ErrorInfo;
			}
		}
		
		http_response_code(200);
		
		$msgA["return"] =array( "message" =>$this->jsonLastError( json_last_error() ) );
		return json_encode(  $msgA, JSON_PRETTY_PRINT );
		
	}
	
	
	function  jsonLastError($error){
		$msg = "";
	    $nessage = array();	
		switch ( $error ) {
			case JSON_ERROR_NONE:
				$message = array( "code" =>  "01", "message" => utf8_encode( "OK !!!" ));
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