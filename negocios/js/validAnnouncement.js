
YAHOO.namespace("OFW");


function getAjaxRequest(){
	var ajaxRequest;

	if (window.XMLHttpRequest) {
		isIE = false;				
		ajaxRequest = new XMLHttpRequest()
	} else if (window.ActiveXObject){ 
		try {  
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP")  
			isIE = true;
		} catch (e){  
			try { 			
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP")  
			} catch (e){
			} 
		}
	}
	return ajaxRequest;
}

var ajaxRequest = null;
var usersEmpty = null;
var isIE = null;





function valid(form) {

	
	if ( form.action.value == "backHome") 
		return true;


	if ( form.title.value == "") {
		alert("Você deve preencher o campo titulo");
		form.title.focus();
		return false;	
	}	

	if ( form.sector.value == "") {
		alert("Você deve preencher o campo setor");
		form.sector.focus();
		return false;	
	}	


	if ( form.billing.value == "") {
		alert("Você deve escolher  o campo faturamento");
		form.billing.focus();
		return false;	
	}	


	if ( form.description.value == "") {
		alert("Você deve escolher  o campo descrição");
		form.description.focus();
		return false;	
	}	


}



function valid2(form) {

	if( valid(form) == false )
		return false;
		

	try
	{	
	
		if ( form.action.value == "backHome") {
			document.getElementById('formSearch3').submit();
			return true;
		}	
		
	
		if ( form.name.value == "") {
			alert("Você deve preencher o campo Nome");
			form.name.focus();
			return false;	
		}	

		if ( form.mail.value == "") {
			alert("Você deve preencher o campo Nome");
			form.mail.focus();
			return false;	
		}	

		if( form.password.value == ""){
			alert("Digite corretamente sua senha !!!");
			form.password.focus();
			return false;
		}

		if( form.password1.value == ""){
			alert("Redigite corretamente sua senha !!!");
			form.password1.focus();
			return false;
		}
		
		if( form.password.value != form.password1.value ){
			alert("Redigitação da senha não confere com a senha !!!");
			form.password.focus();
			return false;
		}

		
		
	}catch(e){
	}	

}

function formataMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;    
    // 13=enter, 8=backspace as demais retornam 0(zero)
    // whichCode==0 faz com que seja possivel usar todas as teclas como delete, setas, etc    
    if ((whichCode == 13) || (whichCode == 0) || (whichCode == 8))
    	return true;
    key = String.fromCharCode(whichCode); // Valor para o código da Chave
 
 
    if (strCheck.indexOf(key) == -1) 
    	return false; // Chave inválida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) 
        	break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) 
        	aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len == 0) 
    	objTextBox.value = '';
    if (len == 1) 
    	objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len == 2) 
    	objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j == 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        	objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}



// PANEL HISTORICO ORDEM DE SERVICOS ABERTOS
function showMessage(){
	document.getElementById('panelOpenHelp').style.display="block";
	YAHOO.OFW.PanelOpenHelp = new YAHOO.widget.Panel("panelOpenHelp",{
		width:"550px", 
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
	
	
	YAHOO.OFW.PanelOpenHelp.render(document.body);
	YAHOO.OFW.PanelOpenHelp.show();
}
