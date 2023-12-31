 <?php 

class classCommons {
	
	
	function  classCommons(){
	}	
	
	
	function aTypeAnManual(){
		$aType = array();
		$aType["S"] = "Empresas a venda";
		$aType["B"] = "Investidores/Compradores";
		return $aType ;
	}


	function typeAnManual(){
		$aType = $this->aTypeAnManual();

		$aTypes= array();
		$aTypes["announcement"]=array();
		
		while( list( $key,$val ) =each( $aType   ) ){
			
			array_push( $aTypes["announcement"] ,
                		array( "id" => $key , "name" =>utf8_encode( $val ) )
					  );
		}
		
					 	
		return json_encode(  $aTypes, JSON_PRETTY_PRINT );
	}


	
	
	function aTypecompany(){
		$aTypecompany = array();
		$aTypecompany["I"] = "Indústria";
		$aTypecompany["C"] = "Comércio";
		$aTypecompany["S"] = "Serviço";
		return $aTypecompany ;
	}
	
	function aSector(){
		$aSector = array();
		$aSector[1]="Aeronáutica";                     
		$aSector[2]="Agrícola";                            
		$aSector[3]="Alimento";                      
		$aSector[4]="Automotivo";                     
		$aSector[5]="Banco / Finanças / Seguros";                      
		$aSector[6]="Concessionária / Posto de Gasolina";                     
		$aSector[7]="Construção";                          
		$aSector[8]="Consultoria";                        
		$aSector[9]="Cosméticos";                       
		$aSector[10]="Couro";                    
		$aSector[11]="Educacional";                      
		$aSector[12]="Eletro / Eletrônico";                     
		$aSector[13]="Embalagens";                      
		$aSector[14]="Farmacêutico";                        
		$aSector[15]="Higiene / Limpeza";                        
		$aSector[16]="Impressão / Publicação";                       
		$aSector[17]="Informática / Informação";                
		$aSector[18]="Máquinas / Equipamentos";                    
		$aSector[19]="Medicina / Saúde";                       
		$aSector[20]="Metalúrgico";                  
		$aSector[21]="Mineração";                   
		$aSector[22]="Móveis";                       
		$aSector[23]="Naval";                      
		$aSector[24]="Plástico / Borracha";                     
		$aSector[25]="Petroquímico";                       
		$aSector[26]="Publicidade";                         
		$aSector[27]="Químico";                     
		$aSector[28]="Segurança";                         
		$aSector[29]="Supermercado / Loja de Departamento";                         
		$aSector[30]="Telecomunicação";                   
		$aSector[31]="Têxtil";                    
		$aSector[32]="Transporte";                    
		$aSector[33]="Turismo / Lazer / Hotel";                       
		$aSector[34]="Vestuário";                       
		$aSector[35]="Veterinário";                    
		$aSector[36]="Outros";                      
		$aSector[37]="Calçados"; 

		return $aSector;
	}
	
	function aBilling(){
		$aInvestimento = array();
		$aInvestimento[1] = "Abaixo de R$ 100 mil";
		$aInvestimento[2] = "R$ 100 mil  a  1 milhão";
		$aInvestimento[3] = "R$ 1 milhão a R$ 2,5 milhões";
		$aInvestimento[4] = "R$ 10 milhões a R$ 15 milhões";
		$aInvestimento[5] = "R$ 15 milhões a R$ 20 milhões";
		$aInvestimento[6] = "R$ 2,5 milhões a R$ 5 milhões";
		$aInvestimento[7] = "R$ 20 milhões a R$ 30 milhões";
		$aInvestimento[8] = "R$ 5 milhões a R$ 7,5 milhões";
		$aInvestimento[9] = "R$ 7,5 milhões a R$ 10 milhões";
		$aInvestimento[10] = "Acima de R$ 30 milhões";

		return  $aInvestimento;
	}

	function zoneName($id){
		
		$aZone = $this->aZone();

		$aZones=array();
		$aZones["aZone"]=array();
		
			
		array_push( $aZones["aZone"] ,
					array( "id" => $id , "name" =>utf8_encode( $aZone[$id] ) )
				  );

		http_response_code(200);			 	
		return json_encode(  $aZones, JSON_PRETTY_PRINT );
	}



	
	function billingName($id){
		
		$aBilling = $this->aBilling();

		$aBillings=array();
		$aBillings["billings"]=array();
		
			
		array_push( $aBillings["billings"] ,
					array( "id" => $id , "name" =>utf8_encode( $aBilling[$id] ) )
				  );

		http_response_code(200);			 	
		return json_encode(  $aBillings, JSON_PRETTY_PRINT );
	}
	
	function sectorName($id){
		
		$aSector = $this->aSector();

		$aSectors=array();
		$aSectors["sectors"]=array();
		
			
		array_push( $aSectors["sectors"] ,
					array( "id" => $id , "name" =>utf8_encode( $aSector[$id] ) )
				  );

		http_response_code(200);			 	
		return json_encode(  $aSectors, JSON_PRETTY_PRINT );
	}
	
	
	function aZone(){
		$aZone = array();
		$aZone[1] =" CentroOeste- Distrito Federal "; 
		$aZone[2] =" CentroOeste- Goias   "; 
		$aZone[3] =" CentroOeste- Mato Grosso ";   
		$aZone[4] =" CentroOeste- Mato Grosso do Sul   "; 
		$aZone[5] =" Nordeste - Alagoas   "; 
		$aZone[6] =" Nordeste - Bahia   "; 
		$aZone[7] =" Nordeste - Ceara   "; 
		$aZone[8] =" Nordeste - Maranhao   "; 
		$aZone[9] =" Nordeste - Paraiba   "; 
		$aZone[10] =" Nordeste - Piaui   "; 
		$aZone[11] =" Nordeste - Recife   "; 
		$aZone[12] =" Nordeste - Rio Grande   "; 
		$aZone[13] =" Nordeste - Sergipe   "; 
		$aZone[14] =" Norte - Acre   "; 
		$aZone[15] =" Norte - Amapa   "; 
		$aZone[16] =" Norte - Amazonas   "; 
		$aZone[17] =" Norte - Para   "; 
		$aZone[18] =" Norte - Rondonia   "; 
		$aZone[19] =" Norte - Roraima   "; 
		$aZone[20] =" Norte- Tocantins   "; 
		$aZone[21] =" Sudeste - Espirito Santo   "; 
		$aZone[22] =" Sudeste - Minas Gerais   "; 
		$aZone[23] =" Sudeste - Rio de Janeiro   "; 
		$aZone[24] =" Sudeste - Sao Paulo   "; 
		$aZone[25] =" Sul - Parana   "; 
		$aZone[26] =" Sul - Rio Grande do Sul   "; 
		$aZone[27] =" Sul - Sta Catarina   "; 
		
		return $aZone;
	}
	
	function sector(){
		$sector = $this->aSector();

		$aSectors= array();
		$aSectors["sectors"]=array();
		
		while( list( $key,$val ) =each( $sector   ) ){
			
			array_push( $aSectors["sectors"] ,
                		array( "id" => $key , "name" =>utf8_encode( $val ) )
					  );
		}
		
					 	
		return json_encode(  $aSectors, JSON_PRETTY_PRINT );
	}
	
	
	function billing(){
		$billing = $this->aBilling();
		
		$aBillings=array();
		$aBillings["billings"]=array();
		
		while( list( $key,$val ) =each($billing) ){
			
			array_push( $aBillings["billings"] ,
                		array( "id" => $key , "name" =>utf8_encode( $val ) )
					  );
		}
		
		http_response_code(200);			 	
		return json_encode(  $aBillings, JSON_PRETTY_PRINT );
	}
	
	
	function typeCompany(){
		$typeCompanys = $this->aTypecompany();
		
		$aTypeCompany=array();
		$aTypeCompany["typeCompanys"]=array();
		
		while( list( $key,$val ) =each($typeCompanys) ){
			
			array_push( $aTypeCompany["typeCompanys"] ,
                		array( "id" => $key , "name" =>utf8_encode( $val ) )
					  );
		}
		
		http_response_code(200);			 	
		return json_encode(  $aTypeCompany, JSON_PRETTY_PRINT );
	}
	
	function zone(){
		$zone = $this->aZone();
		$aZones=array();
		$aZones["zones"]=array();
		
		while( list( $key,$val ) =each($zone) ){
			
			array_push( $aZones["zones"] ,
                		array( "id" => $key , "name" => utf8_encode($val) )
					  );
		}
		
		http_response_code(200);			 	
		return json_encode(  $aZones, JSON_PRETTY_PRINT );
	}
	
	
	function state(){
		$nlista_state1 = Array();
		$nlista_state1[0] = "----";
		$nlista_state1[1] = "AC";
		$nlista_state1[2] = "AL";
		$nlista_state1[3] = "AM";
		$nlista_state1[4] = "AM";
		$nlista_state1[5] = "BA";
		$nlista_state1[6] = "CE";
		$nlista_state1[7] = "DF";
		$nlista_state1[8] = "ES";
		$nlista_state1[9] = "GO";
		$nlista_state1[10] = "MA";
		$nlista_state1[11] = "MS";
		$nlista_state1[12] = "MT";
		$nlista_state1[13] = "MG";
		$nlista_state1[14] = "PA";
		$nlista_state1[15] = "PB";
		$nlista_state1[16] = "PR";
		$nlista_state1[17] = "PE";
		$nlista_state1[18] = "PI";
		$nlista_state1[19] = "RJ";
		$nlista_state1[20] = "RO";
		$nlista_state1[21] = "RM";
		$nlista_state1[22] = "SC";
		$nlista_state1[23] = "SP";
		$nlista_state1[24] = "SE";
		$nlista_state1[25] = "TO";
		$nlista_state1[26] = "RS";
		$nlista_state1[27] = "RN";
		return $nlista_state1;
	}
	
	
	function  jsonLastError($error){
		$msg = "";
		
		switch ( $error ) {
			case JSON_ERROR_NONE:
				$msg =  'TransaÃ§Ã£o efetuada com sucesso !!!';
			break;
			case JSON_ERROR_DEPTH:
				$msg = ' - Maximum stack depth exceeded';
			break;
			case JSON_ERROR_STATE_MISMATCH:
				$msg = ' - Underflow or the modes mismatch';
			break;
			case JSON_ERROR_CTRL_CHAR:
				$msg = ' - Unexpected control character found';
			break;
			case JSON_ERROR_SYNTAX:
				$msg = ' - Syntax error, malformed JSON';
			break;
			case JSON_ERROR_UTF8:
				$msg = ' - Malformed UTF-8 characters, possibly incorrectly encoded';
			break;
			default:
				$msg = ' - Unknown error';
			break;
		}
		return  $msg;
	}
}
?>