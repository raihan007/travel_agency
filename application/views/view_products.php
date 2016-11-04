<!DOCTYPE html>
<html lang="en">
<head>
	
</head>
<body>
	<table align="center" border="1">
		<tr><td colspan="7"><h1>Products List</h1></td></tr>
		<tr><td colspan="7"><a href="/atp3/products/add">Add New</a></td></tr>
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th>PRICE</th>
			<th>QUANTITY</th>
			<th>CATEGORY</th>
			<th colspan="2">ACTIONS</th>
		</tr>
	<?php
		foreach($products as $product){
	?>
		<tr>
			<td><?php echo $product['p_id']; ?></td>
			<td><?php echo $product['p_name']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td><?php echo $product['quantity']; ?></td>
			<td><?php echo $product['cat_name']; ?></td>
			<td><a href="/atp3/products/edit/<?php echo $product['p_id']; ?>">Edit</a></td>
			<td><a href="/atp3/products/delete/<?php echo $product['p_id']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan="7"><a href="/atp3/Home">Back</a></td>
		</tr>
	</table>
</body>
</html>


