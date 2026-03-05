<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA USER</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Create Time <?php echo form_error('create_time') ?></td><td><input type="text" class="form-control" name="create_time" id="create_time" placeholder="Create Time" value="<?php echo $create_time; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Update Time <?php echo form_error('update_time') ?></td><td><input type="text" class="form-control" name="update_time" id="update_time" placeholder="Update Time" value="<?php echo $update_time; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Visit Time <?php echo form_error('visit_time') ?></td><td><input type="text" class="form-control" name="visit_time" id="visit_time" placeholder="Visit Time" value="<?php echo $visit_time; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Verified Time <?php echo form_error('verified_time') ?></td><td><input type="text" class="form-control" name="verified_time" id="verified_time" placeholder="Verified Time" value="<?php echo $verified_time; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Code <?php echo form_error('code') ?></td><td><input type="text" class="form-control" name="code" id="code" placeholder="Code" value="<?php echo $code; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Fullname <?php echo form_error('fullname') ?></td><td><input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" value="<?php echo $fullname; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Gender <?php echo form_error('gender') ?></td><td><input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="<?php echo $gender; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Birth <?php echo form_error('birth') ?></td>
						<td><input type="date" class="form-control" name="birth" id="birth" placeholder="Birth" value="<?php echo $birth; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Phone <?php echo form_error('phone') ?></td><td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Email <?php echo form_error('email') ?></td><td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Username <?php echo form_error('username') ?></td><td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Password <?php echo form_error('password') ?></td><td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Description <?php echo form_error('description') ?></td>
						<td> <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Level <?php echo form_error('level') ?></td><td><input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Division <?php echo form_error('division') ?></td><td><input type="text" class="form-control" name="division" id="division" placeholder="Division" value="<?php echo $division; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Division Sub <?php echo form_error('division_sub') ?></td><td><input type="text" class="form-control" name="division_sub" id="division_sub" placeholder="Division Sub" value="<?php echo $division_sub; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Image <?php echo form_error('image') ?></td><td><input type="text" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Ipaddress <?php echo form_error('ipaddress') ?></td><td><input type="text" class="form-control" name="ipaddress" id="ipaddress" placeholder="Ipaddress" value="<?php echo $ipaddress; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Active <?php echo form_error('active') ?></td><td><input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Token <?php echo form_error('token') ?></td><td><input type="text" class="form-control" name="token" id="token" placeholder="Token" value="<?php echo $token; ?>" /></td>
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
						<td width='200'>Rt Id <?php echo form_error('rt_id') ?></td><td><input type="text" class="form-control" name="rt_id" id="rt_id" placeholder="Rt Id" value="<?php echo $rt_id; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Rw Id <?php echo form_error('rw_id') ?></td><td><input type="text" class="form-control" name="rw_id" id="rw_id" placeholder="Rw Id" value="<?php echo $rw_id; ?>" /></td>
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
						<td width='200'>Nik <?php echo form_error('nik') ?></td><td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pekerjaan <?php echo form_error('pekerjaan') ?></td><td><input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Penyandang Disabilitas <?php echo form_error('penyandang_disabilitas') ?></td><td><input type="text" class="form-control" name="penyandang_disabilitas" id="penyandang_disabilitas" placeholder="Penyandang Disabilitas" value="<?php echo $penyandang_disabilitas; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Alamat Domisili <?php echo form_error('alamat_domisili') ?></td><td><input type="text" class="form-control" name="alamat_domisili" id="alamat_domisili" placeholder="Alamat Domisili" value="<?php echo $alamat_domisili; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Lahir <?php echo form_error('tgl_lahir') ?></td>
						<td><input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pihak Konfirmasi <?php echo form_error('pihak_konfirmasi') ?></td><td><input type="text" class="form-control" name="pihak_konfirmasi" id="pihak_konfirmasi" placeholder="Pihak Konfirmasi" value="<?php echo $pihak_konfirmasi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Email Pihak Konfirmasi <?php echo form_error('email_pihak_konfirmasi') ?></td><td><input type="text" class="form-control" name="email_pihak_konfirmasi" id="email_pihak_konfirmasi" placeholder="Email Pihak Konfirmasi" value="<?php echo $email_pihak_konfirmasi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Hp Konfirmasi <?php echo form_error('hp_konfirmasi') ?></td><td><input type="text" class="form-control" name="hp_konfirmasi" id="hp_konfirmasi" placeholder="Hp Konfirmasi" value="<?php echo $hp_konfirmasi; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('kelola_register') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>