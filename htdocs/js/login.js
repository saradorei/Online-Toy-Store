function allCheck(username, password)
{
	var u = $("#username").val();
	var p = $("#password").val();
		
	$("#result").empty();
		
	var bool = false;
		
	if(u == "" || p == ""){
		$("#result").text("Username and password is mandatory");
		bool = true;
	}			
			
	if(!bool){
		if (window.XMLHttpRequest)
	    {
	        // IE7+, Firefox, Chrome, Opera, Safari 
			validation = new XMLHttpRequest();
	    }
	    else
	    {
	        // IE6, IE5
			validation = new ActiveXObject("Microsoft.XMLHTTP");
	    }
		
		validation.onreadystatechange = function()
	    {
			if (validation.readyState == 4 && validation.status == 200)
	        {
				if(validation.responseText == "done"){
					window.location.replace("welcome.php");
				}
	            document.getElementById("result").innerHTML = validation.responseText;
	        }
	    }
		validation.open("GET","loginBG.php?username=" + username + "&password=" + password,true);
	    validation.send();
	}
	return false;
    
}

function getUsername(){
	return document.getElementById("username").value;
}
function getPassword(){
	return document.getElementById("password").value;
}