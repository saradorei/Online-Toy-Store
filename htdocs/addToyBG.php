<?php

session_start();

$name = $_GET["name"];
$price = $_GET["price"];
$description = $_GET["description"];
$img = $_GET["img"];
$inventory = $_GET["inventory"];

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM toy WHERE name = '".$name."'";
$result = mysqli_query($con, $query);
	
	if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_array($result)){		
		if($row['deleted'] == 0){
			echo "This toy has already been added";
		}
		else{
			$softrec = "UPDATE toy SET deleted = 0, price = '".$price."', description = '".$description."', img = '".$img."', inventory = '".$inventory."'  WHERE name = '".$name."'";
			mysqli_query($con, $softrec);
			echo "This toy is added again!";
		}
	}
}
else{
	$ins = "INSERT INTO toy (name, price, description, img, inventory) VALUES ('$name', '$price', '$description', '$img', '$inventory')";
	mysqli_query($con, $ins);
	echo "Adding success!";
}

mysqli_close($con);

?>
