 <?php
class classAnnouncement extends classCommons {
    private $conn;
	private $payload;
	private $method;
	private $request;
	
	private $TOTAL_VIEW = 5;
	
	
	function  classAnnouncement(){
	}
	
	
	
	function processRequest(){
		$response = "";
		switch ( $this->method  ) {
            case 'GET':
                    $response = $this->getAnnouncement( $this->request["id"]  );
                break;
            case 'POST':
		     	if( !$this->payload->id ) {
					$response = $this->salve($this->payload);
				}else{
					$response = $this->update($this->payload);
				}
			break;
		}
        return $response;
	}
	
	function lists( $qryWhere, $page=1,  $exibe=10 ){
		
		$db = new Database();
	
		
		$qry = "select count(*)  from announcement a  $qryWhere ";
		
		$result = $db->result($qry);	
		List( $countLines )= mysql_fetch_row($result);

		
		$total_paginas = ceil(($countLines/$exibe));
		$linha_chegar = (($page-1)*$exibe);

		$limit = "limit $linha_chegar,$exibe  ";

		$qry  = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,datainc,a.price  from announcement a";
		$qry .= " $qryWhere   order by datainc desc $limit ";
		$result = $db->result($qry);	
		$announcement_arr=array();
		$announcement_arr["announcements"]=array();
		
		$sectors = $this->aSector();
		$aTypecompany = $this->aTypecompany();
		//echo $qry;
		
		while ($row = mysql_fetch_assoc($result)) {
			$sectorDescription  = $sectors[$row["sector"]];
			$activityCompanyDescription =  $aTypecompany[$row["typecompany"]] ;
		    
			array_push( $announcement_arr["announcements"] ,
                		   array( "id" => $row["id"] ,
						          "title"  =>  utf8_encode( $row["title"] ),
								  "sector" =>  utf8_encode(  $row["sector"]  ) ,
								  "sectorDescription" =>  utf8_encode( $sectorDescription ),
								  "activityCompanyDescription" => utf8_encode( $activityCompanyDescription ),
								  "typecompany" => utf8_encode( $row["typecompany"] ),
								  "priceselling" => utf8_encode($row["priceselling"] ) ,
								  "datainc" => $row["datainc"] ,
								  "price" => $row["price"] ));
		
        } 
	
		http_response_code(200);
		$announcement_arr["return"] =array( "message" =>$this->jsonLastError( json_last_error() ) );
		//$announcement_arr["qry"] = $qry;
        $this->estatísticas( "1" );

		return json_encode(  $announcement_arr, JSON_PRETTY_PRINT );

	}
	
	
	function getAnnouncement( $id,$idUser,$token, $action="" ){
		
		$db = new Database();
		
		$credit = 0;
		$dateperdaySys = date('Y-m-d');
		$dateperday = "";  $viewperday = 0;
		$hash = "";
		
	    $qry = sprintf("select  dateperday , viewperday,  credit, hash from register r where  r.id='%s'", mysql_real_escape_string($idUser,$db->getConnection()) );				
	    $result = $db->result($qry);	
	    while ($row = mysql_fetch_assoc($result)) {
			$dateperday  = $row["dateperday"];
			$viewperday  = $row["viewperday"];
			$credit  = $row["credit"];
			$hash =  $row["hash"];
		} 
		
		if(  $hash  != $token ){		
			$announcement_arr["return"] =array( "message" =>array( "code" =>  "401 $token", "message" =>  utf8_encode("NAO AUTORIZADO" ) ) );				
			return json_encode(  $announcement_arr, JSON_PRETTY_PRINT );
			
	    }	
		if(  $action != "edit"){
			$idViewPay = "";
			$qry = sprintf("select id from viewpay  where id_user='%s' and  id_announcement='%s'", mysql_real_escape_string($idUser),mysql_real_escape_string($id) ,$conn );
			$result = $db->result($qry);	
			while ($row = mysql_fetch_assoc($result)) {
				$idViewPay  = $row["id"];
			}
			/*
			if ( $idViewPay  ) {	
			}elseif ( $credit  > 0 and !$idViewPay ){
				$credit = $credit -1 ;
			}elseif (  $credit  <= 0  ){
					$announcement_arr["return"] =array( "message" =>array( "code" =>  "333", "message" =>  utf8_encode("Limite de visualizações excedido. Compre creditos" ) ) );				
					return json_encode(  $announcement_arr, JSON_PRETTY_PRINT );
			}  	
			*/
		}	
		
		
		$qry = sprintf("select a.title,a.typecompany,a.sector,a.billing, 
						 a.description,a.datainc,a.status,a.typeannouncement,
						 a.priceselling,a.numberemployee,a.conditionpart,a.zone,
						 a.viewcount,a.confidencial,r.name,r.phonemobile,r.phone,
						 a.price,a.www from announcement a, register r 
						 where  a.id_user =r.id and    a.id='%s'", mysql_real_escape_string($id,$db->getConnection()) );				
		
		$result = $db->result($qry);	
		$announcement_arr=array();
		$announcement_arr["id"]=array();
		
		$sector = $this->aSector();
		$billing = $this->aBilling();
		$zone = $this->aZone();
		$aTypecompany = $this->aTypecompany();
        $aTypeAnManual = $this->aTypeAnManual();
	
		while ($row = mysql_fetch_assoc($result)) {
		
		   array_push( $announcement_arr["id"] ,
                		   array( "id" => $id ,
									"title"  =>  utf8_encode( $row["title"] ),
									"typeCompany" => utf8_encode( $row["typecompany"] ),
									"nameTypecompany" => utf8_encode( $aTypecompany[$row["typecompany"]] ),
									"sector"  => utf8_encode( $sector[$row["sector"]]),
									"idSector"  => $row["sector"],
									"billing" => utf8_encode( $billing[$row["billing"]] ),
									"idBilling" => $row["billing"],
									"zone" => utf8_encode( $zone[$row["zone"]] ),
									"idZone" => $row["zone"],
									"description" => utf8_encode($row["description"]),
									"conditionpart" => utf8_encode($row["conditionpart"]),
									"price" => utf8_encode( $row["price"] ),
									"www" => $row["www"],
									"priceselling" => utf8_encode(  $row["priceselling"] ),
									"numberemployee" => utf8_encode( $row["numberemployee"] ),
									"viewcount" => $row["viewcount"],
									"confidencial" => $row["confidencial"],
									"name" => utf8_encode($row["name"]),
									"phonemobile" => $row["phonemobile"],
									"phone" => $row["phone"],
									"idTypeAnManual" => $row["typeannouncement"],
									"nameTypeAnManual" => utf8_encode($aTypeAnManual[$row["typeannouncement"]])
								  ) );
		}
		http_response_code(200);
	
	    //$qry = sprintf("update register set  dateperday=now(), viewperday=$viewperday,  credit=$credit   where  id='%s'", mysql_real_escape_string($idUser,$db->getConnection()) );				
		$qry = sprintf("update register set    credit=$credit   where  id='%s'", mysql_real_escape_string($idUser,$db->getConnection()) );				
	    $result = $db->result($qry);	
		
		
		// $qry = "INSERT INTO viewpay ( id_user, id_announcement, datainc, device ) VALUES( ";
		// $qry .= "  '$idUser', '$id', now(), 'M') ";
		// $result = $db->result($qry);	
				
		
		$announcement_arr["return"] =array( "message" =>$this->jsonLastError( json_last_error() ) );
	
		 	
		return json_encode(  $announcement_arr, JSON_PRETTY_PRINT );

	}
	
	function save($payload){
		if( !$payload->id ){
			return $this->add($payload);
		}else{
			return $this->update($payload);
		}
	}
	
	
	function add($payload){
		
		$db = new Database();
		$conn =  $db->getConnection();
	
		$price =   str_replace(".", "",  $payload->priceselling );
		$price =   str_replace(",", ".", $price);
		
		$qry = "insert into  announcement ( title,typecompany,sector,billing,description,datainc,status,typeannouncement,";
		$qry .= " id_user,priceselling,numberemployee,conditionpart,zone,confidencial,price,www,publish )values(  ";
		$qry .= "\"".mb_convert_encoding($payload->title, 'ISO-8859-1', 'UTF-8')."\",\"".$payload->typeCompany."\",'".$payload->idSector."','".$payload->idBilling."',\"";
		$qry .= mb_convert_encoding($payload->description, 'ISO-8859-1', 'UTF-8')."\",now(),'V',\"".$payload->idTypeAnManual."\" ,'".$payload->idUser."',\"".$price;
		$qry .= "\",\"".$payload->numberemployee."\",\"".$payload->conditionpart."\",\"".$payload->idZone."\",'";
		$qry .= $payload->confidencial."','".$price."',\"".$payload->www."\",'Y')";
		$result = $db->result($qry);	
	
		http_response_code(200);
		$users_arr["messageCode"] ="01";
	
		return json_encode(  $users_arr );
	}
	
	function update($payload,$idUser,$token ){
		$db = new Database();
		$conn =  $db->getConnection();


		
		$qry = sprintf( "update   announcement set  	
						 title =\"".mb_convert_encoding($payload->title, 'ISO-8859-1', 'UTF-8')."\",
						 typecompany=\"".$payload->typeCompany."\",
						 sector='".$payload->idSector."',	
						 billing=\"".$payload->idBilling."\",
						 description=\"".mb_convert_encoding($payload->description, 'ISO-8859-1', 'UTF-8')."\",  
						 youtubelink=\"".$payload->youtubelink."\",				
						 priceselling=\"".$payload->priceselling."\",
						 numberemployee=\"".$payload->numberemployee."\",
						 conditionpart=\"".$payload->conditionpart."\",
						 zone=\"".$payload->idZone."\",
						 confidencial='".$payload->confidencial."',
						 price='".$payload->price."', 
						 dtmodify=now(),
						 datainc=now(),
						 www =\"".$payload->www."\" ,
						 typeannouncement =\"".$payload->idTypeAnManual."\" 
						 where id_user='%s'  and  
						 id='%s'", mysql_real_escape_string($payload->idUser,$conn) ,
						 mysql_real_escape_string($payload->id,$conn) );

			$result = $db->result($qry);	
	

		http_response_code(200);
		
		$users_arr=array();
		//$users_arr["qry"] = $qry; 
		$users_arr["messageCode"] = "01";
		return json_encode(  $users_arr );
		
	}
	
	function del($id, $idUser){
		
		$db = new Database();
		$conn =  $db->getConnection();
	
		$qry = sprintf("delete from announcement where 
		id='%s' and id_user='".$idUser."'", 
		mysql_real_escape_string ( $id,$conn) );				
		$result = $db->result($qry);	

		http_response_code(200);
		
		$users_arr=array();
		$users_arr["return"] =array( "message" => $this->jsonLastError( json_last_error() ) );
		return json_encode(  $users_arr );
		
	}
	
	function  jsonLastError($error){
		$msg = "";
	    $nessage = array();	
		switch ( $error ) {
			case JSON_ERROR_NONE:
				$message = array( "code" =>  "01", "message" =>  utf8_encode("OK" ) );
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
				$message = array( "code" =>  "401", "message" =>  "Não autorizado");
			break;
			default:
				$message = array( "code" =>  "05", "message" =>  "Unknown error");
			break;
		}
	
		return  $message;
	}
	
	
	function tirarAcentos($string) {
		$string = preg_replace("/[áàâãä]/", "a", $string);
		$string = preg_replace("/Ã¡/", "a", $string);
		$string = preg_replace("/Ã©/", "e", $string);
		$string = preg_replace("/Ã­/", "i", $string);
		$string = preg_replace("/Ãº/", "u", $string);
		$string = preg_replace("/Ã³/", "o", $string);
		$string = preg_replace("/Ã³/", "o", $string);
		$string = preg_replace("/Ãº/", "u", $string);
		$string = preg_replace("/Ã£/", "a", $string);



		$string = preg_replace("/[][><}{)(:;,!?*%~^`@]/", "", $string);
		return $string;
	}
	//Ã¡ Ã© Ã­ Ãº Ã³
	
	//á é í ú ó
	
	
	function estatísticas( $type ){
		$db = new Database();
	
		$countmov = 0;
		$qry = "select countmov from  mobilestat where datamov='".date("Y")."-".date("m")."-".date("d")."' AND type='$type'";
		$result = $db->result($qry);	
		while ($row = mysql_fetch_assoc($result)) {
			$countmov  = $row["countmov"]+1;
		}
		if( $countmov == 0 ){
			$qry = "REPLACE INTO mobilestat VALUES( now(), $countmov ,'$type' ) ";
		}else{
			$qry = "UPDATE mobilestat set countmov=$countmov where datamov='".date("Y")."-".date("m")."-".date("d")."' AND type='$type'";
		}
		$db->result($qry);	
	}
		
	
	
	
	
	
}?>