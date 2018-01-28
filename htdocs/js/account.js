function updatePass(newPass, conPass){
	var n = $("#newPass").val();
	var c = $("#conPass").val();
	var regex = /^[A-Za-z0-9]{8,20}$/;

	if(n != c){
		$("#passinfo").text("Password not match");
	}
	else if(!regex.test(n) || !regex.test(c)){
		$("#passinfo").text("Password must be letters and/or numbers with length of 8 to 20");
	}
	else{
		if (window.XMLHttpRequest)
	    {
	        // IE7+, Firefox, Chrome, Opera, Safari 
	        xmlhttp = new XMLHttpRequest();
	    }
	    else
	    {
	        // IE6, IE5
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp.onreadystatechange = function()
	    {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
	        {
	            document.getElementById("passinfo").innerHTML = xmlhttp.responseText;
	        }
	    }
	
	    xmlhttp.open("GET","accountBG.php?password=" + newPass,true);
	    xmlhttp.send();
		
		document.getElementById("passinfo").value = "";
	}
	return false;
}


function getNewPass(){
	return document.getElementById("newPass").value;
}
function getConPass(){
	return document.getElementById("conPass").value;
}

function updateEmail(email){
	var n = $("#email").val();
	var regex =  /\w+@\w+[.]com/;
		
	if(regex.test(n)){
		if (window.XMLHttpRequest)
	    {
	        // IE7+, Firefox, Chrome, Opera, Safari 
	        xmlhttp = new XMLHttpRequest();
	    }
	    else
	    {
	        // IE6, IE5
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp.onreadystatechange = function()
	    {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
	        {
	            document.getElementById("emailinfo").innerHTML = xmlhttp.responseText;
	        }
	    }
	
	    xmlhttp.open("GET","accountBG.php?email=" + email,true);
	    xmlhttp.send();
		
		document.getElementById("email").value = "";
	}
	else{
		$("#emailinfo").text("Email must be the format of: xxxxx@xxx.com");
	}
	return false;
}


function getEmail(){
	return document.getElementById("email").value;
}


function updatePhone(phone){
	var n = $("#phone").val();
	var regex =  /^[0-9]+$/;
	
	if(regex.test(n)){
		if (window.XMLHttpRequest)
	    {
	        // IE7+, Firefox, Chrome, Opera, Safari 
	        xmlhttp = new XMLHttpRequest();
	    }
	    else
	    {
	        // IE6, IE5
	        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	    }
	    xmlhttp.onreadystatechange = function()
	    {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
	        {
	            document.getElementById("phoneinfo").innerHTML = xmlhttp.responseText;
	        }
	    }
	
	    xmlhttp.open("GET","accountBG.php?phone=" + phone,true);
	    xmlhttp.send();
		
		document.getElementById("phone").value = "";
	}
	else{
		$("#phoneinfo").text("Phone number must be 9 digits");
	}
	return false;
}


function getPhone(){
	return document.getElementById("phone").value;
}
