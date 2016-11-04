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
	<h1>Add Product</h1>
	<form method="post">
		NAME: <input type="text" name="name"/>
		<br/>
		PRICE: <input type="text" name="price" />
		<br/>
		QUANTITY: <input type="text" name="quantity" />
		<br/>
		CATEGORY: <select name="cat">
					<?php foreach ($cats as $cat){ ?>
						<option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['cat_name']; ?></option>
					<?php } ?>
					</select>
		<br/>
		<input type="submit" name="buttonSubmit" value="Save" />
	</form>
	<br/>
	<label><?php echo $message; ?></label>
	
</body>
</html>