<?php


require_once('header.php');?>

<div class="container">
<?php 
	
	$page = $_GET['page'];
	
	if(file_exists('interface/pages/'.$page.'.php'))
		include('pages/'.$page.'.php');
	
?>
</div>


<?php require_once('footer.php'); ?>