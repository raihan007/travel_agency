<?php $this->load->view('Shared/header_view'); ?>
	<form method="POST" action="" name="BookingInfoForm" enctype="multipart/form-data">
		<table style="width: auto;" align="center" border="1" >
			<tr>
				<td style="text-align: center;" colspan="2"><h2>Package Booking Details</h2></td>
			</tr>
			<tr>
				<td>Entity No.</td>
				<td><?= $Booking['EntityNo'] ?></td>
			</tr>
			<tr>
				<td>Package</td>
				<td><?= $Package['Title'] ?></td>
			</tr>
			<tr>
				<td>Tickets Quantity</td>
				<td><?= $Booking['Quantity'] ?></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td><?= $Package['Cost'] ?></td>
			</tr>
			<tr>
				<td>Discount</td>
				<td><?= $Package['Discount'] ?></td>
			</tr>
			<tr>
				<td>Total Cost</td>
				<td><?= $Booking['TotalCost'] ?></td>
			</tr>
			<tr>
				<td>Booking Date</td>
				<td><?= $Booking['Date'] ?></td>
			</tr>
			<tr>
				<td>Client</td>
				<td><?= $Client['FirstName'].' '.$Client['LastName'] ?>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;" >
				<a href="/travel_agency/Booking/AllBooking">All Booking List</a>
				</td>
				<td>
					<a href="/travel_agency/Booking/Edit/<?=$Booking['EntityNo']?>">Update</a>
					<a href="/travel_agency/Admin">Home</a>
				</td>
			</tr>
		</table>
	</form>
<?php $this->load->view('Shared/footer_view'); ?>