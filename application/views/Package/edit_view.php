<?php $this->load->view('Shared/header_view'); ?>
	<form method="POST" action="" name="PackageInfoForm" enctype="multipart/form-data">
		<table style="width: auto;" align="left" >
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="2"><h2>Update Package Details</h2></td>
			</tr>
			<tr>
				<td>Entity No.</td>
				<td><input type="text" name="EntityNo" value="<?= $Package['EntityNo'] ?>" readonly></input></td>
			</tr>
			<tr>
				<td>Title</td>
				<td><input type="text" name="Title" value="<?= set_value('Title',$Package['Title']) ?>"></input></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td><input type="text" name="Cost" value="<?= set_value('Cost',$Package['Cost']) ?>"></input></td>
			</tr>
			<tr>
				<td>Type</td>
				<td>
					<select name="Type">
						<option value="Local Tour" <?php echo set_value('Type',$Package['Type']) == 'Local Tour' ? "selected" : ""; ?>>Local Tour</option>
						<option value="International Tour" <?php echo set_value('Type',$Package['Type']) == 'International Tour' ? "selected" : ""; ?>>International Tour</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><input type="text" name="Discount" value="<?= set_value('Discount',$Package['Discount']) ?>"></input></td>
			</tr>
			<tr>
				<td>Last Booking Date</td>
				<td><input type="text" placeholder="YYYY-MM-DD" name="BookingLastDate" value="<?= set_value('BookingLastDate',$Package['BookingLastDate']) ?>"></input></td>
			</tr>
			<?php if($Package['Gallery'] == '1'): ?>
			<tr>
				<td colspan="2">
					<?php foreach ($Package['Images'] as $key => $value) :?>
	                    <img id="Image" height='100' width='100' src="<?php echo base_url('Public/Photos/Packages/'.$value); ?>" />
	            	<?php endforeach; ?>
				</td>
			</tr>
			<?php endif; ?>
			<tr>
				<td>Photos</td>
				<td>
					<input type="file" name="Photos[]" onchange="PackageImages(this)" multiple></input>
				</td>
				<td id="Photos">
					
				</td>
			</tr>
			<tr>
				<td>Details</td>
				<td><textarea rows="10" cols="21" name="Remarks" ><?= set_value('Remarks',$Package['Remarks']) ?></textarea></td>
			</tr>
			<tr>
				<td style="text-align: right;" >
				<a href="/travel_agency/Packages/AllPackages">Back</a>
				</td>
				<td>
					<input type="submit" name="Update" value="Update"></input>
					<a href="/travel_agency/Admin">Home</a>
				</td>
			</tr>
		</table>
	</form>
<?php $this->load->view('Shared/footer_view'); ?>