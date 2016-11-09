<?php $this->load->view('Shared/header_view'); ?>
	<table style="text-align: center;" align="center" border="1">
		<thead>
            <?php  if($message !== ''): ?>
            <tr>
                <td align="center" style="color: red;" colspan="6">
                    <?php echo $message; ?>
                </td>
            </tr>
            <?php endif; ?>
			<tr><td colspan="6"><h2>Sales Report</h2></td></tr>
			<tr>
                <td ><a href="/travel_agency/Admin">Go Home</a></td>
                <td colspan="5">
                </td>
            </tr>
            <tr>
                <th>#</th>
                <th>Client Name</th>
                <th>Package Name</th>
                <th>No. of Tickets</th>
                <th>Total Cost</th>
                <th>Booking Date</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($BookingList)):
            $page = $this->uri->segment(3,0);
            $curPage = ceil($Total / $PerPage);
            $count = ($page === 0)? 0 : ($page -1 ) * $PerPage;
            foreach ($BookingList as $row): ?>
            <tr>
                <td><?= ++$count ?></td>
                <td><?= $row['Fullname'] ?></td>
                <td><?= $row['Title'] ?></td>
                <td><?= $row['Quantity'] ?></td>
                <td>$<?= $row['TotalCost'] ?></td>
                <td><?= $row['Date'] ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"></td>
                <td> Total :</td>
                <td>$<?= $PageTotal ?></td>
                <td></td>
            </tr>
            <?php if( $curPage == $page): ?>
            <tr>
                <td colspan="3"></td>
                <td> Grand Total :</td>
                <td>$<?= $GrandTotal ?></td>
                <td></td>
            </tr>
            <?php endif; ?>
            <?php else: ?>
            <tr>
                <td colspan="6"><h2>No Records Found.</h2></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td colspan="6"><?= $this->pagination->create_links() ?></td>
            </tr>
        </tbody>
    </table>
<?php $this->load->view('Shared/footer_view'); ?>