<?php  
session_start();

$page = $_GET['page'];
$name = $_GET["name"];
$minPrice = $_GET["minPrice"];
$maxPrice = $_GET["maxPrice"];
$order = $_GET["order"];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="js/welcome.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
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
						echo '<li><a href = "history.php?sortDate=True">Purchase history</a></li>';
					}
					?>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="header-bottom-in">
	<div class="container">
		<div class="header-bottom-on">
			<div class="header-can">
				<div class="search">
					<form method = "GET" action = "welcome.php">
						<input type = "text" name = "name" placeholder="Toy Name"/>
						<div class="search">
							<input type = "text" name = "minPrice" placeholder="Min Price" size = "2"/>
						</div>
						<div class="search">
							<input type = "text" name = "maxPrice" placeholder="Max Price" size = "2"/>
						</div>
						<select name = "order">
							<option value = "">Order</option>
							<option value="asc">Cheap -> Expensive</option>
							<option value="desc">Expensive -> Cheeap</option>
						</select>
						<input type = "submit" value = "fliter"/>
					</form>
				</div>
				<div class="clearfix"> </div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<?php 
if($_SESSION['username'] == "admin"){
	echo '<a class="hvr-shutter-in-vertical hvr-shutter-in-vertical2" href = "addToy.php">Add Toy</a>';
}
?>

<?php

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$results_per_page = 4;

$query = "SELECT * FROM toy WHERE deleted = 0";
if($name != ""){
	$query .= " AND name LIKE '%$name%'";
}
if($minPrice != "" && $maxPrice != ""){
	$query .= " AND price >= '$minPrice' AND price <= '$maxPrice'";
}
if($order != ""){
	if($order === "asc"){
		$query .= " ORDER BY price ASC";
	}
	else{
		$query .= " ORDER BY price DESC";
	}
}

$result = mysqli_query($con, $query);
$number_of_results = mysqli_num_rows($result);

$number_of_pages = ceil($number_of_results / $results_per_page);

if(!isset($_GET['page'])){
	$page = 1;
}
else{
	$page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $results_per_page;

$sql = "SELECT * FROM toy WHERE deleted = 0";
if($name != ""){
	$sql .= " AND name LIKE '%$name%'";
}
if($minPrice != "" && $maxPrice != ""){
	$sql .= " AND price >= '$minPrice' AND price <= '$maxPrice'";
}
if($order != ""){
	if($order === "asc"){
		$sql .= " ORDER BY price ASC";
	}
	else{
		$sql .= " ORDER BY price DESC";
	}
}
$sql .= " LIMIT " . $this_page_first_result . ',' . $results_per_page;

$result = mysqli_query($con, $sql);

?>
<div class="container">
	<div class="products">
		<h2 class=" products-in">PRODUCTS</h2>
		<?php 
		$count=0;
		while($row = mysqli_fetch_array($result))
		{
			$id = $row["id"];
			$name = $row["name"];
			$price = $row["price"];
			$description = $row["description"];
			$img = $row["img"];
			$inventory = $row["inventory"];
			if($count==4)
			{
				echo '<p>&nbsp; </p>';
				$count=0;
			}
			$count++;
		?>
		<div class="col-md-3 md-col">
			<div class="col-md"> 
				<?php echo '<a class ="compare-in" href="detail.php?id='.$id.'">';?> 
				<?php echo '<img alt="" height=209px width=239px src = "'.$img.'"/>';?> 
				<?php echo '</a>';?> </a>
				<div class="top-content">
					<h5><?php echo '<a href="detail.php?id='.$row["id"].'">'.$name.'</a>';?></h5>
					<div class="white">
						<?php
						if($_SESSION['username']=="admin")
						{
							echo "<a class=\"hvr-shutter-in-vertical hvr-shutter-in-vertical2\" href=\"deleteToy.php?id=".$id."\" onclick = 'return conMes()'>Delete</a>";?>
						<?php echo "<a class=\"hvr-shutter-in-vertical hvr-shutter-in-vertical2\" href=\"updateToy.php?id=".$id."\">Edit</a>";
						}
						?>
						<p class="dollar">&nbsp;<?php echo $inventory;?>&nbsp;left&nbsp;</p>
						<br /><br />
						<p class="dollar"><span class="in-dollar">$</span><span><?php echo $price;?></span></p>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		?>
		<div class="clearfix"></div>
	</div>
</div>

<div align="center">
	<p>This website is only for practice.</p>
	<p>This is not a commercial website, and it does not have any functionality of paying or buying.</p>
	<p>I do not responsible for anything, and please don't call for any toys because all of them are virtual.</p>
	<br />
</div>

<p style="text-align:center">- Page
	<?php
	for($page = 1;$page <= $number_of_pages;$page++){
		echo '<a href = "welcome.php?page=' . $page . '">' . $page . '</a>'."  ";
	}
	?>
	-</p>
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

<?php
mysqli_close($con);
?>
</body>
</html>