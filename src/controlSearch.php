<?php   


   if(  $_SERVER['REQUEST_URI'] == "/index2.php"  )
	{ 
		$title = " NegociosLucrativos.com Venda Compra aquisi��o fus�o de empresas $dataAnnouncement[title]";

		$description = "Portal de neg�cios, site de neg�cios, empresa de neg�cios, venda de neg�cios, venda de empresa, venda de industria, venda de empresas, empresas a venda, venda de m�quinas e equipamentos, business opportunities, investment in brazil, investidores, s�cios, cis�o, fus�o, incorpora��o, aquisi��o, grupo de investidores, grupo de investimentos, fundos de investimentos, pchs, usinas de a��car, usinas de �lcool, minera��o, papel e celulose, distribuidora de petr�leo, investing in brazil, agroneg�cio, brazil economy ";
		$keywords = "negocios a venda, empresas a venda, portal de neg�cios, site de neg�cios, empresa de neg�cios, assessoria em neg�cios, venda de neg�cios, venda de empresa, venda de industria, venda de empresas, venda de m�quinas e equipamentos, business opportunities, investment in brazil, investidores, s�cios, cis�o, fus�o, incorpora��o, aquisi��o, grupo de investidores, grupo de investimentos, fundos de investimentos, pchs, usinas de a��car, usinas de �lcool, minera��o, papel e celulose, distribuidora de petr�leo, investing in brazil, agroneg�cio, brazil economy";
	
	}
	else
	{ 
		$description = $dataAnnouncement[description];
		$keywords =  $dataAnnouncement[description];

		if( $dataAnnouncement[typeannouncement]  == "S" )
			$typeAnnouncement = "Venda de empresa Setor ";
		else
			$typeAnnouncement = "Compra ou Investidores de empresas Setor  ";

		switch( $dataAnnouncement["typecompany"] ){
			case "I":
				$typecompany = " Ind�stria";
				break;
			case "C":
				$typecompany = " Com�rcio";
				break;
			case "S":
				$typecompany = "  Servi�o";
				break;
		}
		$title  = $dataAnnouncement[title]; 
	}
   
   
?>