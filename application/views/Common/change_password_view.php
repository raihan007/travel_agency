<?php $this->load->view('Shared/header_view'); ?>
	<form method="POST" action="" name="SignUpForm" enctype="multipart/form-data">
		<table align="center" >
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><h2>Change Your Password</h2></td>
			</tr>
			<tr>
				<td>Old Password</td>
				<td><input type="Password" name="OldPassword"></input></td>
			</tr>
			<tr>
				<td>New Password</td>
				<td><input type="Password" name="NewPassword"></input></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td><input type="Password" name="ConfirmPassword"></input></td>
			</tr>
			<tr>
				<td style="text-align: right;" ><a href="/travel_agency/Home">Back</a></td>
				<td><input type="submit" name="ChangePassword" value="Change Password"></input></td>
			</tr>
		</table>
	</form>
<?php $this->load->view('Shared/footer_view'); ?>