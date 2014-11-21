<?php

	require_once(__DIR__ . "/../model/config.php");//calls config from model


	$query = $_SESSION["connection"]->query("CREATE TABLE posts ("//creates table to store blog posts
		. "id int(11) NOT NULL AUTO_INCREMENT,"//up to 11 values in intergers, cant be post without id
		. "title varchar(225) NOT NULL,"
		. "post text NOT NULL,"
		. "PRIMARY KEY (id))");//creats query that creats table called post and evey post within table has id.

	//check if table was successfully created
	if ($query) {
		echo "<p>Succesfully created table: post</p>";
	}
	else{
		echo "<p>" . $_SESSION["connection"]->error . "</p>";
	}

