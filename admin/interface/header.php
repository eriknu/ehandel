<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="interface/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="interface/js/jquery-1.8.1.min.js"></script>
		<script type="text/javascript" src="interface/js/main.jquery.js"></script>
			<script type="text/javascript">
				window.onload = function()
				{
					CKEDITOR.replace( 'prod-editor' );
				};
			</script>
		<link rel="stylesheet"  href="interface/style/font-awesome.css" />
		<link rel="stylesheet"  href="interface/style/main.css" />
		
	</head>
	<body>
		<div id="toolbar">
			<a href="?action=logout" class="logout"><i class="icon-signout"></i> Logout</a><a href="<?php print getinfo('site_url'); ?>/admin" class="dashboard"><i class="icon-dashboard"></i> Dashboard</a>
		</div>
		<div class="header">
			<div class="main-content">
				<h1 class="title"><a href="<?php print getinfo('site_url'); ?>/admin"><?php print getinfo('site_title'); ?><span class="bold">-Admin</span></a></h1>
				
				<ul class="menu">
					<li><a href="?page=products"><i class="icon icon-shopping-cart"></i>Products</a></li>
					<li><a href="?action=sales"><i class="icon icon-money"></i>Sales</a></li>
					<li><a href="?page=users"><i class="icon-group icon"></i>Users</a></li>
					<li><a href="?page=themes"><i class="icon icon-folder-open"></i>Themes</a></li>
					<li><a href="?page=settings"><i class="icon icon-cogs"></i>Settings</a></li>
					<!--<li><a href="?action=logout"><span class="icon">X</span>Logout</a></li> !-->
				</ul>
			</div>
		</div>