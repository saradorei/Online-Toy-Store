<?php

session_start();

$username = $_GET["username"];
$password = $_GET["password"];

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM account WHERE username = '$username'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result)){
	while($row = mysqli_fetch_array($result)){
		if(password_verify($password, $row["hash"])){
			$_SESSION['username'] = $username;
			$_SESSION['logged'] = true;
			echo "done";
		}
		else{
			echo "Invalid Password";
		}
	}
}
else{
	echo "Username doesn't exist";
}

mysqli_close($con);

?>
