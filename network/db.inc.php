<?php

//Singleton
//Why? Security.

Class DBConnection {

	private static $instance = null; //Create empty instance

	private $conn; //Initialize conn variable to be used later
	private function __construct() { //When class runs

		$this->conn = mysqli_connect("localhost", "root", "", "network"); //Make conn the DB connection variable
	}

	public static function getDB() {

		if(self::$instance == null) //This will always be true
			self::$instance = new self(); //Instance basically 'copies' the first section

		return self::$instance->conn; //We can now safely return the conn variable from instance
	}
}