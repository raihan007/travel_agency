<?php $this->load->view('Shared/header_view'); ?>
	<form method="POST" action="" name="BookingInfoForm" enctype="multipart/form-data">
		<table style="width: auto;" align="center" >
			<tr>
				<td align="center" style="color: red;" colspan="2">
					<?php echo $message; ?>
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="2"><h2>Reserved Package</h2></td>
			</tr>
			<tr>
				<td>Entity No.</td>
				<td><input type="text" name="EntityNo" value="<?= $NextEntityNo ?>" readonly></input></td>
			</tr>
			<tr>
				<td>Package</td>
				<td>
				<input type="hidden" name="PackageId" value="<?= $Package['ID'] ?>"></input>
					<?= $Package['Title'] ?>
				</td>
			</tr>
			<tr>
				<td>Tickets Quantity</td>
				<td><input type="text" name="Quantity" id="Quantity" value="<?= set_value('Quantity',1)?>"></input></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td><input type="text" name="Cost" id="Cost" value="<?= set_value('Cost',$Package['Cost']) ?>"></input></td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><input type="text" id="Discount" name="Discount" value="<?= set_value('Discount',$Package['Discount']) ?>"></input></td>
			</tr>
			<tr>
				<td>Total Cost</td>
				<td><input type="text" id="TotalCost" name="TotalCost" value="<?= set_value('TotalCost',$TotalCost) ?>"></input></td>
			</tr>
			<tr>
				<td>Booking Date</td>
				<td><input type="text" placeholder="YYYY-MM-DD" name="BookingDate" value="<?= set_value('BookingDate',date('Y-m-d')) ?>" readonly></input></td>
			</tr>
			<tr>
				<td>Client</td>
				<td>
					<input type="hidden" name="ClientId" value="<?= $Client['UserId'] ?>"></input>
					<?= $Client['FirstName'].' '.$Client['LastName'] ?>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;" >
				<td>
					<input type="submit" name="Reserved" value="Book Now"></input>
					<a href="/travel_agency/Client/Index">Home</a>
				</td>
			</tr>
		</table>
	</form>
<?php $this->load->view('Shared/footer_view'); ?>