<?php

$email = $_GET['email'];

include '../includes/dbconn.inc.php';

$sql = "SELECT * FROM alumni WHERE email = '$email'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$designation = $row['designation'];
$image = $row['image'];
$src = "../profilepics/".$image;

echo "<!DOCTYPE html>
<html>
<head>
	<title>$name</title>
	<link rel='stylesheet' type='text/css' href='../css/details.css'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700i|Work+Sans:300,400,500,600,700' rel='stylesheet'>
</head>
<body>";

if (!empty($name)) {
	echo "<h1>$name</h1>";
}

if (!empty($image)) {
	echo "<div class='image'><img src='$src'></div>";
}

if (!empty($designation)) {
	echo "<h1>Designation</h1><h2>$designation</h2>";
}

echo "</body>
</html>";
?>