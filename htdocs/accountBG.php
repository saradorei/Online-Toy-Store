<?php

session_start();

$username = $_SESSION["username"];
$password = $_GET["password"];
$phone = $_GET["phone"];
$email = $_GET["email"];

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
	
if($password != ""){
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$upd = "UPDATE account SET hash = '$hash' WHERE username = '$username'";
	mysqli_query($con, $upd);
}
else if($email != ""){
	$upd = "UPDATE account SET email = '$email' WHERE username = '$username'";
	mysqli_query($con, $upd);
	}
else if($phone != ""){
	$upd = "UPDATE account SET phone = '$phone' WHERE username = '$username'";
	mysqli_query($con, $upd);
}

echo "Update success!";

mysqli_close($con);

?>