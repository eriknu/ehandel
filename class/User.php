<?php

class User {
    
    public function getAll(){
	
    	$userArray = array();
    	$db		   = getDB();
    
    	$result = $db->query("SELECT username, userlevel FROM users");
    
    	while($row = $result->fetch_array()){
    		$userArray[] = $row;	
    	}
    		
    	return $userArray;
    	$result->close();
    }
    
    public function get($id){
	
    	$userArray = array();
    	$db		   = getDB();
    
    	$result = $db->query("SELECT username, userlevel FROM users WHERE id='$id'");
    
    	while($row = $result->fetch_array()){
    		$userArray[] = $row;	
    	}
    		
    	return $userArray[0];
    	$result->close();
    }
          
    private function password_crypt($password){
    	
    	return md5(sha1($password.salt).salt);
    }


    public function login($username, $password){
    	
    	$db = getDB();
    	
    	$password = self::password_crypt($password);
    	$username = $db->real_escape_string($username);
    
    	$result = $db->query("SELECT username FROM users WHERE username='$username' AND password='$password'");
    	
    	if($result->num_rows){
    		$_SESSION['login'] = 1;
    		return $result->num_rows;
    	}else{
    		return 0;
    	}
    	
    	$result->close();
    }
    
    public function logout(){
    	unset($_SESSION['login']);
    	//header('Location: /admin');
    }

        
}
