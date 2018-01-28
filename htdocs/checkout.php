<?php

session_start(); 

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$username = $_SESSION['username'];
	
$query = "SELECT * FROM cart WHERE c_username = '$username'";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)){
	$id = $row['id'];
	$name = $row['c_name'];
	$price = $row['c_price'];
	$description = $row['c_description'];
	$img = $row['c_img'];
	$qua = $row['c_qua'];
		
	$ifnull = "SELECT * FROM toy WHERE id = '$id'";
	$checkres = mysqli_query($con, $ifnull);

	while($rownull = mysqli_fetch_array($checkres)){
		$num = $rownull['inventory'];
		
		if($num == 0){
			header("location:cart.php");
		}
		else if($num - $qua <= 0){
			$total = $num * $price;
			$ins = "INSERT INTO history (id, h_name, h_price, h_description, h_img, h_qua, h_qtotal, buyDate, h_username) VALUES ('$id', '$name', '$price', '$description', '$img', '$num', '$total', now(), '$username')";
			mysqli_query($con, $ins);
	
			$clear = "DELETE FROM cart WHERE c_username = '$username'";
			mysqli_query($con, $clear);
	
			$updnum = "UPDATE toy SET inventory = 0 WHERE id = '$id'";
			mysqli_query($con, $updnum);
		
		}
		else{
			$total = $qua * $price;
			$ins = "INSERT INTO history (id, h_name, h_price, h_description, h_img, h_qua, h_qtotal, buyDate, h_username) VALUES ('$id', '$name', '$price', '$description', '$img', '$qua', '$total', now(), '$username')";
			mysqli_query($con, $ins);
	
			$clear = "DELETE FROM cart WHERE c_username = '$username'";
			mysqli_query($con, $clear);
	
			$updnum = "UPDATE toy SET inventory = inventory - '$qua' WHERE id = '$id'";
			mysqli_query($con, $updnum);
	
		}
	}
}
	
header("location:history.php");

?>