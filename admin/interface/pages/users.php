<?php 

$users = User::getAll();

?>

<table class="user-table">
	<thead>
		<tr>
			<th>Username</th>
			<th>User level</th>
			<th>Edit user</th>
			<th>Delete</th>
		</tr>
	</thead>
<?php foreach($users as $user): ?>


	<tr>
		<td><?php print $user['username'] ?></td>
		<td><?php print $user['userlevel'] ?></td>
		<td><a href="#"><i class="icon-edit icon-large"></i></a></td>
		<td><a href="#" ><i class="icon-trash icon-large"></i></a></td>
	</tr>



<?php endforeach; ?>
</table>