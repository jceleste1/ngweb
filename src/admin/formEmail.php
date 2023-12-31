<?php
if( $_REQUEST[idEdition] )
{
	$qry = "select  subject,  dateEdition , matter, matter  from newsletters where  idEdition=$_REQUEST[idEdition]";
	$result = fMySQL_Connect($qry);
	$dataNews = mysql_fetch_array( $result ) ; 
	$dateEdition = format_date(	$dataNews[dateEdition]  );
}
?>


<head>

<META http-equiv="Content-Type" content="text/html; charset=UTF-8">


<LINK rel=stylesheet type=text/css href="../editor_arquivos/menu.css">
<LINK rel=stylesheet type=text/css href="../editor_arquivos/fonts-min.css">
<LINK rel=stylesheet type=text/css href="../editor_arquivos/container.css">
<LINK rel=stylesheet type=text/css href="../editor_arquivos/editor.css">

<SCRIPT type=text/javascript src="../editor_arquivos/animation-min.js"></SCRIPT>
<SCRIPT type=text/javascript src="../editor_arquivos/connection-min.js"></SCRIPT>
<SCRIPT type=text/javascript src="../editor_arquivos/container-min.js"></SCRIPT>
<SCRIPT type=text/javascript src="../editor_arquivos/menu-min.js"></SCRIPT>
<SCRIPT type=text/javascript src="../editor_arquivos/editor-min.js"></SCRIPT>

<link rel="stylesheet" type="text/css" href="../build/button/assets/skins/sam/button.css" />

<script type="text/javascript" src="../build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="../build/element/element-min.js"></script>
<script type="text/javascript" src="../build/button/button-min.js"></script>

<style type="text/css">


	html, body{margin:0;}
/* Clear calendar's float */
	#calendarPanel .bd:after {content:".";display:block;clear:left;height:0;visibility:hidden;}
	 
/* Have calendar squeeze upto bd bounding box */
	#calendarPanel .bd {padding:0;font-size:10px}
	#calendarPanel .hd {font-size:11px;color:#FFF;height:25px;
						background:url(<%= renderResponse.encodeURL(renderRequest.getContextPath() + "/jsp/images/sprite.png") %>) 0 -1400px repeat-x;}
	
	#calendarPanel {visibility:hidden;}

/* Remove calendar's border and set padding in ems instead of px, so we can specify an width in ems for the container */
	#calContainer {border:none;padding:1em}


	div#icones{width:740px;}
	

		
	#status {
		BORDER-BOTTOM: black 1px solid; BORDER-LEFT: black 1px solid; BACKGROUND-COLOR: #ccc; MARGIN: 2em; HEIGHT: 4em; BORDER-TOP: black 1px solid; BORDER-RIGHT: black 1px solid
	}

	
</style>


<script language="javascript">
 
	YAHOO.util.Event.onDOMReady(initFilter);	


	   // "contentready" event handler for the "pushbuttonsfrommarkup" <fieldset>

		YAHOO.util.Event.onContentReady("pushbuttonsfrommarkup", function () {

			// Create Buttons using existing <input> elements as a data source


			 var oPushButton4 = new YAHOO.widget.Button("pushbutton4");
            oPushButton4.on("click", onButtonClick);

		
		});




	function callShowCalendar(id){
			showCalendar(document.getElementById( "calendar"));			
	}

	function oportunit(){	

		var calendar         =     document.getElementById("calendar").value;		
		var  month = new Array();
		month[1] = 'Janeiro'; month[2] = 'Fevereiro';	 month[3] = 'Março'; month[4] = 'Abril'; month[5] = 'Maio';	 month[6] = 'Junho';	
		month[7] = 'Julho'; month[8] = 'Agosto'; month[9] = 'Setembro'; month[10] = 'Outubro'; month[11] = 'Novembro'; month[12] = 'Dezembro';

		var res = parseInt( calendar.substring(3,5),10)  ;
		if( res == 0 )
				res = 12;

		var m = res;
		var y = calendar.substring(6,10);

		var msg = "Painel de oportunidades de negócios "+m+"/"+y+"\n\n";

		msg = msg + "<a href='http://www.negocioslucrativos.com/news/op.php?m="+m+"&y="+y+"' target=_blank>";
		msg = msg + "http://www.negocioslucrativos.com/news/op.php?m="+m+"&y="+y+ "</a>";

		document.getElementById("matterDefault").value =  msg;	
	}	
	


	function initCalendar(){
		YAHOO.CCGG.myCalendar = new YAHOO.widget.Calendar("myCalendar","calContainer", {navigator:true,visible:false,iframe:false});

		YAHOO.CCGG.myCalendar.cfg.setProperty("MDY_DAY_POSITION", 1);
		YAHOO.CCGG.myCalendar.cfg.setProperty("MDY_MONTH_POSITION", 2);
		YAHOO.CCGG.myCalendar.cfg.setProperty("MDY_YEAR_POSITION", 3);

		YAHOO.CCGG.myCalendar.cfg.setProperty("MD_DAY_POSITION", 1);
		YAHOO.CCGG.myCalendar.cfg.setProperty("MD_MONTH_POSITION", 2);

		YAHOO.CCGG.myCalendar.cfg.setProperty("WEEKDAYS_1CHAR", ["D", "S", "T", "Q", "Q", "S", "S"]);
		YAHOO.CCGG.myCalendar.cfg.setProperty("WEEKDAYS_SHORT", ["Do", "Se", "Te", "Qu", "Qu", "Se", "Sa"]);
		YAHOO.CCGG.myCalendar.cfg.setProperty("WEEKDAYS_MEDIUM",["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"]);
		
		YAHOO.CCGG.myCalendar.cfg.setProperty("MONTHS_SHORT",   ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"]);
		YAHOO.CCGG.myCalendar.cfg.setProperty("MONTHS_LONG",    ["Janeiro", "Fevereiro", "Mar&ccedil;o", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"]);
		YAHOO.CCGG.myCalendar.cfg.setProperty("WEEKDAYS_LONG",  ["Domingo", "Segunda", "Ter&ccedil;a", "Quarta", "Quinta", "Sexta", "S&aacute;bado"]);
	
		YAHOO.CCGG.myCalendar.render();
		YAHOO.CCGG.myCalendar.hide();
		YAHOO.CCGG.myCalendar.selectEvent.subscribe(handleSelect, YAHOO.CCGG.myCalendar, true);
		
		YAHOO.CCGG.panel1 = new YAHOO.widget.Panel("calendarPanel", {width:"160px",visible:false, underlay:"shadow"});		
		YAHOO.CCGG.panel1.render();
		YAHOO.CCGG.panel1.hide();		
	}

	function back(){
		 document.getElementById('formRed').submit();
	}

	YAHOO.util.Event.addListener(window, "load", initCalendar);


</script>



</head>




<table   width='600px' cellpadding="5px" cellspacing="1" ID="alter" align='center' border=0>			
<FORM id=form1 method=post action=index.php>
<input type=hidden name='rot' id='rot' value="recNews">


<input type=hidden name='idEdition' id='idEdition' value="<?php echo $_REQUEST['idEdition']?>">


<tr>
	<td>Subject</td>		
	<td><input type='text' name='subject' id="subject"  size='60' MAXLENGTH ="90" value="<?php echo $dataNews[subject]?>"></td>

	<TD >
		Data oportunidades <a href="#" onclick="callShowCalendar('calendar');"> <img src=../img/icoCalendar.gif border=0></a>	
	</TD>		
	<TD>
		<input type=text id="calendar" size="13" 	name="calendar"	 value="<?php echo $dateEdition?>"	onclick="callShowCalendar('calendar');">
	</TD>
</tr>


<TR>
	<TD colspan='4' align=center>
		<TEXTAREA id=editor rows=20 cols=75 name=editor><?php echo $dataNews[matter]?></TEXTAREA> 
	</TD>
</TR>

<TR>

</TR>





<TR>
	<TD  colspan=4 align=center>	


		 <span id="pushbutton4" class="yui-button yui-push-button">

			<span class="first-child"><button   type="button" name="button4" onclick='back()'>Back </button>  </span>

		</span>



		 <span id="pushbutton5" class="yui-button yui-push-button">	 
		 <?php if( !$_REQUEST[buttonAction]) {?>
			<span class="first-child">
			
			<input type=submit name=Enviar value=Enviar/></span>

			 <?php } ?>
		</span>
	
	
	</TD>		

</TR>



</form>
</table>


<div id="calendarPanel"  class="yui-skin-sam">
	<div class="hd"></div>
	<div class="bd">
		<div id="calContainer"></div>
	</div>
</div>



<SCRIPT>
(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event,
        status = null;

        var handleSuccess = function(o) {
            YAHOO.log('Post success', 'info', 'example');
            var json = o.responseText.substring(o.responseText.indexOf('{'), o.responseText.lastIndexOf('}') + 1);
            var data = eval('(' + json + ')');
            myEditor.setEditorHTML(data.Results.data);
        }
        var handleFailure = function(o) {
            YAHOO.log('Post failed', 'info', 'example');
            var json = o.responseText.substring(o.responseText.indexOf('{'), o.responseText.lastIndexOf('}') + 1);
            var data = eval('(' + json + ')');
            status.innerHTML = 'Status: ' + data.Results.status + '<br>';
        }

        var callback = {
            success: handleSuccess,
            failure: handleFailure
        };

    
    YAHOO.log('Create Button Control (#toggleEditor)', 'info', 'example');
    var _button = new YAHOO.widget.Button('submitEditor');

    var myConfig = {
        height: '300px',
        width: '600px',
        animate: true,
        dompath: true
    };

    YAHOO.log('Create the Editor..', 'info', 'example');
    var myEditor = new YAHOO.widget.Editor('editor', myConfig);
    myEditor.render();

    _button.on('click', function(ev) {
	
        YAHOO.log('Button clicked, initiate transaction', 'info', 'example');
        Event.stopEvent(ev);
        myEditor.saveHTML();

        window.setTimeout(function() {
			var subject = Dom.get('subject').value ; 
            var sUrl = "../admin/index.php";
			var calendar = Dom.get('calendar').value ; 
			var id = Dom.get('idEdition').value ; 

            var data =  'rot=recNews&calendar='+calendar+'&id='+id+'&editor_data='+ encodeURIComponent(myEditor.get('textarea').value)+'&subject='+encodeURIComponent(subject);

            var request = YAHOO.util.Connect.asyncRequest('POST', sUrl, callback, data);

			 document.getElementById('formRed').submit();
			

        }, 200);
    });


    Event.onDOMReady(function() {
        status = Dom.get('status');
    });
})();
</SCRIPT>




<form action="index.php" method=post name=formRed id="formRed">
	<input type=hidden name='rot' value="listNews">
</form>
