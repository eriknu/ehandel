<?php


function getinfo($option){
	
	$db = getDB();

	$result = $db->query("SELECT option_value FROM settings WHERE option_name='$option'") or die(mysqli_error());
	 
	 while ($row = $result->fetch_row()) {
		 return $row[0]; 
	 }
	
	 $result->close();
}