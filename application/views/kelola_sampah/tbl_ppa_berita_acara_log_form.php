<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_PPA_BERITA_ACARA_LOG</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Berita Acara Status <?php echo form_error('berita_acara_status') ?></td><td><input type="text" class="form-control" name="berita_acara_status" id="berita_acara_status" placeholder="Berita Acara Status" value="<?php echo $berita_acara_status; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Berita Acara Dihentikan <?php echo form_error('berita_acara_dihentikan') ?></td>
						<td> <textarea class="form-control" rows="3" name="berita_acara_dihentikan" id="berita_acara_dihentikan" placeholder="Berita Acara Dihentikan"><?php echo $berita_acara_dihentikan; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Berita Acara Kode <?php echo form_error('berita_acara_kode') ?></td><td><input type="text" class="form-control" name="berita_acara_kode" id="berita_acara_kode" placeholder="Berita Acara Kode" value="<?php echo $berita_acara_kode; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Berita Acara Tgl <?php echo form_error('berita_acara_tgl') ?></td>
						<td><input type="date" class="form-control" name="berita_acara_tgl" id="berita_acara_tgl" placeholder="Berita Acara Tgl" value="<?php echo $berita_acara_tgl; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Berita Acara Hari <?php echo form_error('berita_acara_hari') ?></td><td><input type="text" class="form-control" name="berita_acara_hari" id="berita_acara_hari" placeholder="Berita Acara Hari" value="<?php echo $berita_acara_hari; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Berita Acara Kronologi <?php echo form_error('berita_acara_kronologi') ?></td>
						<td> <textarea class="form-control" rows="3" name="berita_acara_kronologi" id="berita_acara_kronologi" placeholder="Berita Acara Kronologi"><?php echo $berita_acara_kronologi; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Berita Acara Penerima Laporan <?php echo form_error('berita_acara_penerima_laporan') ?></td><td><input type="text" class="form-control" name="berita_acara_penerima_laporan" id="berita_acara_penerima_laporan" placeholder="Berita Acara Penerima Laporan" value="<?php echo $berita_acara_penerima_laporan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Berita Acara Kepala Uptd <?php echo form_error('berita_acara_kepala_uptd') ?></td><td><input type="text" class="form-control" name="berita_acara_kepala_uptd" id="berita_acara_kepala_uptd" placeholder="Berita Acara Kepala Uptd" value="<?php echo $berita_acara_kepala_uptd; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Berita Acara Keterangan <?php echo form_error('berita_acara_keterangan') ?></td><td><input type="text" class="form-control" name="berita_acara_keterangan" id="berita_acara_keterangan" placeholder="Berita Acara Keterangan" value="<?php echo $berita_acara_keterangan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Nama <?php echo form_error('pelapor_nama') ?></td><td><input type="text" class="form-control" name="pelapor_nama" id="pelapor_nama" placeholder="Pelapor Nama" value="<?php echo $pelapor_nama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Tgl <?php echo form_error('pelapor_tgl') ?></td>
						<td><input type="date" class="form-control" name="pelapor_tgl" id="pelapor_tgl" placeholder="Pelapor Tgl" value="<?php echo $pelapor_tgl; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Tempat <?php echo form_error('pelapor_tempat') ?></td><td><input type="text" class="form-control" name="pelapor_tempat" id="pelapor_tempat" placeholder="Pelapor Tempat" value="<?php echo $pelapor_tempat; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Idusers <?php echo form_error('pelapor_idusers') ?></td><td><input type="text" class="form-control" name="pelapor_idusers" id="pelapor_idusers" placeholder="Pelapor Idusers" value="<?php echo $pelapor_idusers; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Nik <?php echo form_error('pelapor_nik') ?></td><td><input type="text" class="form-control" name="pelapor_nik" id="pelapor_nik" placeholder="Pelapor Nik" value="<?php echo $pelapor_nik; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Pekerjaan <?php echo form_error('pelapor_pekerjaan') ?></td><td><input type="text" class="form-control" name="pelapor_pekerjaan" id="pelapor_pekerjaan" placeholder="Pelapor Pekerjaan" value="<?php echo $pelapor_pekerjaan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Telepon <?php echo form_error('pelapor_telepon') ?></td><td><input type="text" class="form-control" name="pelapor_telepon" id="pelapor_telepon" placeholder="Pelapor Telepon" value="<?php echo $pelapor_telepon; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Kab <?php echo form_error('pelapor_kab') ?></td><td><input type="text" class="form-control" name="pelapor_kab" id="pelapor_kab" placeholder="Pelapor Kab" value="<?php echo $pelapor_kab; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Kec <?php echo form_error('pelapor_kec') ?></td><td><input type="text" class="form-control" name="pelapor_kec" id="pelapor_kec" placeholder="Pelapor Kec" value="<?php echo $pelapor_kec; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelapor Desa <?php echo form_error('pelapor_desa') ?></td><td><input type="text" class="form-control" name="pelapor_desa" id="pelapor_desa" placeholder="Pelapor Desa" value="<?php echo $pelapor_desa; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Nik <?php echo form_error('korban_nik') ?></td><td><input type="text" class="form-control" name="korban_nik" id="korban_nik" placeholder="Korban Nik" value="<?php echo $korban_nik; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Nama <?php echo form_error('korban_nama') ?></td><td><input type="text" class="form-control" name="korban_nama" id="korban_nama" placeholder="Korban Nama" value="<?php echo $korban_nama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Jeniskelamin <?php echo form_error('korban_jeniskelamin') ?></td><td><input type="text" class="form-control" name="korban_jeniskelamin" id="korban_jeniskelamin" placeholder="Korban Jeniskelamin" value="<?php echo $korban_jeniskelamin; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Agama <?php echo form_error('korban_agama') ?></td><td><input type="text" class="form-control" name="korban_agama" id="korban_agama" placeholder="Korban Agama" value="<?php echo $korban_agama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Tempat <?php echo form_error('korban_tempat') ?></td><td><input type="text" class="form-control" name="korban_tempat" id="korban_tempat" placeholder="Korban Tempat" value="<?php echo $korban_tempat; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Tgl Lahir <?php echo form_error('korban_tgl_lahir') ?></td>
						<td><input type="date" class="form-control" name="korban_tgl_lahir" id="korban_tgl_lahir" placeholder="Korban Tgl Lahir" value="<?php echo $korban_tgl_lahir; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Usia <?php echo form_error('korban_usia') ?></td><td><input type="text" class="form-control" name="korban_usia" id="korban_usia" placeholder="Korban Usia" value="<?php echo $korban_usia; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Prop <?php echo form_error('korban_prop') ?></td><td><input type="text" class="form-control" name="korban_prop" id="korban_prop" placeholder="Korban Prop" value="<?php echo $korban_prop; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Kab <?php echo form_error('korban_kab') ?></td><td><input type="text" class="form-control" name="korban_kab" id="korban_kab" placeholder="Korban Kab" value="<?php echo $korban_kab; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Kec <?php echo form_error('korban_kec') ?></td><td><input type="text" class="form-control" name="korban_kec" id="korban_kec" placeholder="Korban Kec" value="<?php echo $korban_kec; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Desa <?php echo form_error('korban_desa') ?></td><td><input type="text" class="form-control" name="korban_desa" id="korban_desa" placeholder="Korban Desa" value="<?php echo $korban_desa; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Foto1 <?php echo form_error('korban_foto1') ?></td><td><input type="text" class="form-control" name="korban_foto1" id="korban_foto1" placeholder="Korban Foto1" value="<?php echo $korban_foto1; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Foto2 <?php echo form_error('korban_foto2') ?></td><td><input type="text" class="form-control" name="korban_foto2" id="korban_foto2" placeholder="Korban Foto2" value="<?php echo $korban_foto2; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Email <?php echo form_error('korban_email') ?></td><td><input type="text" class="form-control" name="korban_email" id="korban_email" placeholder="Korban Email" value="<?php echo $korban_email; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Telepon <?php echo form_error('korban_telepon') ?></td><td><input type="text" class="form-control" name="korban_telepon" id="korban_telepon" placeholder="Korban Telepon" value="<?php echo $korban_telepon; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Korban Tglkejadian <?php echo form_error('korban_tglkejadian') ?></td>
						<td><input type="date" class="form-control" name="korban_tglkejadian" id="korban_tglkejadian" placeholder="Korban Tglkejadian" value="<?php echo $korban_tglkejadian; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Nama <?php echo form_error('pelaku_nama') ?></td><td><input type="text" class="form-control" name="pelaku_nama" id="pelaku_nama" placeholder="Pelaku Nama" value="<?php echo $pelaku_nama; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Jenis Kelamin <?php echo form_error('pelaku_jenis_kelamin') ?></td><td><input type="text" class="form-control" name="pelaku_jenis_kelamin" id="pelaku_jenis_kelamin" placeholder="Pelaku Jenis Kelamin" value="<?php echo $pelaku_jenis_kelamin; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Usia <?php echo form_error('pelaku_usia') ?></td><td><input type="text" class="form-control" name="pelaku_usia" id="pelaku_usia" placeholder="Pelaku Usia" value="<?php echo $pelaku_usia; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Hubungan <?php echo form_error('pelaku_hubungan') ?></td><td><input type="text" class="form-control" name="pelaku_hubungan" id="pelaku_hubungan" placeholder="Pelaku Hubungan" value="<?php echo $pelaku_hubungan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Pendidikan <?php echo form_error('pelaku_pendidikan') ?></td><td><input type="text" class="form-control" name="pelaku_pendidikan" id="pelaku_pendidikan" placeholder="Pelaku Pendidikan" value="<?php echo $pelaku_pendidikan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Alamat <?php echo form_error('pelaku_alamat') ?></td><td><input type="text" class="form-control" name="pelaku_alamat" id="pelaku_alamat" placeholder="Pelaku Alamat" value="<?php echo $pelaku_alamat; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Prop <?php echo form_error('pelaku_prop') ?></td><td><input type="text" class="form-control" name="pelaku_prop" id="pelaku_prop" placeholder="Pelaku Prop" value="<?php echo $pelaku_prop; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Kab <?php echo form_error('pelaku_kab') ?></td><td><input type="text" class="form-control" name="pelaku_kab" id="pelaku_kab" placeholder="Pelaku Kab" value="<?php echo $pelaku_kab; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Kec <?php echo form_error('pelaku_kec') ?></td><td><input type="text" class="form-control" name="pelaku_kec" id="pelaku_kec" placeholder="Pelaku Kec" value="<?php echo $pelaku_kec; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Desa <?php echo form_error('pelaku_desa') ?></td><td><input type="text" class="form-control" name="pelaku_desa" id="pelaku_desa" placeholder="Pelaku Desa" value="<?php echo $pelaku_desa; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Pelaku Nik <?php echo form_error('pelaku_nik') ?></td><td><input type="text" class="form-control" name="pelaku_nik" id="pelaku_nik" placeholder="Pelaku Nik" value="<?php echo $pelaku_nik; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Lapor Anonim <?php echo form_error('lapor_anonim') ?></td><td><input type="text" class="form-control" name="lapor_anonim" id="lapor_anonim" placeholder="Lapor Anonim" value="<?php echo $lapor_anonim; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Lapor Rahasia <?php echo form_error('lapor_rahasia') ?></td><td><input type="text" class="form-control" name="lapor_rahasia" id="lapor_rahasia" placeholder="Lapor Rahasia" value="<?php echo $lapor_rahasia; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Lapor Status <?php echo form_error('lapor_status') ?></td><td><input type="text" class="form-control" name="lapor_status" id="lapor_status" placeholder="Lapor Status" value="<?php echo $lapor_status; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Lapor Kategori <?php echo form_error('lapor_kategori') ?></td><td><input type="text" class="form-control" name="lapor_kategori" id="lapor_kategori" placeholder="Lapor Kategori" value="<?php echo $lapor_kategori; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Lapor Disposisi <?php echo form_error('lapor_disposisi') ?></td><td><input type="text" class="form-control" name="lapor_disposisi" id="lapor_disposisi" placeholder="Lapor Disposisi" value="<?php echo $lapor_disposisi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Lapor Klarifikasi <?php echo form_error('lapor_klarifikasi') ?></td><td><input type="text" class="form-control" name="lapor_klarifikasi" id="lapor_klarifikasi" placeholder="Lapor Klarifikasi" value="<?php echo $lapor_klarifikasi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Create At <?php echo form_error('create_at') ?></td><td><input type="text" class="form-control" name="create_at" id="create_at" placeholder="Create At" value="<?php echo $create_at; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Update At <?php echo form_error('update_at') ?></td><td><input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Delete At <?php echo form_error('delete_at') ?></td><td><input type="text" class="form-control" name="delete_at" id="delete_at" placeholder="Delete At" value="<?php echo $delete_at; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>User Id <?php echo form_error('user_id') ?></td><td><input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="berita_acara_id" value="<?php echo $berita_acara_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('kelola_sampah') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>