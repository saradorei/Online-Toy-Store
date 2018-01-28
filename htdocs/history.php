<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/Customized.css" rel="stylesheet" type="text/css"/>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>History</title>
</head>

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
<div class="Conhistory">
	<form method = "GET" action = "history.php">
		Sort type:
		<select name = "type">
			<option value = "">--</option>
			<option value="name">Item Name</option>
			<option value="quantity">Quantity</option>
			<option value="price">Price</option>
			<option value="total">Total price</option>
			<option value="date">Buy Date</option>
		</select>
		Sort order:
		<select name = "order">
			<option value = "">--</option>
			<option value="asc">Ascending</option>
			<option value="desc">Descending</option>
		</select>
		<input type = "submit" value = "sort"/>
	</form>
</div>
<br />
<div class="Conhistory">
	<h2 class="account-in">Purchase History</h2>
	<table border = "1">
		<tr>
			<th width="20%">Item Name</a></th>
			<th width="10%">Quantity</a></th>
			<th width="20%">Price</a></th>
			<th width="15%">Total</a></th>
			<th width="10%">Date</a></th>
		</tr>
		<?php

	$type = $_GET['type'];
	$order = $_GET['order'];
	
	/*$con = mysqli_connect("localhost","root","root","toystore");*/
	$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if($type === "name"){
		if($order === "asc"){
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY h_name ASC";
		}
		else{
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY h_name DESC";
		}
	}
	else if($type === "quantity"){
		if($order === "asc"){
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY h_qua ASC";
		}
		else{
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY h_qua DESC";
		}
	}
	else if($type === "price"){
		if($order === "asc"){
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY h_price ASC";
		}
		else{
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY h_price DESC";
		}
	}
	else if($type === "total"){
		if($order === "asc"){
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY h_qtotal ASC";
		}
		else{
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY h_qtotal DESC";
		}
	}
	else if($type === "date"){
		if($order === "asc"){
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY buyDate ASC";
		}
		else{
			$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY buyDate DESC";
		}
	}
	else{
		$query = "SELECT * FROM history WHERE h_username = '".$username."' ORDER BY buyDate DESC";
	}
	
	$result = mysqli_query($con, $query);
	
	while($row = mysqli_fetch_array($result)){
		$id = $row['id'];
		$name = $row['h_name'];
		$price = $row['h_price'];
		$description = $row['h_description'];
		$img = $row['h_img'];
		$qua = $row['h_qua'];
		$date = $row['buyDate'];
		$username = $row['h_username'];
		$qprice = $row['h_qtotal'];
		$total += $row['h_price'] * $qua;
	?>
		<tr>
			<td><?php echo'<a href = "detail.php?id='.$id.'">'.$name.'</a>';?></td>
			<td><?php echo $qua;?></td>
			<td>$<?php echo $price;?></td>
			<td>$<?php echo $qprice;?></td>
			<td><?php echo $date;?></td>
		</tr>
		<?php
	}
	?>
	</table>
</div>
<div class="account">
	<input type = "button" value = "Continue Shopping" onClick="window.location='welcome.php'"/>
	<p>Total Price： $<?php echo $total;?></p>
	
</div>


</body>
</html>