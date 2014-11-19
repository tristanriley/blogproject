<?php
class Database {//global variables
	private $connection;
	private $host;
	private $username;
	private $password;
	private $database;

	public function__construct($host, $username, $password, $database){//local variables disapear once function is used
		$this->host;
		$this->username;
		$this->password;
		$this->database;//stores info that gets pased in
	}

	//functions allow us to reuse code instead of rewriting it.
	public function openConnection(){

		$this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);//new connection variable
		if($this->connection->connect_error){//checking wether or not there was an error connecting to the database.
			die("Error: "  . $this->connection->connect_error);

		}

	}

	public function closeConnection(){
		if (isset($this->connection)) {//checks if information is present
			$this->connection->close();//closes he function
		}
	}

	public function query($string){
		$this->openConnection();

		$query = $this->connection->query($string);//excecutes query on database

		$this->closeConnection();//closes conection

		return $query;
	}

}
/*__construct() is the method name for the constructor.
The constructor is called on an object after it has been created, and is a good place to put initialisation code*/

/*classes package the data and all possible operations on that data together. It's a way to view your code in a more intuitive way.
Basically, classes allow you to put your data with the code. In object-oriented programming,
a class is an extensible program-code-template for creating objects,
providing initial values for variables and implementations of behavior.*/