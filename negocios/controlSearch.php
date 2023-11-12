<?php   


   if(  $_SERVER['REQUEST_URI'] == "/index2.php"  )
	{ 
		$title = " NegociosLucrativos.com Venda Compra aquisição fusão de empresas $dataAnnouncement[title]";

		$description = "Portal de negócios, site de negócios, empresa de negócios, venda de negócios, venda de empresa, venda de industria, venda de empresas, empresas a venda, venda de máquinas e equipamentos, business opportunities, investment in brazil, investidores, sócios, cisão, fusão, incorporação, aquisição, grupo de investidores, grupo de investimentos, fundos de investimentos, pchs, usinas de açúcar, usinas de álcool, mineração, papel e celulose, distribuidora de petróleo, investing in brazil, agronegócio, brazil economy ";
		$keywords = "negocios a venda, empresas a venda, portal de negócios, site de negócios, empresa de negócios, assessoria em negócios, venda de negócios, venda de empresa, venda de industria, venda de empresas, venda de máquinas e equipamentos, business opportunities, investment in brazil, investidores, sócios, cisão, fusão, incorporação, aquisição, grupo de investidores, grupo de investimentos, fundos de investimentos, pchs, usinas de açúcar, usinas de álcool, mineração, papel e celulose, distribuidora de petróleo, investing in brazil, agronegócio, brazil economy";
	
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
				$typecompany = " Indústria";
				break;
			case "C":
				$typecompany = " Comércio";
				break;
			case "S":
				$typecompany = "  Serviço";
				break;
		}
		$title  = $dataAnnouncement[title]; 
	}
   
   
?>