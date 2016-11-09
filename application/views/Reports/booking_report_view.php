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
			<tr><td colspan="5"><h2>Packages Booking Report</h2></td></tr>
			<tr>
                <td ><a href="/travel_agency/Admin">Go Home</a></td>
                <td colspan="4">
                </td>
            </tr>
            <tr>
                <th>#</th>
                <th>Package Name</th>
                <th>Cost</th>
                <th>Discount</th>
                <th>No. of Booking Times</th>
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
                <td>$<?= $row['Discount'] ?></td>
                <td><?= $row['TIMES'] ?></td>
            </tr>
            <?php endforeach; ?>
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