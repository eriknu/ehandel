<?php

session_start();


require_once('../config.php');
require_once('../functions/db_connect.php');
require_once('../class/Upload.php');
require_once('../class/User.php');
require_once('../class/Product.php');
require_once('functions/save.php');
require_once('../functions/functions.php');


$action = filter_var($_GET['action'], FILTER_SANITIZE_SPECIAL_CHARS);

if( $action == 'logout')
	User::logout();
	

if(!empty($_POST['login']))
	User::login($_POST['username'], $_POST['password']);


if(!$_SESSION['login'])
	require_once('loginform.php');
else
	require_once('interface/index.php');
	