
function submitList(){
	document.getElementById("txtSearch2").value  =  document.getElementById("txtSearch").value; 
	document.getElementById("sector2").value  =  document.getElementById("sector").value; 
	document.getElementById("typecompany2").value  =  document.getElementById("typecompany").value; 
	document.getElementById("billing2").value  =  document.getElementById("billing").value; 
	document.getElementById("zone2").value  =  document.getElementById("zone").value; 
	document.getElementById("lupa_x2").value  =  "1"; 
	document.getElementById("typeAnManual2").value  =  document.getElementById("typeAnManual").value; 

	document.getElementById('formSearch2').submit();
}

function submitFormAnn(){
	document.getElementById("txtSearch3").value  =  document.getElementById("txtSearch").value; 
	document.getElementById("sector3").value  =  document.getElementById("sector").value; 
	document.getElementById("typecompany3").value  =  document.getElementById("typecompany").value; 
	document.getElementById("billing3").value  =  document.getElementById("billing").value; 
	document.getElementById("zone3").value  =  document.getElementById("zone").value; 
	document.getElementById("typeAnManual3").value  =  document.getElementById("typeAnManual").value; 
	document.getElementById("lupa_x3").value  =  "1"; 
	document.getElementById('formAnn').submit();
}
function submit3(){

		document.getElementById("divSearchButton").style.display = "none";
		document.getElementById("divProcess").style.display = "block";

					submitList();
}

	  
function retornoDoGoogle(response){
		 
	
	const token = response.credential;
	const xhttp = new XMLHttpRequest();
	

	xhttp.onreadystatechange = function() {
		if(  xhttp.status  == 200 ){
			window.location.href = "http://www.negocioslucrativos.com.br/mvcAnnouncement.php?action=home";
		}
	};
x
	const url="https://www.negocioslucrativos.com.br/users/usersocial/login.php?jwt="+encodeURI(token);

	xhttp.open("GET", url);
	xhttp.send();
	
}

