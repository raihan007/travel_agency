<?php $this->load->view('Shared/header_view'); ?>
	<form method="POST" action="" name="PackageInfoForm" enctype="multipart/form-data">
		<table style="width: auto;" align="left" >
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="2"><h2>Add New Package Details</h2></td>
			</tr>
			<tr>
				<td>Entity No.</td>
				<td><input type="text" name="EntityNo" value="<?= $NextEntityNo ?>" readonly></input></td>
			</tr>
			<tr>
				<td>Title</td>
				<td><input type="text" name="Title" value="<?= set_value('Title') ?>"></input></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td><input type="text" name="Cost" value="<?= set_value('Cost') ?>"></input></td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					<select name="Type">
						<option value="Local Tour" <?php echo set_value('Type') == 'Local Tour' ? "selected" : ""; ?>>Local Tour</option>
						<option value="International Tour" <?php echo set_value('Type') == 'International Tour' ? "selected" : ""; ?>>International Tour</option>
					</select>

				</td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><input type="text" name="Discount" value="<?= set_value('Discount') ?>"></input></td>
			</tr>
			<tr>
				<td>Last Booking Date</td>
				<td><input type="text" placeholder="YYYY-MM-DD" name="BookingLastDate" value="<?= set_value('BookingLastDate') ?>"></input></td>
			</tr>
			<tr>
				<td>Photos</td>
				<td>
					<input type="file" name="Photos[]" onchange="PackageImages(this)" multiple></input>
				</td>
				<td id="Photos"></td>
			</tr>
			<tr>
				<td>Details</td>
				<td><textarea rows="10" cols="21" name="Remarks" ><?= set_value('Remarks') ?></textarea></td>
			</tr>
			<tr>
				<td style="text-align: right;" >
				<a href="/travel_agency/Packages/AllPackages">All Packages List</a>
				</td>
				<td>
					<input type="submit" name="AddPackage" value="Save"></input>
					<a href="/travel_agency/Admin">Home</a>
				</td>
			</tr>
		</table>
	</form>
<?php $this->load->view('Shared/footer_view'); ?>