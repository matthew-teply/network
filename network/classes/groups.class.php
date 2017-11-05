<?php

include_once 'db.inc.php';
session_start();

class Group extends DBConnection {

	private $conn;

	function __construct() {

		$this->conn = DBConnection::getDB();
	}

	//UTILITY

	//getInfo - for users (NEED TO FIND A BETTER SOLUTION)
	public function getInfo($id, $opt) {

		$stmnt = $this->conn->prepare("SELECT * FROM users WHERE id=?");
		$stmnt->bind_param("i", $id);

		$stmnt->execute();
		$results = $stmnt->get_result();

		$row = $results->fetch_assoc();

		if($opt == "pwd")
			exit("You cannot request password!");

		if($opt == "img") {
			if($row['img'] != NULL)
				return $row['img'];
			else
				return "resources/imgs/user_def.png";
		}

		if($opt == "g_list")
			return explode(",", $row[$opt]);

		return $row[$opt];
	}

	public function getGroup($g_id, $opt) {

		$stmnt = $this->conn->prepare("SELECT * FROM groups WHERE id=?");
		$stmnt->bind_param("i", $g_id);

		$stmnt->execute();
		$results = $stmnt->get_result();

		$row = $results->fetch_assoc();

		if($opt == "members")
			return explode(",", $row[$opt]);

		if($opt == "admins")
			return explode(",", $row[$opt]);

		if($opt == "img") {
			if($row['img'] == NULL)
				return "<i class='fa fa-users'></i> ";
			else
				return "<img src='".$row['img']."'>";
		}

		if($opt == "admin_main")
			return $row['admins'][0];

		return $row[$opt];
	}

	public function checkMainAdmin($id) {

		$stmnt = $this->conn->prepare("SELECT * FROM groups");
		$stmnt->execute();

		$results = $stmnt->get_result();

		while($row = $results->fetch_assoc()) {
			if($row['admins'][0] == $id)
				return true;
		}
	}

	//GROUPS

	//Show members
	public function showMembers($g_id) {

		$g_members_array = $this->getGroup($g_id, "members");

		foreach ($g_members_array as $id) {

			echo "<a href='index.php?usr=".$id."'><div class='g_member'><img src='".$this->getInfo($id, "img")."'><br>".$this->getInfo($id, "first")." ".$this->getInfo($id, "last")."</div></a>";
		}
	}

	//Add member
	public function addMember($id, $g_id) {

		//Add USER to GROUP's member array
		$g_members_array = $this->getGroup($g_id, "members");

		if(in_array($id, $g_members_array))
			exit("g_err_already_in");

		array_push($g_members_array, $id);

		if(empty($g_members_array[0]))
			$g_members_string = $id;
		else
			$g_members_string = implode(",", $g_members_array);

		$stmnt = $this->conn->prepare("UPDATE groups SET members=? WHERE id=?");
		$stmnt->bind_param("si", $g_members_string, $g_id);

		$stmnt->execute();

		//Add group to USER's group array
		$u_groups_array = $this->getInfo($id, "g_list");

		array_push($u_groups_array, $g_id);

		if(empty($u_groups_array[0]))
			$u_groups_string = $u_groups_array[1];
		else
			$u_groups_string = implode(",", $u_groups_array);
		
		$stmnt = $this->conn->prepare("UPDATE users SET g_list=? WHERE id=?");
		$stmnt->bind_param("si", $u_groups_string, $id);

		$stmnt->execute();
	}

	//Remove member
	public function removeMember($id, $g_id) {

		//Remove USER from GROUPS's member array
		$g_members_array = $this->getGroup($g_id, "members");

		if(!in_array($id, $g_members_array))
			exit("g_err_already_out");

		$id_key = array_search($id, $g_members_array);

		unset($g_members_array[$id_key]);

		$g_members_string = implode(",", $g_members_array);

		$stmnt = $this->conn->prepare("UPDATE groups SET members=? WHERE id=?");
		$stmnt->bind_param("si", $g_members_string, $g_id);

		$stmnt->execute();

		//Remove GROUP from USER's member array
		$u_groups_array = $this->getInfo($id, "g_list");

		$g_id_key = array_search($g_id, $u_groups_array);

		unset($u_groups_array[$g_id_key]);

		if(sizeof($u_groups_array) == 0)
			$u_groups_string = NULL;
		else
			$u_groups_string = implode(",", $u_groups_array);

		$stmnt = $this->conn->prepare("UPDATE users SET g_list=? WHERE id=?");
		$stmnt->bind_param("si", $u_groups_string, $id);

		$stmnt->execute();
	}

	//Create a new group
	public function setGroup($g_name, $g_bio, $g_image, $g_privacy, $g_admin) {

		if(empty($g_name))
			exit("Empty name!");

		//Variables
		$g_name_limit = 28; //g_name character limit

		//Check if ADMIN doesn't already have a group
		$stmnt = $this->conn->prepare("SELECT * FROM groups");

		$stmnt->execute();
		$results = $stmnt->get_result();

		while($row = $results->fetch_assoc()) {
			if($g_admin == $row['admins'][0])
				exit("You've already created a group!");
		}

		if(sizeof($g_name) >= $g_name_limit)
			exit("Group name is too long! (Limit : 28 characters)");

		if(!empty($g_image)) {

			//UPLOAD IMAGE
			$file_name = $g_image['name'];
			$file_tmpName = $g_image['tmp_name'];
			$file_size = $g_image['size'];
			$file_error = $g_image['error'];

			$file_ext = explode(".", $file_name);
			$file_actualExt = strtolower(end($file_ext));

			$file_allowedExt = array("png", "jpg", "gif");
			$file_validSize = 52428800;

			if(!in_array($file_actualExt, $file_allowedExt))
				exit("Invalid extensions!\nAllowed : .jpg, .png, .gif (Your extension : ".$file_actualExt.")");
			if($file_size > $file_validSize)
				exit("Your file is too big! (Max allowed : 50MB)");

			if ($file_error === 0) {

				$file_newName = $g_name . "." . $file_actualExt;
				$file_destination = 'uploads/img_grp/'.$file_newName;

				move_uploaded_file($file_tmpName, $file_destination);
			}
			else
				exit("There was an error uploading your image!");

			$g_image = $file_destination;
		}

		//Create a GROUP
		$stmnt = $this->conn->prepare("INSERT INTO groups (gid, bio, img, admins, privacy) VALUES (?, ?, ?, ?, ?)");
		$stmnt->bind_param("ssssi", $g_name, $g_bio, $g_image, $g_admin, $g_privacy);

		$stmnt->execute();

		//Get GROUPS's id
		$stmnt = $this->conn->prepare("SELECT * FROM groups WHERE gid=?");
		$stmnt->bind_param("s", $g_name);

		$stmnt->execute();
		$results = $stmnt->get_result();

		$row = $results->fetch_assoc();

		$this->addMember($g_admin, $row['id']);

		header("Location: index.php?grp=".$row['id']."");
	}

	//Show user's joined groups
	public function showUserGroups($id) {

		$u_groups_array = $this->getInfo($id, "g_list");

		$uid = $this->getInfo($id, "uid");
		$first = $this->getInfo($id, "first");

		if(empty($u_groups_array[0]) && $uid == $_SESSION['netw_uid'])
			return "<p style='margin: 5px; text-align: center;'>You are not in any groups</p>";
		if(empty($u_groups_array[0]) && $uid != $_SESSION['netw_uid'])
			return "<p style='margin: 5px; text-align: center;'>".$first." is not in any groups</p>";

		foreach ($u_groups_array as $g_id) {

			echo "<a href='index.php?grp=".$g_id."'>".$this->getGroup($g_id, "img").$this->getGroup($g_id, "gid")."</a><br>";
		}
	}
}