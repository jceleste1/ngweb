<?php
$qry = "select count(*) count,typecompany 	  from announcement  group by typecompany";
$result = fMySQL_Connect($qry);	


$line  = mysqli_fetch_assoc($result);

print_r(  $line   );


while($line  = mysqli_fetch_assoc($result)) {
	
	
	  if(  $line[typecompany] == "S")
	       $servico =  $line[count];
		   
	if(  $line[typecompany] == "I")
	       $industria =  $line[count];	   
		   
	if(  $line[typecompany] == "C")
	       $comercio =  $line[count];	   	   
}	  
?>

<table   width='95%' cellpadding="1" cellspacing="0" border=0 align='center'>
	
<tr ><td colspan=4 align='center'>
<font color=darkgreen size=7><b><?php echo $servico+$industria+$comercio ?></b></font> oportunidades de negócios.</font></td></tr>



</td></tr>

<tr>
    <td  align='center'><img src='images/serv.png' border=0>
	<font color=darkgreen size=3><b>
	<br><?php echo $servico; ?> &nbsp;</b>Área serviços</td>
	
    <td  align='center'><img src='images/indus.png' border=0>
	<font color=darkgreen size=3><b>
	<br><?php echo $industria; ?> &nbsp;</b>Área indústria</td>
	
	<td  align='center'><img src='images/comercio.png' border=0>
	<font color=darkgreen size=3><b>
	<br><?php echo $comercio; ?> &nbsp;</b>Área comércio</td>
	
	
</tr>
<tr>
    <td  align='center'>&nbsp;</td></tr>

</table>
