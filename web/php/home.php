<?php

session_start();

if (isset($_SESSION['u_id']) || isset($_SESSION['id'])) {
	echo "<!DOCTYPE html>
<html>
<head>
     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Home</title>
	<link rel='stylesheet' type='text/css' href='../css/style.css'>
	<link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='../css/home.css'>
	<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700i|Work+Sans:300,400,500,600,700' rel='stylesheet'>

</head>
<body>

<header id='header'>

	<nav id='menu' class='navmenu'>
			<i class='fa fa-bars icon' aria-hidden='true' onclick='responsive()'></i>
			<span><br><br><br></span>
			<a href='study.php'>Study Material</a>
			<a href='../includes/logout.inc.php'>Logout</a>
	</nav>
	<script type='text/javascript'>
		function responsive() {
			var dropdown = document.getElementById('menu');
			var header = document.getElementById('header');
			if (dropdown.className == 'navmenu') {
				dropdown.className = 'showmenu';
				header.className = 'header_show';

			}
			else {
				dropdown.className = 'navmenu';
				header.className = '';
			}

		}
	</script>
</header>

<br><br><br>";








include '../includes/dbconn.inc.php';

$sql = "SELECT * FROM post ORDER BY postid DESC";

$result = mysqli_query($conn,$sql);


while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$name = $row['name'];
	$post = $row['post'];
	$link = $row['link'];
	$file = $row['file'];

	$path = "../uploads/".$file;

	$query = "SELECT * from faculty WHERE name = '$name'";
	$output = mysqli_query($conn,$query);
	$arr = mysqli_fetch_array($output, MYSQLI_ASSOC);

	$image = $arr['image'];
	$src = "../profilepics/".$image;

	$extension = strtolower(substr($file, strpos($file, '.')));

	echo "<div class='main'>
	<div class='post'>
		<div class='head'><h1><img src='$src'>&nbsp;$name</h1></div><br><br><br><br><br>

		<div class='content'>
			<h3>$post</h3>";

	if (!empty($link)) {
		echo "<a href='$link' target='_blank'>$link</a><br><br>";
	}

	if (($extension == ".jpg") || ($extension == ".png") || ($extension == ".jpeg")) {
		echo "<img src='$path'>";
	}

	else if (($extension == ".mp4") || ($extension == ".webm") || ($extension == ".flv") || ($extension == ".avi") || ($extension == ".mkv")) {
		echo "<video loop controls class='video' id='myVideo'>
		<source src='$path' type='video/mp4'>
		<source src='$path' type='video/webm'>
		<source src='$path' type='video/flv'>
		<source src='$path' type='video/avi'>
		<source src='$path' type='video/mkv'>
	</video>";	
	}
	else {
		echo "<a href='$path' target='_blank' download>Download</a>";
	}


	echo "		</div>

	</div>
</div>";

}







	echo "<footer>

	<div class='footer_div'>
		<h1>About Us</h1>
		<div class='map'>
			<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.025821356672!2d77.25313091508049!3d28.538943582454788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3d9a24e2a8f%3A0x469bcb8c1b03b6f6!2sRamanujan+College!5e0!3m2!1sen!2sin!4v1523420758273' width='00%' height='200' frameborder='0' style='border:0' allowfullscreen></iframe>
		</div>
	</div>

	<div class='footer_div'>
		<h1>Follow Us</h1>
		<a href='https://www.facebook.com/Department-of-Computer-Science-Ramanujan-College-1523013567776842/' target='_blank'><i class='fa fa-facebook' style='font-size:36px;color:white'></i></a>

		<a href='https://www.instagram.com' target='_blank'><i class='fa fa-instagram' style='font-size:36px;color:white'></i></a>

	</div>

	<div class='footer_div'>
		<h1>Contact Us</h1>
		<a href='https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&to=turingtonreboot@email.com' target='_blank'><i class='fa fa-google-plus' style='font-size:36px;color:white'></i></a>
	</div>

</footer>
<div class='footer_below'>
	<p>All the content used in this page is not meant for profit, promotion, advertisement, copyright. It is just for educational purpose.</p>
</div>


</body>
</html>";
} else {
	header("Location: ../login.html?Login_First");
	exit();
}

?>

