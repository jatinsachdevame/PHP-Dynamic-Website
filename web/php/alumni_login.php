<?php

session_start();

if (isset($_POST['submit'])) {

	include '../dbconn.inc.php';
	$user_id = mysqli_real_escape_string($conn,$_POST['user_email']);
	$user_pwd = mysqli_real_escape_string($conn,$_POST['user_pwd']);

	if (!empty($user_id) || !empty($user_pwd)) {

		$sql = "SELECT * from alumni WHERE user_id = '$email'";
		$result = mysqli_query($conn, $sql);
		$result_check = mysqli_num_rows($result);
		if ($result_check>0) {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashedPwdCheck = password_verify($user_pwd, $row['user_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../login.html?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Logged in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'] ;
					header("Location: ../php/home.php?login=success");
					exit();
				}
			}
			
		} else {
			header("Location: ../login.html?_No_Such_User_Exist");
		}
		
	} else {
		header("Location: ../login.html?_Fields_Are_Empty");
		exit();
	}


} else {
	echo "Failed";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Signup here</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">
</head>
<body>

<section>
	<div class="login">
		<div>
			<h1>Alumni Login</h1>
		</div>
		<div class="login_form">
			<form action="alumni_login.php" method="post">
				<input type="text" name="user_email" placeholder="Email address/User name"><br><br>
				<input type="password" name="user_pwd" placeholder="Password"><br><br>
				<input type="submit" name="submit" value="Login"><br><br><br>
				<a href="signup.html">Don't have an account? Signup here</a><br>
				<a href="admin.php">Or</a><br>
				<a href="admin.php">Admin login</a>
			</form>
		</div>
	</div>
</section>

</body>
</html>