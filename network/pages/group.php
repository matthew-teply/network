<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/group.css">
</head>
<body>

<div class="wrapper">
	<div class="container">
		

		<section class="grp_main">
			<div>
				<?php echo inc_getGroup($_GET['grp'], "img") ?>
			</div>
			<div class="grp_info_head">
				<h1><?php echo inc_getGroup($_GET['grp'], "gid"); ?></h1>
				<h3>
					Ran by 
					<?php
						$id = inc_getGroup($_GET['grp'], "admin_main");
						echo "<a href='index.php?usr=".$id."'>".inc_getInfo($id, "first")." ".inc_getInfo($id, "last")."</a>"; 
					?>
				</h3>
			</div>
			<p><i class="fa fa-users"></i> About us</p>
			<p class="grp_bio">
				<?php 
					$g_bio = inc_getGroup($_GET['grp'], "bio");

					if($g_bio == NULL)
						echo "This group has no bio!";
					else
						echo $g_bio;
				?>
			</p>
			<div class="grp_controls">
				<?php if (inc_getGroup($_GET['grp'], "privacy") == 0): ?>
					
					<?php if (!in_array(inc_getId($_SESSION['netw_uid']), inc_getGroup($_GET['grp'], "members"))): ?>
						<form id="g_join_form">
							<input type="hidden" id="g_join_g_id" value=<?php echo $_GET['grp'] ?>>
							<button type="submit"><i class="fa fa-plus"></i> Join</button>
						</form>
					<?php else: ?>
						<?php if (inc_getId($_SESSION['netw_uid']) != inc_getGroup($_GET['grp'], "admin_main")): ?>	
							<form id="g_leave_form">
								<input type="hidden" id="g_leave_g_id" value=<?php echo $_GET['grp'] ?>>
								<button type="submit" class="bttn-alert"><i class="fa fa-minus"></i> Leave</button>
							</form>
						<?php endif ?>
					<?php endif ?>

					<?php else: ?>
						<button disabled="true"><i class="fa fa-exclamation-triangle"></i> You need an invite to join</button>
				<?php endif ?>
			</div>
			<?php //inc_addMember(5, $_GET['grp']); ?>
		</section>
		<br>
		<section class="g_members_section">
			<div class="wrapper">
				<div class="container">
					<h2>Members</h2>
					<span id="g_members_span">
						<?php inc_showMembers($_GET['grp']); ?>
					</span>
				</div>
			</div>
		</section>

	</div>
</div>

<script src="JS/ajax/groups.ajax.js"></script>

</body>
</html>