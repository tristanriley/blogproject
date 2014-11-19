<?php
	$path = "/blog/";//stores path to project

	$host = "localhost";//stores localhost in var
	$username = "root";//stores username for phpmyadmin
	$password = "root";//stores password for phpmyadmin
	$database = "blog_db";//creates database

	$connection = new Database($host, $username, $password, $database);//holds info to connect to database
?>