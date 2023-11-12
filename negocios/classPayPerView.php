<?php

class classPayPerView{

		function  classPayPerView(){
		
		}
		
		function  salve($idUser,$idAnnouncement="0", $idMsg="0",$device="D" ){	    
			
				$qry = "INSERT INTO viewpay ( id_user, id_announcement, id_msg, datainc, device ) VALUES( ";
				$qry .= "  '$idUser', '$idAnnouncement', '$idMsg', now(), '$device') ";
				fMySQL_Connect($qry,"",true);		
		}
		
		function  getView( $idUser,$idAnnouncement="0", $idMsg="0" ){	    
			
				$qry = "select id from viewpay where id_user=$idUser and id_announcement=$idAnnouncement and id_msg=$idMsg" ;
				// echo $qry;
				$result = fMySQL_Connect($qry,"",false);	
				
				return mysql_fetch_array( $result ) ; 	
		}
		
		function  getBalance($idUser ){	    			
				$qry = "select credit from register where id=$idUser";
				$result = fMySQL_Connect($qry,"",true);	
                return  mysql_fetch_array( $result ) ;		
		}
		
	               
		
		function  debit( $idUser, $idAnnouncement="0", $idMsg="0", $device="D" ){	    
			
			$result = $this->getView( $idUser, $idAnnouncement, $idMsg );
			if( !$result["id"] ){
				
				
				
				$result = $this->getBalance( $idUser );
				$qry = "update register set credit=".($result["credit"]-1)." where id=$idUser";
				$result = fMySQL_Connect($qry,"",true);	
				echo  $result;
				
				$this->salve($idUser,$idAnnouncement, $idMsg , $device );
			}
		}
		
}



?>
		