<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="js/login.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<body>
<?php
if($_SESSION['logged'] == true)
{
	header("location:welcome.php");
}
?>
<!--header-->
<div class="header">
	<div class="header-top">
		<div class="container">
			<div class="header-top-in">
				<div class="header-in">
					<ul class="icon1 sub-icon1">
						<li ><a href="#" > </a></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="account">
		<h2 class="account-in">Login</h2>
		<form method = "POST" action = "loginBG.php">
			<table>
				<tr>
					<td><label for="username">Username:&nbsp;&nbsp;</label></td>
					<td><input type="text" name="username" id="username" size = "40"></td>
				</tr>
				<tr>
					<td></td>
					<td><br /></td>
				</tr>
				<tr>
					<td><label for="password">Password:</label></td>
					<td><input type="password" name="password" id="password"></td>
				</tr>
			</table>
			<br />
			<input type = "submit" id = "button" value = "login" onclick = "return allCheck(getUsername(),getPassword())"/>
		</form>
		<p id = "result"></p>
		<br />
		<p>Don't have an account?</p>
		<a href = "register.php">Register</a>
	</div>
</div>

</body>
</html>
