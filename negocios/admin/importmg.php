<font color=darkred size=5>Processando....</font>
<?php 

set_time_limit(0);

include('../config.inc');


$handle = fopen("data/Administradores de Empresas do Brasil.csv", "r");
$contents = '';
$count =0;
while (!feof($handle)) {
  $contents =  trim( fgets($handle, 1024) );
  
     $data = explode( ";" , $contents );
  	 
	 
  $qry = "INSERT INTO `maillist` ( `mail` , `sent`, `allowed`,`datainc`,`name`  ) VALUES ('$data[1]', 'N', 'Y',CURDATE(),'$data[0]')";
  echo "$qry<hr>";
  
 fMySQL_Connect($qry);
  $count ++;
  if( $count > 100 ){
	  
	  echo  "Integrando dados...aguarde....<hr>";
	  $count = 0;
	  flush();
  }
	  
  
}


fclose($handle);

echo "Fim do processamento";
?>