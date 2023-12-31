<script>
function go(id)
{
	document.getElementById("action").value = "load";
	document.getElementById("id").value = id;
    document.getElementById('formAnn').submit();
}
function filter()
{
    document.getElementById('formFilter').submit();
}
</script>


<?php
	$typeAn =  $_POST['typeAn'];
    if( $_POST[typeAnManual]  )
		$typeAn = $_POST[typeAnManual];

?>

<form action="index.php" id="formAnn" name="formAnn" method="post">
<input type=hidden id='action' name='action'/>
<input type=hidden id='id' name='id' />
<input type=hidden id='page' name='page' value='formAnnouncement'/>

	<div class="content-primary">
		<ul data-role="listview" data-filter="true">
		<?php

		$qry = "select a.id,a.title,a.sector,a.typecompany  from announcement a where id_user='".$_SESSION["idUser"]."'";
		$result = mysql( $DB , $qry );
		$rows = mysql_num_rows($result);

		for ($i=0;$i<$rows;$i++)   {
			$line=mysql_fetch_assoc($result);
		?>

			<li><a href="javascript:go(<?=$line[id]?>);"><img src="inserir.png" alt="Incluir anúncio" class="ui-li-icon"><?=strtoupper($line["title"])?></a></li>
		<?php }?>
		</ul>
	</div><!--/content-primary -->
	<div class="content-primary">
		<div data-role="fieldcontain">
			<div class="content-primary">
				<a href="#" data-role="button" data-inline="true" onclick="home()">Cancelar</a>
			</div>
		</div>
	</div><!-- /page -->

</form>

<form action="index.php" id="formHomeUser" name="formHomeUser" method="post">
	<input type=hidden id='action' name='action' value='homeUser'/>
</form>

<form action="index.php" id="formHome" name="formHome" method="post"></form>


<script>
	function home(){
		document.getElementById('formHomeUser').submit();
	}

	function homeIndex(){
		document.getElementById('formHome').submit();
	}

</script>