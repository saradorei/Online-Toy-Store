<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Cart</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/move-top.js"></script>

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
							echo '<li><a href = "history.php?sortDate=True">Purchase history</a></li>';
							echo '<li><a href = "welcome.php">Toy List</a></li>';
						}
						$username = $_SESSION['username'];
						?>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<form method = "POST" action = "cart.php" enctype="multipart/form-data">
	<?php
	/*$con = mysqli_connect("localhost","root","root","toystore");*/
	$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$query = "SELECT * FROM cart WHERE c_username = '".$username."' AND c_deleted = 0";
	$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($result)){
		$id = $row['id'];
		$name = $row['c_name'];
		$price = $row['c_price'];
		$description = $row['c_description'];
		$img = $row['c_img'];
		$qua = $row['c_qua'];
		$username = $row['c_username'];
		$qprice = $row['c_price'] * $qua;
		$total += $row['c_price'] * $qua;
	?>
	<div class="top-products">
	<div class="col-md-3 md-col">
		<div class="col-md "> <a href="#" class="compare-in"><img src="<?php echo $img; ?>" alt="" /></a>
			<div class="top-content">
				<h5> <a href="#"><?php echo $name;?></a></h5>
				<div class="white">
					<p class="dollar"><span class="in-dollar">$<?php echo $price;?></span></p>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 md-col">
		<div class="col-md">
			<div class="top-content">
				<h5> Quantity:</h5>
				<div class="white">
					<p class="dollar">
						<input name = "qty[]" type="text" size=1 value="<?php echo $qua;?>"/>
					</p>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 md-col">
		<div class="col-md">
			<div class="top-content">
				<h5> Subtotal:</h5>
				<div class="white">
					<p class="dollar"><span class="in-dollar">$</span><span><?php echo $qprice;?></span></p>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 md-col">
		<div class="col-md">
			<div class="top-content">
				<h5> Delete:</h5>
				<div class="white">
					<input type = "hidden" name = "id[]" value = "<?php echo $id;?>" />
					<input type = "checkbox" name = "check[]" value = "<?php echo $id;?>" multiple/>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php }?>
	<div align = "center">
		<p>Total Price： $<?php echo $total;?></p>
		<div class="account">
			<input type = "submit" name = "submit" value = "Update" />
			<input type = "button" value = "Checkout" onClick="window.location='checkout.php'"/>
		</div>
	</div>
</form>

<?php
	
if(isset($_POST["submit"])){
	if(isset($_POST['check'])){
		$dele = $_POST['check'];
		foreach($dele as $del){
			$query = "DELETE FROM cart WHERE id = '$del' AND c_username = '$username'";
			mysqli_query($con, $query);
			header("location:cart.php");
		}
	}
	
	if(isset($_POST['qty'])){
		$quaty = $_POST['qty'];
		$ids = $_POST['id'];
		$array = array_combine($ids, $quaty);
		foreach($array as $i => $q){
			$query = "UPDATE cart SET c_qua='$q' WHERE id='$i' AND c_username = '$username'";
			mysqli_query($con, $query);
			$url = "cart.php";  
			echo "<script type='text/javascript'>";  
			echo "window.location.href='$url'";  
			echo "</script>"; 
		}
	}
}

?>

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