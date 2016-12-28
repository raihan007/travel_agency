<div class="row">
				<div class="col-md-12">
					<dl class="dl-horizontal detailsView">
						<dt>Entity No :</dt>
						<dd><?= $Client['EntityNo'] ?></dd>
						<dt>Username :</dt>
						<dd><?= $Client['Username'] ?></dd>
						<dt>First Name :</dt>
						<dd><?= $Client['FirstName'] ?></dd>
						<dt>Last Name :</dt>
						<dd><?= $Client['LastName'] ?></dd>
						<dt>Gender :</dt>
						<dd><?= $Client['Gender'] ?></dd>
						<dt>Photo :</dt>
						<dd><img style='height: 150px; width: 150px;' src="<?php echo base_url('Public/Photos/Clients/'.$Client['Photo']); ?>" /></dd>
						<dt>Email :</dt>
						<dd><?= $Client['Email'] ?></dd>
						<dt>Phone No. :</dt>
						<dd><?= $Client['PhoneNo'] ?></dd>
						<dt>Date of Birth :</dt>
						<dd><?= $Client['Birthdate'] ?></dd>
						<dt>Permanent Address :</dt>
						<dd><?= $Client['PermanentAddress'] ?></dd>
						<dt>Present Address :</dt>
						<dd><?= $Client['PresentAddress'] ?></dd>
						<dt>National Id Card No. :</dt>
						<dd><?= $Client['NationalIdNo'] ?></dd>
						<dt>Blood Group :</dt>
						<dd><?= $Client['BloodGroup'] ?></dd>
						<dt>Type :</dt>
						<dd><?= $Client['Type'] ?></dd>
						<dt></dt>
						<dd>
							<h3>Are You Sure?</h3>
							<form method="POST">
								<input type="hidden" value="<?=$Client['EntityNo']?>"></input>
								<input type="submit" class="btn btn-danger" name="Remove" value="Remove"></input>
							</form>
						</dd>
					</dl>
					
				</div>
			</div>