			<div class="row">
				<div class="col-sm-12 text-center text-danger">
					{message}
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<form class="form-horizontal" method="POST" action="" name="ClientInfoForm" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
							  <label for="EntityNo" class="col-lg-4 control-label">Entity No.</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="EntityNo" value="<?= $NextEntityNo ?>" readonly></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="FirstName" class="col-lg-4 control-label">First Name</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="FirstName" value="<?= set_value('FirstName') ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="LastName" class="col-lg-4 control-label">Last Name</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="LastName" value="<?= set_value('LastName') ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-lg-4 control-label">Gender</label>
							  <div class="col-lg-8">
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
							  </div>
							</div>
							<div class="form-group">
							  <label for="Email" class="col-lg-4 control-label">Email</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="Email" value="<?= set_value('Email') ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="Photo" class="col-lg-4 control-label">Photo</label>
							  <div class="col-lg-8">
							  	<img id="Image" class="form-control img-responsive" style='height: 170px; width: 170px;' src="<?php echo base_url('Public/Photos/Clients/user.jpg'); ?>" />
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
							  <label for="PermanentAddress" class="col-lg-4 control-label">Permanent Address</label>
							  <div class="col-lg-8">
							    <textarea class="form-control" rows="3" name="PermanentAddress" id="PermanentAddress"><?= set_value('PermanentAddress')?></textarea>
							  </div>
							</div>
							<div class="form-group">
							  <label for="PresentAddress" class="col-lg-4 control-label">Present Address</label>
							  <div class="col-lg-8">
							    <textarea class="form-control" rows="3" name="PresentAddress" id="PresentAddress"><?= set_value('PresentAddress')?></textarea>
							  </div>
							</div>
							<div class="form-group">
							  <label for="PhoneNo" class="col-lg-4 control-label">PhoneNo</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="PhoneNo" value="<?= set_value('PhoneNo') ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="Birthdate" class="col-lg-4 control-label">Birthdate</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control datepicker" name="Birthdate" value="<?= set_value('Birthdate') ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="NationalIdNo" class="col-lg-4 control-label">NationalIdNo</label>
							  <div class="col-lg-8">
							    <input type="text" class="form-control" name="NationalIdNo" value="<?= set_value('NationalIdNo') ?>"></input>
							  </div>
							</div>
							<div class="form-group">
							  <label for="BloodGroup" class="col-lg-4 control-label">BloodGroup</label>
							  <div class="col-lg-8">
							    <select class="form-control" id="BloodGroup" name="BloodGroup">
								<?php foreach ($BloodGroupList as $key => $value):?>
									<option value="<?= $key?>"><?= $value?></option>
								<?php endforeach; ?>
							    </select>
							  </div>
							</div>
							<div class="form-group">
							  <label for="Type" class="col-lg-4 control-label">Type</label>
							  <div class="col-lg-8">
							    <select class="form-control" id="Type" name="Type">
								<?php foreach ($ClientTypeList as $key => $value):?>
									<option value="<?= $key?>"><?= $value?></option>
								<?php endforeach; ?>
							    </select>
							  </div>
							</div>
							<div class="form-group">
								<label for="Username" class="col-sm-4 control-label">Username</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" name="Username" id="Username" value="<?= set_value('Username') ?>" placeholder="Username">
								</div>
							</div>
							<div class="form-group">
								<label for="Password" class="col-sm-4 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<label for="ConfirmPassword" class="col-sm-4 control-label">Confirm Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password">
								</div>
							</div>
							<div class="form-group">
							  <div class="col-lg-8 col-lg-offset-4">
							    <input type="submit" class="btn btn-success" name="AddClient" value="Add Client"></input>
							  </div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>


<!-- <div class="row">
	<div class="col-md-12">
		<form method="POST" action="" name="ClientInfoForm" enctype="multipart/form-data">
			<table align="center" >
				<tr>
					<td align="center" style="color: red;" colspan="2">
						<?php echo $message; ?>
					</td>
				</tr>
				<tr>
					<td>Entity No.</td>
					<td><input type="text" class="form-control" name="EntityNo" value="<?= $NextEntityNo ?>" readonly></input></td>
				</tr>
				<tr>
					<td>First Name</td>
					<td><input type="text" class="form-control" name="FirstName" value="<?= set_value('FirstName') ?>"></input></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" class="form-control" name="LastName" value="<?= set_value('LastName') ?>"></input></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
						<div class="radio">
				          <label>
				            <input type="radio" name="Gender" value="Male" <?php echo set_value('Gender') == 'Male' ? "checked" : ""; ?> />Male
				          </label>
				        </div>
				        <div class="radio">
				          <label>
				            <input type="radio" name="Gender" value="Female" <?php echo set_value('Gender') == 'Female' ? "checked" : "";?>/>Female
				          </label>
				        </div>
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" class="form-control" name="Email" value="<?= set_value('Email') ?>"></input></td>
				</tr>
				<tr>
					<td>Photo</td>
					<td>
						<img id="Image" class="form-control img-responsive" style='height: 170px; width: 170px;' src="<?php echo base_url('Public/Photos/Clients/user.jpg'); ?>" /><br/>
						<input type="file" name="Photo" onchange="readURL(this);"></input>
					</td>
				</tr>
				<tr>
					<td>Permanent Address</td>
					<td><textarea class="form-control" rows="4" cols="21" name="PermanentAddress" ><?php echo set_value('PermanentAddress')?></textarea></td>
				</tr>
				<tr>
					<td>Present Address</td>
					<td><textarea class="form-control" rows="4" cols="21" name="PresentAddress" ><?php echo set_value('PresentAddress')?></textarea></td>
				</tr>
				<tr>
					<td>Phone No.</td>
					<td><input type="text" class="form-control" name="PhoneNo" value="<?= set_value('PhoneNo') ?>"></input></td>
				</tr>
				<tr>
					<td>Birthdate</td>
					<td><input type="text" class="form-control" name="Birthdate" value="<?= set_value('Birthdate') ?>"></input></td>
				</tr>
				<tr>
					<td>BloodGroup</td>
					<td>
						<select name="BloodGroup" class="form-control" >
							<?php foreach ($BloodGroupList as $key => $value):?>
									<option value="<?= $key?>" <?php echo set_value('BloodGroup') == $key ? "selected" : ""; ?>><?= $value?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>National Id No.</td>
					<td><input type="text" class="form-control" name="NationalIdNo" value="<?= set_value('NationalIdNo') ?>"></input></td>
				</tr>
				<tr>
					<td>Type</td>
					<td>
						<select name="Type" class="form-control" >
							<?php foreach ($ClientTypeList as $key => $value):?>
								<option value="<?= $key?>" <?php echo set_value('Type') == $key ? "selected" : ""; ?>><?= $value?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" class="form-control" name="Username" value="<?= set_value('Username') ?>"></input></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="Password" class="form-control" name="Password"></input></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="Password" class="form-control" name="ConfirmPassword"></input></td>
				</tr>
				<tr>
					<td style="text-align: right;" >
					<a class="btn btn-success" href="/travel_agency/Client/AllClients">All Clients List</a>&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<input type="submit" class="btn btn-info" name="AddClient" value="Save"></input>&nbsp;&nbsp;&nbsp;
						<a class="btn btn-default" href="/travel_agency/Admin">Home</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div> -->