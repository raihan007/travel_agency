<?php $this->load->view('Shared/header_view'); ?>
	<form method="POST" action="" name="SignUpForm" enctype="multipart/form-data">
		<table align="center" >
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><h2>Update Your Profile Details</h2></td>
			</tr>
			<tr>
				<td>Entity No.</td>
				<td><input type="text" name="EntityNo" value="<?= $Client['EntityNo'] ?>" readonly></input></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="FirstName" value="<?= set_value('FirstName',$Client['FirstName']) ?>"></input></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="LastName" value="<?= set_value('LastName',$Client['LastName']) ?>"></input></td>
			</tr>
			<tr>
				<td>Gender</td>
				<td>
					<?php if ($Client['Gender'] === 'Male'):?>
						<input type="radio" name="Gender" checked="checked" value="Male"/>Male
						<input type="radio" name="Gender" value="Female"/>Female
					<?php else: ?>
						<input type="radio" name="Gender" value="Male"/>Male
						<input type="radio" name="Gender" checked="checked" value="Female"/>Female
                    <?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="Email" value="<?= set_value('Email',$Client['Email']) ?>"></input></td>
			</tr>
			<tr>
				<td>Photo</td>
				<td>
					<img id="Image" style='height: 170px; width: 170px;' src="<?php echo base_url('Public/Photos/Clients/'.$Client['Photo']); ?>" /><br/>
					<input type="file" name="Photo" onchange="readURL(this);"></input>
				</td>
			</tr>
			<tr>
				<td>Permanent Address</td>
				<td><textarea rows="4" cols="21" name="PermanentAddress" ><?= set_value('PermanentAddress',$Client['PermanentAddress']) ?></textarea></td>
			</tr>
			<tr>
				<td>Present Address</td>
				<td><textarea rows="4" cols="21" name="PresentAddress" ><?= set_value('PresentAddress',$Client['PresentAddress']) ?></textarea></td>
			</tr>
			<tr>
				<td>Phone No.</td>
				<td><input type="text" name="PhoneNo" value="<?= set_value('PhoneNo',$Client['PhoneNo']) ?>"></input></td>
			</tr>
			<tr>
				<td>Birthdate</td>
				<td><input type="text" name="Birthdate" value="<?= set_value('Birthdate',$Client['Birthdate']) ?>"></input></td>
			</tr>
			<tr>
				<td>BloodGroup</td>
				<td>
					<select name="BloodGroup">
						<?php foreach ($BloodGroupList as $key => $value):?>
							<option value="<?= $key?>" <?php echo set_value('BloodGroup',$Client['BloodGroup']) == $key ? "selected" : ""; ?>><?= $value?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>National Id No.</td>
				<td><input type="text" name="NationalIdNo" value="<?= set_value('NationalIdNo',$Client['NationalIdNo']) ?>"></input></td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					<input name="Type" value="<?= set_value('Type',$Client['Type']) ?>" readonly></input>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;" ><a href="/travel_agency/Client/Index">Back</a></td>
				<td><input type="submit" name="Update" value="Update"></input></td>
			</tr>
		</table>
	</form>
<?php $this->load->view('Shared/footer_view'); ?>