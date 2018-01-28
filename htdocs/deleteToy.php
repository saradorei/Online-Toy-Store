<?php

session_start();

$id = $_GET["id"];

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$softdel = "UPDATE toy SET deleted = 1 WHERE id = '".$id."'";
// $softcartdel = "UPDATE cart SET c_deleted = 1 WHERE c_name = '".$name."'";
$result = mysqli_query($con, $softdel);

header("location:welcome.php");

mysqli_close($con);
	
?>
