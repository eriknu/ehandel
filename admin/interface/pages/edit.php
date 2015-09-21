<?php

$id   = (int)$_GET['post'];

if(!empty($_POST['newpost'])){
	
	$id = Product::create();
}


if($_POST['save'] || $_POST['publish'] || $_POST['update'] || $_POST['unpublish']){

	$title   = @$_POST['title'];
	$content = @$_POST['content'];
	$new     = @$_POST['new'];
	$image   = (empty($_FILES['image'])) ? $_POST['imageName'] : $_FILES['image'];
	$price   = @$_POST['price'];
	$stock   = @$_POST['stock'];
	
	
	if(!empty($_POST['save'])){
		Product::save( $id, $title, $content, 0, $image, $stock, $price, $new);
		print '<p class="message"><i class="icon-ok-sign icon-large"></i> Product saved.</p>';
	}
	
	if(!empty($_POST['publish'])){
		Product::save( $id, $title, $content, 1, $image, $stock,  $price, $new);
		print '<p class="message"><i class="icon-ok-sign icon-large"></i> Product published.</p>';
	}
	
	if(!empty($_POST['update'])){
		Product::save( $id, $title, $content, 1, $image, $stock,  $price, $new);
		print '<p class="message"><i class="icon-ok-sign icon-large"></i> Product updated.</p>';
	}
	
	
	if(!empty($_POST['unpublish'])){
		Product::save( $id, $title, $content, 0, $image, $stock,  $price, $new);
	}
	
	
}

if(empty($_GET['new']))
	$post = Product::get($id);

?>

<form action="?page=edit&post=<?php print $id; ?>" method="post" enctype="multipart/form-data"  class="prod-editor">

	<?php if(empty($post)): ?>
		<input type="hidden" value="1" name="new" />
	<?php else: ?>
		<input type="hidden" value="0" name="new" />
	<?php endif; ?>

	<div class="title"><label>Title:</label><input type="text" name="title"  value="<?php print $post['title'] ?>" /></div>
	<div class="editor"><textarea class="ckeditor" id="prod-editor" name="content"><?php print $post['content'] ?></textarea></div>
	
		<div class="price"><label>Price:</label><input type="text" name="price"  value="<?php print $post['price'] ?>" />kr</div>
		<div class="stock"><label>Stock:</label><input type="text" name="stock"  value="<?php print $post['stock'] ?>" /></div>
	<br class="clear" />
	<div class="image-upload">
			<h2>Images</h2>
			<?php if(!$post['featured_image']): ?>
					<input name="image" size="30" type="file" id="upload-field" /> 
			<?php else: ?>
					<input type="hidden" name="imageName" value="<?php print $post['featured_image'] ?>" />
					<img src="../uploads/<?php print $post['featured_image'] ?>" class="featured-image" />
					<button class="button delete-img" data-image="<?php print $post['featured_image'] ?>" data-post="<?php print $post['id'] ?>">Delete</button>
			<?php endif; ?>
	</div>
	
	
	<div class="publish-controls">
	
		<?php if($post['published']): ?>
			<input type="submit" value="Update" class="button" name="update" />
			<input type="submit" value="Unpublish" name="unpublish" class="button" name="unpublish" />
		<?php else: ?>
			<input type="submit" value="Save" class="button" name="save" />
			<input type="submit" value="Save and Publish" name="publish" class="button" name="publish" />
		<?php endif; ?>
	</div>
	
</form>