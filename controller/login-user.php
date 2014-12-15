<?php 
	//gives access to database
	require_once(__DIR__ . "/../model/config.php");
	//stores username and filters input
	$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
	//stores username and filters input
	$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
	//selects proper user from database
	$query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username' ");

	if ($query->num_rows == 1) {
		$row = $query->fetch_array();

		if ($row["password"] === crypt($password, $row["salt"]) ){
			//only allows users to log in
			$_SESSION["authenticated"] = true;
			echo "<p> Login was Successful</p>";				
		}

		else{
			echo "<p>Invalid username and password</p>";
		}
	}

	else {
		echo "<p>Invalid username and password</p>";
	}
