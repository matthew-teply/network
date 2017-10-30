<header>
	<a href="index.php"><h1><i class="fa fa-pie-chart" aria-hidden="true"></i> Social Pie</h1></a>
	<ul>
		<?php if (!isset($_SESSION['netw_uid'])): ?>
			<li>
				<button>Sign in</button>
				<button>Signup</button>
			</li>
		<?php else: ?>
			<li><p><a href=<?php echo "index.php?usr=".inc_getId($_SESSION['netw_uid']); ?>><i class="fa fa-user-o"></i> <?php echo $_SESSION['netw_uid']; ?></a></p></li>
			<li><a href="users.inc.php?un_getUser"><i class="fa fa-sign-out"></i> Signout</a></li>
		<?php endif ?>
	</ul>
</header>