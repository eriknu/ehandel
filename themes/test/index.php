<h1><a href="<?php print getinfo('site_url');   ?>"><?php print getinfo('site_title'); ?></a></h1>

<div id="products-container">
<?php foreach(Product::getAll() as $product): ?>

	<div class="product">
	    <img src="<?php print $product['image']; ?>" width="200px"/>
	    <h2><?php print $product['title'];?></h2>
		<div class="content">
			<?php print $product['content']; ?>
		</div>
	</div>


<?php endforeach; ?>
</div>