<?


	include("../config.inc");






$qry = "SELECT p.id id_photo,  a.id  id_anuncio , a.title,a.datainc, p.ext ext, a.title   FROM photoEnterprise p , announcement a    WHERE p.idAnnouncement = a.id";
// echo $qry;
$result2 = fMySQL_Connect($qry);	
$_rows_ = mysql_num_rows($result2);
for ($i=0;$i<$_rows_;$i++)  
{
	 $line=mysql_fetch_assoc($result2);


	 $photoTEMP =  $line[id_photo].".".$line[ext];

 	 $photo =  $line[id_photo]."M.".$line[ext];

	 echo "$photo  <hr>";


	 geraThumb( $photoTEMP,$photo, "140");



}





function geraThumb($photo, $output, $new_width) 
	{ 
		$source = imagecreatefromstring(file_get_contents($photo)); 
		list($width, $height) = getimagesize($photo); 
		if ($width>$new_width) 
		{ 
			$new_height = ($new_width/$width) * $height; 
			$thumb = imagecreatetruecolor(140, 174); 
			imagecopyresampled($thumb, $source, 0, 0, 0, 0, 140, 154, $width, $height); 
			imagejpeg($thumb, $output, 100); 
		} 
		else 
		{ 
			copy($photo, $output); 
		} 
	} 



?>