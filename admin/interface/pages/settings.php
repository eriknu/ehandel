<?php

if(!empty($_POST['update-settings'])){
	
	
	$site_title = @$_POST['site-title'];
	$site_url = @$_POST['site-url'];
	
	if(!empty($site_title)){
		save_title($site_title);	
	}
	
	if(!empty($site_url)){
		save_url($site_url);
	}
	
}

?>

<div class="settings-form">
	<form method="post">
		<div><label>Site Title:</label><input type="text" value="<?php print getinfo('site_title');?>" name="site-title"  /></div>
		<div><label>Site URL:</label><input type="text" value="<?php print getinfo('site_url');?>" name="site-url"  /></div>
		
		<button type="submit" class="button" name="update-settings">
	    	<i class="icon-refresh icon-large"></i> Update
	    </button>
	</form>
</div>