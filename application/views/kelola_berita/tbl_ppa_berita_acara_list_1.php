<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TBL_PPA_BERITA_ACARA</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('kelola_berita/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('kelola_berita/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?></div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('kelola_berita/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kelola_berita'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Berita Acara Status</th>
		<th>Berita Acara Dihentikan</th>
		<th>Berita Acara Kode</th>
		<th>Berita Acara Tgl</th>
		<th>Berita Acara Hari</th>
		<th>Berita Acara Kronologi</th>
		<th>Berita Acara Penerima Laporan</th>
		<th>Berita Acara Kepala Uptd</th>
		<th>Pelapor Nama</th>
		<th>Pelapor Tgl</th>
		<th>Pelapor Tempat</th>
		<th>Pelapor Nik</th>
		<th>Pelapor Pekerjaan</th>
		<th>Pelapor Telepon</th>
		<th>Pelapor Kab</th>
		<th>Pelapor Kec</th>
		<th>Pelapor Desa</th>
		<th>Korban Nik</th>
		<th>Korban Nama</th>
		<th>Korban Jeniskelamin</th>
		<th>Korban Agama</th>
		<th>Korban Tempat</th>
		<th>Korban Tgl Lahir</th>
		<th>Korban Desa</th>
		<th>Korban Kec</th>
		<th>Pelaku Nama</th>
		<th>Pelaku Jenis Kelamin</th>
		<th>Pelaku Usia</th>
		<th>Pelaku Hubungan</th>
		<th>Pelaku Pendidikan</th>
		<th>Pelaku Alamat</th>
		<th>Pelaku Desa</th>
		<th>Pelaku Kec</th>
		<th>Lapor Anonim</th>
		<th>Lapor Rahasia</th>
		<th>Lapor Status</th>
		<th>Lapor Kategori</th>
		<th>Lapor Disposisi</th>
		<th>Lapor Klarifikasi</th>
		<th>Create At</th>
		<th>Update At</th>
		<th>Delete At</th>
		<th>User Id</th>
		<th>Action</th>
            </tr><?php
            foreach ($kelola_berita_data as $kelola_berita)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $kelola_berita->berita_acara_status ?></td>
			<td><?php echo $kelola_berita->berita_acara_dihentikan ?></td>
			<td><?php echo $kelola_berita->berita_acara_kode ?></td>
			<td><?php echo $kelola_berita->berita_acara_tgl ?></td>
			<td><?php echo $kelola_berita->berita_acara_hari ?></td>
			<td><?php echo $kelola_berita->berita_acara_kronologi ?></td>
			<td><?php echo $kelola_berita->berita_acara_penerima_laporan ?></td>
			<td><?php echo $kelola_berita->berita_acara_kepala_uptd ?></td>
			<td><?php echo $kelola_berita->pelapor_nama ?></td>
			<td><?php echo $kelola_berita->pelapor_tgl ?></td>
			<td><?php echo $kelola_berita->pelapor_tempat ?></td>
			<td><?php echo $kelola_berita->pelapor_nik ?></td>
			<td><?php echo $kelola_berita->pelapor_pekerjaan ?></td>
			<td><?php echo $kelola_berita->pelapor_telepon ?></td>
			<td><?php echo $kelola_berita->pelapor_kab ?></td>
			<td><?php echo $kelola_berita->pelapor_kec ?></td>
			<td><?php echo $kelola_berita->pelapor_desa ?></td>
			<td><?php echo $kelola_berita->korban_nik ?></td>
			<td><?php echo $kelola_berita->korban_nama ?></td>
			<td><?php echo $kelola_berita->korban_jeniskelamin ?></td>
			<td><?php echo $kelola_berita->korban_agama ?></td>
			<td><?php echo $kelola_berita->korban_tempat ?></td>
			<td><?php echo $kelola_berita->korban_tgl_lahir ?></td>
			<td><?php echo $kelola_berita->korban_desa ?></td>
			<td><?php echo $kelola_berita->korban_kec ?></td>
			<td><?php echo $kelola_berita->pelaku_nama ?></td>
			<td><?php echo $kelola_berita->pelaku_jenis_kelamin ?></td>
			<td><?php echo $kelola_berita->pelaku_usia ?></td>
			<td><?php echo $kelola_berita->pelaku_hubungan ?></td>
			<td><?php echo $kelola_berita->pelaku_pendidikan ?></td>
			<td><?php echo $kelola_berita->pelaku_alamat ?></td>
			<td><?php echo $kelola_berita->pelaku_desa ?></td>
			<td><?php echo $kelola_berita->pelaku_kec ?></td>
			<td><?php echo $kelola_berita->lapor_anonim ?></td>
			<td><?php echo $kelola_berita->lapor_rahasia ?></td>
			<td><?php echo $kelola_berita->lapor_status ?></td>
			<td><?php echo $kelola_berita->lapor_kategori ?></td>
			<td><?php echo $kelola_berita->lapor_disposisi ?></td>
			<td><?php echo $kelola_berita->lapor_klarifikasi ?></td>
			<td><?php echo $kelola_berita->create_at ?></td>
			<td><?php echo $kelola_berita->update_at ?></td>
			<td><?php echo $kelola_berita->delete_at ?></td>
			<td><?php echo $kelola_berita->user_id ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kelola_berita/read/'.$kelola_berita->berita_acara_id),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('kelola_berita/update/'.$kelola_berita->berita_acara_id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('kelola_berita/delete/'.$kelola_berita->berita_acara_id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>