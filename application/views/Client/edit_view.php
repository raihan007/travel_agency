<div class="row">
				<div class="col-sm-12 text-center text-danger">
					{message}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<form class="form-horizontal" method="POST" action="" name="SignUpForm" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
							  <label for="EntityNo" class="col-lg-4 control-label">Entity No.</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="EntityNo" value="<?= $Client['EntityNo'] ?>" readonly></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="FirstName" class="col-lg-4 control-label">First Name</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="FirstName" value="<?= set_value('FirstName',$Client['FirstName']) ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="LastName" class="col-lg-4 control-label">Last Name</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="LastName" value="<?= set_value('LastName',$Client['LastName']) ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="Email" class="col-lg-4 control-label">Email</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="Email" value="<?= set_value('Email',$Client['Email']) ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="Photo" class="col-lg-4 control-label">Photo</label>
							  <div class="col-lg-8">
							  	<img id="Image" class="img-responsive" style='height: 170px; width: 170px;' src="<?php echo base_url('Public/Photos/Clients/'.$Client['Photo']); ?>" />
							    <div style="margin-top: 5px;" class="input-group">
					              <label class="input-group-btn">
					                  <span class="btn btn-default">
					                      Browse  <input type="file" name="Photo" style="display: none;">
					                  </span>
					              </label>
					              <input type="text" class="form-control" readonly style="margin-left: 8px;">
					            </div>
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-lg-4 control-label">Gender</label>
							  <div class="col-lg-8">
							  	<?php if ($Client['Gender'] === 'Male'):?>
									<div class="radio">
								      <label>
								        <input type="radio" name="Gender" checked="checked" value="Male"/>Male
								      </label>
								    </div>
								    <div class="radio">
								      <label>
								        <input type="radio" name="Gender" value="Female"/>Female
								      </label>
								    </div>
								<?php else: ?>
									<div class="radio">
								      <label>
								        <input type="radio" name="Gender" value="Male"/>Male
								      </label>
								    </div>
								    <div class="radio">
								      <label>
								        <input type="radio" name="Gender" checked="checked" value="Female"/>Female
								      </label>
								    </div>
			                    <?php endif; ?>
							  </div>
							</div>
							<div class="form-group">
							  <label for="PermanentAddress" class="col-lg-4 control-label">Permanent Address</label>
							  <div class="col-lg-8">
							    <textarea class="form-control" rows="3" name="PermanentAddress" id="PermanentAddress"><?= set_value('PermanentAddress',$Client['PermanentAddress']) ?></textarea>
							  </div>
							</div>
							<div class="form-group">
							  <label for="PresentAddress" class="col-lg-4 control-label">Present Address</label>
							  <div class="col-lg-8">
							    <textarea class="form-control" rows="3" name="PresentAddress" id="PresentAddress"><?= set_value('PresentAddress',$Client['PresentAddress']) ?></textarea>
							  </div>
							</div>
							<div class="form-group">
							  <label for="PhoneNo" class="col-lg-4 control-label">PhoneNo</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="PhoneNo" value="<?= set_value('PhoneNo',$Client['PhoneNo']) ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="Birthdate" class="col-lg-4 control-label">Birthdate</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control datepicker" name="Birthdate" value="<?= set_value('Birthdate',$Client['Birthdate']) ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="NationalIdNo" class="col-lg-4 control-label">NationalIdNo</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="NationalIdNo" value="<?= set_value('NationalIdNo',$Client['NationalIdNo']) ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="BloodGroup" class="col-lg-4 control-label">BloodGroup</label>
							  <div class="col-lg-8">
							    <select class="form-control" id="BloodGroup" name="BloodGroup">
								<?php foreach ($BloodGroupList as $key => $value):?>
									<?php if ($key === $Client['BloodGroup']):?>
										<option selected="selected" value="<?= $key?>"><?= $value?></option>
									<?php else: ?>
										<option value="<?= $key?>"><?= $value?></option>
								    <?php endif; ?>
								<?php endforeach; ?>
							    </select>
							  </div>
							</div>
							<div class="form-group">
							  <label for="Type" class="col-lg-4 control-label">Type</label>
							  <div class="col-lg-8">
							    <select class="form-control" id="Type" name="Type">
								<?php foreach ($ClientTypeList as $key => $value):?>
									<?php if ($key === $Client['Type']):?>
										<option selected="selected" value="<?= $key?>"><?= $value?></option>
									<?php else: ?>
										<option value="<?= $key?>"><?= $value?></option>
		                            <?php endif; ?>
								<?php endforeach; ?>
							    </select>
							  </div>
							</div>
							<input type="hidden" name="UserId" value="<?= $Client['UserId'] ?>">
							<div class="form-group">
							  <div class="col-lg-8 col-lg-offset-4">
							    <input type="submit" class="btn btn-success" name="Update" value="Update"></input>
							  </div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>