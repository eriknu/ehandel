<?php

function getDB(){


    static $db;
    
        $db = new mysqli(db_host, db_user, db_password, db_name);
        
        if ($db) {
             return $db;
        }
        else{
    		mysqli_errno();
        	return mysqli_error();
        	exit;
    	}
    
}