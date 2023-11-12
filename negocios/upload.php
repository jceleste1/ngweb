<pre>
<?

	$PATH_UPLOAD = './imgEnter/';

	if($_REQUEST['enviar'])
	{
		print_r($_FILES);
		echo "<pre>";

		while (list($key, $file) = each($_FILES)) {
			if(  $file[name] )
			{
				


				   $idPhoto = 3;
				   $ext = @explode( ".", $file[name] );

				   $photoTEMP = $PATH_UPLOAD.$idPhoto."TEMP.".$ext[1];

				   $photo     = $PATH_UPLOAD.$idPhoto.".".$ext[1];			  

				   @unlink($path);
				   move_uploaded_file($file[tmp_name], $photoTEMP ) ; 

				  geraThumb( $photoTEMP,$photo, "470");
            }
		}
	}

?>


<form action="upload.php" method="POST"   enctype="multipart/form-data" name="form">


Foto 1 <input type=file name=foto1> <br/>
Foto 2 <input type=file name=foto2> <br/>
Foto 3 <input type=file name=foto3> <br/>
Foto 4 <input type=file name=foto4> <br/>
Foto 5 <input type=file name=foto5> <br/>
Foto 6 <input type=file name=foto6> <br/>

<br/><br/>



<input type=submit name='enviar' value=' Enviar '>

</form>

<?

	function geraThumb($photo, $output, $new_width) 
	{ 
		$source = imagecreatefromstring(file_get_contents($photo)); 
		list($width, $height) = getimagesize($photo); 
		if ($width>$new_width) 
		{ 
			$new_height = ($new_width/$width) * $height; 
			$thumb = imagecreatetruecolor(490, 355); 
			imagecopyresampled($thumb, $source, 0, 0, 0, 0, 490, 355, $width, $height); 
			imagejpeg($thumb, $output, 100); 
		} 
		else 
		{ 
			copy($photo, $output); 
		} 
	} 




?>