        <div class="row" style="margin-bottom: 10px;">
            <div class="col-sm-12">
                <a class="btn btn-primary" href="/travel_agency/Booking/add">Add New</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table style="text-align: center;" class="table table-bordered table-hover table-responsive">
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
            </div>
        </div>


