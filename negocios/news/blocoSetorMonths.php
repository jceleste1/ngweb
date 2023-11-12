<style type="text/css">
.bloco A:link {COLOR: darkblue; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:visited {COLOR: #8772EB; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:active {COLOR: darkblue; FONT-SIZE: 9px; TEXT-DECORATION:}
.bloco A:hover {COLOR: #008000; FONT-SIZE: 9px; TEXT-DECORATION:}
</style>


<table cellSpacing=3 cellPadding=1    width=766 valign=top>
<?
echo date();


echo ultimoDiaMes( date("Y")."/".date("m")."/".date("d"));
exit;

$qry = "select count(*) count,sector  from announcement a where  ";
$qry .= "  ( a.datainc > '$datainc'  and  a.datainc < )";
$qry .= " group by a.sector ";

$result = fMySQL_Connect($qry);	
$rows = mysql_num_rows($result);
$aResultSector = array();
for ($i=0;$i<$rows;$i++)   {
	  $line=mysql_fetch_assoc($result);
	  if(	  $line["count"] )
		  $aResultSector[ $line["sector"]]= $line["count"];
}




$nLin= 0;
$nCol= 0;
echo "<tr bgcolor='#E9ECF7'   height=100><td colspan=4 align='center'><font class='subtitulo3'>Painel de oportunidades de negócios <br/> ". $aMonths[$_SESSION[monthsEdition]]."/".$_SESSION[yearEdition]."  por setor </font></td></tr>";
echo "<span class='bloco'><tr><td></td></tr>";

while( list( $key,$val ) = each($aResultSector) ){


	if( $nLin == 0 ){  	  
		echo "<tr>";
	}


	$ahref="";
	$label="";
	$ahrefecha="";

	$ahref="<a href='listBusiness.php?action=listBusiness&sector=".$key."&listBlock=1'>";
	$ahrefecha="</a>";
	$label="(".$aResultSector[$key].")";

	

	 echo "<td>$ahref ".$aSector[$key]." $label $ahrefecha </td>";

	

	$nLin++;
	if( $nLin >= 4 ){
		echo "</tr>";
		
		$nLin = 0;
	}

}
echo "</span></table>";


function ultimoDiaMes($data=""){
    if (!$data) {
       $dia = date("d");
       $mes = date("m");
       $ano = date("Y");
    } else {
       $dia = date("d",$data);
       $mes = date("m",$data);
       $ano = date("Y",$data);
    }
    $data = mktime(0, 0, 0, $mes, 1, $ano);
    return date("d",$data-1);
  }


?>
