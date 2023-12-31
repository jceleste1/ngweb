<?php


if( ! $conexao ) {
	$conexao =  mysql_connect( "localhost","root","Isr0704@");
}
	

if( $_REQUEST['btSend'] )
{
	recImage($_REQUEST["id_adv"]);
}


if(  $_REQUEST['d'] )
{	
    $qry = sprintf("delete from photoEnterprise   where  id='%s'",
    mysql_real_escape_string($_REQUEST["id"],$conexao) );
   fMySQL_Connect($qry);
}


?>

<br/><br/><br/><br/>
<table cellpadding="1" cellspacing="3" border="0" align="center" width='550 px' bgcolor='#E2EADF'>	
<form action='mvcAnnouncement.php' method='post' name='form'  enctype="multipart/form-data" onsubmit="return valid(this)">
<input type=hidden name='action' value="image">
<input type=hidden name='id_adv' value="<?php echo $_REQUEST["id_adv"]; ?>">


<tr>
	<td align="center" colspan=2>&nbsp;</td>
</tr>

<tr>
	<td align="center" bgcolor="#DDFFDD" colspan=2><font color=black size=3>FOTOS REFERENTE A SUA EMPRESA OU NEGOCIO QUE VOCÊ QUER ANUNCIAR</font></td>	
</tr>

<tr>
	<td align="justify" colspan=2>As fotos devem estar no formato JPG ou GIF e com peso máximo de 4MB (cada foto). As dimensões recomendadas de 580 x 435 pixels (largura x altura). Utilize fotos preferencialmente na posição horizontal. 
	</td>
</tr>

<tr>
	<td align="center"   class="gray">Foto </td>		
	<td class="gray"> <input type=file name=foto1>  </td>
</tr>

<tr>
	<td align="center">&nbsp;
	</td>
</tr>


<tr>
	<td align="center"   class="gray" colspan=2><input type='submit' name=btSend value='Enviar >>'></td>		
	
</tr>
</table>
<table cellpadding="1" cellspacing="3" border="0" align="center" width='550 px' bgcolor='#E2EADF'>	
<?php

$qry = sprintf("select id,ext  from photoEnterprise where idAnnouncement='%s'",
mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );


$result2 = fMySQL_Connect($qry);	
$_rows_ = mysql_num_rows($result2);

if( $_rows_ )
{
	echo "<tr><td colspan=2 align='center'><b> Fotos Cadastradas</b></td></tr>";
	for ($i=0;$i<$_rows_;$i++)  
	{
		 $line=mysql_fetch_assoc($result2);
		 echo "<tr>";
		 echo "<td><img src='./img/m040.gif' border='0'></td> ";

		 echo "<td><a href=http://www.negocioslucrativos.com/mvcAnnouncement.php?action=image&id=".$line[id]."&id_adv=".$_REQUEST["id_adv"]."&d=1>Excluir</a></td> ";

		 echo "</tr>";
	}

}

?>


</form>
</table>



<?php




function recImage($idAnnouncement)
{
	global $_FILES;

	global $_SESSION;


	$PATH_UPLOAD = "./imgEnter/";

	// echo "<pre>";
	// print_r($_FILES);


	while (list($key, $file) = each($_FILES)) {
			if(  $file[name] )
			{



				   $ext = @explode( ".", $file[name] );

					$qry = "insert into photoEnterprise ( idRegister, datainc,idAnnouncement,ext ) values( ".$_SESSION[id].", now(), $idAnnouncement,'".$ext[1]."')";
				   $res = fMySQL_Connect($qry);

				   $idPhoto = mysql_insert_id();


				   $photoTEMP = $PATH_UPLOAD.$idPhoto."TEMP.".$ext[1];

				    $photo     = $PATH_UPLOAD.$idPhoto.".".$ext[1];			  
	
					$arquivo_remoto = $arquivo_remoto.$idPhoto.".jpg";


				   move_uploaded_file($file[tmp_name], $photoTEMP ) ; 

				  geraThumb( $photoTEMP,$photo, "405");

   				   @unlink( $photoTEMP );

				  


            }
		}

}

function geraThumb($photo, $output, $new_width) 
	{ 


		$source = imagecreatefromstring(file_get_contents($photo)); 
		list($width, $height) = getimagesize($photo); 
		if ($width>$new_width) 
		{ 
			$new_height = ($new_width/$width) * $height; 
			$thumb = imagecreatetruecolor(500, 405); 
			imagecopyresampled($thumb, $source, 0, 0, 0, 0, 500, 405, $width, $height); 
			imagejpeg($thumb, $output, 100); 
		} 
		else 
		{ 
			copy($photo, $output); 
		} 
	} 









?>
