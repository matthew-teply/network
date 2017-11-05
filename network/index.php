<?php 

	//All prerequisities
	session_start();
	error_reporting(1);

	//includes
	include 'users.inc.php';
	include 'groups.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Social Pie
	</title>

	<link rel="stylesheet" type="text/css" href="CSS/root.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="CSS/css/font-awesome.min.css">

	<script src="external/jquery.min.js"></script>

</head>
<body>

<?php if (isset($_SESSION['netw_uid'])): ?>
	<input type="hidden" id="user_id" value=<?php echo inc_getId($_SESSION['netw_uid']); ?>>
<?php endif ?>

<?php 

	include 'pages/header.php';

	if(isset($_GET['usr']))
		include 'pages/user.php'; //IF ?usr is set, show user page, with user's [*] ID in ?usr
	elseif(isset($_GET['grp']))
		include 'pages/group.php'; //IF $grp is set, show group page, with groups [*] ID in ?usr
	else {

		if(!isset($_SESSION['netw_uid'])) //IF you are not logged in, show welcome page
			include 'pages/welcome.php';
		else
			include 'pages/feed.php'; //IF you are logged in, show feed page
	}
?>

</body>
</html>