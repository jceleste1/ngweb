<center>
<?php

$output = is_numeric($_REQUEST["id_adv"]);
if( !$output )
	exit;

$qry = sprintf("select  id,ext from photoEnterprise  where  idAnnouncement='%s'",
    mysql_real_escape_string($_REQUEST["id_adv"],$conexao) );

$result = fMySQL_Connect($qry);
$rows = mysql_num_rows($result);

if( $rows > 0 )
{
?>


<div id="container">
	<div id="main5" >
		<div id="slider">
			<div>
				<div class="floating">
					<a id="butleft" href="#"><img src="../img/esquerda.png" alt="" /></a>
				</div>
				<div class="floating">
					<ul class="clearfix">
					
					<?php	
					$result = fMySQL_Connect($qry);
					$rows = mysql_num_rows($result);
					for ($i=0;$i<$rows;$i++)   	
					{  
					 $line=mysql_fetch_assoc($result);
					?>
					
						<li id="image<?=$i?>">
<a href="./imgEnter/<?=$line[id]?>.<?=$line[ext]?>"  class="thickbox" title="NegociosLucrativos.com"><img src="./imgEnter/<?=$line[id]?>.<?=$line[ext]?>" alt="" /></a>

						</li>
					<?php
					}
					?>			
						
						
					</ul>
				</div>
				<div class="floating">
					<a id="butright" href="#"><img src="../img/direita.png" alt="" /></a>
				</div>
			</div>
			<div id="controls">


				<a href="" id="playpause" title="Play/Pause automatic slideshow">
                                   <img src="../img/play.png" alt="Play/Pause" /></a> 

<!--
<a href="" id="directlink" title="Direct link to the current picture">
<img src="../img/stop.png" alt="Direct Link" style="margin-bottom: 7px; margin-left: 10px;" />
</a>  -->
			</div>
		</div>
		<div id="texts"></div>
	</div>
			
</div>

<?php }?>
</center>