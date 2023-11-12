<?php
header('Content-Type: text/html; charset=ISO-8859-1');
// echo  $_SERVER['SERVER_NAME']."<hr>";
// echo $_SERVER['REQUEST_URI']."<hr>";
// echo $_SERVER['HTTP_REFERER']."<hr>";

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
<html>
<head>
	<title><?=$title?></title>
	<meta name="description" content="<?=$description?>" >
	<META NAME="Description" language="english" CONTENT="NegociosLucrativos.com is the right place to buy and sell small, medium and large business. Work with Venture capital, Investment Banks , Project Finance and Private Equity">
	<meta name="keywords" content="<?=$keywords?>">
	<Meta name="author" content="Brasil Forte Consultoria Ass. Ltda">
	<meta name="classification" content="Empresas">
	<meta name="subject" content="ecommerce">
	<meta name="rating" content="general">
	<meta name="roboots" content="index, all">
	<meta name="robots" content="index, follow">
	<meta name="revisit-after" content="1 days">
	<meta name="copyrigth" content="Brasil Forte Consultoria Ass. Ltda">
	<META name="GOOGLEBOT" content="INDEX, FOLLOW">
	<meta name="audience" content="all">



	<link rel="stylesheet" type="text/css" href="<?=$nivel?>css/class.css" />
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>css/menu.css" />
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>css/boxMessage.css" />

	<link rel="stylesheet" type="text/css" href="<?=$nivel?>build/fonts/fonts.css">
	<link type="text/css" rel="stylesheet" href="<?=$nivel?>build/carousel/assets/skins/sam/carousel.css">
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>build/fonts/fonts.css">
	<link type="text/css" rel="stylesheet" href="<?=$nivel?>build/carousel/assets/skins/sam/carousel.css">

	<script src="<?=$nivel?>build/utilities/utilities.js"></script>
	<script src="<?=$nivel?>build/carousel/carousel-min.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/carousel/carouselariaplugin.js"></script>


	<!--YUI-->
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>build/container/assets/skins/sam/container.css" />
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>build/datatable/assets/skins/sam/datatable.css" />
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>build/calendar/assets/skins/sam/calendar.css" />
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>build/tabview/assets/skins/sam/tabview.css" />
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>build/button/assets/skins/sam/button.css" />
	<link rel="stylesheet" type="text/css" href="<?=$nivel?>build/fonts/fonts.css" />

	<link rel="stylesheet" type="text/css" href="./jquery/skin.css" />
<script type="text/javascript" src="<?=$nivel?>js/jquery.min.js"></script>

	<script type="text/javascript" src="<?=$nivel?>build/yahoo-dom-event/yahoo-dom-event.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/dragdrop/dragdrop.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/element/element-beta-min.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/container/container.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/button/button-min.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/datasource/datasource-min.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/datatable/datatable-min.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/calendar/calendar-min.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/tabview/tabview-min.js"></script>
	<script type="text/javascript" src="<?=$nivel?>build/resize/resize.js"></script>

	<script type="text/javascript" src="<?=$nivel?>js/validAnnouncement.js"></script>
	<script type="text/javascript" src="<?=$nivel?>js/boxmessage.js"></script>

	<script type="text/javascript" src="<?=$nivel?>js/funcoes.js"></script>
		<style type="text/css">

			.yui-carousel-element li {
				height: 158px;
				text-align: left;
			}

			#container {
				font-size: 13px;
				margin: 0 auto;
			}

			#container a {
				text-decoration: none;
			}

			#container li img {
				border: 0;
			}

			#container .intro {
				display: inline;
				margin: 0px 4px 0px 4px;
				width: 252px;
			}

			#container .item {
				display: inline;
				margin: 0 2px 0 12px;
				overflow: hidden;
				padding-right: 0px;
				width: 156px;
			}

			#container .item .authimg {
				bottom: 2px;
				margin-left: 61px;
				position: absolute;
				z-index: 1;
			}

			#container .item h3 {
				line-height: 85%;
				margin-top: 4px;
			}

			#container .item h3 a {
				font: 77% Arial, sans-serif;
				position: relative;
				text-transform: uppercase;
				z-index: 2;
			}

			#container .item h3 a:link {
				color:#35a235;
			}

			#container .item h4 {
				margin-top:5px;
			}

			#container .item h4 a {
				font: 100% Georgia, Times, serif;
				position: relative;
				z-index:2;
			}

			#container .item h4 a:link {
				color:#00639b;
			}

			#container .item cite {
				color: #888;
				display: block;
				font-size: 77%;
				line-height: normal;
				margin-bottom: 30px;
			}

			#container .item p.all {
				bottom: 25px;
				position: absolute;
				z-index: 2;
			}

			#container .item p.all a {
				font-weight: bold;
				font-size: 85%;
			}

			/*
				The Carousel ARIA Plugin removes the "href" attribute from the <A> elements used to
				create the buttons in the navigation, resulting in the focus outline no longer be
				rendered in Gecko-based browsers when the <A> element is focused.  For this reason,
				it is necessary to restore the focus outline for the <A>.
			*/
			a[role=button]:focus {
				outline: dotted 1px #000;
			}





		</style>

</head>

<body leftmargin="0" topmargin="0" marginheight="0" marginwidth="0" text="#000000" link="#000000" vlink="#000000" alink="#000000" bgproperties="fixed" class="yui-skin-sam" >

<TABLE cellSpacing=0 cellPadding=0 width=766 align=center border=0 height="106">
 <TBODY>
  <TR vAlign=bottom>
    <TD align=left width=180><A
      href="index2.php">
      <IMG
      alt="Negócios Lucrativos" src="<?=$nivel?>img/top_logo.gif"
      border=0></A><BR>
      </TD>
    <TD align=right width=585 background="">
      <TABLE cellSpacing=0 cellPadding=0 border=0>
        <TBODY>
        <TR vAlign=bottom align=left>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_01.gif" border=0 alt='Portal de negócios, site de negócios, empresa de negócios'></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_02.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_03.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_04.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_05.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_06.gif" border=0></TD>
          <TD>
			<p align="center"><IMG src="<?=$nivel?>img/topo_07.gif" border=0></TD>
          </TR>
 	     </TBODY>
  	   </TABLE>
    </TD>
   </TR>
  <TR vAlign=bottom>
    <TD align=left width=766 colspan="2" height="10">

      </TD>
   </TR>
   </TBODY>
</TABLE>
