<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='https://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/register.js"></script>
<link rel="stylesheet" href="css/validation.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
</head>

<body>
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
		<h2 class="account-in">Register</h2>
		<form method = "POST" action = "registerBG.php">
			<table>
				<tr>
					<td><label for="username">Username:</label></td>
					<td><input type="text" name="username" id="username" size = "80">
						<span class = 'ok'> ok </span> <span class = 'error'> error </span></td>
				</tr>
				<tr>
					<td></td>
					<td><span class = 'info'>Should only contain letter and number</span><br /></td>
				</tr>
				<tr>
					<td><label for="password">Password:</label></td>
					<td><input type="password" name="password" id="password">
						<span class = 'ok'> ok </span> <span class = 'error'> error </span></td>
				</tr>
				<tr>
					<td></td>
					<td><span class = "info">Length between 8 to 20, must contains letter or number</span><br /></td>
				</tr>
				<tr>
					<td><label for="password">Confirm password:</label></td>
					<td><input type="password" name="confirm" id="confirm">
						<span class = 'ok'> ok </span> <span class = 'error'> error </span></td>
				</tr>
				<tr>
					<td></td>
					<td><span class = 'info'>Password must match</span><br /></td>
				</tr>
				<tr>
					<td><label for="email">Email:</label></td>
					<td><input type="text" name="email" id="email">
						<span class = 'ok'> ok </span> <span class = 'error'> error </span></td>
				</tr>
				<tr>
					<td></td>
					<td><span class = 'info'>Format: XXX@XXX.com</span><br /></td>
				</tr>
				<tr>
					<td><label for="phone">Phone:</label></td>
					<td><input type="text" name="phone" id="phone">
						<span class = 'ok'> ok </span> <span class = 'error'> error </span></td>
				</tr>
				<tr>
					<td></td>
					<td><span class = 'info'>Should only be numbers</span><br /></td>
				</tr>
			</table>
			<input type = "submit" id = "button" value = "register" onclick = "return allCheck(getUsername(),getPassword(),getEmail(),getPhone())"/>
		</form>
		<p id = "result" style="color:red"></p>
		<br />
		<p>Alerady have an account?</p>
		<a href = "index.php">Login</a> 
	</div>
</div>
</body>
</html>
