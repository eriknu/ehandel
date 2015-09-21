<?php

require_once('ini.php');

$page = $_GET["page"];
$subpage = $_GET["subpage"];

if(file_exists('themes/'.getinfo('active_theme').'/index.php'))
	require_once('themes/'.getinfo('active_theme').'/index.php');
else
	print "<h1>Index file missing.</h1>";