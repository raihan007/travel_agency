            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr class="info">
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
                </div>
            </div>