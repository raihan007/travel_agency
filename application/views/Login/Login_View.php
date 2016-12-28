<div class="container text-center">
  <div class="row">
    <h3>Dream Travel Limited</h3>
    <small>24 Hours Service</small>
  </div>
  <div class="row">
    <h4 class="text-info">LOGIN HERE</h4>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
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
      <form class="form-horizontal" method="POST" action="" name="login">
        <div class="form-group">
          <label for="Username" class="col-sm-2 control-label">Username</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="Username" id="Username" value="<?= set_value('Username') ?>" placeholder="Email or Username">
          </div>
        </div>
        <div class="form-group">
          <label for="Password" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" name="Password" class="form-control" id="Password" value="<?= set_value('Password') ?>" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <a href="/travel_agency" class="btn btn-success">Home</a>
            <input type="submit" name="signin" value="Sign-In" class="btn btn-info">
          </div>
        </div>
      </form>
      <h5 class="message">Not registered? <a href="Login/SignUp">Create an account</a></h5>
    </div>
  </div>
</div>
