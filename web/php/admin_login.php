<?php

session_start();

if (isset($_POST['submit'])) {

	include '../includes/dbconn.inc.php';

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if (!empty($id) && !empty($password)) {
		
		$sql = "SELECT * FROM faculty WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$result_check = mysqli_num_rows($result);

		if ($result_check > 0) {
			if ($row = mysqli_fetch_assoc($result)) {
				$hashedPwdCheck = password_verify($password, $row['password']);

				if ($hashedPwdCheck == true) {
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					$_SESSION['image'] = $row['image'];
					$_SESSION['designation'] = $row['designation'];
					header("Location: admin_success.php");
				} else {
					header("Location: ../admin.php?Login_Failed");
				}
			}
		}

	} else {
		header("Location: ../admin.html?Fields_Are_Empty");
	}

}

?>