            <div class="row" style="margin-bottom: 10px;">
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
                <div class="col-sm-12">
                    <a class="btn btn-primary" href="/travel_agency/Client/add">Add New</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">               
                    <table style="text-align: center;" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <!-- <tr>
                                <td colspan="6">
                                    <form method="POST" name="SearchForm">
                                        <select name="Type">
                                            <option value="" selected="">Select Option</option>
                                            <option value="FirstName">First Name</option>
                                            <option value="LastName">Last Name</option>
                                            <option value="Email">Email</option>
                                        </select>
                                        <input type="text" name="SearchKey"></input>
                                        <input type="submit" value="Search" name="Search"></input>
                                        <a href="/travel_agency/Client/AllClients">Refresh</a>
                                    </form>
                                </td>
                            </tr> -->
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
                            $page = $this->uri->segment(3,0);
                            $count = ($page === 0)? 0 : ($page -1 ) * $PerPage;
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
                                <td colspan="8"><?= $this->pagination->create_links() ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="DataGrid"
                                            data-toggle="table"
                                            data-height="900"
                                            data-url='<?= base_url('Client/ClientsInfo_json')?>'
                                            data-show-columns="true"
                                            data-cookie="true"
                                            data-cookie-id-table="saveId"
                                            data-toolbar="#toolbar"
                                            data-show-export="true"
                                            data-search="true"
                                            data-show-refresh="true"
                                            data-minimum-count-columns="2"
                                            data-pagination="true"
                                            data-id-field="EntityNo"
                                            data-page-size="10"
                                            data-page-list="[10,25, 50, 100, ALL]"
                                            data-show-footer="false"
                                            data-side-pagination="server"
                                            data-sort-name="EntityNo"
                                            data-sort-order="asc"
                                            data-query-params="queryParams">
                                            <thead>
                                                <tr>
                                                    <th data-field="EntityNo" data-sortable="true">#</th>
                                                    <th data-field="FirstName" data-sortable="true">First Name</th>
                                                    <th data-field="LastName" data-sortable="true">Last Name</th>
                                                    <th data-field="Photo" data-formatter="imageFormatter" data-align="center">Image</th>
                                                    <th data-field="Gender" data-sortable="true">Gender</th>
                                                    <th data-field="PresentAddress" data-sortable="true">Present Address</th>
                                                    <th data-field="Birthdate" data-sortable="true">Birthdate</th>
                                                    <th data-field="BloodGroup" data-sortable="true">BloodGroup</th>
                                                    <th data-field="Type" data-sortable="true">Type</th>
                                                    <th data-events="operateEvents" data-formatter="operateFormatter"></th>
                                                    </tr>
                                            </thead>
                    </table>
                </div>
            </div>


