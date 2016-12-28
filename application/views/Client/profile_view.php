<?php $this->load->view('Shared/header_view'); ?>
	<table border="1" align="center">
		<tr style="text-align: center;"><td colspan="2"><h2>Youe Profile Details</h2></td></tr>
		<tr>
			<td style="text-align: right;">Entity No :</td>
			<td><?= $Employee['EntityNo'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Username :</td>
			<td><?= $Employee['Username'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">First Name :</td>
			<td><?= $Employee['FirstName'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Last Name :</td>
			<td><?= $Employee['LastName'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Gender :</td>
			<td><?= $Employee['Gender'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Photo :</td>
			<td><img style='height: 150px; width: 150px;' src="<?php echo base_url('Public/Photos/Clients/'.$Employee['Photo']); ?>" /></td>
		</tr>
		<tr>
			<td style="text-align: right;">Email :</td>
			<td><?= $Employee['Email'] ?></td>
		</tr>

		<tr>
			<td style="text-align: right;">Phone No. :</td>
			<td><?= $Employee['PhoneNo'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Date of Birth :</td>
			<td><?= $Employee['Birthdate'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Permanent Address :</td>
			<td><?= $Employee['PermanentAddress'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Present Address :</td>
			<td><?= $Employee['PresentAddress'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">National Id Card No. :</td>
			<td><?= $Employee['NationalIdNo'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Blood Group :</td>
			<td><?= $Employee['BloodGroup'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Type :</td>
			<td><?= $Employee['Type'] ?></td>
		</tr>
		<tr>
			<td  style="text-align: center;" colspan="2">
				<a href="/travel_agency/Admin">Back</a>
				<a href="/travel_agency/Client/UpdateProfile/<?=$Employee['EntityNo']?>">Update Profile Details</a>
			</td>
		</tr>
	</table>
<?php $this->load->view('Shared/footer_view'); ?>