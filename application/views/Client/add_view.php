<?php $this->load->view('Shared/header_view'); ?>
	<form method="POST" action="" name="ClientInfoForm" enctype="multipart/form-data">
		<table align="center" >
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="2"><h2>Add New Client Details</h2></td>
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
				<td>
					<img id="Image" style='height: 170px; width: 170px;' src="<?php echo base_url('Public/Photos/Clients/user.jpg'); ?>" /><br/>
					<input type="file" name="Photo" onchange="readURL(this);"></input>
				</td>
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
				<td>Type</td>
				<td>
					<select name="Type">
						<?php foreach ($ClientTypeList as $key => $value):?>
							<option value="<?= $key?>"><?= $value?></option>
						<?php endforeach; ?>
					</select>
				</td>
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
				<td style="text-align: right;" >
				<a href="/travel_agency/Client/AllClients">All Clients List</a>
				</td>
				<td>
					<input type="submit" name="AddClient" value="Save"></input>
					<a href="/travel_agency/Admin">Home</a>
				</td>
			</tr>
		</table>
	</form>
<?php $this->load->view('Shared/footer_view'); ?>