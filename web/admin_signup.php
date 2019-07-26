<?php

if (isset($_POST['submit'])) {

	include 'includes/dbconn.inc.php';

	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$designation = mysqli_real_escape_string($conn, $_POST['designation']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if ( !empty($name) && !empty($id) && !empty($designation) && !empty($password)) {

		$sql = "SELECT * FROM faculty WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result); 
		if ($resultCheck > 0) {
			header("Location: admin.html?You_Are_Already_Registered");
		}
		
		else {
			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
			$sql = "INSERT INTO faculty (name, id, designation, image, password) VALUES ('$name', '$id', '$designation','default.jpg', '$hashedPwd')";
			if (mysqli_query($conn,$sql)) {
				header("Location: admin.php?Login_Here");
		}
		}

	} else {
		header("Location: admin_signup.php?Fields_Are_Empty");
	}

}

?>



<!DOCTYPE html>
<html>
<head>
	<title>Signup here</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">
</head>
<body>

<section>
	<div class="signup">
		<div>
			<h1>Signup Here</h1>
		</div>
		<div class="signup_form">
			<form action="admin_signup.php" method="post">
				<input type="text" name="name" placeholder="Name"><br>
				<input type="email" name="id" placeholder="Email address"><br>
				<input type="text" name="designation" placeholder="Designation"><br>
				<input type="password" name="password" placeholder="password"><br>
				<input type="submit" name="submit"><br><br>
			</form>
		</div>
	</div>
</section>

</body>
</html>