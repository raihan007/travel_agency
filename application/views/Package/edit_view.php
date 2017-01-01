				<div class="row">
					<div class="col-sm-12 text-center text-danger">
						{message}
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<form class="form-horizontal" method="POST" action="" name="PackageInfoForm" enctype="multipart/form-data">
						  <fieldset>
						    <div class="form-group">
						      <label for="EntityNo" class="col-lg-4 control-label">Entity No.</label>
						      <div class="col-lg-8">
						        <input type="text" class="form-control" id="EntityNo" name="EntityNo" value="<?= $Package['EntityNo'] ?>" readonly="readonly">
						      </div>
						    </div>
						    <div class="form-group">
						      <label for="Title" class="col-lg-4 control-label">Title</label>
						      <div class="col-lg-8">
						        <input type="text" class="form-control" id="Title" name="Title" value="<?= set_value('Title',$Package['Title']) ?>" placeholder="Title">
						      </div>
						    </div>
						    <div class="form-group">
						      <label for="Cost" class="col-lg-4 control-label">Cost</label>
						      <div class="col-lg-8">
						        <input type="text" class="form-control" id="Cost" name="Cost" value="<?= set_value('Cost',$Package['Cost']) ?>" placeholder="Cost">
						      </div>
						    </div>
						    <div class="form-group">
						      <label for="select" class="col-lg-4 control-label">Selects</label>
						      <div class="col-lg-8">
						        <select name="Type" class="form-control">
									<option value="Local Tour" <?php echo set_value('Type',$Package['Type']) == 'Local Tour' ? "selected" : ""; ?>>Local Tour</option>
									<option value="International Tour" <?php echo set_value('Type',$Package['Type']) == 'International Tour' ? "selected" : ""; ?>>International Tour</option>
								</select>
						      </div>
						    </div>
						    <div class="form-group">
						      <label for="Discount" class="col-lg-4 control-label">Discount</label>
						      <div class="col-lg-8">
						        <input type="text" class="form-control" id="Discount" name="Discount" value="<?= set_value('Discount',$Package['Discount']) ?>" placeholder="Discount">
						      </div>
						    </div>
						    <div class="form-group">
						      <label for="BookingLastDate" class="col-lg-4 control-label">Last Booking Date</label>
						      <div class="col-lg-8">
						        <input type="text" class="form-control datepicker" id="BookingLastDate" name="BookingLastDate" value="<?= set_value('BookingLastDate',$Package['BookingLastDate']) ?>" placeholder="YYYY-MM-DD">
						      </div>
						    </div>
						    <?php if($Package['Gallery'] == '1'): ?>
						    <div class="form-group">
						      	<label class="col-lg-4 control-label"></label>
						      	<div class="col-lg-8">
						      	<?php foreach ($Package['Images'] as $key => $value) :?>
				                    <img id="Image" height='100' width='100' src="<?php echo base_url('Public/Photos/Packages/'.$value); ?>" />
				            	<?php endforeach; ?>
						      </div>
						    </div>
						    <?php endif; ?>
						    <div class="form-group">
						      <label for="Photos" class="col-lg-4 control-label">Photos</label>
						      <div class="col-lg-8">
						        <input type="file" class="form-control" name="Photos[]" onchange="PackageImages(this)" multiple></input>
						      </div>
						      <div id="Photos" class="col-lg-8 col-lg-offset-2">
						      </div>
						    </div>
						    <div class="form-group">
						      <label for="Remarks" class="col-lg-4 control-label">Remarks</label>
						      <div class="col-lg-8">
						        <textarea class="form-control" rows="5" name="Remarks" id="Remarks"><?= set_value('Remarks',$Package['Remarks']) ?></textarea>
						      </div>
						    </div>
						    <div class="form-group">
						      <div class="col-lg-8 col-lg-offset-4">
						        <input type="submit" name="Update" class="btn btn-primary" value="Update"></input>
						      </div>
						    </div>
						  </fieldset>
						</form>
					</div>
				</div>