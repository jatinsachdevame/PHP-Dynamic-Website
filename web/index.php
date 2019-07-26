<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CS Dept | RCDU</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700i|Work+Sans:300,400,500,600,700" rel="stylesheet">

</head>
<body>
<header id="header">

	<nav id="menu" class="navmenu">
			<i class="fa fa-bars icon" aria-hidden="true" onclick="responsive()" style="font-size: 25px;"></i>
			<span><br><br><br></span>
			<a href="#about" onclick="responsive()">About</a>
			<a href="#faculty" onclick="responsive()">Faculty</a>
			<a href="php/study.php" onclick="responsive()">Study Material</a>
			<a href="login.html" onclick="responsive()"><i class="fa fa-user-o" aria-hidden="true" style="font-size: 18px;"></i></a>
			<a href="http://www.turington.in" target="_blank" onclick="responsive()">Turington</a>
			<a href="http://www.rcdu.in" target="_blank" onclick="responsive()">Robonauts</a>
			<a href="https://drive.google.com/file/d/0B9wk87gcaPJjdy1UemV6a3VfRUk/view" target="_blank" onclick="responsive()">Techzine</a>
			<a href="php/alumni.php">Alumni</a>
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
</header>
<section>
	<div class="landing">
		<video autoplay loop muted class="background_video">
			<source src="videos/video2.mp4" type="video/mp4">
		</video>

		<span class="responsive_span">
			<p>Department<br>of</p>
			<h1 style="position: absolute;left: 30%;">Computer<br>Science</h1>
		<i class="fa fa-laptop" aria-hidden="true" style="font-size: 270px; color: #fff; z-index: 10; margin-top: -40px;"></i><br>
		<p style="margin-top: -10px;">Ramanujan College</p>
		</span>
	</div>
</section>




<div class="sloped_div1">
</div>

<section id="about">

		
	<div class="about">
		<h1>About Us</h1>

		<div class="about_left_div">
			<div class="desktop_landing"><br><br>
			<i class="fa fa-laptop" aria-hidden="true" style="font-size: 350px; color: #000; z-index: 10; margin-top: -40px;"></i>
			</div>
		</div>

		<div class="about_right_div">
			<p>
				The college has been teaching computer science as an application course in B.A(P) and in B.Com, but a fully fledged department in Computer Science came into existence in 2013 with the introduction of B.Tech Computer Science. The department has been actively engaged in a myriad of curricular and extra-curricular activities throughout the year.
			</p>
		</div>

	</div>
</section>

<!--Faculty-->


<div class="sloped_div2"></div>

<a href='php/details.php?name=$name'></a>

<?php

include 'includes/dbconn.inc.php';

$sql = "SELECT * FROM faculty";
$sqldata = mysqli_query($conn, $sql);

echo "<section id='faculty'>
	<div class='faculty_outer'>
		<h1>Faculty</h1>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
	$img = $row['image'];
	$name = $row['name'];
	$des = $row['designation'];

	echo "<div class='faculty_div'>
			<div class='faculty_img'>
			<a href='php/details.php?name=$name'><img src='profilepics/$img'></a>
			</div>
			<div class='faculty_details'>
			<a href='php/details.php?name=$name'><h2>$name</h2></a>
			<a href='php/details.php?name=$name'><h4>$des</h4></a>
				
			</div>
		</div>";
}

echo "	</div>
</section>";

?>

<section class="robotics">
	
</section>

<section id="contact">
		<div class="contact">
			<h1>Contact us</h1>
		<br>
		<div class="contact_form">
			<form action="php/contact.php" method="post">
				<input type="text" name="user_name" placeholder="Name"><br>
				<input type="email" name="user_email" placeholder="Email"><br>
				<textarea onkeyup="textAreaAdjust(this)" placeholder="Query" name="user_query"></textarea><br>
				<input type="submit" name="submit" value="SUBMIT">
			</form>
			<script type="text/javascript">
				function textAreaAdjust(o) {
  					o.style.height = "10px";
  					o.style.height = (25+o.scrollHeight)+"px";
  				}
			</script>
		</div>
	</div>
</section>

<!--Footer-->
<footer>

	<div class="footer_div">
		<h1>Locate Us</h1>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.025821356672!2d77.25313091508049!3d28.538943582454788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce3d9a24e2a8f%3A0x469bcb8c1b03b6f6!2sRamanujan+College!5e0!3m2!1sen!2sin!4v1523420758273" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>

	<div class="footer_div">
		<h1>Follow Us</h1>
		<a href="https://www.facebook.com/Department-of-Computer-Science-Ramanujan-College-1523013567776842/" target="_blank"><i class="fa fa-facebook" style="font-size:36px;color:white"></i></a>

		<a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram" style="font-size:36px;color:white"></i></a>

	</div>

	<div class="footer_div">
		<h1>Contact Us</h1>
		<a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&to=turingtonreboot@email.com" target="_blank"><i class="fa fa-google-plus" style="font-size:36px;color:white"></i></a>
	</div>

</footer>
<div class="footer_below">
	<p>Copyright &copy; CS Dept. , Ramanujan College | All Rights Reserved.</p>
</div>

</body>
</html>
