<?php $this->load->view('Shared/header_view'); ?>
	<table style="text-align: center;" align="center" border="1">
		<thead>
			<tr><td colspan="7"><h2>All Booking List</h2></td></tr>
			<tr>
                <td style="text-align: left;" colspan="5">
                    <a href="/travel_agency/Client">Home</a>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <h3>User Name : <?= $FullName ?></h3>
                </td>
            </tr>
            <tr>
                <th>#</th>
                <th>Package Name</th>
                <th>No. of Tickets</th>
                <th>Total Cost</th>
                <th>Booking Date</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($ClientBookingList)):
            $count = 0;
            foreach ($ClientBookingList as $row): ?>
        	<tr>
                <td><?= ++$count ?></td>
                <td><?= $row['Title'] ?></td>
                <td><?= $row['Quantity'] ?></td>
                <td><?= $row['TotalCost'] ?></td>
                <td><?= $row['Date'] ?></td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="7"><h2>No Records Found.</h2></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $this->load->view('Shared/footer_view'); ?>


