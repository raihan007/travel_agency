<div class="row">
				<div class="col-md-12">
					<dl class="dl-horizontal detailsView">
						<dt>Entity No :</dt>
						<dd><?= $Package['EntityNo'] ?></dd>
						<dt>Username :</dt>
						<dd><?= $Package['Title'] ?></dd>
						<dt>First Name :</dt>
						<dd><?= $Package['Cost'] ?></dd>
						<dd>
						<?php if($Package['Gallery'] == '1'): ?>
						<?php foreach ($Package['Images'] as $key => $value) :?>
		                    <img id="Image" height='100' width='100' src="<?php echo base_url('Public/Photos/Packages/'.$value); ?>" />
		            	<?php endforeach; ?>
		            	<br/><a style="margin-top: 5px;" class="btn btn-success" href="<?= base_url('Packages/Gallery/'.$Package['EntityNo']) ?>">See Gallery Here</a>
			            <?php else: ?>
			            	No Photos Available!
			            <?php endif; ?>
						</dd>
						<dt>Email :</dt>
						<dd><?= $Package['Type'] ?></dd>
						<dt>Phone No. :</dt>
						<dd><?= $Package['Discount'] ?></dd>
						<dt>Date of Birth :</dt>
						<dd><?= $Package['BookingLastDate'] ?></dd>
						<dt>Permanent Address :</dt>
						<dd><?= $Package['Remarks'] ?></dd>
						<dt></dt>
						<dd><a class="btn btn-primary" href="/travel_agency/Booking/Reservation/<?= $EntityNo?>">Book Now!</a></dd>
					</dl>
				</div>
			</div>