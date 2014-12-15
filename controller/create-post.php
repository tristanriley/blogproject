<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/post.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../css/boostrap.css">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=320">
	<meta charset="UTF-8">
</head>
<body id="viewbody">




<?php
	//gives access to variables listed in $connection
	require_once(__DIR__ . "/../model/config.php"); 
	require_once(__DIR__ . "/../controller/login-verify.php");
	//runs if the user hasn't logged in correctly
	if (!authenticateUser()) {
		//sends user back to the home page
		header("Location: " . $path . "home.php");
		//stops the page from loading
		die();
	}
	

	//stores title and makes it harder to access
	$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);  
	//stores post and makes it harder to access
	$post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);	
	//stores the current date
	$date = new DateTime( 'today');
	//saves the current time of LA timezone
	$time = new DateTime( 'America/Los_Angeles');
	//saves title and post into database
	$query = $_SESSION["connection"]->query("INSERT INTO posts SET title = '$title', post = '$post' "); 
	
	//runs if the query was saved
	if ($query) {	

		echo "<div id='viewpost'>";
		//echoes out that the title that was used
		echo "<h1>$title</h1>";

		
		//echoes out the date and time of when the post was submitted
		echo "Posted on: " . $date->format('M/D' . ' ' . 'd/Y') . " at " . $time->format('g:i');

		echo "<p>$post</p>";

		echo "<button type='submit' class='btn btn-primary btn-lg' class='headingbutton' data-toggle='modal' data-target='#myModal'>";
		echo "<a href='/blog/home.php'>Home</a>";
		echo "</button>";

		echo "</div>";

	}
	
	//runs if the query was not saved
	else{  
		echo "<p>" . $_SESSION["connection"]->error . "</p>";
	}

?>


</body>
</html>
