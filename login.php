<?php 
session_start();

if(isset($_SESSION['welcomeMessage']) && !isset($_SESSION['username'])) {
	echo $_SESSION['welcomeMessage'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<p>Login here</p>
	<form action="handleForm.php" method="POST">
		<div class="fields">
			<p><input type="text" placeholder="username here" class="fields" name="username"></p>
			<p><input type="password" placeholder="password here" class="fields" name="password"></p>
			<p><input type="submit" value="login" id="loginBtn" name="loginBtn"></p>
		</div>
	</form>
	<a href="register.php">Register</a>
</body>
</html>