
$(document).ready(function() {		
	bool_1 = false;
	bool_2 = false;
	bool_3 = false;
	bool_4 = false;

	$(".ok").hide();
	$(".info").hide();
	$(".error").hide();
	
	$("input").focus(function(){
		$(this).nextUntil("input").hide();
		$(this).parent().parent().next().children().children(".info").show();
	});
		
	$("input").blur(function(){
		$(this).parent().parent().next().children().children(".info").hide();
		var t = $(this).val();
		
		if($(this).prop("id") == "username"){
			var Regex = /^[A-Za-z0-9]+$/;
			if(Regex.test(t)){
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".ok").show();
				bool_1 = true;
			}
			else{
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".error").show();
				bool_1 = false;
			}
		}
		
		if($(this).prop("id") == "password"){
			var Regex = /^[A-Za-z0-9]{8,20}$/;
			if(Regex.test(t)){
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".ok").show();
				bool_2 = true;
			}
			else{
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".error").show();
				bool_2 = false;
			}
		}
		
		if($(this).prop("id") == "confirm"){
			var Regex = /^[A-Za-z0-9]{8,20}$/;
			var pass = $("#password").val();
			if(Regex.test(t) && $(this).val() == pass){
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".ok").show();
				bool_3 = true;
			}
			else{
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".error").show();
				bool_3 = false;
			}
		}		
		
		if($(this).prop("id") == "email"){
			var Regex =  /\w+@\w+[.]com/;
			if(Regex.test(t)){
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".ok").show();
				bool_4 = true;
			}
			else{
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".error").show();
				bool_4 = false;
			}
		}
		
		if($(this).prop("id") == "phone"){
			var Regex =  /^[0-9]+$/;
			if(Regex.test(t)){
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".ok").show();
			}
			else{
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".error").show();
			}
		}
	});
});

function allCheck(username, password, email, phone){
	var c = $("#phone").val();
	var regex =  /^[0-9]+$/;
		
	if(bool_1 && bool_2 && bool_3 && bool_4 && regex.test(c)){
		if (window.XMLHttpRequest)
    	{
	        // IE7+, Firefox, Chrome, Opera, Safari 
			regis = new XMLHttpRequest();
	    }
	    else
	    {
	        // IE6, IE5
			regis = new ActiveXObject("Microsoft.XMLHTTP");
	    }
		
		regis.onreadystatechange = function()
	    {
			if (regis.readyState == 4 && regis.status == 200)
	        {
	            document.getElementById("result").innerHTML = regis.responseText;
	        }
	    }
		regis.open("GET","registerBG.php?username=" + username + "&password=" + password + "&email=" + email + "&phone=" + phone,true);
	    regis.send();
	}
	else{
		$("#result").text("All field should be filled correctly");
	}
	return false;
}

function getUsername(){
	return document.getElementById("username").value;
}
function getPassword(){
	return document.getElementById("password").value;
}
function getEmail(){
	return document.getElementById("email").value;
}
function getPhone(){
	return document.getElementById("phone").value;
}

