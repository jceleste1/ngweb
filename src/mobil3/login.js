$(function() {
		var action = $.trim($("#action").val()); 
					 
		$("#callAjax").click(function() {        	  
				var mail = $.trim($("#mail").val()); 
				var pwd = $.trim($("#pwd").val()); 
				if(mail.length > 0) {
						$.ajax({                       
							type: "POST",
							url: "callajax.php", 
							data: ({mail:mail,pwd:pwd} ),
							cache: false,
							dataType: "text",
							success: onSuccess
						});
					 }   
			  }); 

	$("#resultLog").ajaxError(function(event, request, settings, exception) {   
		$("#resultLog").html("Error Calling: " + settings.url + "<br />HTPP Code: " + request.status);            
	});   
	

	function onSuccess(data) { 
			if(  data.length > 0  ){
					if(action == 'contact'){
						document.getElementById("idUser").value = data;
						document.getElementById('formContact').submit();
					}else if( action == 'filter')
						document.getElementById('formFilter').submit();
					else	
						document.getElementById('formHomeUser').submit();
				}else{
					$("#resultLog").html("<font color=darkred>Dados não encontrados em nossa base de dados</font>");
				}	
		} 
  }); 
  
  
  $(function() {               
		var idAnnou = $.trim($("#id").val()); 
  
		$("#callAjaxRegister").click(function() {
              var mail = $.trim($("#mail").val()); 
			  var pwd = $.trim($("#pwd").val()); 
			  var name = $.trim($("#name").val()); 
  			  var action = $.trim($("#action").val()); 
			  
			   if(mail.length > 0) {
						$.ajax({                       
							type: "POST",
							url: "../forms/callajax.php", 
							data: ({mail:mail,name:name,pwd:pwd,action:action} ),
							cache: false,
							dataType: "text",
							success: onSuccess
						});
					 }   
			  }); 

	$("#resultLog").ajaxError(function(event, request, settings, exception) {   
		$("#resultLog").html("Error Calling: " + settings.url + "<br />HTPP Code: " + request.status);            
	});   
	

	function onSuccess(data) { 
				if(  data.length > 1  ){
					$("#resultLog").html("<font color=darkred>E-mail já consta em nosso cadastro.</font>");
				}else{
				
					if( idAnnou != "" )				
						document.getElementById('formContact').submit();
					else	
						document.getElementById('formHomeUser').submit();
				}	
		} 
  }); 
  
  
  
  
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


  
  
  