<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
	<?php
		print_r($message);
	?>
	<form method="POST" enctype="multipart/form-data">
		<table align="center" >
			<tr>
				<td>Photo</td>
				<td>
					<input type="file" name="Photo" onchange="readURL(this);"></input>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="Upload" value="Upload"></input></td>
			</tr>
		</table>
	</form>
</body>
</html>