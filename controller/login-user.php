<!DOCTYPE html>
<html>
<head>
			<link rel="stylesheet" type="text/css" href="../css/post.css"> 
			<link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
			<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<title>Login Successful</title>
</head>
<body id="log">



<div class="log2">
<h1>Thank you for logging into Deliciously Tristan</h1>	
<p><br></p>	
</div>

<div class="wrapper">
  <a href="http://localhost/blog/home.php" class="btn btn-success">Home</a>
</div>


<?php 
	//gives access to database
	require_once(__DIR__ . "/../model/config.php");
	//saves username and filters input
	$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
	//saves username and filters 
	$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
	//selects user from database
	$query = $_SESSION["connection"]->query("SELECT salt, password FROM users WHERE username = '$username' ");

	if ($query->num_rows == 1) {
		$row = $query->fetch_array();

		if ($row["password"] === crypt($password, $row["salt"]) ){
			//only allows users to log in
			$_SESSION["authenticated"] = true;
			echo "<p> </p>";				
		}

		else{
			echo "<p>Invalid username and password</p>";
		}
	}

	else {
		echo "<p>Invalid username and password</p>";
	}
?>



</body>
</html>