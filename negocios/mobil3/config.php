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
	 echo "Erro na conexão com MySql "+ mysql_error() ;
}


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
