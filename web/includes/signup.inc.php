<?php 

if (isset($_POST['submit'])) {

	include 'dbconn.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['user_first']);
	$last = mysqli_real_escape_string($conn, $_POST['user_last']);
	$email = mysqli_real_escape_string($conn, $_POST['user_email']);
	$uid = mysqli_real_escape_string($conn, $_POST['user_id']);
	$pwd = mysqli_real_escape_string($conn,$_POST['user_pwd']);

	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		header("Location: ../signup.html?fields_are_empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_email = '$email'";
		$result = mysqli_query($conn,$sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0) {
			header("Location: ../signup.html?Email_address_already_taken.");
		} else {
			$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users (user_first, user_last, user_email, user_id, user_pwd) VALUES ('$first','$last','$email','$uid','$hashedPwd')";
			mysqli_query($conn, $sql);
			header("Location: ../signup.html?Registration_Successful");
		}
	}

} else {
	header("Location: ../signup.html?Fields_are_empty");
	exit();
}

?>