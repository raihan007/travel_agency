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
	<h1>Edit Category</h1>
	<form method="post">
		NAME: <input type="text" name="name" value="<?php echo $product['p_name'] ?>"/><br/>
		PRICE: <input type="text" name="price" value="<?php echo $product['price'] ?>"/><br/>
		QUANTITY: <input type="text" name="quantity" value="<?php echo $product['quantity'] ?>"/><br/>
		CATEGORY: <select name="cat">
					<?php foreach ($cats as $cat){

						if($cat['cat_name'] === $product['cat_name']){
							echo "<option selected='selected' value='".$cat['cat_id']."'>".$cat['cat_name']."</option>";
						}else{
							echo "<option value='".$cat['cat_id']."'>".$cat['cat_name']."</option>";
						}
						
					} ?>
					</select>
		<br/>
		<input type="submit" name="buttonSubmit" value="Save" />
		<input type="hidden" name="p_id" value="<?php echo $product['p_id'] ?>">
	</form>
	<br/>
	<label><?php echo $message; ?></label>
	
</body>
</html>