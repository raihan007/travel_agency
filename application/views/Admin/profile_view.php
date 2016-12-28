<div class="row">
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
	<div class="col-md-12">
		<dl class="dl-horizontal detailsView">
			<dt>Entity No :</dt>
			<dd><?= $Employee['EntityNo'] ?></dd>
			<dt>Username :</dt>
			<dd><?= $Employee['Username'] ?></dd>
			<dt>First Name :</dt>
			<dd><?= $Employee['FirstName'] ?></dd>
			<dt>Last Name :</dt>
			<dd><?= $Employee['LastName'] ?></dd>
			<dt>Gender :</dt>
			<dd><?= $Employee['Gender'] ?></dd>
			<dt>Photo :</dt>
			<dd><img style='height: 150px; width: 150px;' src="<?php echo base_url('Public/Photos/Clients/'.$Employee['Photo']); ?>" /></dd>
			<dt>Email :</dt>
			<dd><?= $Employee['Email'] ?></dd>
			<dt>Phone No. :</dt>
			<dd><?= $Employee['PhoneNo'] ?></dd>
			<dt>Date of Birth :</dt>
			<dd><?= $Employee['Birthdate'] ?></dd>
			<dt>Permanent Address :</dt>
			<dd><?= $Employee['PermanentAddress'] ?></dd>
			<dt>Present Address :</dt>
			<dd><?= $Employee['PresentAddress'] ?></dd>
			<dt>National Id Card No. :</dt>
			<dd><?= $Employee['NationalIdNo'] ?></dd>
			<dt>Blood Group :</dt>
			<dd><?= $Employee['BloodGroup'] ?></dd>
			<dt>Type :</dt>
			<dd><?= $Employee['Type'] ?></dd>
			<dd  style="text-align: center;" colspan="2">
				<a class="btn btn-primary" href="/travel_agency/Profile/Update/<?=$Employee['EntityNo']?>">Update Profile Details</a>
			</dd>
		</dl>
	</div>
</div>