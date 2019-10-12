<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PeiPei Blog</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('small-business.css'); ?>
	<?php echo Asset::css('peipei.css'); ?>
	<style>
		body { margin: 0px; }
	</style>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation"><!-- メニューバーっぽい -->
		<div class="container">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<h2 class="bar__title">PeiPeiBlog</h2>
				<ul class="navpei nav navbar-nav">
					<li><a class="navpei__item" href="/sunday/request">Top</a></li>
					<li><a class="navpei__item" href="/sunday/request/create">Write</a></li>
					<!-- <li>
						<?php
						// echo Html::anchor('/sunday/user/profile'.$login_id, '<i class="icon-eye-open"></i> 詳細', array('class' => 'btn btn-default btn-sm'));
						?>
					</li> -->
					<li><a class="navpei__item" href="/sunday/user/profile">Profile</a></li>
					<li><a class="navpei__item" href="/sunday/user/login">Login</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="col-md-12">
			<h1 class="title"><?php echo $title; ?></h1>
			<hr>
		</div>
		<div class="col-md-12">
			<?php echo $content; ?>
		</div>
	</div>
		<hr>
		<footer>
			©kanpeipei
		</footer>
</body>
</html>
