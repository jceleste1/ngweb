<script>
function go(id,page)
{
	document.getElementById("id").value = id;
	document.getElementById("page").value = page;
        document.getElementById('formList').submit();
}
function filter()
{
    document.getElementById('formFilter').submit();
}
function home(){
	document.getElementById('formHome').submit();
}

</script>

<?php
$typeAn =  $_POST['typeAn'];
if( $_POST[typeAnManual]  )
	$typeAn = $_POST[typeAnManual];

?>

<form action="index.php" id="formList" name="formList" method="POST">
	<input type=hidden id='work' name='work' value="<?php echo $_POST[work]?>"/>
	<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany']?>'/>
	<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector']?>'/>
	<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper']?>'/>
	<input type=hidden id='typeAn' name='typeAn' value='<?php echo $typeAn?>'/>
	<input type=hidden id='id' name='id' />
	<input type=hidden id='page' name='page' />

	<div class="content-primary">


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-3882370773203656",
          enable_page_level_ads: true
     });
</script>



		<ul data-role="listview" data-filter="true">

		<?php


		$where = "where typeannouncement='$typeAn' and ";
		if( $_POST['typeCompany']  )
			$where  .= " typecompany='".$_POST['typeCompany']."' and ";

		if( $_POST['idSector']  )
			$where .=" sector=".$_POST['idSector']." and ";

		if( $_POST['work']  )
			$where  .=  " (title like '%".$_POST['work']."%' or
							description like '%".$_POST['work']."%') and ";

		$where = substr($where,0 ,strlen($where)-5 );

		$action = "view"; 
		if( !$_SESSION["idUser"] )
				$action = "login";
			

		$qry = "select a.id,a.title,a.sector,a.typecompany,a.priceselling,a.price
		from announcement a
		$where
		order by datainc DESC,dtmodify DESC limit 0,30 ";
		$result = mysql($DB,$qry);
		$rows = mysql_num_rows($result);
		for ($i=0;$i<$rows;$i++)   {
			$line=mysql_fetch_assoc($result);
		?>
			<li><a href="#" onclick="javascript:go(<?php echo $line[id]?>, '<?php echo $action ?>' )";><?php echo strtoupper($line["title"])?></a></li>
		<?php }?>
		</div><!-- /page -->

		</ul>


		<div data-role="fieldcontain">
			<div class="content-primary">
				<a href="#" data-role="button" data-inline="true" onclick="filter()"><< Voltar</a>
			</div>
		</div>

	</div>


</form>




<form action="index.php" id="formFilter" name="formFilter" method="post">
    <input type=hidden id='page' name='page' value="filter"/>
	<input type=hidden id='typeAn' name='typeAn' value='<?php echo $typeAn?>'/>
</form>


<form action="index.php" id="formHome" name="formHome" method="post">
</form>



