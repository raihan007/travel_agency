<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
	<style type="text/css">
	.menu{
		font-size: 18px;
	}
	.logout{
		color: red;
	}
	</style>
</head>
<body>
	<table border="1" style="text-align: center;" align="center">
		<tr><td><h1>Welcome</h1></td></tr>
		<?php  if( $notif = $this->session->flashdata('success')): ?>
        <tr>
            <td style="color: blue;" colspan="8"><strong><?= $notif ?></strong></td>
       	</tr>
      	<?php endif; ?>
      	<?php  if( $notif = $this->session->flashdata('error')): ?>
     	<tr>
          	<td style="color: red;" colspan="8"><strong><?= $notif ?></strong></td>
      	</tr>
       	<?php endif; ?>
		<tr><td><h3>User Name : <?= $FullName ?></h3></td></tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Client/AllClients">All Clients Information</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Client/Add">Add New Client Information</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Packages/AllPackages">All Package Information</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Packages/Add">Add New Packages</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Booking/AllBooking">All Booking Information</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Booking/Add">Add New Booking</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Report/Booking">Package Booking Report</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Report/Sales">Sales Report</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Admin/Profile">Profile</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Settings/ChangeUsername">Change Username</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<a href="/travel_agency/Settings/ChangePassword">Change Password</a>
			</td>
		</tr>
		<tr>
			<td class="menu">
				<strong><a class="logout" href="/travel_agency/Login/Logout">Logout</a></strong>
			</td>
		</tr>
		<tr><td>Last Login: <?= $LastLoginTime ?></td></tr>
	</table>
</body>
</html>