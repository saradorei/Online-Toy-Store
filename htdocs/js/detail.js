$(document).ready(function() {	
	
	$("#plus").click(function(){
		var cur = $("#num").val();
		$("#num").val(parseInt(cur) + 1);
	});
	
	$("#minus").click(function(){
		var cur = $("#num").val();
		$("#num").val(parseInt(cur) - 1);
		
		if($("#num").val() < 1){
			$("#num").val(1);
		}
	});
});