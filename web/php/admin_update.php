<?php

session_start();

if (!$_SESSION['id']) {
	header("Location: ../admin.php?Login_First");
} else {
	if (isset($_POST['submit'])) {

		include '../includes/dbconn.inc.php';

		$id = $_SESSION['id'];

		$f1 = mysqli_real_escape_string($conn, $_POST['f1']);
		$f2 = mysqli_real_escape_string($conn, $_POST['f2']);
		$f3 = mysqli_real_escape_string($conn, $_POST['f3']);
		$f4 = mysqli_real_escape_string($conn, $_POST['f4']);
		$f5 = mysqli_real_escape_string($conn, $_POST['f5']);
		$f6 = mysqli_real_escape_string($conn, $_POST['f6']);
		$f7 = mysqli_real_escape_string($conn, $_POST['f7']);
		$f8 = mysqli_real_escape_string($conn, $_POST['f8']);

		$sql = "UPDATE faculty SET Education = '$f1', Experience = '$f2', Interest = '$f3', Research = '$f4',Taught = '$f5', Publications = '$f6', AcademicPub = '$f7', Other = '$f8' WHERE id = '$id'";

		mysqli_query($conn,$sql);

		$name = $_FILES["f9"]["name"];
		$size = $_FILES["f9"]["size"];
		$type = $_FILES["f9"]["type"];
		$tmp_name = $_FILES["f9"]["tmp_name"];
		$extension = strtolower(substr($name, strpos($name, '.')));


		$location = "../profilepics/".$name;
		if (($size < 20000000) && ($extension == ".jpg" || $extension == ".jpeg" || $extension == ".png") ) {
			if(file_exists($location)) {
				unlink($location);
			}
			move_uploaded_file($tmp_name,$location);
			$file_name = $name;
			$sql = "UPDATE faculty SET image = '$file_name' WHERE id='$id'";
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
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
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
</header><br><br><br><br>

<h1>Welcome <?php $name = $_SESSION['name']; echo $name;?></h1>

<section>
	<div class="edit_form">


		<form action="admin_update.php" method="post" enctype="multipart/form-data">

		<?php
		include '../includes/dbconn.inc.php';

		$id = $_SESSION['id'];
		$sql = "SELECT * FROM faculty WHERE id = '$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);

		$f1 = $row['Education'];
		$f2 = $row['Experience'];
		$f3 = $row['Interest'];
		$f4 = $row['Research'];
		$f5 = $row['Taught'];
		$f6 = $row['Publications'];
		$f7 = $row['AcademicPub'];
		$f8 = $row['Other'];

			
			
			
			
			
			
			
			

		echo "<h2>Profile Picture</h2><br><input type='file' name='f9'><br>
		<h2>Education & Training</h2><br><textarea name='f1' placeholder='Education & Training' onkeyup='textAreaAdjust(this)'>$f1</textarea><br>
		<h2>Teaching Experience</h2><br><textarea name='f2' placeholder='Teaching Experience' onkeyup='textAreaAdjust(this)'>$f2</textarea><br>
		<h2>Areas of Interest</h2><br><textarea name='f3' placeholder='Areas of Interest' onkeyup='textAreaAdjust(this)'>$f3</textarea><br>
		<h2>Research</h2><br><textarea name='f4' placeholder='Research' onkeyup='textAreaAdjust(this)'>$f4</textarea><br>
		<h2>Subject Taught</h2><br><textarea name='f5' placeholder='Subject Taught' onkeyup='textAreaAdjust(this)'>$f5</textarea><br>
		<h2>Research & Publications</h2><br><textarea name='f6' placeholder='Research & Publications' onkeyup='textAreaAdjust(this)'>$f6</textarea><br>
		<h2>Other Academic Publications</h2><br><textarea name='f7' placeholder='Other Academic Publications' onkeyup='textAreaAdjust(this)'>$f7</textarea><br>
		<h2>Other</h2><br><textarea name='f8' placeholder='Other' onkeyup='textAreaAdjust(this)'>$f8</textarea><br>
		<input type='submit' name='submit'>

		";

		?>
		</form>
		<script type="text/javascript">
				function textAreaAdjust(o) {
  					o.style.height = "10px";
  					o.style.height = (25+o.scrollHeight)+"px";
  				}
		</script>


	</div>
</section>

</body>
</html>