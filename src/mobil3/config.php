<?php

session_start();
include("../rds.conf.php");



header('Content-Type: text/html; charset=ISO-8859-1');

header("Expires: -1");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");



 define( 'BASEPATH',   getcwd() . "/" );

set_include_path(BASEPATH);


GLOBAL $RDS_user;
set_include_path(BASEPATH);


$conexao =  mysql_connect( $RDS_URL,$RDS_user,$RDS_pwd);
$DB = "negocioslu_db";

if(  mysql_error() ) {
	 echo  mysql_error() ;
	 $msg = "ERROR DB NegociosLucrativos.com mobile";
	 echo "Erro na conex�o com MySql "+ mysql_error() ;
}


$aSector[1]="Aeron�utica";
$aSector[2]="Agr�cola";
$aSector[3]="Alimento";
$aSector[4]="Automotivo";
$aSector[5]="Banco / Finan�as / Seguros";
$aSector[6]="Concession�ria / Posto de Gasolina";
$aSector[7]="Constru��o";
$aSector[8]="Consultoria";
$aSector[9]="Cosm�ticos";
$aSector[10]="Couro";
$aSector[11]="Educacional";
$aSector[12]="Eletro / Eletr�nico";
$aSector[13]="Embalagens";
$aSector[14]="Farmac�utico";
$aSector[15]="Higiene / Limpeza";
$aSector[16]="Impress�o / Publica��o";
$aSector[17]="Inform�tica / Informa��o";
$aSector[18]="M�quinas / Equipamentos";
$aSector[19]="Medicina / Sa�de";
$aSector[20]="Metal�rgico";
$aSector[21]="Minera��o";
$aSector[22]="M�veis";
$aSector[23]="Naval";
$aSector[24]="Pl�stico / Borracha";
$aSector[25]="Petroqu�mico";
$aSector[26]="Publicidade";
$aSector[27]="Qu�mico";
$aSector[28]="Seguran�a";
$aSector[29]="Supermercado / Loja de Departamento";
$aSector[30]="Telecomunica��o";
$aSector[31]="T�xtil";
$aSector[32]="Transporte";
$aSector[33]="Turismo / Lazer / Hotel";
$aSector[34]="Vestu�rio";
$aSector[35]="Veterin�rio";
$aSector[36]="Outros";
$aSector[37]="Cal�ados";


$aInvestimento[1] = "Abaixo de R$ 100 mil";
$aInvestimento[2] = "R$ 100 mil  a  1 milh�o";
$aInvestimento[3] = "R$ 1 milh�o a R$ 2,5 milh�es";
$aInvestimento[4] = "R$ 10 milh�es a R$ 15 milh�es";
$aInvestimento[5] = "R$ 15 milh�es a R$ 20 milh�es";
$aInvestimento[6] = "R$ 2,5 milh�es a R$ 5 milh�es";
$aInvestimento[7] = "R$ 20 milh�es a R$ 30 milh�es";
$aInvestimento[8] = "R$ 5 milh�es a R$ 7,5 milh�es";
$aInvestimento[9] = "R$ 7,5 milh�es a R$ 10 milh�es";
$aInvestimento[10] = "Acima de R$ 30 milh�es";


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
$aZone[16] =" Norte - Am$aZones   ";
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


require_once "../ismobile/ismobile.class.php";

$ismobi = new IsMobile();

?>
