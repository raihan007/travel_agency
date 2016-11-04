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
		NAME: <input type="text" name="name" value="<?php echo set_value('name'); ?>"/>
		<br/>
		<input type="submit" name="buttonSubmit" value="Save" />
	</form>
	<br/>
	<label><?php echo $message; ?></label>
	
</body>
</html>