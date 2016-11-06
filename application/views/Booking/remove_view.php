<?php $this->load->view('Shared/header_view'); ?>
	<table border="1" align="center">
		<tr style="text-align: center;"><td colspan="2"><h2>Are you sure to delete this package details?</h2></td></tr>
		<tr>
			<td style="width: 20%;text-align: right;">Entity No :</td>
			<td><?= $Package['EntityNo'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Title :</td>
			<td><?= $Package['Title'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Cost :</td>
			<td><?= $Package['Cost'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Photo :</td>
			<td>
				<?php if($Package['Gallery'] == '1'): ?>
					<?php foreach ($Package['Images'] as $key => $value) :?>
	                    <img id="Image" height='100' width='100' src="<?php echo base_url('Public/Photos/Packages/'.$value); ?>" />
	            	<?php endforeach; ?>
	            	<br/><a href="<?= base_url('Packages/Gallery/'.$Package['EntityNo']) ?>">See Gallery Here</a>
	            <?php else: ?>
	            	No Photos Available!
	            <?php endif; ?>
			</td>
		</tr>
		<tr>
			<td style="text-align: right;">Type :</td>
			<td><?= $Package['Type'] ?></td>
		</tr>

		<tr>
			<td style="text-align: right;">Discount :</td>
			<td><?= $Package['Discount'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Last Date of Booking :</td>
			<td><?= $Package['BookingLastDate'] ?></td>
		</tr>
		<tr>
			<td style="text-align: right;">Details :</td>
			<td><?= $Package['Remarks'] ?></td>
		</tr>
		<tr>
			<td  style="text-align: center;" colspan="2">
				<form method="POST">
					<a href="/travel_agency/Packages/AllPackages">Back</a>
					<input type="hidden" value="<? $Package['EntityNo']?> "></input>
					<input type="Submit" name="Delete" value="Confirm"></input>
				</form>
			</td>
		</tr>
	</table>
<?php $this->load->view('Shared/footer_view'); ?>