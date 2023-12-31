 <?php

class classNotifications {
    private $conn;
	
	private $payload;
	
	private $method;
	
	private $request;
	
	function  classNotifications(){
	}
	
	function contatos( $data ){
		
		$db = new Database();

        $qry =  "SELECT r.name name , r.mail, c.id  , mail FROM contatos c , register r  ";
		$qry .= " WHERE c.datainc >= '$data 00:00:00'  and  c.datainc <= '$data 23:59:59' ";
        $qry .= " and r.id  = c.id_userto and c.dateread is null and send = 0  ORDER BY c.datainc  DESC";
		$result = $db->result($qry);	
		
		
		$aContatos =array();
		$aContatos["contatos"]=array();
		
		
		while ($row = mysql_fetch_assoc($result)) {
			array_push( $aContatos["contatos"] ,
                		    array( "name" => utf8_encode( $row["name"] ) ,
							"mail" => utf8_encode(  $row["mail"] ),
							"id" => utf8_encode(  $row["id"] )
							 ));
        } 
	
		http_response_code(200);
		$aContatos["_return"] =array( "message" =>$this->jsonLastError( json_last_error() ) );

		return json_encode(  $aContatos, JSON_PRETTY_PRINT );
	}
	
	function updateSend( $id   ){
		
		$db = new Database();

        $qry =  "update  contatos set send =true   where id=$id";
		$result = $db->result($qry);	
		
		$aContatos =array();
		http_response_code(200);
		$aContatos["_return"] =array( "message" =>$this->jsonLastError( json_last_error() ) );

		return json_encode(  $aContatos, JSON_PRETTY_PRINT );
	}
	
	
	function  jsonLastError($error  ){
		$msg = "";
	    $nessage = array();	
		switch ( $error ) {
			case JSON_ERROR_NONE:
				$message = array( "code" =>  "01", "message" =>  utf8_encode("Transaction OK !!!" ) );
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