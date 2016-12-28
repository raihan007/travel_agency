<div class="container">
  <div class="row text-center">
    <h3>Dream Travel Limited</h3>
    <small>24 Hours Service</small>
  </div>
  <div class="row text-center">
    <h4 class="text-info">Register Your Account</h4>
  </div>
  <div class="row">
    <div class="text-center">
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
      <div class="text-center">
        <h5 class="text-danger">{message}</h5>
      </div>
    </div>
  </div>
  <div class="row">
    <form class="form-horizontal" method="POST" action="" name="SignUpForm" enctype="multipart/form-data">
      <div class="col-md-6">
        <div class="form-group">
          <label for="EntityNo" class="col-sm-2 control-label">Entity No.</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="EntityNo" id="EntityNo" value="{NextEntityNo}" placeholder="EntityNo">
          </div>
        </div>
        <div class="form-group">
          <label for="FirstName" class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="FirstName" id="FirstName" value="<?= set_value('FirstName') ?>" placeholder="First Name">
          </div>
        </div>
        <div class="form-group">
          <label for="LastName" class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="LastName" id="LastName" value="<?= set_value('LastName') ?>" placeholder="LastName">
          </div>
        </div>
        <div class="form-group">
          <label for="Gender" class="col-sm-2 control-label">Gender</label>
          <div class="col-lg-10">
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
          </div>
        </div>
        <div class="form-group">
          <label for="Email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="Email" id="Email" value="<?= set_value('Email') ?>" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="Photo" class="col-sm-2 control-label">Photo</label>
          <div class="col-sm-10">
            <img id="Image" style='height: 170px; width: 170px;' src="<?php echo base_url('Public/Photos/Clients/user.jpg'); ?>" /><br/>
           
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
          <label for="Birthdate" class="col-sm-2 control-label">Birthdate</label>
          <div class="col-sm-10">
            <input type="text" class="datepicker form-control" name="Birthdate" id="Birthdate" value="<?= set_value('Birthdate') ?>" placeholder="Birthdate">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="PhoneNo" class="col-sm-4 control-label">Phone No.</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="PhoneNo" id="PhoneNo" value="<?= set_value('PhoneNo') ?>" placeholder="Phone Number">
          </div>
        </div>
        <div class="form-group">
          <label for="PermanentAddress" class="col-sm-4 control-label">Permanent Address</label>
          <div class="col-sm-8">
            <textarea rows="4" cols="21" class="form-control" name="PermanentAddress" id="PermanentAddress" value="<?= set_value('PermanentAddress') ?>" placeholder="PermanentAddress"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="PresentAddress" class="col-sm-4 control-label">Present Address</label>
          <div class="col-sm-8">
            <textarea rows="4" cols="21" class="form-control" name="PresentAddress" id="PresentAddress" value="<?= set_value('PresentAddress') ?>" placeholder="PresentAddress"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label for="BloodGroup" class="col-sm-4 control-label">Blood Group</label>
          <div class="col-sm-8">
            <select name="BloodGroup" class="form-control">
              <?php foreach ($BloodGroupList as $key => $value):?>
                  <option value="<?= $key?>" <?php echo set_value('BloodGroup') == $key ? "selected" : ""; ?>><?= $value?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="NationalIdNo" class="col-sm-4 control-label">National Id No.</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="NationalIdNo" id="NationalIdNo" value="<?= set_value('NationalIdNo') ?>" placeholder="National Id Number">
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
      </div>
      <div class="col-md-12 text-center">
        <div class="form-group">
          <div class="col-sm-12">
            <a href="/travel_agency/Login" class="btn btn-info">Back</a>
            <input type="submit" name="SignUp" value="Sign-Up" class="btn btn-success">
          </div>
        </div>
      </div>
    </form>
  </div>
</div>