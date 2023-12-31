<?php




$qry = "select a.title,a.typecompany,a.sector,a.billing,a.description,a.datainc,a.status,a.typeannouncement,a.priceselling,a.numberemployee,a.conditionpart,a.zone,a.viewcount,a.confidencial,r.name,r.phonemobile,r.phone,a.price,a.www
from announcement a, register r where a.id=$_POST[id]";
$qry .= " and a.id_user=r.id";
$result = @mysql( $DB , $qry );

if( mysql_error() ){
	 $msg = "DB ERROR NegociosLucrativos mobile \n Page view  \n";
	 $msg .= "UserAgent: ".$ismobi->getUserAgent()."\n \n" ;
	 $msg .= "Screen .$widthScreen  -   $heightScreen \n \n" ;
	 $msg .= "Mobile: ".$ismobi->getMobileDevice()."\n $qry" ;
	 @mail("jceleste@brasilforte.com.br","$msg",$msg);
}
$dataAnnouncement = @mysql_fetch_array( $result ) ;



include("../config.inc");
include("../classPayPerView.php");
$classPayPerView = new classPayPerView();
$classPayPerView->debit( $_SESSION["idUser"],$_POST[id],"0","M");


?>
<div class="content-primary">
	<form action="index.php" id="formView" name="formView">
	<input type=hidden id='id' name='id' value='<?php echo $_POST[id]?>'/>
	<div class="ui-body ui-body-d ui-corner-all">

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- MobileDimDIm -->
<ins class="adsbygoogle"
     style="display:inline-block;width:320px;height:100px"
     data-ad-client="ca-pub-3882370773203656"
     data-ad-slot="9860606360"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>




	<div data-role="fieldcontain">
		<label for="label1" class="select"><b>Anuncio : <?php echo strtoupper($dataAnnouncement["title"])?></b></label>
	</div>
	<div data-role="fieldcontain">
		<label for="select-choice-x" class="select"><b>Atividade da Empresa :</b>
			<?php switch( $dataAnnouncement["typecompany"] ){
				case "I":
					echo "Indústria";
					break;
				case "C":
					echo "Comércio";
					break;
				case "S":
					echo "Serviço";
					break;
				default:
					break;
			}
		?>
		</label>
	</div>
	<div data-role="fieldcontain">
		<label for="select-setor-x" class="select"><b>Setor :</b>
			<?php 
			while( list( $key,$val ) =each($aSector) ){
				$sel = "";
				if( $key == $dataAnnouncement["sector"] )
						echo "$val";
			}
			?>
			</label>
	</div>
	<div data-role="fieldcontain">
		<label for="shipping-x" class="select"><b>Faturamento :</b>
		<?php while( list( $key,$val ) =each($aInvestimento) ){

				if( $key == $dataAnnouncement["billing"] )
					echo $val;
			}
		?>
		</label>
	</div>
	<div data-role="fieldcontain">
		<label for="description" class="select"><b>Descrição :</b>
		<?php echo ereg_replace ("\n", "<br>",$dataAnnouncement["description"] );?>
		</label>
	</div>
	<div data-role="fieldcontain">
		<label for="nfunc" class="select"><b>Número de Funcionários :</<b>
		<?php echo $dataAnnouncement["numberemployee"];?>
		</label>
	</div>
	<div data-role="fieldcontain">
		<label for="local" class="select"><b>Local :</b>
		<?php
		while( list( $key,$val ) =each($aZone) ){
			if( $key == $dataAnnouncement["zone"] )
				echo "$val";

		}
		?>
		</label>
	</div>

	</div>
	<div class="ui-body ui-body-b">
		<fieldset class="ui-grid-a">
			<div class="ui-block-a">
				<a href="#" data-role="button" data-inline="true" data-theme="d" onclick="cancel()">Cancel</a>
				<?php
				if( $_SESSION["idUser"] ){?>
					<a href="#" data-role="button" data-inline="true" data-theme="b" data-rel="dialog" data-transition="pop" onclick="contact()">Entrar em Contato</a>
				<?php }else{?>
					<a href="#" data-role="button" data-inline="true" data-theme="b" data-rel="dialog" data-transition="pop" onclick="login()">Entrar em Contato</a>
				<?php }?>
			</div>
		</fieldset>
	</div>
	</form>
</div>

<form action="index.php" id="formLogin" name="formLogin" method="post">
<input type=hidden id='page' name='page' value='login'/>
<input type=hidden id='id' name='id' value='<?php echo $_POST[id]?>'/>
<input type=hidden id='title' name='title' value='<?php echo strtoupper($dataAnnouncement["title"])?>'/>
<input type=hidden id='work' name='work' value="<?php echo $_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper']?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn']?>'/>
<input type=hidden id='action' name='action' value='redirContact'/>
</form>
<form action="index.php" id="formContact" name="formContact" method="post">
<input type=hidden id='page' name='page' value='contact'/>
<input type=hidden id='id' name='id' value='<?php echo $_POST[id]?>'/>
<input type=hidden id='title' name='title' value='<?php echo strtoupper($dataAnnouncement["title"])?>'/>
<input type=hidden id='work' name='work' value="<?php echo $_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper']?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn']?>'/>
</form>
<form action="index.php" id="formCancel" name="formCancel" method="post">
<input type=hidden id='page' name='page' value='list'/>
<input type=hidden id='id' name='id' value='<?php echo $_POST[id]?>'/>
<input type=hidden id='title' name='title' value='<?php echo strtoupper($dataAnnouncement["title"])?>'/>
<input type=hidden id='work' name='work' value="<?php echo $_POST[work]?>"/>
<input type=hidden id='typeCompany' name='typeCompany' value='<?php echo $_POST['typeCompany']?>'/>
<input type=hidden id='idSector' name='idSector' value='<?php echo $_POST['idSector']?>'/>
<input type=hidden id='idShipper' name='idShipper' value='<?php echo $_POST['idShipper']?>'/>
<input type=hidden id='typeAn' name='typeAn' value='<?php echo $_POST['typeAn']?>'/>
</form>
<form action="index.php" id="formHome" name="formHome" method="post"></form>


<script>
	function cancel(){
		document.getElementById('formCancel').submit();
	}
	function contact(){
			 document.getElementById('formContact').submit();
	}
	function login(){
			 document.getElementById('formLogin').submit();
	}
	function home(){
		 document.getElementById('formHome').submit();
	}
</script>

