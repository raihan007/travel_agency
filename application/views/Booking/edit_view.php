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
		        <input type="text" class="form-control" id="EntityNo" name="EntityNo" value="<?= $Booking['EntityNo'] ?>" readonly="readonly">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="Package" class="col-lg-4 control-label">Package</label>
		      <div class="col-lg-8">
		       <select class="form-control" name="PackageId" id="PackageId" onchange="GetDetails()">
					<?php foreach ($PackagesList as $key => $value):?>
								<option value="<?= $key?>" <?php echo set_value('PackageId',$Package['ID']) == $key ? "selected" : ""; ?>><?= $value?></option>
						<?php endforeach; ?>
				</select>
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="Quantity" class="col-lg-4 control-label">Tickets Quantity</label>
		      <div class="col-lg-8">
		        <input type="text" class="form-control" id="Quantity" name="Quantity" value="<?= set_value('Quantity',$Booking['Quantity']) ?>" placeholder="Quantity">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="Cost" class="col-lg-4 control-label">Cost</label>
		      <div class="col-lg-8">
		        <input type="text" class="form-control" id="Cost" name="Cost" value="<?= set_value('Cost',$Package['Cost']) ?>" placeholder="Cost">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="Discount" class="col-lg-4 control-label">Discount</label>
		      <div class="col-lg-8">
		        <input type="text" class="form-control" id="Discount" name="Discount" value="<?= set_value('Discount',$Package['Discount']) ?>" placeholder="Discount">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="TotalCost" class="col-lg-4 control-label">Total Cost</label>
		      <div class="col-lg-8">
		        <input type="text" class="form-control" id="TotalCost" name="TotalCost" value="<?= set_value('TotalCost',$Booking['TotalCost']) ?>" placeholder="Total Cost">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="BookingDate" class="col-lg-4 control-label">Booking Date</label>
		      <div class="col-lg-8">
		        <input type="text" class="form-control datepicker" id="BookingDate" name="BookingDate" value="<?= set_value('BookingDate',$Booking['Date']) ?>" placeholder="BookingDate">
		      </div>
		    </div>
		    <div class="form-group">
		      <label for="ClientId " class="col-lg-4 control-label">Client</label>
		      <div class="col-lg-8">
		        <select class="form-control" id="ClientId" name="ClientId">
					<?php foreach ($ClientsList as $key => $value):?>
								<option value="<?= $key?>" <?php echo set_value('ClientId',$Booking['ClientId']) == $key ? "selected" : ""; ?>><?= $value?></option>
						<?php endforeach; ?>
				</select>
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