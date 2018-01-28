<?php

session_start();

$username = $_GET["username"];
$password = $_GET["password"];
$email = $_GET["email"];
$phone = $_GET["phone"];

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM account WHERE username = '".$username."'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0){
	echo "Username has been used";
}
else{
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$ins = "INSERT INTO account (username, hash, email, phone) VALUES ('$username', '$hash', '$email', '$phone')";
	mysqli_query($con, $ins);
	echo "Successfully registered";
}

mysqli_close($con);

?>
