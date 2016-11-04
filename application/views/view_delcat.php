<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
	label{
		color: red;
	}
</style>
</head>
<body>
	<h1>Add Category</h1>
	<form method="post">
		<table border="1">
			<tr>
				<td>ID</td>
				<td><?php echo $cat['cat_id']; ?></td>
			</tr>
			<tr>
				<td>NAME</td>
				<td><?php echo $cat['cat_name']; ?></td>
			</tr>
			<tr>
				<td colspan="2"><label>All products under this category will also delete. Are you sure?</label></td>
			</tr>
			<tr>
				<td><a href="/ci226/categories">&lt;Back</a></td>
				<td><input type="submit" name="buttonSubmit" value="Confirm" /></td>
			</tr>
		</table>
		<input type="hidden" name="cat_id" value="<?php echo $cat['cat_id'] ?>">
	</form>
	<br/>
	
</body>
</html>