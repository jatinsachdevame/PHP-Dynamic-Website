<?php
session_start();
if (isset($_SESSION['id'])) {
	header("Location: php/admin_success.php");
}

?>



<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Signup here</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700i|Work+Sans:300,400,500,600,700" rel="stylesheet">
</head>
<body>

<section>
	<div class="login">
		<div>
			<h1>Admin Login</h1>
		</div>
		<div class="login_form">
			<form action="php/admin_login.php" method="post">
				<input type="text" name="id" placeholder="User name"><br><br>
				<input type="password" name="password" placeholder="Password"><br><br>
				<input type="submit" name="submit" value="Login"><br><br><br>
			</form>
		</div>
	</div>
</section>

</body>
</html>