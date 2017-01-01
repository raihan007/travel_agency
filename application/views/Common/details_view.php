			<div class="row">
				<div class="col-md-12">
					<dl class="dl-horizontal detailsView">
						<dt>Title :</dt>
						<dd><?= $Package['Title'] ?></dd>
						<dt>Cost :</dt>
						<dd><?= $Package['Cost'] ?></dd>
						<dt>Photos :</dt>
						<dd>
						<?php if($Package['Gallery'] == '1'): ?>
						<?php foreach ($Package['Images'] as $key => $value) :?>
		                    <img id="Image" height='100' width='100' src="<?php echo base_url('Public/Photos/Packages/'.$value); ?>" />
		            	<?php endforeach; ?>
			            <?php else: ?>
			            	No Photos Available!
			            <?php endif; ?>
						</dd>
						<dt>Type :</dt>
						<dd><?= $Package['Type'] ?></dd>
						<dt>Discount :</dt>
						<dd><?= $Package['Discount'] ?></dd>
						<dt>Last Booking Date :</dt>
						<dd><?= $Package['BookingLastDate'] ?></dd>
						<dt>Remarks :</dt>
						<dd><?= $Package['Remarks'] ?></dd>
						<dt></dt>
						<dd><a class="btn btn-info" href="http://localhost/travel_agency/TourPackages">Back</a>
						<a class="btn btn-default" href="/travel_agency/Home/Booking">Take Seat</a>
						</dd>
					</dl>
				</div>
			</div>