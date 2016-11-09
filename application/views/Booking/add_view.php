<?php $this->load->view('Shared/header_view'); ?>
	<form method="POST" action="" name="BookingInfoForm" enctype="multipart/form-data">
		<table style="width: auto;" align="center" >
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="2"><h2>Add New Booking Details</h2></td>
			</tr>
			<tr>
				<td>Entity No.</td>
				<td><input type="text" name="EntityNo" value="<?= $NextEntityNo ?>" readonly></input></td>
			</tr>
			<tr>
				<td>Package</td>
				<td>
					<select name="PackageId" id="PackageId" onchange="GetDetails()">
						<?php foreach ($PackagesList as $key => $value):?>
								<option value="<?= $key?>" <?php echo set_value('PackageId') == $key ? "selected" : ""; ?>><?= $value?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tickets Quantity</td>
				<td><input type="text" name="Quantity" id="Quantity" value="<?= set_value('Quantity',1)?>"></input></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td><input type="text" name="Cost" id="Cost" value="<?= set_value('Cost') ?>"></input></td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><input type="text" id="Discount" name="Discount" value="<?= set_value('Discount') ?>"></input></td>
			</tr>
			<tr>
				<td>Total Cost</td>
				<td><input type="text" id="TotalCost" name="TotalCost" value="<?= set_value('TotalCost') ?>"></input></td>
			</tr>
			<tr>
				<td>Booking Date</td>
				<td><input type="text" placeholder="YYYY-MM-DD" name="BookingDate" value="<?= set_value('BookingDate',date('Y-m-d')) ?>" readonly></input></td>
			</tr>
			<tr>
				<td>Client</td>
				<td>
					<select name="ClientId">
						<?php foreach ($ClientsList as $key => $value):?>
								<option value="<?= $key?>" <?php echo set_value('ClientId') == $key ? "selected" : ""; ?>><?= $value?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;" >
				<a href="/travel_agency/Booking/AllBooking">All Booking List</a>
				</td>
				<td>
					<input type="submit" name="AddBooking" value="Save"></input>
					<a href="/travel_agency/Admin">Home</a>
				</td>
			</tr>
		</table>
	</form>
<?php $this->load->view('Shared/footer_view'); ?>