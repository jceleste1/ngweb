<? 

include("../config.inc");

/*
$myfile = 'readers.txt';
$lines = file($myfile);    
for($i=count($lines);$i>0;$i--){
	
	$data = explode("|",$lines[$i]);		
	$to = $data[1];
	$headers = "Content-type: text/html; charset=iso-8859-1\r\n";

	//mail($to, $subject, $html, $headers)
}
*/


include("middle.php");


//$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
mail("jceleste1@gmail.com", "NegociosLucrativos.com", $html, $headers)

?>