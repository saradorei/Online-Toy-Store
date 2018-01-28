<?php

session_start();

$id = $_GET["id"];
$name = $_GET["name"];
$price = $_GET["price"];
$desc = $_GET["description"];
$img = $_GET["img"];
$inventory = $_GET["inventory"];

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$upd = "UPDATE toy SET name = '$name', price = '$price', description = '$desc', img = '$img', inventory = '.$inventory.' WHERE id = '$id'";
mysqli_query($con, $upd);

$updcart = "UPDATE cart SET c_name = '$name', c_price = '$price', c_description = '$desc', c_img = '$img' WHERE id = '$id'";
mysqli_query($con, $updcart);

$updhistory = "UPDATE history SET h_name = '$name', h_price = '$price', h_description = '$desc', h_img = '$img' WHERE id = '$id'";
mysqli_query($con, $updhistory);

echo "Update success!";

mysqli_close($con);

?>