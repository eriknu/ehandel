<?php

function save_theme($name){
	
	$db = getDB();

	$result = $db->query("UPDATE settings SET option_value='$name' WHERE option_name='active_theme'");
	
	$result->close();
}


function save_title($title){
	
	$db = getDB();

	$result = $db->query("UPDATE settings SET option_value='$title' WHERE option_name='site_title'");
	
	$result->close();
}

function save_url($url){
	
	$db = getDB();

	$result = $db->query("UPDATE settings SET option_value='$url' WHERE option_name='site_url'");
	
	$result->close();
}