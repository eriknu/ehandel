
<?php

if(!empty($_GET['delete'])){
	$id = (int)$_GET['delete'];
	Product::delete($id);
}

$products = Product::getAll();
	
?>
<form method="post" action="?page=edit">
	<input type="submit" name="newpost" class="button" value="New Post" />
</form>
<table class="product-table">
	<thead>
		<tr>
			<th>Title</th>
			<th>Art. Number</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
	
		<?php foreach($products as $product): ?>
			<tr>
				<td><a href="?page=edit&post=<?php print $product['id'] ?>"><?php print $product['title'] ?></a></td>
				<td></td>
				<td><a href="?page=products&delete=<?php print $product['id'] ?>" ><i class="icon-trash icon-large"></i></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>