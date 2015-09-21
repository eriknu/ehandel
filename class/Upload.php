<?php

class Upload {

/*
	-ta bort hårdkodad filendelse
	-kolla max filstorlek

*/

	public function image($file, $width = null, $rename = null)
	{
		$dir = "../uploads/";

		$name = $file["name"];
		$size = ($file["size"]/1024);
		$tmp_file = $file["tmp_name"];
		$file_ext = substr($name, strrpos($name, ".") + 1);  
		
			if($rename)
				$name = $rename;
			if(getimagesize($tmp_file)){

				list($width, $height) = getimagesize($tmp_file);
				
				$imgRatio = ($width / $height);
				$newwidth  = $width;
				$newheight = $height * $imgRatio;
				
				/*if($imgRatio < 1){
					$newwidth  = $width;
					$newheight = $newwidth * $imgRatio;
					
				}else{
					$newwidth  = $width;
					$newheight = $newwidth * $imgRatio;				
					
				}*/
				
				$quality = 100;
					
				// Load
				$new_pic = imagecreatetruecolor($newwidth, $newheight);

				
				if($file_ext == 'jpg' || $file_ext == 'jpeg'){
					$source = imagecreatefromjpeg($tmp_file);
					imagecopyresampled($new_pic, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
					
					imagejpeg($new_pic, $dir.$name, $quality);
					imagedestroy($new_pic);
				}else if($file_ext == 'png'){
					imagesavealpha($new_pic, true); 
					$color = imagecolorallocatealpha($new_pic,0x00,0x00,0x00,127); 
					imagefill($img, 0, 0, $color); 

					$source = imagecreatefrompng($tmp_file);
					imagecopyresampled($new_pic, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
				
					imagepng($new_pic, $dir.$name, $quality);
					imagedestroy($new_pic);
				}else if($file_ext == 'gif'){
					
					$source = imagecreatefromgif($tmp_file);
					imagecopyresampled($new_pic, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
				
					imagegif($new_pic, $dir.$name, $quality);
					imagedestroy($new_pic);			
					
				}
				
				return $name;
				
			}
			else
				return false;	
	}
}