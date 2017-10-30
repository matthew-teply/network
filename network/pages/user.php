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
			<h1><?php echo inc_getUid($_GET['usr']); ?></h1>
			<p id="user_email">@ <?php echo inc_getEm($_GET['usr']) ?></p>
		</li>
		<li>
			<b>About me</b>
			<article>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium.</p>
			</article>
		</li>
		<?php if ($_SESSION['netw_uid'] != inc_getUid($_GET['usr'])): ?>
			<li>
				<button><i class="fa fa-plus"></i> Add friend</button>
				<button><i class="fa fa-pencil"></i> Send Private Message</button>
			</li>
		<?php else: ?>
			<li>This is your account.</li>
		<?php endif ?>
	</ul>
</section>

<section id="user_friends">
	hi
</section>

</body>
</html>