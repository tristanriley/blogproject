<?php
	require_once(__DIR__ . "/../model/config.php");

	//store email, username, and password into the database
	$email = filter_input(INPUT_POST, "email" , FILTER_SANITIZE_EMAIL);
	$username = filter_input(INPUT_POST, "username" , FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, "password" , FILTER_SANITIZE_STRING);

	//echo $email . " - " . $username . " - " . $password;


	//creates the salt, which adds a bunch of random integers and letters to my password, making it harder to guess
	$salt = "$5$" . "rounds=5000$" . uniqid(mt_rand(), true) . "$";
	//combines the password and the salt to make an encrypted password
	$hashedPassword = crypt($password, $salt);
	//a query that inserts into the users' table
	$query = $_SESSION["connection"]->query("INSERT INTO users SET "
		//sets email
		. "email = '$email', "
		//sets username
		. "username = '$username', "
		//sets password
		. "password = '$hashedPassword', "
		//sets salt
		. "salt = '$salt' ");

	//checks to see if the query is working
	if ($query) {
		echo "Successfully created user: $username";
	}
	//if the query isnt working, says why not
	else{
		echo "<p>" . $_SESSION["connection"]->error . "</p>";
	}

