<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_USER</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
                                    <tr>
						<td width='200'>Nik <?php echo form_error('nik') ?></td><td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Lengkap <?php echo form_error('full_name') ?></td><td><input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kota Lahir <?php echo form_error('kota_lahir') ?></td><td><input type="text" class="form-control" name="kota_lahir" id="kota_lahir" placeholder="Kota Lahir" value="<?php echo $kota_lahir; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Lahir <?php echo form_error('birth') ?></td>
						<td><input type="date" class="form-control" name="birth" id="birth" placeholder="Birth" value="<?php echo $birth; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Email <?php echo form_error('email') ?></td><td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
					</tr>
	    
				
	
					<input type="hidden" class="form-control" name="id_user_level" id="id_user_level" placeholder="Id User Level" value="2" />
                           
	
					<input type="hidden" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="1" />
	
					<tr>
						<td width='200'>Username <?php echo form_error('username') ?></td><td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td>
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
						<td width='200'>Pekerjaan <?php echo form_error('pekerjaan') ?></td><td><input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Penyandang Disabilitas <?php echo form_error('penyandang_disabilitas') ?></td><td><input type="text" class="form-control" name="penyandang_disabilitas" id="penyandang_disabilitas" placeholder="Penyandang Disabilitas" value="<?php echo $penyandang_disabilitas; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Alamat Domisili <?php echo form_error('alamat_domisili') ?></td>
						<td> <textarea class="form-control" rows="3" name="alamat_domisili" id="alamat_domisili" placeholder="Alamat Domisili"><?php echo $alamat_domisili; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Pihak Konfirmasi <?php echo form_error('pihak_konfirmasi') ?></td><td><input type="text" class="form-control" name="pihak_konfirmasi" id="pihak_konfirmasi" placeholder="Pihak Konfirmasi" value="<?php echo $pihak_konfirmasi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Email Konfirmasi <?php echo form_error('email_konfirmasi') ?></td><td><input type="text" class="form-control" name="email_konfirmasi" id="email_konfirmasi" placeholder="Email Konfirmasi" value="<?php echo $email_konfirmasi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Hp Konfirmasi <?php echo form_error('hp_konfirmasi') ?></td><td><input type="text" class="form-control" name="hp_konfirmasi" id="hp_konfirmasi" placeholder="Hp Konfirmasi" value="<?php echo $hp_konfirmasi; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Ket Laporan <?php echo form_error('ket_laporan') ?></td>
						<td> <textarea class="form-control" rows="3" name="ket_laporan" id="ket_laporan" placeholder="Ket Laporan"><?php echo $ket_laporan; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Create Time <?php echo form_error('create_time') ?></td><td><input type="text" class="form-control" name="create_time" id="create_time" placeholder="Create Time" value="<?php echo $create_time; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Update Time <?php echo form_error('update_time') ?></td><td><input type="text" class="form-control" name="update_time" id="update_time" placeholder="Update Time" value="<?php echo $update_time; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_users" value="<?php echo $id_users; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('kelola_pendaftaran') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>