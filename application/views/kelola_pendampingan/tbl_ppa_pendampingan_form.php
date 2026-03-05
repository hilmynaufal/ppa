
<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php  echo strtoupper($button) ?> TINDAK LANJUT PENDAMPINGAN KORBAN</h3>
			</div>
			<form enctype="multipart/form-data"  action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered' width="60%">
	
					<tr>
						<td width='200'>Cari Nama Korban <?php echo form_error('kode_beritaacara') ?></td><td>
                                                       <input type="text" readonly="" class="form-control" name="korban_nama" id="korban_nama" placeholder="Nama Korban" value="<?php echo $kode_beritaacara; ?>" />
                                                
                                                       <input type="hidden" readonly="" class="form-control" name="kode_beritaacara" id="kode_beritaacara" placeholder="Nama Korban" value="<?php echo $kode_beritaacara; ?>" />
                                             <?php IF($button_aktif==1){ ?>
                                                  <span class="input-group-btn">
                                                    <!-- Large modal -->
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                                        cari Nama Korban
                                                    </button>

                                                </span>
                                             <?php } ?>
                                                </td>
                                               
					</tr>
	
					<tr>
						<td width='200'>Layanan Tgl <?php echo form_error('layanan_tgl') ?></td>
						<td><input type="date" class="form-control" name="layanan_tgl" id="layanan_tgl" placeholder="Jenis Kekerasan" value="<?php echo $layanan_tgl; ?>" />
                                                
                                              
                                                
                                                </td>
					</tr>
	
<?php IF($button_aktif==1){ ?>
					<tr>
						<td width='200'>Jenis Kekerasan<?php echo form_error('layanan_jenis') ?></td><td>
                                                   
                                                   <?php echo select2_dinamis('layanan_jenis[]', 'ref_kekerasan', 'jenis_kekerasan','Pilih Jenis') ?>
                                                </td>
					</tr>
	
	  <?php }else {  ?>	
                                        
                                        <tr>
						<td width='200'>Jenis Kekerasan<?php echo form_error('layanan_jenis') ?></td><td>
                                                   <input type="text" class="form-control" name="layanan_jenis" id="layanan_jenis" placeholder="Jenis Kekerasan" value="<?php echo $layanan_jenis; ?>" />
                                               
                                                
 
 
 
                                                
                                                </td>
					</tr>
	
       <?php }  ?>
	
					<tr>
						<td width='200'>Jenis Pedamping <?php echo form_error('layanan_progress') ?></td><td>
                                                   
                                                     <?php echo cmb_dinamis('layanan_progress', 'ref_progres', 'progres_nama', 'progres_id', $layanan_progress, 'asc') ?>
                                              
                                                </td>
					</tr>
	
					
                                        
                                        <tr>
                                            <td width='200'>Foto Pendukung<?php echo form_error('layanan_foto1') ?></td><td><input type="file" class="form-control" name="layanan_foto1" id="layanan_foto1" placeholder="Foto Pendukung 1" value="<?php echo $layanan_foto1; ?>" />
                                       
                                                <input  type="hidden" multiple="" name="layanan_foto11" class="form-control"  id="layanan_foto11" placeholder="Berkas" value="<?php echo $layanan_foto1; ?>" readonly="" />
                                                <?PHP if ($button= 'update' AND $layanan_foto1 != '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_foto1">Lihat Foto </button>

                                                <?PHP } ?> 
                                       </td>
                                        </tr>
	
					<tr>
						<td width='200'>Layanan Foto2 <?php echo form_error('layanan_foto2') ?></td><td><input type="file" class="form-control" name="layanan_foto2" id="layanan_foto2" placeholder="Layanan Foto2" value="<?php echo $layanan_foto2; ?>" />
                                                 <input  type="hidden" multiple="" name="layanan_foto22" class="form-control"  id="layanan_foto22" placeholder="Berkas" value="<?php echo $layanan_foto2; ?>" readonly="" />
                                                <?PHP if ($button= 'update' AND $layanan_foto2 != '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_foto1">Lihat Foto </button>

                                                <?PHP } ?> 
                                                </td>
					</tr>
	
					<tr>
						<td width='200'>Layanan Foto3 <?php echo form_error('layanan_foto3') ?></td><td><input type="file" class="form-control" name="layanan_foto3" id="layanan_foto3" placeholder="Layanan Foto3" value="<?php echo $layanan_foto3; ?>" />
                                                 <input  type="hidden" multiple="" name="layanan_foto33" class="form-control"  id="layanan_foto33" placeholder="Berkas" value="<?php echo $layanan_foto3; ?>" readonly="" />
                                                <?PHP if ($button= 'update' AND $layanan_foto3 != '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_foto1">Lihat Foto </button>

                                                <?PHP } ?> 
                                                </td>
					</tr>
	    
					<tr>
						<td width='200'>Keterangan  Pendampingan<?php echo form_error('tindak_lanjut1') ?></td>
						<td> <textarea class="form-control" rows="3" name="tindak_lanjut1" id="tindak_lanjut1" placeholder="Tindak Lanjut1"><?php echo $tindak_lanjut1; ?></textarea></td>
					</tr>
	    
					
				
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="layanan_id" value="<?php echo $layanan_id; ?>" /> 
                                                         <?PHP if ($button_aktif==1) { ?>
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo "Simpan" ?></button> 
                                                         <?PHP }else{ ?>
                                                        
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                                                          <?PHP } ?>
                                                        
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
                                <th>Nik Korban</th>
                                <th>Nama Korban</th>
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
                                        <td><?php echo $kelola_berita->pelapor_nik ?></td>
                                        <td><?php echo $kelola_berita->pelapor_nama ?></td> 
                                        <td><?php echo $kelola_berita->korban_nik ?></td>
                                        <td><?php echo $kelola_berita->korban_nama ?></td>


                                        <td style="text-align:center" >
                                            <button   class="btn btn-xs btn-info" id="select"
                                                      data-kode="<?php echo $kelola_berita->berita_acara_kode ?>"
                                                            data-nama="<?php echo $kelola_berita->korban_nama ?>"
                                                      data-pelapor="<?php echo $kelola_berita->pelapor_nama ?>">
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
    //alert($(this).data('nama'));
        var kode_beritaacara=$(this).data('kode');
        var korban_nama=$(this).data('nama');
        
        
        $('#kode_beritaacara').val(kode_beritaacara);
         $('#korban_nama').val(korban_nama);
      
        $('#modal-default').modal('hide');
    
})
});
</script>



   
     <!-- myModal_foto1 -->
  <div class="modal fade" id="myModal_foto1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Akta Selesi</h4>
        </div>
        <div class="modal-body">
        <embed src="<?php echo base_url();?>/upload_layanan/<?PHP echo $layanan_foto1; ?>" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
