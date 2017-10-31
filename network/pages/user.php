<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/user.css">
</head>
<body>

<section id="user_main">
	<img src="resources/imgs/me.png">
	<ul>
		<li>
			<h1><?php echo inc_getInfo($_GET['usr'], "first")." ".inc_getInfo($_GET['usr'], "last"); ?></h1>
			<p id="user_email">@ <?php echo inc_getInfo($_GET['usr'], "em") ?></p>
		</li>
		<li>
			<b>About me</b>
			<article>
				<p>
				<!--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>-->
				 <?php 
				 if(inc_getInfo($_GET['usr'], "bio") == NULL)
				 	echo "This user has no bio!";
				 else
				 	echo inc_getInfo($_GET['usr'])
				 ?>
				 </p>
			</article>
		</li>
		<?php if ($_SESSION['netw_uid'] != inc_getInfo($_GET['usr'], "uid")): ?>
			<li>
				<?php 
					$id = inc_getId($_SESSION['netw_uid']);
					$f_list_array = inc_getFriends($id, "list");
				?>

				<?php if (!in_array($_GET['usr'], $f_list_array)): ?>
					<form class="f_req_form" id=<?php echo "_".$_GET['usr'] ?>>
						<input type="hidden" id=<?php echo "f_req_id_".$_GET['usr']; ?> value=<?php echo inc_getId($_SESSION['netw_uid']); ?>>
						<input type="hidden" id=<?php echo "f_req_f_id_".$_GET['usr']; ?> value=<?php echo $_GET['usr']; ?>>
						<button type="submit"><i class="fa fa-plus"></i> Add friend</button>
					</form>
				<?php else: ?>
					<button><i class="fa fa-check"></i> You are friends</button>
				<?php endif ?>

				<button><i class="fa fa-pencil"></i> Send Private Message</button>
			</li>
		<?php else: ?>
			<li>This is your account.</li>
		<?php endif ?>
	</ul>
</section>

<section id="user_friends_list">
	<?php inc_showFriends($_GET['usr'], "list"); ?>
</section>

<?php if ($_SESSION['netw_uid'] == inc_getInfo($_GET['usr'], "uid")): ?>
	
	<section id="user_friends_requests">
		<?php inc_showFriends($_GET['usr'], "req"); ?>
	</section>

<?php endif ?>

</body>
</html>