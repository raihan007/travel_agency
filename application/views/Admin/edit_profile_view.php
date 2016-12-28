			<div class="row">
				<div class="col-sm-12">
					<form method="POST" action="" name="SignUpForm" enctype="multipart/form-data">
						<table align="center" class="form-table">
							<tr>
								<td align="center" style="color: red;" colspan="2">
									<?php echo $message; ?>
								</td>
							</tr>
							
							<tr>
								<td>Entity No.</td>
								<td><input type="text" name="EntityNo" value="<?= $Client['EntityNo'] ?>" readonly></input></td>
							</tr>
							<tr>
								<td>First Name</td>
								<td><input type="text" name="FirstName" value="<?= set_value('FirstName',$Client['FirstName']) ?>"></input></td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td><input type="text" name="LastName" value="<?= set_value('LastName',$Client['LastName']) ?>"></input></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td>
									<?php if ($Client['Gender'] === 'Male'):?>
										<input type="radio" name="Gender" checked="checked" value="Male"/>Male
										<input type="radio" name="Gender" value="Female"/>Female
									<?php else: ?>
										<input type="radio" name="Gender" value="Male"/>Male
										<input type="radio" name="Gender" checked="checked" value="Female"/>Female
				                    <?php endif; ?>
								</td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="text" name="Email" value="<?= set_value('Email',$Client['Email']) ?>"></input></td>
							</tr>
							<tr>
								<td>Photo</td>
								<td>
									<img id="Image" class="img-responsive" style='height: 170px; width: 170px;' src="<?php echo base_url('Public/Photos/Clients/'.$Client['Photo']); ?>" /><br/>
									<div style="margin-top: 5px;" class="input-group">
						              <label class="input-group-btn">
						                  <span class="btn btn-default">
						                      Browse  <input type="file" name="Photo" style="display: none;">
						                  </span>
						              </label>
						              <input type="text" class="form-control" readonly style="margin-left: 8px;">
						            </div>
								</td>
							</tr>
							<tr>
								<td>Permanent Address</td>
								<td><textarea rows="4" cols="21" name="PermanentAddress" ><?= set_value('PermanentAddress',$Client['PermanentAddress']) ?></textarea></td>
							</tr>
							<tr>
								<td>Present Address</td>
								<td><textarea rows="4" cols="21" name="PresentAddress" ><?= set_value('PresentAddress',$Client['PresentAddress']) ?></textarea></td>
							</tr>
							<tr>
								<td>Phone No.</td>
								<td><input type="text" name="PhoneNo" value="<?= set_value('PhoneNo',$Client['PhoneNo']) ?>"></input></td>
							</tr>
							<tr>
								<td>Birthdate</td>
								<td><input type="text" name="Birthdate" value="<?= set_value('Birthdate',$Client['Birthdate']) ?>"></input></td>
							</tr>
							<tr>
								<td>BloodGroup</td>
								<td>
									<select name="BloodGroup">
										<?php foreach ($BloodGroupList as $key => $value):?>
											<?php if ($key === $Client['BloodGroup']):?>
												<option selected="selected" value="<?= $key?>"><?= $value?></option>
											<?php else: ?>
												<option value="<?= $key?>"><?= $value?></option>
				                            <?php endif; ?>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr>
								<td>National Id No.</td>
								<td><input type="text" name="NationalIdNo" value="<?= set_value('NationalIdNo',$Client['NationalIdNo']) ?>"></input></td>
							</tr>
							<tr>
								<td>Type</td>
								<td>
									<select name="Type">
										<?php foreach ($ClientTypeList as $key => $value):?>
											<?php if ($key === $Client['Type']):?>
												<option selected="selected" value="<?= $key?>"><?= $value?></option>
											<?php else: ?>
												<option value="<?= $key?>"><?= $value?></option>
				                            <?php endif; ?>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr>
								<td style="text-align: right;" ></td>
								<td><input type="submit" class="btn btn-success" name="Update" value="Update"></input></td>
							</tr>
						</table>
					</form>
				</div>
			</div>