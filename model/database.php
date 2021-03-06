<?php
	//a class is an object that can be used throughout code
	class Database{  
		private $connection;  
		//global variables
		private $host;  
		private $username;
		private $password;
		private $database;
		//this variable is public so that we can access it in create-db.php
		public $error;
		
		//allows me to use objects of the Databse class. Defines class. Parameters allow us to use the global variables for this function
		public function __construct($host, $username, $password, $database){  
			//accesses the global variable $host
			$this->host = $host;  
			//these are local variables
			$this->username = $username;  
			//they are deleted when this function is finished.
			$this->password = $password;  
			$this->database = $database;

			//helps connect to Database.php variables by putting them in an object.  this opens the connection.  
			$this->connection = new mysqli($host, $username, $password); 
			//runs if there is no connecton to database.php and hte variables aren't getting read
			if($this->connection->connect_error){ 
				//eschoes that there is an error
				die("Error: "  . $this->connection->connect_error); 
			}
			
			//try to access a database that exist on the mysql server. selecting database, whether server will say whether database exists
			$exists = $this->connection->select_db($database); 
			//checking if it connected to database only runs when the database doesn't exist 
			if(!$exists){
				//php will replace the variable $database with its value "blog_db". creates a query that creates a connection to my server
				$query = $this->connection->query("CREATE DATABASE $database");  
				//checks whether $query was true or not												
				if($query){ 
					//echoes that the database was created
					//echo "<p>successfully created database: " . $database . "</p>"; 
				}

			}
			//runs when database has already been created
			else{

			}
		}

		//used to hold repetitive code.  specifically the connection opener
		public function openConnection(){  
			//accesses the local variables from the construct function
			$this->connection = new mysqli($this->host, $this->username, $this->password, $this->database); 
			//runs if there is no connecton to database.php and hte variables aren't getting read
			if($this->connection->connect_error){ 
				//eschoes that there is an error
				die("Error: "  . $connection->connect_error); 
			}

		}

		//places code in function and names it
		public function closeConnection(){  
			if(isset($this->connection)){
				$this->connection->close();
			}
		}
		//the query function takes a string of text and uses it to query the database at $query
		public function query($string){ 
			//runs the openConnection() function
			$this->openConnection();
			//uses a query database
			$query = $this->connection->query($string);  
			//checks if wrong and sends error
			if(!$query){
				//connects to the publiv variable "error" to find the source of error
				$this->error = $this->connection->error;
			}

			//runs closeConnection() 
			$this->closeConnection();  
			//returns the results of query
			return $query; 
		}

	}