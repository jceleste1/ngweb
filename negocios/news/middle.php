<?

$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,a.price  from announcement a order by datainc DESC,dtmodify DESC limit 0,22 ";
$result = fMySQL_Connect($qry);	
$rows = mysql_num_rows($result);


for ($i=0;$i<$rows;$i++)   {
	 $line=mysql_fetch_assoc($result);
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
	

	 $html .=  $line["title"]."\n";
	 $html .=  "Seção ".$aSector[$line["sector"]]."\n";
	 $html .=  "Atividade da Empresa ".$aTypecompany[$line["typecompany"]] ."\n";
	 if( $price )
		 $html .=  "Valor ".$price."\n";
 	 $html .=  "http://www.negocioslucrativos.com/mvcAnnouncement.php?action=viewAnnouncement&id_adv=".$line["id"]."\n";
 	 $html .=  "-------------------------------------------------------------------------------------------------------------------\n";
}


?>