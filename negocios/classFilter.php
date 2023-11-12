<?php

class classFilter extends classCommons {

		function  classFilter(){

	 
		}

		function queryWord( $lupa, $txtSearch){
			global $_SESSION;

			if( $lupa || $txtSearch ){

                if( $txtSearch ){
					$qryWhere .=   "  and  ( description LIKE  '%$txtSearch%'  or   title LIKE  '%$txtSearch%' )  ";
				}
			}
			return $qryWhere;
		}

		function queryFilter( $typeAnManual,$sector,$typeCompany, $billing, $zone, $lupa, $txtSearch  ){

            $aSector = $this->aSector() ; 
			if($sector && !$aSector[$sector] ){
				return -1;
			}
			$aZone = $this->aZone();
			if($zone && !$aZone[$zone] ){
				return -1;
			}

			if( $typeCompany != "" and  $typeCompany != "I" and  $typeCompany != "C" and   $typeCompany != "S"  ){
				return -1;
			}
			
			//if( $typeAnManual != 'B' AND $typeAnManual != 'S' ){
			//		return -1;
			//}
				
			$qryWhere = " where ";

			if( $typeAnManual )
				$qryWhere .= "  a.typeannouncement='$typeAnManual'";
			else
				$qryWhere .= " ( a.typeannouncement='B' OR a.typeannouncement='S' ) ";

		    $qryWhere .= $this->queryWord( $lupa, $txtSearch );

			if( $sector  )
				$qryWhere .= " and a.sector='$sector'";

			if( $typeCompany  )
				$qryWhere .= " and typecompany='$typeCompany'";

			if( $billing  )
				$qryWhere .= " and billing='$billing'";

			if( $zone )
				$qryWhere .= " and zone='$zone'";


			return $qryWhere;
		}

}
?>
