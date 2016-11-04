<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>
	<h1>Category List</h1>
	<a href="/ci226/categories/add">Add New</a>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th colspan="2">ACTIONS</th>
		</tr>
	<?php
		foreach($cats as $cat){
	?>
		<tr>
			<td><?php echo $cat['cat_id']; ?></td>
			<td><?php echo $cat['cat_name']; ?></td>
			<td><a href="/atp3/categories/edit/<?php echo $cat['cat_id']; ?>">Edit</a></td>
			<td><a href="/atp3/categories/delete/<?php echo $cat['cat_id']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>


