<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<form method="POST" action="" name="login">
		<table align="center">
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><h2>Login Here</h2></td>
			</tr>
			<?php  if( $notif = $this->session->flashdata('success')): ?>
			<tr>
				<td style="color: blue;" colspan="2"><strong><?= $notif ?></strong></td>
			</tr>
			<?php endif; ?>
			<?php  if( $notif = $this->session->flashdata('error')): ?>
			<tr>
				<td style="color: red;" colspan="2"><strong><?= $notif ?></strong></td>
			</tr>
			<?php endif; ?>
			<tr>
				<td>Username</td>
				<td><input type="text" name="Username" value="<?= set_value('Username') ?>"></input></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" name="Password" value="<?= set_value('Password') ?>"></input></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="signin" value="Sign-In"></input></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="Login/SignUp">Create New Account Here!</a></td>
			</tr>
		</table>
	</form>
</body>
</html>