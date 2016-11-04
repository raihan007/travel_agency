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
	<form method="post">
		<table align="center" border="1">
			<tr>
				<td colspan="2"><h1>Delete Product</h1></td>
			</tr>
			<tr>
				<td>ID</td>
				<td><?php echo $product['p_id']; ?></td>
			</tr>
			<tr>
				<td>NAME</td>
				<td><?php echo $product['p_name']; ?></td>
			</tr>
			<tr>
				<td>PRICE</td>
				<td><?php echo $product['price']; ?></td>
			</tr>
			<tr>
				<td>QUANTITY</td>
				<td><?php echo $product['quantity']; ?></td>
			</tr>
			<tr>
				<td>CATEGORY</td>
				<td><?php echo $product['cat_name']; ?></td>
			</tr>
			<tr>
				<td colspan="2"><label> Are you sure?</label></td>
			</tr>
			<tr>
				<td><a href="/atp3/products">Back</a></td>
				<td><input type="submit" name="buttonSubmit" value="Confirm" /></td>
			</tr>
		</table>
		<input type="hidden" name="p_id" value="<?php echo $product['p_id'] ?>">
	</form>
	<br/>
	
</body>
</html>