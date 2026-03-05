<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_USER</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Full Name <?php echo form_error('full_name') ?></td><td><input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Email <?php echo form_error('email') ?></td><td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Password <?php echo form_error('password') ?></td><td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Images <?php echo form_error('images') ?></td>
						<td> <textarea class="form-control" rows="3" name="images" id="images" placeholder="Images"><?php echo $images; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Id User Level <?php echo form_error('id_user_level') ?></td><td><input type="text" class="form-control" name="id_user_level" id="id_user_level" placeholder="Id User Level" value="<?php echo $id_user_level; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Is Aktif <?php echo form_error('is_aktif') ?></td><td><input type="text" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="<?php echo $is_aktif; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Username <?php echo form_error('username') ?></td><td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Skpd <?php echo form_error('id_skpd') ?></td><td><input type="text" class="form-control" name="id_skpd" id="id_skpd" placeholder="Id Skpd" value="<?php echo $id_skpd; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Province Id <?php echo form_error('province_id') ?></td><td><input type="text" class="form-control" name="province_id" id="province_id" placeholder="Province Id" value="<?php echo $province_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Regency Id <?php echo form_error('regency_id') ?></td><td><input type="text" class="form-control" name="regency_id" id="regency_id" placeholder="Regency Id" value="<?php echo $regency_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>District Id <?php echo form_error('district_id') ?></td><td><input type="text" class="form-control" name="district_id" id="district_id" placeholder="District Id" value="<?php echo $district_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Village Id <?php echo form_error('village_id') ?></td><td><input type="text" class="form-control" name="village_id" id="village_id" placeholder="Village Id" value="<?php echo $village_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Rw Id <?php echo form_error('rw_id') ?></td><td><input type="text" class="form-control" name="rw_id" id="rw_id" placeholder="Rw Id" value="<?php echo $rw_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Rt Id <?php echo form_error('rt_id') ?></td><td><input type="text" class="form-control" name="rt_id" id="rt_id" placeholder="Rt Id" value="<?php echo $rt_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Verified Email <?php echo form_error('verified_email') ?></td><td><input type="text" class="form-control" name="verified_email" id="verified_email" placeholder="Verified Email" value="<?php echo $verified_email; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Google Id <?php echo form_error('google_id') ?></td><td><input type="text" class="form-control" name="google_id" id="google_id" placeholder="Google Id" value="<?php echo $google_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Google Image <?php echo form_error('google_image') ?></td><td><input type="text" class="form-control" name="google_image" id="google_image" placeholder="Google Image" value="<?php echo $google_image; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Division Sub <?php echo form_error('division_sub') ?></td><td><input type="text" class="form-control" name="division_sub" id="division_sub" placeholder="Division Sub" value="<?php echo $division_sub; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_users" value="<?php echo $id_users; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('tbl_user') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>