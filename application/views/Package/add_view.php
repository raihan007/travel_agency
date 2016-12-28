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
		        <input type="text" class="form-control" id="EntityNo" name="EntityNo" value="<?= $NextEntityNo ?>" readonly="readonly">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="Title" class="col-lg-4 control-label">Title</label>
		      <div class="col-lg-8">
		        <input type="text" class="form-control" id="Title" name="Title" value="<?= set_value('Title') ?>" placeholder="Title">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="Cost" class="col-lg-4 control-label">Cost</label>
		      <div class="col-lg-8">
		        <input type="text" class="form-control" id="Cost" name="Cost" value="<?= set_value('Cost') ?>" placeholder="Cost">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="select" class="col-lg-4 control-label">Selects</label>
		      <div class="col-lg-8">
		        <select name="Type" class="form-control">
					<option value="Local Tour" <?php echo set_value('Type') == 'Local Tour' ? "selected" : ""; ?>>Local Tour</option>
					<option value="International Tour" <?php echo set_value('Type') == 'International Tour' ? "selected" : ""; ?>>International Tour</option>
				</select>
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="Discount" class="col-lg-4 control-label">Discount</label>
		      <div class="col-lg-8">
		        <input type="text" class="form-control" id="Discount" name="Discount" value="<?= set_value('Discount') ?>" placeholder="Discount">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="BookingLastDate" class="col-lg-4 control-label">Last Booking Date</label>
		      <div class="col-lg-8">
		        <input type="text" class="form-control datepicker" id="BookingLastDate" name="BookingLastDate" value="<?= set_value('BookingLastDate') ?>" placeholder="YYYY-MM-DD">
		      </div>
		    </div>
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
		        <textarea class="form-control" rows="3" name="Remarks" id="Remarks"></textarea>
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-8 col-lg-offset-4">
		        <input type="submit" name="AddPackage" class="btn btn-primary" value="Save"></input>
		      </div>
		    </div>
		  </fieldset>
		</form>
	</div>
</div>