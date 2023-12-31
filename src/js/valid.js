

function valid(form) {
	

	if ( document.getElementById("name").value == "") {
		alert("Você deve preencher o campo Nome");
		return false;	
	}	

	if ( document.getElementById("mail").value == "") {
		alert("Você deve preencher o campo Nome");
		return false;	
	}	

	if( document.getElementById("action").value == "register" ){
		if(  document.getElementById("password").value == ""){
			alert("Digite corretamente sua senha !!!");
			return false;
		}

		if( document.getElementById("password1").value   == ""){
			alert("Redigite corretamente sua senha !!!");
			return false;
		}

		if (  document.getElementById("id_marketing").value  == "") {
			alert("Selectione o campo como conheceu o site NegociosLucrativos.com");
			return false;	
		}	
		
		var checkbox = document.getElementById('termo');
		if(!checkbox.checked) {
			alert("Leia e aceite o termo de uso !!!");
			return false;	
		}

	}



}



function validaCNPJ(cgc)
	{	var cgcCalc = cgc.substr(0,12);  
	    var cgcSoma = 0;
	    var cgcDigit = 0;  
	    var digit = "";    

    var cpf;
	cpf = form.cpfcnpj.value;
	if( cpf.length > 11  ){	
		if( !validaCNPJ( cpf  )){
			alert("CNPJ inválido!");
			return false;
		}	
	}
	else{
		if( !validaCPF( cpf ) ){
			alert("CPF inválido!");
			return false;
		}	
	}		


	  
	  for (i = 0;  i < 4;  i++)
	  {
		cgcSoma = cgcSoma + parseInt(cgcCalc.charAt(i)) * (5 - i);
	  } 
	  
	  for (i = 0;  i < 8;  i++)
	  {
		cgcSoma = cgcSoma + parseInt(cgcCalc.charAt(i+4)) * (9 - i);            
	  }    
	 
	  cgcDigit = 11 - cgcSoma%11;       

	  if ((cgcDigit == 10) || (cgcDigit == 11))
	  {     
		cgcCalc = cgcCalc + "0";        
	  }
	  else
	  {     
		digit = digit + cgcDigit; 
		cgcCalc = cgcCalc + (digit.charAt(0));
	  }
	  
	  cgcSoma = 0;
	  
	  for (i = 0;  i < 5;  i++)
	  {
		cgcSoma = cgcSoma + parseInt(cgcCalc.charAt(i)) * (6 - i);    
	  }  
	  
	  for (i = 0;  i < 8;  i++)
	  {
		cgcSoma = cgcSoma + parseInt(cgcCalc.charAt(i+5)) * (9 - i);    
	  }

	  cgcDigit = 11 - cgcSoma%11;         
		
	  if ((cgcDigit == 10) || (cgcDigit == 11))
	  {    
		cgcCalc = cgcCalc + "0";    
	  }
	  else
	  {     
		digit = "";
		digit = digit + cgcDigit; 
		cgcCalc = cgcCalc + (digit.charAt(0))        
	  }
	  
	  if (cgc != cgcCalc) 
	  {
		//alert("CNPJ inválido!");
		return false;
	  }
	  else
	  {
		//alert("CGC correto!");
		return true;
	  }
	}


	function validaCPF(cpf)
	{
	  var cpfCalc = cpf.substr(0,9);  
	  var cpfSoma = 0;
	  var cpfDigit = 0;
	  var digit = "";      


		if (( cpf == 11111111111) || (cpf == 22222222222) || 
		   (cpf == 33333333333) || (cpf == 44444444444) || 
		   (cpf == 55555555555) || (cpf == 66666666666) || 
		   (cpf == 77777777777) || (cpf == 88888888888) || 
		   (cpf == 99999999999) || (cpf == 00000000000)) {
  	  	    
			return false;
		}
		
	  for (i = 0; i < 9; i++)
	  {
		cpfSoma = cpfSoma + parseInt(cpfCalc.charAt(i)) * (10 - i)
	  }
	  
	  cpfDigit = 11 - cpfSoma%11;
		
	  if (cpfDigit > 9)
	  {
		cpfCalc = cpfCalc + "0";
	  }
	  else
	  {
		digit = digit + cpfDigit;
		cpfCalc = cpfCalc + digit.charAt(0);
	  }
	  
	  cpfSoma = 0;
	  
	  for (i = 0; i < 10; i++) 
	  {
		cpfSoma = cpfSoma + parseInt(cpfCalc.charAt(i)) * (11 - i)
	  }
	  
	  cpfDigit = 11 - cpfSoma%11;
	  
	  if (cpfDigit > 9)
	  {
		cpfCalc = cpfCalc + "0";
	  }
	  else
	  {
		digit = "";
		digit = digit + cpfDigit;
		cpfCalc = cpfCalc + digit.charAt(0);
	  }  
	   
	  if (cpf != cpfCalc)
	  {
		//alert("CPF inválido!");
		return false;
	  }
	  else
	  {
		//alert("CPF correto!");
		return true;
	  }
	}
	
	
	function submitRegister(form){
	
		if( valid(form) == false ){
			return false;
		}
		
		document.getElementById('formRegister').submit();
	}