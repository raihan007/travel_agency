<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
	<form method="POST" action="" name="SignUpForm" enctype="multipart/form-data">
		<table align="center" >
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><h2>Create New Account</h2></td>
			</tr>
			<tr>
				<td>Entity No.</td>
				<td><input type="text" name="EntityNo" value="<?= $NextEntityNo ?>" readonly></input></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="FirstName" value="<?= set_value('FirstName') ?>"></input></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="LastName" value="<?= set_value('LastName') ?>"></input></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<input type="radio" name="Gender" value="Male"/>Male

					<input type="radio" name="Gender" value="Female"/>Female

				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="Email" value="<?= set_value('Email') ?>"></input></td>
			</tr>
			<tr>
				<td>Photo</td>
				<td><input type="file" name="Photo"></input></td>
			</tr>
			<tr>
				<td>Permanent Address</td>
				<td><textarea rows="4" cols="21" name="PermanentAddress" ></textarea></td>
			</tr>
			<tr>
				<td>Present Address</td>
				<td><textarea rows="4" cols="21" name="PresentAddress" ></textarea></td>
			</tr>
			<tr>
				<td>Phone No.</td>
				<td><input type="text" name="PhoneNo" value="<?= set_value('PhoneNo') ?>"></input></td>
			</tr>
			<tr>
				<td>Birthdate</td>
				<td><input type="text" name="Birthdate" value="<?= set_value('Birthdate') ?>"></input></td>
			</tr>
			<tr>
				<td>BloodGroup</td>
				<td>
					<select name="BloodGroup">
						<?php foreach ($BloodGroupList as $key => $value):?>
								<option value="<?= $key?>"><?= $value?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>National Id No.</td>
				<td><input type="text" name="NationalIdNo" value="<?= set_value('NationalIdNo') ?>"></input></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="Username" value="<?= set_value('Username') ?>"></input></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="Password" name="Password"></input></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td><input type="Password" name="ConfirmPassword"></input></td>
			</tr>
			<tr>
				<td style="text-align: right;" ><a href="/travel_agency/Login">Back</a></td>
				<td><input type="submit" name="SignUp" value="Create new account"></input></td>
			</tr>
		</table>
	</form>
</body>
</html>