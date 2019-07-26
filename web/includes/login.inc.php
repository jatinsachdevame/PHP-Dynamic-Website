<?php

session_start();

if (isset($_POST['submit'])) {

	include 'dbconn.inc.php';
	$user_id = mysqli_real_escape_string($conn,$_POST['user_email']);
	$user_pwd = mysqli_real_escape_string($conn,$_POST['user_pwd']);

	if (!empty($user_id) || !empty($user_pwd)) {

		$sql = "SELECT * from users WHERE user_id = '$user_id' or user_email = '$user_id'";
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