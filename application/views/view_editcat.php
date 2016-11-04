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
		NAME: <input type="text" name="name" value="<?php echo $cat['cat_name'] ?>"/>
		<br/>
		<input type="submit" name="buttonSubmit" value="Save" />
		<input type="hidden" name="cat_id" value="<?php echo $cat['cat_id'] ?>">
	</form>
	<br/>
	<label><?php echo $message; ?></label>
	
</body>
</html>