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
				<a href="/travel_agency/Booking/Add">Book New Tour Packages</a>
			</td>
			<td class="menu">
				<a href="/travel_agency/Admin/Profile">Profile</a>
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
				<td>#</td>
				<td>Title</td>
				<td>Remarks</td>
				<td>Gallery</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>Sent-Martin</td>
				<td>3 Days & 2 Nights</td>
				<td><img id="Image" style='height: 170px; width: 170px;' src="<?php echo base_url('Public/Photos/Packages/demo.jpg'); ?>" /></td>
				<td>
					<a href="">See Details<br/>
					<a href="">Booked This
				</td>
			</tr>
		</tbody>
	</table>

<?php $this->load->view('Shared/footer_view'); ?>