<?php

if (isset($_POST['submit'])) {
	include '../includes/dbconn.inc.php';

	if (!empty($_POST['user_name']) && !empty($_POST['user_email']) && !empty($_POST['user_query'])) {

		$user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
		$user_email = mysqli_real_escape_string($conn,$_POST['user_email']);
		$user_query = mysqli_real_escape_string($conn,$_POST['user_query']);

		$sql = "INSERT INTO queries (user_name, user_email, user_query) VALUES ('$user_name', '$user_email', '$user_query');";
		mysqli_query($conn, $sql);
		header("Location: ../index.html?SUCCESS");
		
	} else {
		header("Location: ../index.php?fields_are_empty");
	}
}

?>