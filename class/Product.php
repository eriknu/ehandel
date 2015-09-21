<?php

class Product {

    public function create() {
        $db = getDB();
	
    	$db->query("INSERT INTO posts (published, type, title) VALUES (0, 'product', 'New product')");
    	return $db->insert_id;
    }

    public function get($id){
    
    	$prodArray = array();
    	$db        = getDB();
    
    	$result = $db->query("SELECT title, content, published, id, featured_image, stock, price FROM posts WHERE type='product' AND id='$id'");
    
    	if($result){
    		while($row = $result->fetch_array()){
    			
    			$prodArray[] = $row;	
    		}
    		
    		return $prodArray[0];
    		
    		$result->close();
    	}
    }

    public function getAll(){
    	
    	$prodArray = array();
    	$db        = getDB();
    
    
    	$result = $db->query("SELECT title, id, content, featured_image, price FROM posts WHERE type='product' ORDER BY id DESC");
    
    	if($result){
    		while($row = $result->fetch_array()){
    			
    			//Modify content for easier use
    			$row['image'] = getinfo('site_url').'/uploads/'.$row['featured_image'];
    			
    			$prodArray[] = $row;
    			
    		}
    		
    		return $prodArray;
    		
    		$result->close();
    	}
    }
    
    public function delete($id){
    	$db = getDB();	
        $db->query("DELETE FROM posts WHERE id='$id' AND type='product'");
    }
    
    public function save($id, $title, $content, $publish, $image, $stock, $price, $new){
	
    	if(is_array($image)){
    		$imageName = Upload::image($image);
    	}else{
    		$imageName = $image;
    	}
    	
    	$db = getDB();
    	if($new){
    		$result = $db->query("INSERT INTO posts (title, content, published, type, featured_image, price ,stock) VALUES ($title, $content, $publish, 'product', $imageName, $price, ' $stock')");
    		
    	}
    	else{
    		$result = $db->query("UPDATE posts SET title='$title', content='$content', published='$publish', featured_image='$imageName', price='$price', stock='$stock' WHERE id='$id'");
    			
    	}
    }
    
}