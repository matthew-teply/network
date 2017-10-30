<?php

session_start();
include 'db.inc.php';

class User {

	private $conn;

	function __construct() {

		$this->conn = DBConnection::getDB();
	}

	//getUid, getEm, getId

	public function getUid($id) {

		$stmnt = $this->conn->prepare("SELECT * FROM users WHERE id=?");
		$stmnt->bind_param("i", $id);

		$stmnt->execute();
		$results = $stmnt->get_result();

		$row = $results->fetch_assoc();

		return $row['uid'];
	}

	public function getEm($id) {

		$stmnt = $this->conn->prepare("SELECT * FROM users WHERE id=?");
		$stmnt->bind_param("i", $id);

		$stmnt->execute();
		$results = $stmnt->get_result();

		$row = $results->fetch_assoc();

		return $row['em'];
	}

	public function getId($username) {

		$stmnt = $this->conn->prepare("SELECT * FROM users WHERE uid=?");
		$stmnt->bind_param("s", $username);

		$stmnt->execute();
		$results = $stmnt->get_result();

		$row = $results->fetch_assoc();

		return $row['id'];
	}

	//Sign in, Sign up

 	public function setUser($username, $password, $email) { //Sign up

		$hash_password = password_hash($password, PASSWORD_DEFAULT);

		$stmnt = $this->conn->prepare("SELECT * FROM users WHERE uid=? OR em=?");
		$stmnt->bind_param("ss", $username, $email);

		$stmnt->execute();

		$results = $stmnt->get_result();

		$numRows = $results->num_rows;

		if ($numRows != 0) {

			exit("This username or email is already taken!");
			return false;
		}

		else {

			$stmnt = $this->conn->prepare("INSERT INTO users (uid, pwd, em) VALUES (?, ?, ?)");
			$stmnt->bind_param("sss", $username, $hash_password, $email);

			$stmnt->execute();

			exit("Signed up successfuly!");
			return true;
		}
	}

	function getUser($username, $password) { //Log in

		$stmnt = $this->conn->prepare("SELECT * FROM users WHERE uid=?");
		$stmnt->bind_param("s", $st_uid);

		$st_uid = $username;

		$stmnt->execute();
		
		$results = $stmnt->get_result();

		$row = $results->fetch_assoc();
		if(password_verify($password, $row['pwd']) === false) {

			exit("Wrong username or password!");
		}
		else {
			$_SESSION['netw_uid'] = $row['uid'];
			header("Location: index.php?usr=".$row['id']."");
			return true;
		}
	}

	function un_getUser() {

		session_unset();
		session_destroy();
		header("Location: index.php?loggedout");
	}
}