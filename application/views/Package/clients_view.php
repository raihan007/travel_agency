<!DOCTYPE html>
<html lang="en">
<head>
	<title>All Clients Information</title>
</head>
<body>
	<table style="text-align: center;" align="center" border="1">
		<thead>
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
			<tr><td colspan="8"><h2>All Clients List</h2></td></tr>
			<tr><td style="text-align: left;" colspan="8"><a href="/travel_agency/Client/add">Add New</a></td></tr>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Gender</th>
                <th>Photo</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Type</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($ClientList)):
            $count = $this->uri->segment(3,0);
            foreach ($ClientList as $row): ?>
        	<tr>
                <td><?= ++$count ?></td>
                <td><?= $row['FirstName'] ?></td>
                <td><?= $row['Gender'] ?></td>
                <td><img style='height: 150px; width: 150px;' src="<?php echo base_url('Public/Photos/Clients/'.$row['Photo']); ?>" /></td>
                <td><?= $row['Email'] ?></td>
                <td><?= $row['PhoneNo'] ?></td>
                <td><?= $row['Type'] ?></td>
                <td>
                	<a href="<?= base_url('Client/Details/'.$row['EntityNo']) ?>">Details</a><br/>
                    <a href="<?= base_url('Client/Edit/'.$row['EntityNo']) ?>">Edit</a><br/>
                    <a href="<?= base_url('Client/Remove/'.$row['EntityNo']) ?>">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="8"><h2>No Records Found.</h2></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2"><a href="/travel_agency/Admin">Home</a></td>
                <td colspan="6"><?= $this->pagination->create_links() ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>


