<?php

$name = $_GET['name'];

include '../includes/dbconn.inc.php';

$sql = "SELECT * FROM faculty WHERE name = '$name'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$designation = $row['designation'];
$image = $row['image'];
$Education = $row['Education'];
$Experience = $row['Experience'];
$Interest = $row['Interest'];
$Research = $row['Research'];
$Taught = $row['Taught'];
$Publications = $row['Publications'];
$AcademicPub = $row['AcademicPub'];
$Other = $row['Other'];

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

if (!empty($id)) {
	echo "<h1>Email id :</h1><h2>$id</h2>";
}

if (!empty($designation)) {
	echo "<h1>Designation</h1><h2>$designation</h2>";
}

if (!empty($Education)) {
	echo "<h1>Education</h1><p>$Education</p>";
}

if (!empty($Experience)) {
	echo "<h1>Experience</h1><h2>$Experience</h2>";
}

if (!empty($Interest)) {
	echo "<h1>Interest</h1><p>$Interest</p>";
}

if (!empty($Research)) {
	echo "<h1>Research</h1><p>$Research</p>";
}

if (!empty($Taught)) {
	echo "<h1>Taught</h1><p>$Taught</p>";
}

if (!empty($Publications)) {
	echo "<h1>Publications</h1><p>$Publications</p>";
}

if (!empty($AcademicPub)) {
	echo "<h1>Academic Publications</h1><p>$AcademicPub</p>";
}

if (!empty($Other)) {
	echo "<h1>Other</h1><p>$Other</p>";
}

echo "</body>
</html>";
?>