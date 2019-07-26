<?php

session_start();

?>

<?php

if (isset($_SESSION['u_id']) || isset($_SESSION['id'])) {
	include '../study.html';
	include 'study_css.html';
} else {
	header("Location: ../login.html?Login_First_To_Access_Data");
	exit();
}

?>