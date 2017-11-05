<?php

require('classes/users.class.php');

//Fetches functions from the user class, makes them avalible to both static PHP calls and Ajax calls

function inc_setUser($username, $first, $last, $password, $email) {
	$obj = new User;
	$obj->setUser($username, $first, $last, $password, $email);
}

function inc_getUser($username, $password) {
	$obj = new User;
	$obj->getUser($username, $password);
}

function inc_un_getUser() {

	$obj = new User;
	$obj->un_getUser();
}

function inc_getInfo($id, $opt) {
	$obj = new User;
	return $obj->getInfo($id, $opt);
}

function inc_getId($username) {
	$obj = new User;
	return $obj->getId($username);
}

function inc_getFriends($id, $opt) {
	$obj = new User;
	return $obj->getFriends($id, $opt);
}

function inc_showFriends($id, $opt) {
	$obj = new User;
	return $obj->showFriends($id, $opt);
}

function inc_sendReq($id, $f_id) {
	$obj = new User;
	return $obj->sendReq($id, $f_id);
}

function inc_declineReq($id, $f_id) {
	$obj = new User;
	return $obj->declineReq($id, $f_id);
} 

function inc_addFriend($id, $f_id) {
	$obj = new User;
	return $obj->addFriend($id, $f_id);
}

function inc_removeFriend($id, $f_id) {
	$obj = new User;
	return $obj->removeFriend($id, $f_id);
}

function inc_editBio($id, $content) {
	$obj = new User;
	return $obj->editBio($id, $content);
}

function inc_setUserImg($id, $image) {
	$obj = new User;
	return $obj->setUserImg($id, $image);
}


	//PHP (_GET)
	if(isset($_GET['un_getUser']))
		inc_un_getUser();

	//PHP (_subm)
	if(isset($_POST['setUser_subm'])) {
		inc_setUser($_POST['uid'], $_POST['first'], $_POST['last'], $_POST['pwd'], $_POST['em']);
	}

	if(isset($_POST['getUser_subm']))
		inc_getUser($_POST['uid'], $_POST['pwd']);

	if(isset($_POST['setUserImg_subm']))
		inc_setUserImg(inc_getId($_SESSION['netw_uid']), $_FILES['user_img']);

	//AJAX (_call)
	if(isset($_POST['sendReq_call']))
		inc_sendReq($_POST['data_id'], $_POST['data_f_id']);

	if(isset($_POST['declineReq_call']))
		inc_declineReq($_POST['data_id'], $_POST['data_f_id']);

	if(isset($_POST['addFriend_call']))
		inc_addFriend($_POST['data_id'], $_POST['data_f_id']);

	if(isset($_POST['editBio_call']))
		inc_editBio($_POST['data_id'], $_POST['data_content']);

	if(isset($_POST['showFriends_call']))
		inc_showFriends($_POST['data_id'], $_POST['data_opt']);

	if(isset($_POST['removeFriend_call']))
		inc_removeFriend($_POST['data_id'], $_POST['data_f_id']);