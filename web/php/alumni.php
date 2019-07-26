<?php


if (1) {
	echo "<!DOCTYPE html>
<html>
<head>
     <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<title>Home</title>
	<link rel='stylesheet' type='text/css' href='../css/style.css'>
	<link href='https://fonts.googleapis.com/css?family=Jura' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='../css/alumni.css'>
	<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700i|Work+Sans:300,400,500,600,700' rel='stylesheet'>

</head>
<body>

<header id='header'>

	<nav id='menu' class='navmenu'>
			<i class='fa fa-bars icon' aria-hidden='true' onclick='responsive()'></i>
			<span><br><br><br></span>
			<a href='alumni_login.php'>Alumni Login</a>
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

";



include '../includes/dbconn.inc.php';

$sql = "SELECT * FROM alumni";
$sqldata = mysqli_query($conn, $sql);

echo "<section id='alumni'>
	<div class='alumni_outer'>
		<h1>Alumni</h1>
		<h2>Click on profile to view full details.</h2>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
	$img = $row['image'];
	$name = $row['name'];
	$email = $row['email'];
	$des = $row['designation'];

	echo "<div class='alumni_div'>
			<div class='alumni_img'>
			<a href='alumni_details.php?email=$email'><img src='../profilepics/$img'></a>
			</div>
			<div class='alumni_details'>
			<a href='alumni_details.php?email=$email'><h2>$name</h2></a>
				
			</div>
		</div>";
}

echo "	</div>
</section>";

	echo "<footer>

	<div class='footer_div'>
		<h1>About Us</h1>
		<div class='map'>
			<iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.025821356672!2d77.25313091508049!3d28.538943582454788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3d9a24e2a8f%3A0x469bcb8c1b03b6f6!2sRamanujan+College!5e0!3m2!1sen!2sin!4v1523420758273' width='100%' height='200' frameborder='0' style='border:0' allowfullscreen></iframe>
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
	<p>Copyright © CS Dept. , Ramanujan College | All Rights Reserved.</p>
</div>


</body>
</html>";
} else {
	header("Location: ../login.html?Login_First");
	exit();
}

?>