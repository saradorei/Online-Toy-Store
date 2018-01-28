<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="js/account.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Account</title>
</head>

<body>
<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="header-top-in">
				<div class="header-in">
					<ul class="icon1">
						<?php
							if($_SESSION['logged'] == true)
							{
								echo "<li><a>Welcome ".$_SESSION["username"]."</a></li>";
								echo '<li> </li>';
								echo '<li><a href = "logout.php">Logout</a></li>';
								echo '<li><a href = "cart.php">Your Cart</a></li>';
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
<?php  

/*$con = mysqli_connect("localhost","root","root","toystore");*/
$con = mysqli_connect("50.87.144.131","saradore_ts","toystore", "saradore_toystore");
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT * FROM account WHERE username = '$username'";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result)){
	while($row = mysqli_fetch_array($result)){
		$email = $row["email"];
		$phone = $row["phone"];
		$hash = $row["hash"];
	}
}

?>

<div class="container">
	<div class="account">
		<h2 class="account-in">User Information</h2>
		<form>
			<table>
				<tr>
					<td><label>New password:</label></td>
					<td><input type = "password" id = "newPass" size = "40"/></td>
				</tr>
				<tr><td><br /></td></tr>
				<tr>
					<td><label>Confirm New Password:&nbsp;&nbsp;</label></td>
					<td><input type = "password" id = "conPass" /></td>
					<td><input type = "button" value = "Change Password" onclick = "return updatePass(getNewPass(), getConPass())"/></td>
					<td><span id = "passinfo"></span></td>
				</tr>
				<tr><td><br /></td></tr>
				<tr>
					<td><label>Email:</label></td>
					<td><input type = "text" id = "email" value = "<?php echo $email; ?>"/></td>
					<td><input type = "button" value = "Update Email" onclick = "return updateEmail(getEmail())"/></td>
					<td><span id = "emailinfo"></span></td>
				</tr>
				<tr><td><br /></td></tr>
				<tr>
					<td><label>Phone:</label></td>
					<td><input type = "text" id = "phone"  value = "<?php echo $phone; ?>"/></td>
					<td><input type = "button" value = "Update Phone" onclick = "return updatePhone(getPhone())"/></td>
					<td><span id = "phoneinfo"></span></td>
				</tr>
			</table>
		</form>
		
	</div>
</div>
</body>
</html>