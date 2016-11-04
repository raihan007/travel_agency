<?php $this->load->view('Shared/header_view'); ?>
	<table border="1" align="center">
		<tr style="text-align: center;"><td colspan="2"><h2>Client Details</h2></td></tr>
		<tr>
			<td style="text-align: right;">Entity No :</td>
			<td><?= $Client['EntityNo'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">First Name :</td>
			<td><?= $Client['FirstName'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Last Name :</td>
			<td><?= $Client['LastName'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Gender :</td>
			<td><?= $Client['Gender'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Photo :</td>
			<td><img style='height: 150px; width: 150px;' src="<?php echo base_url('Public/Photos/Clients/'.$Client['Photo']); ?>" /></td>
		</tr>
		<tr>
			<td style="text-align: right;">Email :</td>
			<td><?= $Client['Email'] ?></td>
		</tr>

		<tr>
			<td style="text-align: right;">Phone No. :</td>
			<td><?= $Client['PhoneNo'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Date of Birth :</td>
			<td><?= $Client['Birthdate'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Permanent Address :</td>
			<td><?= $Client['PermanentAddress'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Present Address :</td>
			<td><?= $Client['PresentAddress'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">National Id Card No. :</td>
			<td><?= $Client['NationalIdNo'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Blood Group :</td>
			<td><?= $Client['BloodGroup'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Type :</td>
			<td><?= $Client['Type'] ?></td>
		</tr>
		<tr>
			<td  style="text-align: center;" colspan="2">
				<a href="/travel_agency/Client/AllClients">Back</a>
				<a href="/travel_agency/Client/Edit/<?=$Client['EntityNo']?>">Update</a>
			</td>
		</tr>
	</table>
<?php $this->load->view('Shared/footer_view'); ?>