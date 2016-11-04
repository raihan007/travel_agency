<?php $this->load->view('Shared/header_view'); ?>
	<form method="POST" action="" name="SignUpForm" enctype="multipart/form-data">
		<table align="center" >
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><h2>Change Your Username</h2></td>
			</tr>
			<tr>
				<td>Old Username</td>
				<td><input type="text" readonly="readonly" name="OldUsername" value="<?= set_value('OldUsername',$Username) ?>"></input></td>
			</tr>
			<tr>
				<td>New Username</td>
				<td><input type="text" name="NewUsername" value="<?= set_value('NewUsername') ?>"></input></td>
			</tr>
			<tr>
				<td>Confirm Username</td>
				<td><input type="text" name="ConfirmUsername" value="<?= set_value('ConfirmUsername') ?>"></input></td>
			</tr>
			<tr>
				<td style="text-align: right;" ><a href="/travel_agency/Home">Back</a></td>
				<td><input type="submit" name="ChangeUsername" value="Change Username"></input></td>
			</tr>
		</table>
	</form>
<?php $this->load->view('Shared/footer_view'); ?>