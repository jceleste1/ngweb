
<script>
function formEmail()
{
        self.location="index.php?rot=formEmail";
}
</script>


<link rel="stylesheet" href="pagging.css">
<center>

<?php


$qry = "select  count(*) count from register ";
$result = fMySQL_Connect($qry);
$datcount = mysql_fetch_array( $result ) ; 



$registrosPorPagina = 10;
$registroInicial = 0;
$ultimoRegistro = 0;


$qryWhere = "";



$qry = "select count(*)  from newsletters a  ";
$result = fMySQL_Connect($qry);	
List( $totalRegistros )= mysql_fetch_row($result);



?>

<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  cellpadding="1" cellspacing="3"   width='100%'>
	<form action='mvcAnnouncement.php' method='post'>
	<input type='hidden' name='action' value='listBusinessBuy'>
	<tr>
		<td bgcolor='white' colspan='5' align=center><input type=button value='Nova newsletters' onclick='formEmail();'></td>
	</tr>


	<tr>
		<td bgcolor='white' colspan='5' align=center><font class='tituloAdv'>Total de inscritos <b> <?php echo $datcount["count"]?><b>&nbsp;&nbsp;Newsletters NegociosLucrativos.com</font></td>
	</tr>
	

	<tr>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Subject</font></td>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Data Envio</font></td>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Status</font> </td>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>&nbsp;</font> </td>
		
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>&nbsp;</font> </td>

	</tr>



<?php

	criarPaginacao();



	$qry = "select 	idEdition,  subject,  dateEdition , dtSend , matter ,status  from newsletters order by  dtSend desc";
	// echo $qry;
	$result2 = fMySQL_Connect($qry);	
	$_rows_ = mysql_num_rows($result2);
	for ($i=0;$i<$_rows_;$i++)   {
		 $line=mysql_fetch_assoc($result2);

		 $font = "<font color='#24486C'>";
		 $bgcolor = " bgcolor='#FDFDFD'";
		 if( ($i%2)==0)  {
			 $bgcolor = " bgcolor='#E9ECF7'";
			 $font = "<font color='#24486C'>";
		 }

		 $linkStatus = ""; $linkModify = "";
		 if( $line[status] == 'P' )
		 {
	 		 $linkStatus = "<a href=index.php?rot=sendNews&idEdition=$line[idEdition]>Enviar</a>";
		 	 $linkModify = "<a href=index.php?rot=formEmail&idEdition=$line[idEdition]>Alterar</a>";
		 }
		 else if( $line[status] == 'E' )
		{
	 		 $linkStatus = "Enviado";

 		 	 $linkModify = "<a href=index.php?rot=formEmail&buttonAction=notview&idEdition=$line[idEdition]>View</a>";

		}

	
		 echo "<tr height='35 px'>";
		 echo "<td $bgcolor> $ahref ".$line["subject"]." </a></td>";
		 echo "<td $bgcolor> $ahref ".format_date($line["dtSend"])." </a></td>";
		 echo "<td $bgcolor> $ahref ".$linkStatus." </a></td>";
		 echo "<td $bgcolor>$ahref ". $linkModify." </a></td>";

		echo "<td $bgcolor><a href=index.php?rot=sendNews&idEdition=$line[idEdition]&testar=true>  Testar </a></td>";
		 
		 echo "</tr>";
	}
?>

<tr>
	<td colspan='4' bgcolor='white' align='center'> <font class='subtitulo3'> Página de resultados </font>
		<div id="rodapePaginacao" class="rodapePaginacao">
			<ul> 
				<?php

				for ($i=0; $i < $qtdPaginas; $i++){
					$class = "";
					if ($i == $paginaAtual){
						$class = "paginaSelecionada";
					}



					?>
					<li class="<?php echo $class?>">
						<a href="mvcAnnouncement.php?action=listBusinessBuy&<?php echo $post."&paginaAtual=".$i."&totalPaginas=".$qtdPaginas."&totalRegistros=".$totalRegistros?>" class="<?php echo $class?>">
						<?php echo $i+1?> 
						</a>
					</li> 
					<?php
				}// for
				?>
			</ul>
			<ul> 
		</div>
	</td>
</tr>
<tr>
	<td colspan='5' bgcolor='white' align='center'><?php echo $htmlVoltar?></td>
</tr>
</form>
</table>



</center>


<?php
function criarPaginacao(){
	global $registrosPorPagina;
	global $qtdPaginas;
	global $paginaAtual;
	global $registroInicial;
	global $ultimoRegistro;
	global $totalRegistros;
	global $_REQUEST;

	if( !$totalRegistros )
		$totalRegistros = $_REQUEST["totalRegistros"];
	
	$qtdPaginas = ceil($totalRegistros / $registrosPorPagina);
	if ( !isset($_REQUEST["paginaAtual"]) ){
		$paginaAtual = 0;
		$registroInicial = 0;
		$ultimoRegistro = $registroInicial + $registrosPorPagina - 1;
	}
	else{
		$paginaAtual = $_REQUEST["paginaAtual"];
		$registroInicial = ($registrosPorPagina * ($paginaAtual) ) + 0;
		$ultimoRegistro = $registroInicial + $registrosPorPagina -1;
	}

}// criarPaginacao
?>