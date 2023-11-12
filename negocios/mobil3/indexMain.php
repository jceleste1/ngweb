<p id="jqm-version"></p>
<?php
$qry = "select count(*) count,typecompany 	  from announcement  group by typecompany";
$result = mysql($DB,$qry);
$rows = mysql_num_rows($result);

for ($i=0;$i<$rows;$i++)   {
	  $line=mysql_fetch_assoc($result);
	  if(  $line[typecompany] == "S")
	       $servico =  $line[count];

	if(  $line[typecompany] == "I")
	       $industria =  $line[count];

	if(  $line[typecompany] == "C")
	       $comercio =  $line[count];
}
?>


<div class="content-primary">
<nav>
	<div id="jqm-homeheader">
		<h1 id="jqm-logo"><img src="top_logo.gif"   alt="NegociosLucrativos.com" /></h1>
		<p>NegociosLucrativos.com</p>


	<p class="intro"><strong>Bem vindo.</strong>	Total de <strong><?=($servico+$industria+$comercio)?></strong> anúncios relacionados a empresas a venda , compra de empresas e investidores em empresas.</p>
	<p class="intro"><strong>Serviço totalmente gratuito</strong></p>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-3882370773203656"
     data-ad-slot="4736272192"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>






	<?if( $_SESSION[idUser]  ){ ?>
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
			<li data-role="list-divider">&nbsp;</li>
			<li><a href="#" onclick="home()">Home </a></li>
		</ul>
	<?}else{?>
		<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
			<li data-role="list-divider">&nbsp;</li>
			<li><a href="#" onclick="login()">Login</a></li>
		</ul>
	<?}?>

</nav>
</div><!--/content-primary-->




<div class="content-primary">
	<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="b">
		<li data-role="list-divider">Oportunidades de negócios </li>
			<li><a href="javascript:filter('S','filter')">Área Serviços</a> <span class='ui-li-count'><?=$servico?></span>  </li>
			<li><a href="javascript:filter('I','filter')">Área Indústria</a> <span class='ui-li-count'><?=$industria?></span>  </li>
			<li><a href="javascript:filter('C','filter')">Área Comércio</a> <span class='ui-li-count'><?=$comercio?></span>  </li>
		</li>
	</u>
</div><!--/content-primary-->

<form action="index.php" id="formLogin" name="formLogin" method="post">
	<input type=hidden name="action" id="action"  value="homeUser" />
	<input type=hidden name="page" id="page" value="login"/>
</form>

<form action="index.php" id="formHome" name="formHome" method="post">
	<input type=hidden name="page" id="page" value="home"/>
</form>

<form action="index.php" id="formFilter" name="formFilter" method="post">
	<input type=hidden name="typeCompany" id="typeCompany"/>
	<input type=hidden name="page" id="page" value='filter'/>
</form>



<script>
	function login(){
		document.getElementById('formLogin').submit();
	}
	function home(){
		document.getElementById('formHome').submit();
	}

	function filter( typeCompany,page){
		document.getElementById("typeCompany").value = typeCompany;
		document.getElementById('formFilter').submit();
	}
</script>


