<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/validation.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="js/addToy.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Toy</title>
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
		<h2 class="account-in">Add Toy</h2>
		<form>
			<div> <span>Name:</span>
				<input type = "text" id = "toy_name"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Name can be any character</span><br />
			</div>
			<div> <span class="word">Price:</span>
				<input type = "text" id = "toy_price"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Price can only be integer number</span>
			</div>
			<div> <span class="word">Description:</span>
				<input type = "text" id = "toy_desc"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Use any words to introduce the toy</span>
			</div>
			<div> <span class="word">Image:</span>
				<input type = "file" id = "toy_img"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Please select a picture for the toy from local</span>
			</div>
			<div> <span class="word">Inventory:</span>
				<input type = "text" id = "toy_invent"/>
				<span class = 'ok'> ok </span> <span class = 'error'> error </span>
				<span class = 'info'>Show how many toys left</span><br />
			</div>
			<div>
				<p id = "txtHint" style="color:red"></p>
				<input type = "submit" value = "add" onclick = "return addToy(toyname(), toyprice(), toydesc(), toyimg(),toyinvent())"/>
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
</body>
</html>
