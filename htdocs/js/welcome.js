function conMes(){
	con = confirm("Are you sure to delete this toy item? This item will also be removed from carts.");
	if(con == true){
		return true;
	}
	else{
		return false;
	}
}