<font color=darkred size=5>Processando....</font>
<?php 

set_time_limit(0);

include('../config.inc');


$handle = fopen("data/administ.txt", "r");
$contents = '';
$count =0;
while (!feof($handle)) {
  $contents =  trim( fgets($handle, 1024) );
  
  
  $qry = "INSERT INTO `maillist` ( `mail`, `sent`, `allowed`) VALUES ('$contents', 'N', 'Y')";
  fMySQL_Connect($qry);
  $count ++;
  if( $count > 100 ){
	  
	  echo  "Integrando dados...aguarde....<hr>";
	  $count = 0;
  }
	  
  
}


fclose($handle);

echo "Fim do processamento";
?>