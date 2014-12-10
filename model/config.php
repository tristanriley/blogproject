<?php
	require_once(__DIR__ . "/Database.php");
	session_start();

	$path = "/blog/";//stores path to project

	$host = "localhost";//stores localhost in var
	$username = "root";//stores username for phpmyadmin
	$password = "root";//stores password for phpmyadmin
	$database = "blog_db";//creates database

	if(!isset($_SESSION["connection"])) {
		//chack if var is called session and if it exists connection ceases to exist connection is local var
	
		$connection = new Database($host, $username, $password, $database);//holds info to connect to database
		$_SESSION["connection"] = $connection;
	}	
?>