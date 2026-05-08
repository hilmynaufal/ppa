<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <form  enctype="multipart/form-data"action="<?php echo $action; ?>" method="post">
<div class="content-wrapper">

	<section class="content">
		<div class="box box-success box-solid">
                
			<div class="box-header with-border">
				<h3 class="box-title"> PEMBUATAN BERITA_ACARA</h3>
			</div>
               
                        <div class="content" id="myWizard">

                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="9" style="width: 30%;">
                                    Step 1 of 3
                                </div>
                            </div>

                            <div class="navbar">
                                <div class="navbar-inner">
                                    <ul class="nav nav-pills">
                                        <li class="active">
                                            <a href="#step1" data-toggle="tab" data-step="1">FORMULIR PELAPOR</a></li>
                                        <li><a href="#step2" data-toggle="tab" data-step="2">FORMULIR BERITA ACARA</a></li>
                                        <li><a href="#step3" data-toggle="tab" data-step="3">FORMULIR KORBAN</a></li>
                                        <li><a href="#step4" data-toggle="tab" data-step="4">FORMULIR PELAKU</a></li>
                                    

                                    </ul>
                                </div>
                            </div>


                            <div class="tab-content">

                                <div class="tab-pane fade in active" id="step1">
                                    <div class="well">
                                        DATA PELAPOR
                                    </div>



                                    <table class='table table-bordered'>
                                        <tr>
                                            <td width='100'>NIK Pelapor <?php echo form_error('pelapor_nik') ?></td><td>
                                                <input readonly="" type="text" class="form-control" name="pelapor_nik" id="pelapor_nik" placeholder="Pelapor Nik" value="<?php echo $pelapor_nik; ?>"  width="50%"/>
                                                <span class="input-group-btn">
                                                    <!-- Large modal -->
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                                        cari Pelapor
                                                    </button>

                                                </span>

                                            </td>
                                        </tr>

                                        <tr>
                                            <td width='200'>Nama Pelapor <?php echo form_error('pelapor_nama') ?></td><td>
                                                <input readonly="" type="text" class="form-control" name="pelapor_nama" id="pelapor_nama" placeholder="Pelapor Nama" value="<?php echo $pelapor_nama; ?>" />
                                                <input type="hidden" class="form-control" name="pelapor_idusers" id="pelapor_idusers" placeholder="pelapor_idusers" value="<?php echo $pelapor_idusers; ?>" />
                                            
                                            </td>
                                        </tr>


                                        <tr>
                                            <td width='200'>Telepon/HP Pelapor <?php echo form_error('pelapor_telepon') ?></td><td><input readonly="" type="text" class="form-control" name="pelapor_telepon" id="pelapor_telepon" placeholder="Pelapor Telepon" value="<?php echo $pelapor_telepon; ?>" /></td>
                                        </tr>
                                    </table>

                                </div>
                                
                                <div class="tab-pane fade" id="step2">
                                    <div class="well">
                                        FORMULIR DATA BERITA ACARA
                                    </div>
                                    <table class='table table-bordered'>

                                        <input type="hidden" class="form-control" name="berita_acara_status" id="berita_acara_status" placeholder="Berita Acara Status" value="<?php echo $berita_acara_status; ?>" />			
                                        <input type="hidden" class="form-control" name="berita_acara_kode" id="berita_acara_kode" placeholder="Berita Acara Kode" value="<?php echo $berita_acara_kode; ?>" />

                                        <tr>
                                            <td width='200'>Berita Acara Tgl <?php echo form_error('berita_acara_tgl') ?></td>
                                            <td><input type="date" class="form-control" name="berita_acara_tgl" id="berita_acara_tgl" placeholder="Berita Acara Tgl" value="<?php echo $berita_acara_tgl; ?>" /></td>
                                        </tr>
                                        <input type="hidden" class="form-control" name="berita_acara_hari" id="berita_acara_hari" placeholder="Berita Acara Hari" value="<?php echo $berita_acara_hari; ?>" />

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
                                    </table>

                                </div>

                                <div class="tab-pane fade" id="step3">
                                    <div class="well">
                                        FORMULIR KORBAN
                                    </div>

                                    <table class='table table-bordered'>
                                        <tr>
                                            <td width='200'>Nik Korban<?php echo form_error('korban_nik') ?></td><td><input type="text" class="form-control" name="korban_nik" id="korban_nik" placeholder="Korban Nik" value="<?php echo $korban_nik; ?>" /></td>
                                        </tr>

                                        <tr>
                                            <td width='200'>Nama Korban<?php echo form_error('korban_nama') ?></td><td><input type="text" class="form-control" name="korban_nama" id="korban_nama" placeholder="Korban Nama" value="<?php echo $korban_nama; ?>" /></td>
                                        </tr>

                                        <tr>
                                            <td width='200'>Jenis kelamin  Korban<?php echo $korban_jeniskelamin ?></td>
                                            <td>
                                               


                                                <?PHP
                                                if ($korban_jeniskelamin == 'Laki-Laki') {
                                                    ?>
                                                    <input name ="korban_jeniskelamin" type="radio" value="Laki-Laki" id="korban_jeniskelamin"  checked>Laki-Laki &nbsp;&nbsp;
                                                    <input name ="korban_jeniskelamin" type="radio" value="Perempuan" id="korban_jeniskelamin"  >Perempuan

                                                    <?php
                                                } elseif ($korban_jeniskelamin == 'Laki-Laki') {
                                                    ?>
                                                    <input name ="korban_jeniskelamin" type="radio" value="Laki-Laki" id="korban_jeniskelamin"  >Laki-Laki &nbsp;&nbsp;
                                                    <input name ="korban_jeniskelamin" type="radio" value="Perempuan" id="korban_jeniskelamin" checked >Perempuan
                                                <?PHP
                                                } else {
                                                    ?>


                                                    <input name ="korban_jeniskelamin" type="radio" value="Laki-Laki" id="korban_jeniskelamin"  >Laki-Laki &nbsp;&nbsp;
                                                    <input name ="korban_jeniskelamin" type="radio" value="Perempuan" id="korban_jeniskelamin" checked >Perempuan
                                                <?PHP } ?>

                                             

                                            </td>
                                        </tr>

                                        <tr>
                                            <td width='200'>Agama Korban<?php echo form_error('korban_agama') ?></td><td><input type="text" class="form-control" name="korban_agama" id="korban_agama" placeholder="Korban Agama" value="<?php echo $korban_agama; ?>" /></td>
                                        </tr>

                                        <tr>
                                            <td width='200'>Lokasi Kejadian <?php echo form_error('korban_tempat') ?></td><td><input type="text" class="form-control" name="korban_tempat" id="korban_tempat" placeholder="Korban Tempat" value="<?php echo $korban_tempat; ?>" /></td>
                                        </tr>

                                        <tr>
                                            <td width='200'>Tempat Lahir Korban <?php echo form_error('korban_tempat_lahir') ?></td><td><input type="text" class="form-control" name="korban_tempat_lahir" id="korban_tempat_lahir" placeholder="Tempat Lahir Korban" value="<?php echo $korban_tempat_lahir; ?>" /></td>
                                        </tr>

                                        <tr>
                                            <td width='200'> Tgl Lahir Korban<?php echo form_error('korban_tgl_lahir') ?></td>
                                            <td><input type="date" class="form-control" name="korban_tgl_lahir" id="korban_tgl_lahir" placeholder="Korban Tgl Lahir" value="<?php echo $korban_tgl_lahir; ?>" /></td>
                                        </tr>
                                    
                                        
                                        <tr>
                                            <td width='200'>Propinsi Korban<?php echo form_error('korban_prop') ?></td><td>

                                                <?php echo cmb_dinamis_propinsi('korban_prop', 'reg_provinces', 'name', 'id', $korban_prop, 'asc') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='200'>Kabupaten Korban <?php echo form_error('regency_id') ?></td><td>
                                                
                                                <?PHP if ($button == 'Update' ) { ?>
                                                    <?php echo cmb_dinamis_propinsi('korban_kab', 'reg_regencies', 'name', 'id', $korban_kab, 'asc') ?>
                                                <?PHP } else  {?>
                                                
                                               <select name="korban_kab" class="id_kab form-control" id="pilih_kecamatan">
                                                </select>

                                                </select>
                                                <?PHP } ?>

                                                
                                               
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td width='200'>Kecamatan Korban <?php echo form_error('district_id') ?></td><td>
                                                <?PHP if ($button == 'Update' and $korban_kec!='') { ?>
                                                    <?php echo cmb_dinamis_propinsi('korban_kec', 'reg_districts', 'name', 'id', $korban_kec, 'asc') ?>
                                                <?PHP } else  {?>
                                                
                                                <select name="korban_kec" class="id_kec form-control" id="pilih_desa">

                                                </select>
                                                <?PHP } ?>

                                            </td>
                                        </tr>

          
                                        
                                        <tr>
                                            <td width='200'>Desa Korban<?php echo form_error('village_id') ?></td><td>

                                                <?PHP if ($button == 'Update' and $korban_desa != '') { ?>
                                                    <?php echo cmb_dinamis_propinsi('village_id', 'reg_villages', 'name', 'id', $korban_desa, 'asc') ?>
                                                <?PHP } else { ?>
                                                    <select name="korban_desa" class="id_desa form-control" >  </select>
                                                <?PHP } ?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td width='200'>Email<?php echo form_error('korban_email') ?></td><td><input type="email" class="form-control" name="korban_email" id="korban_email" placeholder="Korban Desa" value="<?php echo $korban_email; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td width='200'>Hp/Telepon Korban<?php echo form_error('korban_telepon') ?></td><td><input type="text" class="form-control" name="korban_telepon" id="korban_telepon" placeholder="Korban Desa" value="<?php echo $korban_telepon; ?>" /></td>
                                        </tr>

                                        <tr>
                                            <td width='200'>Foto Pendukung<?php echo form_error('korban_foto1') ?></td><td><input type="file" class="form-control" name="korban_foto1" id="korban_foto1" placeholder="Korban Desa" value="<?php echo $korban_foto1; ?>" />
                                       
                                                <input  type="hidden" multiple="" name="korban_foto11" class="form-control"  id="korban_foto11" placeholder="Berkas" value="<?php echo $korban_foto1; ?>" readonly="" />
                                                <?PHP if ($button = 'update' AND $korban_foto1 != '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_foto1">Lihat Foto </button>

                                                <?PHP } ?> 
                                       </td>
                                        </tr>
                                        <tr>
                                            <td width='200'>Foto Pendukung<?php echo form_error('korban_foto1') ?></td><td><input type="file" class="form-control" name="korban_foto2" id="korban_foto2" placeholder="Korban Desa" value="<?php echo $korban_foto2; ?>" />
                                            <input  type="hidden" multiple="" name="korban_foto12" class="form-control"  id="korban_foto22" placeholder="Berkas" value="<?php echo $korban_foto2; ?>" readonly="" />
                                                <?PHP if ($button = 'update' AND $korban_foto2 != '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal_foto2">Lihat Foto </button>

                                                <?PHP } ?> 
                                        
                                        
                                        </td>
                                        </tr>
                                        
                                         <tr>
                                            <td width='200'>Tanggal Kejadian <?php echo form_error('korban_tglkejadian') ?></td>
                                            <td><input type="date" class="form-control" name="korban_tglkejadian" id="korban_tglkejadian" placeholder="Tgl Kejadian" value="<?php echo $korban_tglkejadian; ?>" /></td>
                                        </tr>



                                    </table>

                                </div>
                                
                                
                                 <div class="tab-pane fade" id="step4">
                                    <div class="well">
                                     FORMULIR  PELAKU
                                    </div>
                                     
                                     <table class='table table-bordered'>


                                    <tr>
                                        <td width='200'> Nama Pelaku<?php echo form_error('pelaku_nama') ?></td><td><input type="text" class="form-control" name="pelaku_nama" id="pelaku_nama" placeholder="Pelaku Nama" value="<?php echo $pelaku_nama; ?>" /></td>
                                    </tr>

                                    <tr>
                                        <td width='200'>Jenis Kelamin Pelaku<?php echo form_error('pelaku_jenis_kelamin') ?></td>
                                        <td>
                                   

                                                <?PHP
                                                if ($pelaku_jenis_kelamin == 'Laki-Laki' ) {
                                                    ?>
                                                    <input name ="pelaku_jenis_kelamin" type="radio" value="Laki-Laki" id="pelaku_jenis_kelamin"  checked>Laki-Laki &nbsp;&nbsp;
                                                    <input name ="pelaku_jenis_kelamin" type="radio" value="Perempuan" id="pelaku_jenis_kelamin"  >Perempuan

                                                    <?php
                                                } elseif ($pelaku_jenis_kelamin == 'Perempuan') {
                                                    ?>
                                                    <input name ="pelaku_jenis_kelamin" type="radio" value="Laki-Laki" id="pelaku_jenis_kelamin"  >Laki-Laki &nbsp;&nbsp;
                                                    <input name ="pelaku_jenis_kelamin" type="radio" value="Perempuan" id="pelaku_jenis_kelamin" checked >Perempuan
                                                <?PHP
                                                } else {
                                                    ?>


                                                    <input name ="pelaku_jenis_kelamin" type="radio" value="Laki-Laki" id="pelaku_jenis_kelamin"  >Laki-Laki &nbsp;&nbsp;
                                                    <input name ="pelaku_jenis_kelamin" type="radio" value="Perempuan" id="pelaku_jenis_kelamin" checked >Perempuan
                                                <?PHP } ?>

                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width='200'> Usia Pelaku<?php echo form_error('pelaku_usia') ?></td><td><input type="text" class="form-control" name="pelaku_usia" id="pelaku_usia" placeholder="Pelaku Usia" value="<?php echo $pelaku_usia; ?>" /></td>
                                    </tr>

                                    <tr>
                                        <td width='200'>Hubungan Pelaku<?php echo form_error('pelaku_hubungan') ?></td><td><input type="text" class="form-control" name="pelaku_hubungan" id="pelaku_hubungan" placeholder="Pelaku Hubungan" value="<?php echo $pelaku_hubungan; ?>" /></td>
                                    </tr>

                                    <tr>
                                        <td width='200'>Pendidikan Pendidikan<?php echo form_error('pelaku_pendidikan') ?></td><td><input type="text" class="form-control" name="pelaku_pendidikan" id="pelaku_pendidikan" placeholder="Pelaku Pendidikan" value="<?php echo $pelaku_pendidikan; ?>" /></td>
                                    </tr>

                                    <tr>
                                        <td width='200'>Alamat Pelaku <?php echo form_error('pelaku_alamat') ?></td><td><input type="text" class="form-control" name="pelaku_alamat" id="pelaku_alamat" placeholder="Pelaku Alamat" value="<?php echo $pelaku_alamat; ?>" /></td>
                                    </tr>

                                    
                                    
                                     <tr>
                                            <td width='200'>Propinsi Pelaku<?php echo form_error('pelaku_prop') ?></td><td>

                                                <?php echo cmb_dinamis_propinsi2('pelaku_prop', 'reg_provinces', 'name', 'id', $pelaku_prop, 'asc') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='200'>Kabupaten Pelaku <?php echo form_error('pelaku_kab') ?></td><td>
                                                
                                                <?PHP if ($button == 'Update' and $pelaku_kab!='') { ?>
                                                    <?php echo cmb_dinamis_propinsi('pelaku_kab', 'reg_regencies', 'name', 'id', $pelaku_kab, 'asc') ?>
                                                <?PHP } else  {?>
                                                
                                               <select name="pelaku_kab" class="id_kab form-control" id="pilih_kecamatan2">
                                                </select>

                                                </select>
                                                <?PHP } ?>

                                                
                                               
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td width='200'>Kecamatan Pelaku <?php echo form_error('pelaku_kec') ?></td><td>
                                                <?PHP if ($button == 'Update' and $pelaku_kec!='') { ?>
                                                    <?php echo cmb_dinamis_propinsi('pelaku_kec', 'reg_districts', 'name', 'id', $pelaku_kec, 'asc') ?>
                                                <?PHP } else  {?>
                                                
                                                <select name="pelaku_kec" class="id_kec form-control" id="pilih_desa2">

                                                </select>
                                                <?PHP } ?>

                                            </td>
                                        </tr>

          
                                        
                                        <tr>
                                            <td width='200'>Desa Pelaku<?php echo form_error('village_id') ?></td><td>

                                                <?PHP if ($button == 'Update' and $pelaku_desa!= '') { ?>
                                                    <?php echo cmb_dinamis_propinsi('pelaku_desa', 'reg_villages', 'name', 'id', $pelaku_desa, 'asc') ?>
                                                <?PHP } else { ?>
                                                    <select name="pelaku_desa" class="id_desa form-control" >  </select>
                                                <?PHP } ?>
                                            </td>
                                        </tr>

                                   

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="hidden" name="berita_acara_id" value="<?php echo $berita_acara_id; ?>" /> 
                                            <input type="hidden" name="berita_acara_kode" value="<?php echo $berita_acara_kode; ?>" /> 
                                            <button name="button_aktif" value="1" type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                                            <a href="<?php echo site_url('kelola_berita') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                                        </td>
                                    </tr>

                                </table>

                            </div>

                        </div>

                </div>
                  
               
		</div>
             
	</section>
      
</div>

  <form>
<script>
    $('.next').click(function () {

        var nextId = $(this).parents('.tab-pane').next().attr("id");
        $('[href=#' + nextId + ']').tab('show');
        return false;

    })

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        //update progress
        var step = $(e.target).data('step');
        var percent = (parseInt(step) /4) * 100;

        $('.progress-bar').css({width: percent + '%'});
        $('.progress-bar').text("Step " + step + " of 4");

        //e.relatedTarget // previous tab

    })

    $('.first').click(function () {

        $('#myWizard a:first').tab('show')

    })
</script>


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



<!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
   $(document).ready(function(){
       $('#pilih_kabupaten').change(function(){
           var id=$(this).val();
           $.ajax({
               url : "<?php echo base_url(); ?>index.php/Kelola_pendaftaran/get_kabupaten",
               method : "POST",
               data : {id: id},
               async : false,
               dataType : 'json',
               success: function(data){
                   var html = '';
                   var i;
                   for(i=0; i<data.length; i++){
                       html += '<option value='+data[i].id_kab +'>'+data[i].name_province+'</option>';
                   }
                     $('.id_kab').html(html);
                     
               }
           });
       });
   });
    </script>

    <script type="text/javascript">
$(document).ready(function(){
   $('#pilih_kecamatan').change(function(){
       var id=$(this).val();
       $.ajax({
           url : "<?php echo base_url(); ?>index.php/Kelola_pendaftaran/get_kecamatan",
           method : "POST",
           data : {id: id},
           async : false,
           dataType : 'json',
           success: function(data){
               var html = '';
               var i;
               for(i=0; i<data.length; i++){
                   html += '<option value='+data[i].id_kec +'>'+data[i].nama_kec+'</option>';
               }
                 $('.id_kec').html(html);
                     
           }
       });
   });
});
    </script>




    <script type="text/javascript">
        $(document).ready(function(){
            $('#pilih_desa').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url(); ?>index.php/Kelola_pendaftaran/get_desa",
                    method : "POST",
                    data : {id: id},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_desa +'>'+data[i].nama_desa+'</option>';
                        }
                          $('.id_desa').html(html);
                     
                    }
                });
            });
        });
    </script>
    
    
    <!--pilih alamat pelaku-->
      <script type="text/javascript">
   $(document).ready(function(){
       $('#pilih_kabupaten2').change(function(){
           var id=$(this).val();
           $.ajax({
               url : "<?php echo base_url(); ?>index.php/Kelola_pendaftaran/get_kabupaten",
               method : "POST",
               data : {id: id},
               async : false,
               dataType : 'json',
               success: function(data){
                   var html = '';
                   var i;
                   for(i=0; i<data.length; i++){
                       html += '<option value='+data[i].id_kab +'>'+data[i].name_province+'</option>';
                   }
                     $('.id_kab').html(html);
                     
               }
           });
       });
   });
    </script>

    <script type="text/javascript">
$(document).ready(function(){
   $('#pilih_kecamatan2').change(function(){
       var id=$(this).val();
       $.ajax({
           url : "<?php echo base_url(); ?>index.php/Kelola_pendaftaran/get_kecamatan",
           method : "POST",
           data : {id: id},
           async : false,
           dataType : 'json',
           success: function(data){
               var html = '';
               var i;
               for(i=0; i<data.length; i++){
                   html += '<option value='+data[i].id_kec +'>'+data[i].nama_kec+'</option>';
               }
                 $('.id_kec').html(html);
                     
           }
       });
   });
});
    </script>




    <script type="text/javascript">
        $(document).ready(function(){
            $('#pilih_desa2').change(function(){
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url(); ?>index.php/Kelola_pendaftaran/get_desa",
                    method : "POST",
                    data : {id: id},
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].id_desa +'>'+data[i].nama_desa+'</option>';
                        }
                          $('.id_desa').html(html);
                     
                    }
                });
            });
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
        <embed src="<?php echo base_url();?>/upload_foto/<?PHP echo $korban_foto1; ?>" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
     
     
          <!-- myModal_foto2 -->
  <div class="modal fade" id="myModal_foto2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Akta Selesi</h4>
        </div>
        <div class="modal-body">
        <embed src="<?php echo base_url();?>/upload_foto/<?PHP echo $korban_foto2; ?>" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 