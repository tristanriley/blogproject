<?php

	require_once(__DIR__ . "/../model/database.php");

	$connection = new mysqli($host, $username, $password);

	if($connection->connect_error){//checking wether or not there was an error connecting to the database
		die("Error: "  . $connection->connect_error);

	}

	$exists = $connection->select_db($database);//access a data base that exists on server

	if (!$exists) {//checking wether or not it connected with datavase
		$query = $connection->query("CREATE DATABASE $database");
	

		if ($query) {//runs when database exists
			echo "Succesfully created database: " . $database;
		}
	}
	else{//runs when database has already been created

		echo "Database already exists.";
	}

	$query = $connection->query("CREATE TABLE posts ("//creates table to store blog posts
		. "id int(11) NOT NULL AUTO_INCREMENT,"//up to 11 values in intergers, cant be post without id
		. "title varchar(225) NOT NULL,"
		. "post text NOT NULL,"
		. "PRIMARY KEY (id)");//creats query that creats table called post and evey post within table has id.

	$connection->close();