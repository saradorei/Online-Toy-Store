<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="js/detail.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Toy Detail</title>
</head>
<?php
/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");

if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET["id"];

$query = "SELECT * FROM toy WHERE id = ".$id."";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)){
	$name = $row["name"];
	$price = $row["price"];
	$description = $row["description"];
	$img = $row["img"];
}

echo "<br />";
?>

<body>
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
						echo '<li><a href = "account.php">Account & Security</a></li>';
						echo '<li><a href = "cart.php">Your Cart</a></li>';
						echo '<li><a href = "history.php?sortDate=True">Purchase history</a></li>';
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
<br />
<div class="container">
	<div class="single">
		<div class="col-md-9 top-in-single">
			<div class="col-md-5 single-top">
				<div class="flexslider"> 
					<script src="js/imagezoom.js"></script> 
					<script defer src="js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
					<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
							$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
							});
						});
						</script>
					<ul class="slides">
						<li data-thumb="images/si1.jpg">
							<div class="thumb-image"> <img height="456px" width="316px" src="<?php echo $img ?>" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-7 single-top-in">
				<div class="single-para">
					<h4><?php echo $name; ?></h4>
					<div class="para-grid"> <span class="add-to">$<?php echo $price; ?></span>
						<form method="post" action="detail_Cart.php">
							<input type="submit" class="hvr-shutter-in-vertical cart-to" name="add_to_cart" value="Add to Cart" />
							<input style="float:right" type ="button" id = "plus" value = "+"/>
							<input style="float:right" type="text" id = "num" name="quantity" value="1" size = "5"/>
							<input style="float:right" type = "button" id = "minus" value = "-"/>
							<input type="hidden" name="id" value="<?php echo $id;?>" />
						</form>
						<div class="clearfix"></div>
					</div>
					<p>Description:</p>
					<p><?php echo $description;?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="header-top-in"> <a href = "welcome.php">Go Back</a>
		<div class="header-in"> </div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="header-top-in">
				<div class="header-in"> </div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
