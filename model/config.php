<?php

	require_once(__DIR__ . "/Database.php");
	//starts session
	session_start();
	//prevents hackers from messing with website
	session_regenerate_id(true);


	//saves path to folder
	$path = "/blog/"; 
	//a variable that stores "localhost"
	$host = "localhost"; 
	//a variable that stores "root" 			
	$username = "root"; 
	//a variable that stores "root"
	$password = "root"; 
	//a variable that stores "blog_db"
	$database = "blog_db";

	//checks if the session variable exists and creates the connection if not already created
	if(!isset($_SESSION["connection"])){

		$connection = new Database($host, $username, $password, $database);
		//session variable.  saves database object so that it only gets created once
		$_SESSION["connection"] = $connection;
	}