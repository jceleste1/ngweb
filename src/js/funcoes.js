
//START CALENDAR
YAHOO.namespace("CCGG");

var objectN = "";

function showCalendar(n){
	
	objectN = n;
	
	document.getElementById("calendarPanel").style.display="block";
	YAHOO.CCGG.panel1.show();
	YAHOO.CCGG.myCalendar.show();
	calNumber=n;
	var pos;
		
	pos= YAHOO.util.Dom.getXY(document.getElementById(n.id));
	
	pos[0]=pos[0];
	pos[1]=pos[1]+20;
	YAHOO.CCGG.panel1.cfg.setProperty("xy", pos);
	
}

function handleSelect(type,args,obj) {
	var dates = args[0]; 
	var date = dates[0];
	var year = date[0], month = date[1], day = date[2];
	
	var txtDate1 ="";
		
	
	txtDate1=document.getElementById(objectN.id);
		
	
		
	var dateObj = new Date( );
	dateObj.setFullYear( year );
	dateObj.setMonth( month-1 );
	dateObj.setDate( day );
		
			
	
	txtDate1.value = getFormattedSimpleDateString( dateObj );
	
	
	YAHOO.CCGG.panel1.hide();
}
//END CALENDAR







//START FILTER
YAHOO.namespace("example.container");
 
	function initFilter() {
	
	// Build filter1 based on markup
	YAHOO.example.container.filter1 = new YAHOO.widget.Panel("divGraphic", 
	{
	width:"650px", 
	height:"370px", 
	visible:false, 
	constraintoviewport:true, 
	modal:true, 
	fixedcenter:true
	} );
	
	// Build filter1 based on markup
	YAHOO.example.container.filter2 = new YAHOO.widget.Panel("divObservv", 
	{
	width:"auto", 
	height:"auto", 
	visible:false, 
	constraintoviewport:true, 
	modal:true, 
	fixedcenter:true
	} );
	
	YAHOO.example.container.filter1.render();
	YAHOO.example.container.filter2.render(document.body);

	YAHOO.example.container.manager = new YAHOO.widget.OverlayManager();
	YAHOO.example.container.manager.register([YAHOO.example.container.filter1]);
	YAHOO.example.container.manager.register([YAHOO.example.container.filter2]);
 
	YAHOO.util.Event.addListener("showFilter1", "click", YAHOO.example.container.filter1.show, YAHOO.example.container.filter1, true);
	YAHOO.util.Event.addListener("hideFilter1", "click", YAHOO.example.container.filter1.hide, YAHOO.example.container.filter1, true);

	YAHOO.util.Event.addListener("showFilter2", "click", YAHOO.example.container.filter2.show, YAHOO.example.container.filter2, true);
	YAHOO.util.Event.addListener("hideFilter2", "click", YAHOO.example.container.filter2.hide, YAHOO.example.container.filter2, true);
 	
}
//END FILTER


//START SELECT COMBO
var option = "";
function selectOption(value)
	{option = value;}

function submitForm(){
	if(option == "altas"){
		window.open('altas.html','default');
	}
	else if(option == "baixas"){
		window.open('#','default');
	}
	else if(option == "me"){
		window.open('#','default');
	}
	else if(option == "mc"){
		window.open('#','default');
	}
}
// END SELECT COMBO



/*
 * Transforma a data especificada em uma string no formato: dd/mm/aaaa
 */
function getFormattedSimpleDateString( date ){
	 var strDate;
	 var day = date.getDate( );
	 var month = date.getMonth( ) + 1;
	 
	 day = (day >= 10 ? "" + day : "0" + day );
	 month = (month >= 10 ? "" + month : "0" + month );
	 strDate = day + "/" + month + "/" + date.getFullYear( );
	 
	 return strDate;
}






