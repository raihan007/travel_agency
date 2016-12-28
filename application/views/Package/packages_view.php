            <div class="row" style="margin-bottom: 10px;">
                <div class="col-sm-12">
                    <a class="btn btn-primary" href="/travel_agency/Packages/add">Add New</a>
                </div>
                <div class="col-md-12 text-center">
                    <?php  if( $notif = $this->session->flashdata('success')): ?>
                    <div class="alert alert-dismissible alert-info">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong><?= $notif ?></strong>
                    </div>
                    <?php endif; ?>
                    <?php  if( $notif = $this->session->flashdata('error')): ?>
                    <div class="alert alert-dismissible alert-danger">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong><?= $notif ?></strong>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="info">
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
                            $page = $this->uri->segment(3,0);
                            $count = ($page === 0)? 0 : ($page -1 ) * $PerPage;
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
                                <td colspan="9"><?= $this->pagination->create_links() ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

