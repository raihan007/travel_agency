            <div class="row">
                <div class="col-sm-12">
                    <table style="text-align: center;" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr><td colspan="2"><h2>Gallery of <?= $PackageTitle ?></h2></td></tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php $count = 0; ?>
                            <?php foreach ($ImageList as $key => $value) :?>
                                <td>
                                    <?php ++$count ?>
                                    <img id="Image" height='300' width='400' src="<?php echo base_url('Public/Photos/Packages/'.$value); ?>" />
                                    <br/>
                                    <?php
                                        preg_match("/_(\d+)\./", $value, $matches);
                                    ?>
                                    
                                    <?php if( $count === 2): ?>
                                        <?php $count = 0; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                </td>
                            <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>