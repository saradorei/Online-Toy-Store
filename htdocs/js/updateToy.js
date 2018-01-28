$(document).ready(function() {		
	bool_1 = false;
	bool_2 = false;
	bool_3 = false;
	bool_4 = false;
	bool_5 = false;

	$(".ok").hide();
	$(".info").hide();
	$(".error").hide();
	
	$("input").focus(function(){
		$(this).nextUntil("input").hide();
		$(this).siblings(".info").show();
	});
		
	$("input").blur(function(){
		var t = $(this).val();
		
		if($(this).prop("id") == "toy_name"){
			if(t != ""){
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
		
		if($(this).prop("id") == "toy_price"){
			var Regex = /^[0-9]+$/;
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
		
		if($(this).prop("id") == "toy_desc"){
			if(t != ""){
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
		
		if($(this).prop("id") == "toy_img"){
			if(t != ""){
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
		
		if($(this).prop("id") == "toy_invent"){
			var Regex = /^[0-9]+$/;
			if(Regex.test(t)){
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".ok").show();
				bool_5 = true;
			}
			else{
				$(this).nextUntil("input").hide();
				$(this).nextUntil("input",".error").show();
				bool_5 = false;
			}
		}
	});
});

function updateToy(id, name, price, description, img, inventory){
	if(bool_1 && bool_2 && bool_3 && bool_4 && bool_5){
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
	            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
	        }
	    }
	    xmlhttp.open("GET","updateToyBG.php?id=" + id + "&name=" + name + "&price=" + price + "&description=" + description + "&img=" + img + "&inventory=" + inventory,true);
	    xmlhttp.send();
		
		document.getElementById("toy_name").value = "";
		document.getElementById("toy_price").value = "";
		document.getElementById("toy_desc").value = "";
		document.getElementById("toy_img").value = "";
		document.getElementById("toy_invent").value = "";
	}
	else{
		$("#txtHint").text("All field should be filled correctly");
	}
	return false;	
}

function toyname(){
	return document.getElementById("toy_name").value;
}
function toyprice(){
	return document.getElementById("toy_price").value;
}
function toydesc(){
	return document.getElementById("toy_desc").value;
}
function toyimg(){
	return "img/" + document.getElementById("toy_img").value.substring(11);
}
function toyinvent(){
	return document.getElementById("toy_invent").value;
}
