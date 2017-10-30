<?php

include 'classes/users.class.php';

//Fetches functions from the user class, makes them avalible to both static PHP calls and Ajax calls

function inc_setUser($username, $password, $email) {
	$obj = new User;
	$obj->setUser($username, $password, $email);
}

function inc_getUser($username, $password) {
	$obj = new User;
	$obj->getUser($username, $password);
}

function inc_un_getUser() {

	$obj = new User;
	$obj->un_getUser();
}

function inc_getUid($id) {
	$obj = new User;
	return $obj->getUid($id);
}

function inc_getEm($id) {
	$obj = new User;
	return $obj->getEm($id);
}

function inc_getId($username) {
	$obj = new User;
	return $obj->getId($username);
}

//PHP (_GET)
if(isset($_GET['un_getUser']))
	inc_un_getUser();

//PHP (_subm)
if(isset($_POST['setUser_subm']))
	inc_setUser($_POST['uid'], $_POST['pwd'], $_POST['em']);

if(isset($_POST['getUser_subm']))
	inc_getUser($_POST['uid'], $_POST['pwd']);

//AJAX (_call)