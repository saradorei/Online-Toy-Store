<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" href="css/validation.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="js/updateToy.js"></script>
<?php

$id = $_GET["id"];

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM toy WHERE id = ".$id."";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)){
	$name = $row["name"];
	$price = $row["price"];
	$description = $row["description"];
	$img = $row["img"];
	$inventory = $row["inventory"];
}

?>

<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="header-top-in">
				<div class="header-in">
					<ul class="icon1 sub-icon1">
						<?php
					if($_SESSION['logged'] == true)
					{
						echo "<li><a>Welcome ".$_SESSION["username"]."</a></li>";
						echo '<li> </li>';
						echo '<li><a href = "logout.php">Logout</a></li>';
						echo '<li><a href = "welcome.php">Toy List</a></li>';
					}
					?>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="account">
		<h2 class="account-in">Update Toy</h2>
		<form>
			<div> <span>Name:</span>
				<input type = "text" id = "toy_name" value = "<?php echo "$name" ?>"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Name can be any character</span><br />
			</div>
			<div> <span class="word">Price:</span>
				<input type = "text" id = "toy_price" value = "<?php echo "$price" ?>"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Price can only be integer number</span>
			</div>
			<div> <span class="word">Description:</span>
				<input type = "text" id = "toy_desc" value = "<?php echo "$description" ?>"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Use any words to introduce the toy</span>
			</div>
			<div> <span class="word">Image:</span>
				<input type = "file" id = "toy_img" value = "<?php echo "$img" ?>"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Please select a picture for the toy from local</span>
			</div>
			<div> <span class="word">Inventory:</span>
				<input type = "text" id = "toy_invent" value = "<?php echo "$inventory" ?>"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Show how many toys left</span><br />
			</div>
			<div>
				<p id = "txtHint" style="color:red"></p>
				<input type = "submit" value = "update" onclick = "return updateToy(<?php echo $id; ?>, toyname(), toyprice(), toydesc(), toyimg(),toyinvent())"/>
			</div>
			<div>
				<a href = "welcome.php">Back to Home Page</a>
			</div>
		</form>
	</div>
</div>
<br />
<div id = "txtHint"></div>
<br />
