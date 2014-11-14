<?php
	require_once(__DIR__ . "/../model/config.php");//calss config from model
	$connection = new mysqli($host, $username, $password, $database);//holds info to connect to database
	$title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);//saves input from title in a variable and filters the string
	$post = filter_input(INPUT_POST, "post", FILTER_SANITIZE_STRING);//saves input from post in a variableand filters the string

	$query = $connection->query("INSERT INTO post SET title = '$title', posts = '$post'");//creates a querry converts vars to strings

	if ($query) {
		echo "<p>Successfuly inserted post: $title</p>";//shows that query was created
	}
	else{
		echo "<p>$connection->error</p>";//shows that query was nos successfuly created
	}

	$connection->close();//closes the connection