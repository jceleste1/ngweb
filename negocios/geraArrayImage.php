<?

include("../config.inc");



$qry = "SELECT p.id id_photo,  a.id  id_anuncio , a.title,a.datainc datainc, p.ext ext, a.title, a.sector   FROM photoEnterprise p , announcement a    WHERE p.idAnnouncement = a.id";
// echo $qry;
$result2 = fMySQL_Connect($qry);	
$_rows_ = mysql_num_rows($result2);



$out  =  " array( ";  
$xx = 0;
$x = 1;
for ($i=0;$i<$_rows_;$i++)  
{
	 $line=mysql_fetch_assoc($result2);


	 $photoTEMP =  $line[id_photo].".".$line[ext];

 	 $photo =  $line[id_photo]."M.".$line[ext];
   
	 $datainc = format_date($line[datainc]) ;

   
     if(file_exists("../imgEnter/$photo")) { 
		$out .=   " $xx => array('".$photo."','".$line[title]."','".$datainc."','".$line[sector]."','".$line[id_anuncio]."'),\n " ;
		//echo "processando $photo";
		$xx++;
	}	

}

echo $out;






?>