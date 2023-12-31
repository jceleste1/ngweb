<script>
function readMsg(id)
{
	document.getElementById("idMsg").value = id;
    document.getElementById('formViewMsg').submit();
}
</script>

<form action="index.php" id="formViewMsg" name="formViewMsg" method="post">
<input type=hidden id='page' name='page' value='viewMsgReceive'/>
<input type=hidden id='idMsg' name='idMsg'/>

	<div class="content-primary">
		<ul data-role="listview" data-filter="true">

		<?php 


		$qry = "SELECT  c.id,r.name,r.mail, c.msg, r.phone, r.phonemobile,c.datainc,c.msg
		FROM contatos c, register r
		where c.id_userof = r.id  and c.id_userto =".$_SESSION["idUser"]." order by c.datainc desc ";

		echo "<h2>Mensagens recebidas</h2>";

		$result = mysql($DB,$qry);
		$rows = mysql_num_rows($result);
		for ($i=0;$i<$rows;$i++)   {
			$line=mysql_fetch_assoc($result);
		?>

			<li data-role="list-divider"><?php echo $line["datainc"]?> <span class="ui-li-count"></span></li>
			<li><a href="javascript:readMsg(<?php echo $line[id]?>)">
					<h3><?php echo strtoupper($line["name"])?></h3>
					<p><?php echo substr($line[msg]  , 0, 15)?></p>
			</a></li>

		<?php }?>

		</ul>
		</div><!--/content-primary -->

		<div data-role="fieldcontain">
			<div class="content-primary">
				<a href="#" data-role="button" data-inline="true" onclick="home()">Voltar</a>
			</div>
		</div>


	</div><!-- /content -->
</form>

<form action="index.php" id="formHomeUser" name="formHomeUser" method="post">
	<input type=hidden id='action' name='action' value='homeUser'/>
	<input type=hidden id='page' name='page' value='home'/>
</form>


<form action="index.php" id="formHome" name="formHome" method="post">
</form>


<script>
	function home(){
		document.getElementById('formHomeUser').submit();
	}
	function homeIndex(){
		document.getElementById('formHome').submit();
	}
</script>
