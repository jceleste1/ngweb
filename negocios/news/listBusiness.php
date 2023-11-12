<? 
session_start(); 
$nivel = "../";
include("../config.inc");
include("../top.php");


?>



<link rel="stylesheet" href="../pagging.css">
<center>
<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  width=766>
  <tr>
	<td bgcolor='white' colspan='4'>&nbsp;</td>
 </tr>
  <tr>
	  <td bgcolor='white' colspan='4' align=center>
			<script type="text/javascript"><!--
		google_ad_client = "pub-3882370773203656";
		google_ad_width = 468;
		google_ad_height = 60;
		google_ad_format = "468x60_as";
		google_ad_type = "text_image";
		google_ad_channel = "";
		//-->
		</script>
		<script type="text/javascript"
		  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>	   
	   </td>
	</tr>
</table>


<?
$registrosPorPagina = 10;
$registroInicial = 0;
$ultimoRegistro = 0;

$style = " style='font-size:10pt; margin:1; border-width:1; border-color:#3f691f; border-style:outset;text-align:right;'"; 

$qryWhere = "";


$qry = "SELECT '".$_SESSION[yearEdition]."-".$_SESSION[monthsEdition]."-01' - INTERVAL 30 day ";
$result = fMySQL_Connect($qry);	
List( $datainc )= mysql_fetch_row($result);




$sector = $_REQUEST["sector"];

$qry = "select count(*)  from announcement a where   a.sector='".$_REQUEST["sector"]."'";	
$qry .= "  and ( a.datainc > '$datainc' )";

$result = fMySQL_Connect($qry);	
List( $totalRegistros )= mysql_fetch_row($result);


?>

<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  cellpadding="1" cellspacing="3"   width=766>
	<form action='mvcAnnouncement.php' method='post'>
	<input type='hidden' name='action' value='listBusinessSelling'>

<?
	echo "<tr bgcolor='#E9ECF7'><td colspan=4 align='center'><font class='subtitulo3'>Oportunidades de negócios <br/> ". $aMonths[$_SESSION[monthsEdition]]."/".$_SESSION[yearEdition]." </font></td></tr>";

?>
	<tr>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Título do anúncio</font></td>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Atividade da Empresa</font></td>
		<td bgcolor='white' height='45 px'><font class='subtitulo3'>Preço Venda</font> </td>
		<td bgcolor='white' height='35 px'><font class='subtitulo3'>Data do Anúncio</font> </td>
	</tr>

<?

	criarPaginacao();

	$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,datainc,a.price  from announcement a where  a.sector='".$_REQUEST["sector"]."'";	
	$qry .= " and  ( a.datainc > '$datainc' )";
	$qry .= " order by datainc desc limit $registroInicial,$registrosPorPagina ";
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

		 $price =  $line["priceselling"];
		 if( $line[price] != 0 )
		 {
			 $price =   number_format($line[price], 2, ',', '.'); 
		 }


		 $ahref= "<a href=listBusiness.php?id_adv=".$line["id"].">";

		 echo "<tr height='35 px'>";
		 echo "<td $bgcolor> $ahref ".$line["title"]."</td>";
		 echo "<td $bgcolor> $ahref ".$aSector[$line["sector"]]."</td>";
		 echo "<td $bgcolor> $ahref ".$price."</td>";
		 echo "<td $bgcolor> $ahref ".format_date($line["datainc"])."</td>";
		 echo "</tr>";
	}
	?>

	<tr>
		<td colspan='4' bgcolor='white' align='center'> <font class='subtitulo3'> Página de resultados  </font>
			<div id="rodapePaginacao" class="rodapePaginacao">
				<ul> 
					<?
					for ($i=0; $i < $qtdPaginas; $i++){
						$class = "";
						if ($i == $paginaAtual){
							$class = "paginaSelecionada";
						}
						?>
						<li class="<?=$class?>">
							<a href="listBusiness.php?<?=$post."&paginaAtual=".$i."&totalPaginas=".$qtdPaginas."&totalRegistros=".$totalRegistros?>&sector=<?=$sector?>" class="<?=$class?>">
							<?=$i+1?> 
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
		<td colspan='4' bgcolor='white' align='center'><?=$htmlVoltar?></td>
	</tr>
</form>
</table>



<table>
<tr>
	<td colspan='4' bgcolor='white' align='center'>
		<?include("blocoSetorMonths.php");?>
	</td>
</tr>
</table>
</center>


<?
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