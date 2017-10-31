<?php

include 'classes/users.class.php';

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

function inc_addFriend($id, $f_id) {
	$obj = new User;
	return $obj->addFriend($id, $f_id);
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

//AJAX (_call)
if(isset($_POST['sendReq_call']))
	inc_sendReq($_POST['data_id'], $_POST['data_f_id']);

if(isset($_POST['addFriend_call']))
	inc_addFriend($_POST['data_id'], $_POST['data_f_id']);