<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/post.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/boostrap.css">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=320">
	<meta charset="UTF-8">
</head>
<body id="poster">




<?php
	//connects the config to read-post.php
	require_once(__DIR__ . "/../model/config.php");
	//selects posts from table
	$query = "SELECT * FROM posts ORDER BY id DESC";
	//accesses the post
	$result = $_SESSION["connection"]->query($query);
	//posts the text onto the home page
	if($result){
		//creates a loop that runs while a posts is able for selection
		while($row = mysqli_fetch_array($result)){
			//opens the div box and gives it the class 'posts'
			echo "<div class='posts'>";
			//dsiplays the title of the post
			echo "<h1>" . $row['title'] . "</h1>";
			echo "<h5>Posted at: " . $row['DateTime'] . "</h5>";
			//enters
			echo "<br/>";
			//displays post
			echo "<p>" . $row['post'] . "<p>";
			echo "</br>";
			//closes div 
			echo "</div>";
		}

	}
?>

	</body>
</html>