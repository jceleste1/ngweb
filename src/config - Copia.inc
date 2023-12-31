<?php

error_reporting(0);

$_SESSION["version"]  = "pt";

include("properties.php");

$aMarketing[1] ="Links patrocinados do Google";
$aMarketing[2] ="Links patrocinados do Yahoo";
$aMarketing[3] ="Sebrae classificados";
$aMarketing[4] ="Classificados Estado de São Paulo";
$aMarketing[5] ="Classificados Folha de São Paulo";
$aMarketing[6] ="E-mail marketing";
$aMarketing[7] ="Outros";

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

$aEmpresa[1]="Ind&uacute;stria";
$aEmpresa[2]="Comércio";
$aEmpresa[3]="Serviço";


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

$aTypecompany = array();
$aTypecompany["I"] = "Indústria";
$aTypecompany["C"] = "Comércio";
$aTypecompany["S"] = "Serviço";



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
 

 if( ! $conexao ) {
         $conexao =  mysql_connect( $RDS_URL, $RDS_user, $RDS_pwd);

         if(  mysql_error() ) {
	         echo  mysql_error() ; 
             $msg = "ERRO NO BANCO DE DADOS" + NMDATABASE;
			 if( $sendMail ) {
				echo "Erro na conexão  "+ mysql_error() ;
                //   exit;
			}
         }

  }

         

  $DB = "negocioslu_db";
  

  
  
  $result = mysql( $DB , $qry );
  if( mysql_error() ){
    	
             $msg = "ERRO NA QUERY BRASIL FORTE\n\n $qry " ;
			 if( $sendMail ){
				echo  $qry . " <br> ".mysql_error(). "<br>";
			}
             
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
$aMonths[3] = 'Março';
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
