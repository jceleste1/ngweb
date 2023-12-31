<center>
<?php

include("searchNew.php");


$style = " style='font-size:10pt; margin:1; border-width:1; border-color:#3f691f; border-style:outset;text-align:right;'";

$registroInicial = 0;
$ultimoRegistro = 0;
$style = " style='font-size:10pt; margin:1; border-width:1; border-color:#3f691f; border-style:outset;text-align:right;'";


if( $_REQUEST[typeAnManual] == "B" ){
	$titleList = $titleListInvestors;
}


include("classFilter.php");
$filter = new classFilter();

$qryWhere = $filter->queryFilter(  $_REQUEST[typeAnManual],
								   $_REQUEST["sector"],
								   $_REQUEST['typecompany'],
								   $_REQUEST['billing'],
								   $_REQUEST['zone'] ,
								   $_REQUEST['lupa_x'],
								   $_REQUEST["txtSearch"] );

								  
						  
			  
if($qryWhere == -1 ) {
    return;
}
$qry = "select count(*)  from announcement a  $qryWhere ";



$result = fMySQL_Connect($qry);
List( $conta_linhas )= mysqli_fetch_row($result);

if( $conta_linhas ){
?>
<table   cellpadding="1" cellspacing="3" width='95%' >
	<form action='mvcAnnouncement.php' method='post'>
	<input type='hidden' name='action' value='listBusinessSelling'>
	<tr>
		<td bgcolor='white' colspan='4' align=center><font color=darkgreen size=3><b><?php echo $titleList;?></b> </font></td>
	</tr>
	
	
	
	<tr>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328"><?php echo $subTitleAd; ?></font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328"><?php echo $subTitleSector; ?></font></td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328"><?php echo $viewAnnouncementPriceSale; ?></font> </td>
	<td  height='35 px'><font class='subtitulo3' color="#9CC328"><?php echo $subTitleDateAd; ?></font> </td>
</tr>

<?php
	$action = "list";
	$http = "mvcAnnouncement.php";
	$exibe = "10";
	$pag = ($_GET['pag']);

	if( !$pag )
	   $pag = "1";
	else
	   $pag = $_REQUEST['pag'] ;

	$total_paginas = ceil(($conta_linhas/$exibe));
	$linha_chegar = (($pag-1)*$exibe);

	$limit = "limit $linha_chegar,$exibe  ";

	$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,datainc,a.price  from announcement a  $qryWhere   order by datainc desc $limit ";
	echo  $qry;
	
	$result2 = fMySQL_Connect($qry);
	$_rows_ = mysqli_num_rows($result2);
	for ($i=0;$i<$_rows_;$i++)   {
		 $line=mysqli_fetch_assoc($result2);

		 $font = "<font color='darkgreen'>";
		 $bgcolor = " bgcolor='#FDFDFD'";
		 if( ($i%2)==0)  {
			 $bgcolor = " bgcolor='#E9ECF7'";
			 $font = "<font color='darkgreen'>";
		 }


		 $price =  $line["priceselling"];
		 if( $line[price] != 0 )
		 {
			 $price =   number_format($line[price], 2, ',', '.');
		 }
         if( $_SESSION["id"] ){
			$ahref= "<a href=mvcAnnouncement.php?action=viewAnnouncement&id_adv=".$line["id"].">";
		 }else{
			$ahref= "<a href=logins.php>";
		 }
		 echo "<tr height='35 px'>";
		 echo "<td $bgcolor> $ahref $font ".$line["title"]."</td>";
		 echo "<td $bgcolor> $ahref $font ".$aSector[$line["sector"]]."</td>";
		 echo "<td $bgcolor> $ahref $font ".$price."</td>";
		 echo "<td $bgcolor> $ahref $font ".format_date($line["datainc"])."</td>";
		 echo "</tr>";
	}
	?>

	<tr>
		<td colspan='4' bgcolor='white' align='center'> <font class='subtitulo3'><?php echo $totalAd; ?> :<b><?=$conta_linhas?></b></font>
			<div id="rodapePaginacao" class="rodapePaginacao">
				<br>
				<?php include("paginar.php")?>

			</div>
		</td>
	</tr>
	<tr>
		
	<td ><b>BAIXE O APP NegociosLucrativos</b> </td>
	<td  colspan='2' align=left><a href="https://play.google.com/store/apps/details?id=com.br.negocioslucrativos.mob"> <img src="./imagens/googleplay.png" ></a></td>
	</tr>
		
		
	
	<tr>
		<td colspan='4' bgcolor='white' align='center'><?=$htmlVoltar?></td>
	</tr>
</form>
</table>
<?php }else{?>
<table  style="padding:5em; background-color:#e7f1f6; border:0px solid #FF0000"  width='100%' height=300px>
  <tr>
	<td bgcolor='white' colspan='4' align=center><img src='./img/del.png'  border=0>Sua busca não encontrou nenhum anúncio.</td>
 </tr>
<?php }?>
</center>
