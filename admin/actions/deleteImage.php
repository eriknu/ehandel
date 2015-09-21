<?php
header('Content-Type: application/json');
session_start();


require_once('../../config.php');
require_once('../../functions/db_connect.php');


$post  = @$_POST['postID'];
$image = @$_POST['image'];


if($_SESSION['login']){
	if($image){
		
		unlink('../../uploads/'.$image);
		
		if($post){
			$db = getDB();
			$db->query("UPDATE posts SET featured_image='' WHERE id='$post' ");
		}
			
			
		print json_encode(array('success'=> true));
	}else{
		print json_encode(array('success'=> false));
	}
}else{
	print json_encode(array('success'=> false));
}