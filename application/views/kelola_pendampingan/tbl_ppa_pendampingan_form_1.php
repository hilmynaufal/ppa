<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> TINDAK LANJUT_PENDAMPINGAN KORBAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered' width="60%">
	
					<tr>
						<td width='200'>Cari Nama Korban <?php echo form_error('kode_beritaacara') ?></td><td>
                                                    <input type="text" readonly="" class="form-control" name="kode_beritaacara" id="kode_beritaacara" placeholder="Nama Korban" value="<?php echo $kode_beritaacara; ?>" />
                                                 <span class="input-group-btn">
                                                    <!-- Large modal -->
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                                        cari Nama Korban
                                                    </button>

                                                </span>
                                                </td>
                                               
					</tr>
	
					<tr>
						<td width='200'>Layanan Tgl <?php echo form_error('layanan_tgl') ?></td>
						<td><input type="date" class="form-control" name="layanan_tgl" id="layanan_tgl" placeholder="Layanan Tgl" value="<?php echo $layanan_tgl; ?>" />
                                                
                                              
                                                
                                                </td>
					</tr>
	
					<tr>
						<td width='200'>Layanan Jenis <?php echo form_error('layanan_jenis') ?></td><td>
                                                    <input type="text" class="form-control" name="layanan_jenis" id="layanan_jenis" placeholder="Layanan Jenis" value="<?php echo $layanan_jenis; ?>" />
                                                   <?php echo select2_dinamis('layanan_jenis', 'ref_kekerasan', 'jenis_kekerasan', 'id_kekerasan', $layanan_jenis, 'asc') ?>
                                                </td>
					</tr>
	
					<tr>
						<td width='200'>Layanan Keterangan <?php echo form_error('layanan_keterangan') ?></td><td><input type="text" class="form-control" name="layanan_keterangan" id="layanan_keterangan" placeholder="Layanan Keterangan" value="<?php echo $layanan_keterangan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Layanan Rtl <?php echo form_error('layanan_rtl') ?></td><td><input type="text" class="form-control" name="layanan_rtl" id="layanan_rtl" placeholder="Layanan Rtl" value="<?php echo $layanan_rtl; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Layanan Progress <?php echo form_error('layanan_progress') ?></td><td><input type="text" class="form-control" name="layanan_progress" id="layanan_progress" placeholder="Layanan Progress" value="<?php echo $layanan_progress; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Layanan Foto1 <?php echo form_error('layanan_foto1') ?></td><td><input type="text" class="form-control" name="layanan_foto1" id="layanan_foto1" placeholder="Layanan Foto1" value="<?php echo $layanan_foto1; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Layanan Foto2 <?php echo form_error('layanan_foto2') ?></td><td><input type="text" class="form-control" name="layanan_foto2" id="layanan_foto2" placeholder="Layanan Foto2" value="<?php echo $layanan_foto2; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Layanan Foto3 <?php echo form_error('layanan_foto3') ?></td><td><input type="text" class="form-control" name="layanan_foto3" id="layanan_foto3" placeholder="Layanan Foto3" value="<?php echo $layanan_foto3; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Tindak Lanjut1 <?php echo form_error('tindak_lanjut1') ?></td>
						<td> <textarea class="form-control" rows="3" name="tindak_lanjut1" id="tindak_lanjut1" placeholder="Tindak Lanjut1"><?php echo $tindak_lanjut1; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Tindak Lanjut2 <?php echo form_error('tindak_lanjut2') ?></td>
						<td> <textarea class="form-control" rows="3" name="tindak_lanjut2" id="tindak_lanjut2" placeholder="Tindak Lanjut2"><?php echo $tindak_lanjut2; ?></textarea></td>
					</tr>
	    
					<tr>
						<td width='200'>Tindak Lanjut3 <?php echo form_error('tindak_lanjut3') ?></td>
						<td> <textarea class="form-control" rows="3" name="tindak_lanjut3" id="tindak_lanjut3" placeholder="Tindak Lanjut3"><?php echo $tindak_lanjut3; ?></textarea></td>
					</tr>
	
				
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="layanan_id" value="<?php echo $layanan_id; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('kelola_pendampingan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>



<div class="modal fade" id="modal-default" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Data Pelapor</h4>
            </div>
            <div class="modal-body table-responsive">

                <div style="padding-bottom: 10px;"'>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nik Pelapor</th>
                                <th>Nama Pelapor</th>
                                <th>HP/Telepon</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $row = count($kelola_data_pelapor);
                            if ($row >= 1) {

                                foreach ($kelola_data_pelapor as $kelola_berita) {
                                    ?>
                                    <tr>
                                        <td width="10px"><?php echo ++$start ?></td>
                                        <td><?php echo $kelola_berita->nik ?></td>
                                        <td><?php echo $kelola_berita->full_name ?></td> 
                                        <td><?php echo $kelola_berita->phone ?></td>
                                        <td><?php echo $kelola_berita->email ?></td>


                                        <td style="text-align:center" >
                                            <button   class="btn btn-xs btn-info" id="select"
                                                      data-nik="<?php echo $kelola_berita->nik ?>"
                                                      data-nama="<?php echo $kelola_berita->full_name ?>"
                                                      data-phone="<?php echo $kelola_berita->phone ?>"
                                                      data-email="<?php echo $kelola_berita->email ?>"
                                                      data-idusers="<?php echo $kelola_berita->id_users ?>">
                                                <i class="fa fa-check">Pilih</i></button>

                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td width="10px" colspan="5"><p style="text-align:center">Laporan Kasus Kekerasan Belum ada</p></td><tr>';
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

    </div>

</div>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap.min.js"></script>



<script type="text/javascript">
$(document).ready(function () {
$('#example').DataTable();
});
</script>


<script type="text/javascript">
$(document).ready(function () {
$(document).on('click','#select',function(){
//    alert($(this).data('nik'));
        var pelapor_nik=$(this).data('nik');
        var pelapor_nama=$(this).data('nama');
        var pelapor_telepon=$(this).data('phone');
        var pelapor_email=$(this).data('email');
         var pelapor_idusers=$(this).data('idusers');
        
        $('#pelapor_nik').val(pelapor_nik);
        $('#pelapor_nama').val(pelapor_nama);
        $('#pelapor_telepon').val(pelapor_telepon);
        $('#pelapor_email').val(pelapor_email);
         $('#pelapor_idusers').val(pelapor_idusers);
        $('#modal-default').modal('hide');
    
})
});
</script>
