            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="info">
                                <th>#</th>
                                <th>Full Name</th>
                                <th>No. of Package Booked</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(count($ClientsPackageList)):
                            $page = $this->uri->segment(3,0);
                            $count = ($page === 0)? 0 : ($page -1 ) * $PerPage;
                            foreach ($ClientsPackageList as $row): ?>
                            <tr>
                                <td><?= ++$count ?></td>
                                <td><?= $row['FirstName'].' '.$row['LastName'] ?></td>
                                <td><?= $row['TIMES'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="3"><h2>No Records Found.</h2></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td colspan="3"><?= $this->pagination->create_links() ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>