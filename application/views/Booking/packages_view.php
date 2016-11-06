<?php $this->load->view('Shared/header_view'); ?>
	<table style="text-align: center;" align="center" border="1">
		<thead>
            <?php  if( $notif = $this->session->flashdata('success')): ?>
            <tr>
                <td style="color: blue;" colspan="9"><strong><?= $notif ?></strong></td>
            </tr>
            <?php endif; ?>
            <?php  if( $notif = $this->session->flashdata('error')): ?>
            <tr>
                <td style="color: red;" colspan="9"><strong><?= $notif ?></strong></td>
            </tr>
            <?php endif; ?>
			<tr><td colspan="9"><h2>All Packages List</h2></td></tr>
			<tr><td style="text-align: left;" colspan="9"><a href="/travel_agency/Packages/add">Add New</a></td></tr>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Details</th>
                <th>Gallery</th>
                <th>Total Cost</th>
                <th>Discount</th>
                <th>Type</th>
                <th>Booking Last Date</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($PackageList)):
            $count = $this->uri->segment(3,0);
            foreach ($PackageList as $row): ?>
        	<tr>
                <td><?= ++$count ?></td>
                <td><?= $row['Title'] ?></td>
                <td><?= $row['Remarks'] ?></td>
                <td>
                    <?php if( $row['Gallery'] === '1'): ?>
                        <a href="<?= base_url('Packages/Gallery/'.$row['EntityNo']) ?>">See Gallery Here</a>
                    <?php else: ?>
                        <label>No Photos Available</label>
                    <?php endif; ?>
                </td>
                <td><?= $row['Cost'] ?></td>
                <td><?= $row['Discount'] ?></td>
                <td><?= $row['Type'] ?></td>
                <td><?= $row['BookingLastDate'] ?></td>
                <td>
                	<a href="<?= base_url('Packages/Details/'.$row['EntityNo']) ?>">Details</a><br/>
                    <a href="<?= base_url('Packages/Edit/'.$row['EntityNo']) ?>">Edit</a><br/>
                    <a href="<?= base_url('Packages/Remove/'.$row['EntityNo']) ?>">Remove</a><br/>
                    <a href="<?= base_url('Booking/Details/'.$row['EntityNo']) ?>">Booking Details</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="9"><h2>No Records Found.</h2></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="2"><a href="/travel_agency/Admin">Home</a></td>
                <td colspan="7"><?= $this->pagination->create_links() ?></td>
            </tr>
        </tbody>
    </table>
<?php $this->load->view('Shared/footer_view'); ?>

