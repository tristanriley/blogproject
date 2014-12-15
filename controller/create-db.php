<?php
	//connects this file to the config file
	require_once(__DIR__ . "/../model/config.php"); 

	$query = $_SESSION["connection"]->query("CREATE TABLE posts ("
 			//creates an id for each blogpost. 
			. "id int(11) NOT NULL AUTO_INCREMENT, "
			//stores title of blogpost. must have a title
			. "title varchar (255) NOT NULL, " 
			//posts cant be empty
			. "post text NOT NULL, " 
			//inputs the date and time post was submitted into database
			. "DateTime datetime NOT NULL ,"
			//sets primary key for table.
			. "PRIMARY KEY (id))"); 

	//runs if the table is working
	if($query){  
   		echo "<p>Succesfully create table: posts</p>";
	}
	//checks if the table already exists 
	else{  
		
	}

	//creating a table to store users' usernames, emails, and passwords in phpMyAdmin.  pretty much the same as previous table
	$query = $_SESSION["connection"]->query("CREATE TABLE users ("
		. "id int(11) NOT NULL AUTO_INCREMENT, "
		. "username varchar(30) NOT NULL, "
		. "email varchar(50) NOT NULL, "
		. "password char(128) NOT NULL, "
		. "salt char(128) NOT NULL, "
		. "PRIMARY KEY (id))");

	//echos that users' database has been created
	if($query){
		echo "<p> Successfully created table: users </p>";
	}


	//if the database not created echoes out error
	else{
		
	}

	?>