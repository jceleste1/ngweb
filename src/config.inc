<?php

error_reporting(0);

$_SESSION["version"]  = "pt";

include("properties.php");

$aMarketing[1] ="Links patrocinados do Google";
$aMarketing[2] ="Links patrocinados do Yahoo";
$aMarketing[3] ="Sebrae classificados";
$aMarketing[4] ="Classificados Estado de S�o Paulo";
$aMarketing[5] ="Classificados Folha de S�o Paulo";
$aMarketing[6] ="E-mail marketing";
$aMarketing[7] ="Outros";



$aEmpresa[1]="Ind&uacute;stria";
$aEmpresa[2]="Com�rcio";
$aEmpresa[3]="Servi�o";





define("email_RESP","jceleste1@gmail.com");
define("PUBLISH","Y");


$conexao = "";


####### Funcao de conexao ao banco de dados###########
#
function fMySQL_Connect($qry,$DB="",$sendMail=true){

	Global $conexao ;
	Global $RDS_URL;
	Global $RDS_user;
	Global $RDS_pwd;
	$DB = "ngweb";
  
	$conn = mysqli_connect( $RDS_URL,$RDS_user,$RDS_pwd, $DB ); 

	if( mysqli_connect_error() ){
		echo "Error  " .mysqli_connect_error();
	}

  echo "v20 -->";
	$result = mysqli_query($conn, $qry );

	if( mysqli_connect_error() ){
		echo  mysqli_connect_error();

		$msg = "ERRO NA QUERY BRASIL FORTE\n\n $qry " ;
		echo  $qry . " <br> ".mysql_error(). "<br>";
		    
	}
	return $result;
}

#
########################################



 function format_date($date) 
    {
      $data_temp = explode("-",$date);
      $date = substr($data_temp[2],0,2)."-".$data_temp[1]."-".$data_temp[0];
      return $date;
    }
 include("arrayErro.php");


$aMonths = Array();
$aMonths[1] = 'Janeiro';
$aMonths[2] = 'Fevereiro';
$aMonths[3] = 'Mar�o';
$aMonths[4] = 'Abril';
$aMonths[5] = 'Maio';
$aMonths[6] = 'Junho';
$aMonths[7] = 'Julho';
$aMonths[8] = 'Agosto';
$aMonths[9] = 'Setembro';
$aMonths[10] = 'Outubro';
$aMonths[11] = 'Novembro';
$aMonths[12] = 'Dezembro';
?>
