<?php


if($_GET['set_theme'])
	save_theme($_GET['set_theme']);

$themes = scandir('../themes');
$themes = array_diff($themes, array('.', '..'));
?>
<h2>Set site theme</h2>
	<ul>
	<?php
	foreach($themes as $theme):?>
			<li><a href="?page=themes&set_theme=<?php print $theme;?>" class="<?php print (getinfo('active_theme') == $theme) ? 'active' : ''; ?>" ><?php print $theme;?></a></li>
		
	<?php endforeach; ?>
	</ul>


<h2>Menues</h2>

