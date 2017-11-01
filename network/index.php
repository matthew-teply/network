<?php 

	//All prerequisities
	session_start();
	error_reporting(1);

	//includes
	include 'users.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Network
	</title>

	<link rel="stylesheet" type="text/css" href="CSS/root.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/css/font-awesome.min.css">
</head>
<body>

<input type="hidden" id="user_id" value=<?php echo inc_getId($_SESSION['netw_uid']); ?>>

<?php 

	include 'pages/header.php';

	if(isset($_GET['usr']))
		include 'pages/user.php'; //IF ?usr is set, show user page, with user's [*] ID in ?usr
	else {

		if(!isset($_SESSION['netw_uid'])) //IF you are not logged in, show welcome page
			include 'pages/welcome.php';
		else
			include 'pages/feed.php'; //IF you are logged in, show feed page
	}
?>

<script src="external/jquery.min.js"></script>
<script src="JS/ajax/users.ajax.js"></script>
<script src="JS/ajax/acc_edit.ajax.js"></script>
<script src="JS/user_edit.js"></script>

</body>
</html>