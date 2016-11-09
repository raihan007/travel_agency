<?php $this->load->view('Shared/header_view'); ?>
	<table style="text-align: center;" align="center" border="1">
		<thead>
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
			<tr><td colspan="7"><h2>All Booking List</h2></td></tr>
			<tr>
                <td style="text-align: left;" colspan="6">
                    <a href="/travel_agency/Booking/add">Add New</a>
                </td>
                <td>
                    <a href="/travel_agency/Admin">Home</a>
                </td>
            </tr>
            <tr>
                <th>#</th>
                <th>Client Name</th>
                <th>Package Name</th>
                <th>No. of Tickets</th>
                <th>Total Cost</th>
                <th>Booking Date</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($BookingList)):
            $page = $this->uri->segment(3,0);
            $count = ($page === 0)? 0 : ($page -1 ) * $PerPage;
            foreach ($BookingList as $row): ?>
        	<tr>
                <td><?= ++$count ?></td>
                <td><?= $row['Fullname'] ?></td>
                <td><?= $row['Title'] ?></td>
                <td><?= $row['Quantity'] ?></td>
                <td><?= $row['TotalCost'] ?></td>
                <td><?= $row['Date'] ?></td>
                <td>
                	<a href="<?= base_url('Booking/Details/'.$row['EntityNo']) ?>">Details</a><br/>
                    <a href="<?= base_url('Booking/Edit/'.$row['EntityNo']) ?>">Edit</a><br/>
                    <a href="<?= base_url('Booking/Remove/'.$row['EntityNo']) ?>">Cancle</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="7"><h2>No Records Found.</h2></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="7"><?= $this->pagination->create_links() ?></td>
            </tr>
        </tbody>
    </table>
<?php $this->load->view('Shared/footer_view'); ?>


