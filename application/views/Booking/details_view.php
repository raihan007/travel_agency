			<div class="row">
				<div class="col-md-12">
					<dl class="dl-horizontal detailsView">
						<dt>Entity No :</dt>
						<dd><?= $Booking['EntityNo'] ?></dd>
						<dt>Title :</dt>
						<dd><?= $Package['Title'] ?></dd>
						<dt>Tickets Quantity :</dt>
						<dd><?= $Booking['Quantity'] ?></dd>
						<dt>Cost :</dt>
						<dd><?= $Package['Cost'] ?></dd>
						<dt>Discount :</dt>
						<dd><?= $Package['Discount'] ?></dd>
						<dt>Total Cost :</dt>
						<dd><?= $Booking['TotalCost'] ?></dd>
						<dt>Booking Date :</dt>
						<dd><?= $Booking['Date'] ?></dd>
						<dt>Client :</dt>
						<dd><?= $Client['FirstName'].' '.$Client['LastName'] ?></dd>
						<dt></dt>
						<dd><a class="btn btn-info" href="/travel_agency/Booking/Edit/<?=$Booking['EntityNo']?>">Update</a></dd>
					</dl>
				</div>
			</div>