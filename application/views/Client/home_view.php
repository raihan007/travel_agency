<?php $this->load->view('Shared/header_view'); ?>
	<table border="1" style="text-align: center;" align="center">
		<tr><td colspan="7"><h1>Welcome</h1></td></tr>
		<?php  if( $notif = $this->session->flashdata('success')): ?>
        <tr>
            <td style="color: blue;" colspan="7"><strong><?= $notif ?></strong></td>
       	</tr>
      	<?php endif; ?>
      	<?php  if( $notif = $this->session->flashdata('error')): ?>
     	<tr>
          	<td style="color: red;" colspan="7"><strong><?= $notif ?></strong></td>
      	</tr>
       	<?php endif; ?>
		<tr>
			<td colspan="7">
				<h3>User Name : <?= $FullName ?></h3>
				<br/>Last Login: <?= $LastLoginTime ?>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Client">Home</a>
			</td>
			<td class="menu">
				<a href="/travel_agency/Client/AllReservation/<?= $ClientId ?>">My Reservation</a>
			</td>
			<td class="menu">
				<a href="/travel_agency/Client/Profile">Profile</a>
			</td>
			<td class="menu">
				<a href="/travel_agency/Settings/ChangeUsername">Change Username</a>
			</td>
			<td class="menu">
				<a href="/travel_agency/Settings/ChangePassword">Change Password</a>
			</td>
			<td class="menu">
				<strong><a class="logout" href="/travel_agency/Login/Logout">Logout</a></strong>
			</td>
		</tr>
	</table><br/>
	<table border="1" style="width: 100%;text-align: center;" align="center">
		<thead>
			<tr><td colspan="7"><h1>All Packages</h1></td></tr>
			<tr>
							<th>#</th>
							<th>Title</th>
							<th>Total Cost</th>
							<th>Discount</th>
							<th>Type</th>
							<th>Booking Last Date</th>
							<th>Options</th>
					</tr>
			</thead>
			<tbody>
			<?php if(count($PackageList)):
					$page = $this->uri->segment(3,0);
            		$count = ($page === 0)? 0 : ($page -1 ) * $PerPage;
					foreach ($PackageList as $row): ?>
				<tr>
							<td><?= ++$count ?></td>
							<td><?= $row['Title'] ?></td>
							<td><?= $row['Cost'] ?></td>
							<td><?= $row['Discount'] ?></td>
							<td><?= $row['Type'] ?></td>
							<td><?= $row['BookingLastDate'] ?></td>
							<td>
								<a href="<?= base_url('/Packages/Details/'.$row['EntityNo']) ?>">Details</a><br/>
								<a href="<?= base_url('/Booking/Reservation/'.$row['EntityNo']) ?>">Book Now!</a>
							</td>
					</tr>
					<?php endforeach; ?>
					<?php else: ?>
					<tr>
							<td colspan="9"><h2>No Records Found.</h2></td>
					</tr>
					<?php endif; ?>
					<tr>
							<td colspan="7"><?= $this->pagination->create_links() ?></td>
					</tr>
			</tbody>
	</table>

<?php $this->load->view('Shared/footer_view'); ?>