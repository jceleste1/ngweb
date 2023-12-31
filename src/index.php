<?php
// basic require file...
require_once "ismobile/ismobile.class.php";

$ismobi = new IsMobile();

if($ismobi->CheckMobile()) {    
	echo "<META HTTP-EQUIV='REFRESH' CONTENT=0;URL='http://www.negocioslucrativos.com.br/mobil3'>";
}
else {
	echo "<META HTTP-EQUIV='REFRESH' CONTENT=0;URL='http://www.negocioslucrativos.com.br/index2.php'>";
}

?>