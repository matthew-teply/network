<header>
	<a href="index.php"><h1><i class="fa fa-pie-chart" aria-hidden="true"></i> Social Pie</h1></a>
	<ul>
		<?php if (!isset($_SESSION['netw_uid'])): ?>
			<li>
				<button>Sign in</button>
				<button>Signup</button>
			</li>
		<?php else: $id = inc_getId($_SESSION['netw_uid'])?>
			<li><p><a href=<?php echo "index.php?usr=".$id; ?>><img src=<?php echo inc_getInfo($id, "img"); ?>><span> <?php echo inc_getInfo($id, "first")." ".inc_getInfo($id, "last"); ?></span></a></p></li>
			<li><a href="users.inc.php?un_getUser"><i class="fa fa-sign-out"></i> Signout</a></li>
		<?php endif ?>
	</ul>
</header>