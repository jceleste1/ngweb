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

$aEmpresa[1]="Ind&uacute;stria";
$aEmpresa[2]="Com�rcio";
$aEmpresa[3]="Servi�o";


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
$aInvestimento[2] = "R$ 100 mil  a  1 milh�o";
$aInvestimento[3] = "R$ 1 milh�o a R$ 2,5 milh�es";
$aInvestimento[4] = "R$ 10 milh�es a R$ 15 milh�es";
$aInvestimento[5] = "R$ 15 milh�es a R$ 20 milh�es";
$aInvestimento[6] = "R$ 2,5 milh�es a R$ 5 milh�es";
$aInvestimento[7] = "R$ 20 milh�es a R$ 30 milh�es";
$aInvestimento[8] = "R$ 5 milh�es a R$ 7,5 milh�es";
$aInvestimento[9] = "R$ 7,5 milh�es a R$ 10 milh�es";
$aInvestimento[10] = "Acima de R$ 30 milh�es";

$aTypecompany = array();
$aTypecompany["I"] = "Ind�stria";
$aTypecompany["C"] = "Com�rcio";
$aTypecompany["S"] = "Servi�o";



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
				echo "Erro na conex�o  "+ mysql_error() ;
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
