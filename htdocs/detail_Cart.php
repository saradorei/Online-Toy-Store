<?php

session_start();

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_POST['id'];
$qua = $_POST['quantity'];
$username = $_SESSION['username'];

$query = "SELECT * FROM toy WHERE id = '$id'";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)){
	$id = $row['id'];
	$name = $row['name'];
	$price = $row['price'];
	$description = $row['description'];
	$img = $row['img'];
	$num = $row['inventory'];
	
	if($num == 0){
		header("location:welcome.php");
	}
	else if($num - $qua <= 0){
		$check = "SELECT * FROM cart WHERE id = '$id' AND c_username = '$username'";
		$redundent = mysqli_query($con, $check);
		
		if(mysqli_num_rows($redundent) > 0){
			$ins = "UPDATE cart SET c_qua = '$num' WHERE id = '$id' AND c_username = '$username'";
		}
		else{
			$ins = "INSERT INTO cart (id, c_name, c_price, c_description, c_img, c_qua, c_username) VALUES ('$id', '$name', '$price', '$description', '$img', '$num', '$username')";
		}
		mysqli_query($con, $ins);
		header("location:cart.php");
	}
	else{
		$check = "SELECT * FROM cart WHERE id = '$id' AND c_username = '$username'";
		$redundent = mysqli_query($con, $check);
		
		if(mysqli_num_rows($redundent) > 0){
			$ins = "UPDATE cart SET c_qua = '$qua' WHERE id = '$id' AND c_username = '$username'";
		}
		else{
			$ins = "INSERT INTO cart (id, c_name, c_price, c_description, c_img, c_qua, c_username) VALUES ('$id', '$name', '$price', '$description', '$img', '$qua', '$username')";
		}
		mysqli_query($con, $ins);
		header("location:cart.php");
	}	
}

?>