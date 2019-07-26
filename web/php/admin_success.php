<?php

session_start();

if (!$_SESSION['id']) {
	header("Location: ../admin.php?Login_First");
} else {
	if (isset($_POST['submit'])) {

		include '../includes/dbconn.inc.php';
		
		$post = $_POST['post'];
		$link = $_POST['link'];
		$username = $_SESSION['name'];

		$size = $_FILES["file"]["size"];
		
		$tmp_name = $_FILES["file"]["tmp_name"];

		$sql = "INSERT INTO post(name, post, link) VALUES ('$username','$post','$link')";
		mysqli_query($conn,$sql);

		$name = $_FILES["file"]["name"];
		$location = "../uploads/".$name;
		if (($size < 1000000000)) {
			if(file_exists($location) && !empty($name)) {
				unlink($location);
			}
			move_uploaded_file($tmp_name,$location);
			$file_name = $name;
			$sql = "UPDATE post SET file = '$file_name' WHERE post='$post'";
			mysqli_query($conn, $sql);
		}
	}
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Panel</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/admin_success.css">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700i|Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header id="header">

	<nav id="menu" class="navmenu">
			<i class="fa fa-bars icon" aria-hidden="true" onclick="responsive()" style="font-size: 25px;"></i>
			<span><br><br><br></span>
			<a href="../index.php" onclick="responsive()">Home</a>
			<a href="study.php" onclick="responsive()">Study Material</a>
			<a href="../index.php#contact" onclick="responsive()">Contact</a>
			<a href="https://drive.google.com/file/d/0B9wk87gcaPJjdy1UemV6a3VfRUk/view" target="_blank" onclick="responsive()">Techzine</a>
			<a href="alumni.php">Alumni</a>
			<a href="../includes/logout.inc.php">Logout</a>
	</nav>
	<script type="text/javascript">
		function responsive() {
			var dropdown = document.getElementById("menu");
			var header = document.getElementById("header");
			if (dropdown.className == "navmenu") {
				dropdown.className = "showmenu";
				header.className = "header_show";

			}
			else {
				dropdown.className = "navmenu";
				header.className = "";
			}

		}
	</script>
</header><br><br>

<h1>Welcome <?php $name = $_SESSION['name']; echo $name;?></h1>

<h2 class="edit"><a href="admin_update.php">Edit your profile</a></h2>

<br><br><br>
<div class="post">
	<form action="admin_success.php" method="post" enctype="multipart/form-data">
		<textarea name='post' placeholder='Update your status' onkeyup='textAreaAdjust(this)'></textarea><br><br>
		<input type="text" name="link" placeholder="Enter link if any.."><br>
		<input type='file' name='file'><br><br>
		<input type="submit" name="submit">
	</form>
</div>
<script type="text/javascript">
				function textAreaAdjust(o) {
  					o.style.height = "10px";
  					o.style.height = (25+o.scrollHeight)+"px";
  				}
		</script>

</body>
</html>