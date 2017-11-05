<?php

session_start();
error_reporting(0);
require('classes/groups.class.php');

function inc_getGroup($g_id, $opt) {
	$obj = new Group;
	return $obj->getGroup($g_id, $opt);
}

function inc_setGroup($g_name, $g_bio, $g_image, $g_privacy, $g_admin) {
	$obj = new Group;
	echo $obj->setGroup($g_name, $g_bio, $g_image, $g_privacy, $g_admin);
}

function inc_showMembers($g_id) {
	$obj = new Group;
	echo $obj->showMembers($g_id);
}

function inc_addMember($id, $g_id) {
	$obj = new Group;
	$obj->addMember($id, $g_id);
}

function inc_removeMember($id, $g_id) {
	$obj = new Group;
	echo $obj->removeMember($id, $g_id);
}

function inc_showUserGroups($id) {
	$obj = new Group;
	echo $obj->showUserGroups($id);
}

function inc_checkMainAdmin($id) {
	$obj = new Group;
	return $obj->checkMainAdmin($id);
}

//PHP (_subm)
if(isset($_POST['setGroup_subm']))
	inc_setGroup($_POST['gid'], $_POST['bio'], $_FILES['img'], $_POST['privacy'], $_POST['admin']);

//AJAX (_call)
if(isset($_POST['addMember_call']))
	inc_addMember($_POST['data_id'], $_POST['data_g_id']);

if(isset($_POST['removeMember_call']))
	inc_removeMember($_POST['data_id'], $_POST['data_g_id']);

if(isset($_POST['showMembers_call']))
	inc_showMembers($_POST['data_g_id']);