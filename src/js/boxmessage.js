
YAHOO.namespace("OFW");


// PANEL HISTORICO ORDEM DE SERVICOS ABERTOS
function showPanelMessage(id){
	document.getElementById('resizablepanel').style.display="block";
	YAHOO.OFW.PanelOpenHelp = new YAHOO.widget.Panel("resizablepanel",{
		width:"500px", 
		height:"325px", 
		visible:false, 
		constraintoviewport:true, 
		modal:true,
		fixedcenter:true
	});
	
	// ESC="OFF"
	var esc = new YAHOO.util.KeyListener(document, { keys:27 }, { 
		fn:YAHOO.OFW.PanelOpenHelp.hide,
		scope:YAHOO.OFW.PanelOpenHelp,
		correctScope:true }, "keyup" );

	esc.enable();


	   // Create Resize instance, binding it to the 'resizablepanel' DIV 
		var resize = new YAHOO.util.Resize("resizablepanel", {
			handles: ["br"],
			autoRatio: false,
			minWidth: 300,
			minHeight: 100,
			status: false 
		});

		// Setup startResize handler, to constrain the resize width/height
		// if the constraintoviewport configuration property is enabled.
		resize.on("startResize", function(args) {

			if (this.cfg.getProperty("constraintoviewport")) {
				var D = YAHOO.util.Dom;

				var clientRegion = D.getClientRegion();
				var elRegion = D.getRegion(this.element);

				resize.set("maxWidth", clientRegion.right - elRegion.left - YAHOO.widget.Overlay.VIEWPORT_OFFSET);
				resize.set("maxHeight", clientRegion.bottom - elRegion.top - YAHOO.widget.Overlay.VIEWPORT_OFFSET);
			} else {
				resize.set("maxWidth", null);
				resize.set("maxHeight", null);
			}

		},  YAHOO.OFW.PanelOpenHelp, true);

		// Setup resize handler to update the Panel's 'height' configuration property 
		// whenever the size of the 'resizablepanel' DIV changes.

		// Setting the height configuration property will result in the 
		// body of the Panel being resized to fill the new height (based on the
		// autofillheight property introduced in 2.6.0) and the iframe shim and 
		// shadow being resized also if required (for IE6 and IE7 quirks mode).
		resize.on("resize", function(args) {
			var panelHeight = args.height;
			this.cfg.setProperty("height", panelHeight + "px");
		},  YAHOO.OFW.PanelOpenHelp, true);

		YAHOO.util.Event.on("showbtn", "click", YAHOO.OFW.PanelOpenHelp.show, YAHOO.OFW.PanelOpenHelp, true);



	loadMessage(id);

	YAHOO.OFW.PanelOpenHelp.render(document.body);
	YAHOO.OFW.PanelOpenHelp.show();
}



function loadMessage(id)
{	

	if (ajaxRequest){
		ajaxRequest.abort();
	}


	ajaxRequest = getAjaxRequest();
	ajaxRequest.onreadystatechange = function()
	{
	   	if (ajaxRequest.readyState == 4)
	   	{
	      	if (ajaxRequest.status == 200) 
	      	{
				document.getElementById("spanMessage").innerHTML =   ajaxRequest.responseText  ;
	      	} 
	      	else
	      	{
	        	alert("HTTP error: " + req.status);
	      	}
	   	}
   	};


	var url = "./loadMessage.php?id="+id; 

	ajaxRequest.open("POST",url,true);
	ajaxRequest.send(null);
}