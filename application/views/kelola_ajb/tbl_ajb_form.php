<style>
               #customers {
                 font-family: Arial, Helvetica, sans-serif;
                 border-collapse: collapse;
                 width: 80%;
               }

               #customers td, #customers th {
                 border: 1px solid #ddd;
                 padding: 8px;
               }

               #customers tr:nth-child(even){background-color: #f2f2f2;}



               #customers th {
                 padding-top: 12px;
                 padding-bottom: 12px;
                 text-align: left;
                 background-color: #04AA6D;
                 color: white;
               }
           </style>
<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_AJB</h3>
			</div>
			<form  enctype="multipart/form-data" action="<?php echo $action; ?>" method="post">
			
				<table id="customers">
                                        <tr>
                                            <td colspan="3"><p style="font-size:15px;font-family: inherit;font-weight: bold;font-style: italic;">DATA PENJUAL </p></td>
					</tr>
					<tr>
                                            <input type="hidden" class="form-control" name="kode_akta" id="kode_akta" placeholder="kode_akta" value="<?php echo $kode_akta; ?>" />
						<td width='200'>Nama Penjual <?php echo form_error('penjual') ?></td><td><input type="text" class="form-control" name="penjual" id="penjual" placeholder="Penjual" value="<?php echo $penjual; ?>" /></td>
					</tr>
                                        <tr>
						<td width='200'>Nik Penjual <?php echo form_error('nik_penjual') ?></td><td><input type="text" class="form-control" name="nik_penjual" id="nik_penjual" placeholder="NIK Penjual" value="<?php echo $nik_penjual; ?>" /></td>
					</tr>
                                        <tr>
                                            <td width='200'>Ktp Penjual <?php echo form_error('ktp_penjual') ?></td><td><input type="file" class="form-control" name="ktp_penjual" id="ktp_penjual" placeholder="ktp_penjual" value="<?php echo $ktp_penjual; ?>" /></td>
                                            <td width='100'>
                                                <input  type="text" multiple="" name="ktp_penjual2" class="form-control"  id="ktp_penjual" placeholder="Berkas" value="<?php echo $ktp_penjual; ?>" readonly="" />
                                                <?PHP if ($button = 'update' AND $ktp_penjual != '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">Lihat</button>

                                                <?PHP } ?> 
                                        </tr>
                                        <tr>
                                            <td colspan="3"><p style="font-size:15px;font-family: inherit;font-weight: bold;font-style: italic;">DATA PEMBELI</p></td>
					</tr>	
					<tr>
						<td width='200'>Nama Pembeli <?php echo form_error('pembeli') ?></td><td>
                                                    <input type="text" class="form-control" name="pembeli" id="pembeli" placeholder="Pembeli" value="<?php echo $pembeli; ?>" /></td>
					</tr>
                                        
                                            <tr>
						<td width='200'>Nik Pembeli <?php echo form_error('nik_pembeli') ?></td><td><input type="text" class="form-control" name="nik_pembeli" id="nik_pembeli" placeholder="Penjual" value="<?php echo $nik_penjual; ?>" /></td>
					</tr>

                                        <tr>
                                            <td width='200'>Ktp Pembeli <?php echo form_error('ktp_pembeli') ?></td><td><input type="file" class="form-control" name="ktp_pembeli" id="ktp_pembeli" placeholder="ktp_penjual" value="<?php echo $ktp_pembeli; ?>" /></td>
                                            <td width='100'>
                                                <input  type="text" multiple="" name="ktp_pembeli2" class="form-control"  id="ktp_pembeli" placeholder="ktp_pembeli" value="<?php echo $ktp_pembeli; ?>" readonly="" />
                                                <?PHP if ($button = 'update' AND $ktp_pembeli != '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal1">Lihat</button>

                                                <?PHP } ?> 
                                        </tr>
                                        
                                          <tr>
                                            <td colspan="3"><p style="font-size:15px;font-family: inherit;font-weight: bold;font-style: italic;">KETERANGAN AKTA</p></td>
					</tr>
	
					<tr>
						<td width='200'>Jenis Akta <?php echo form_error('jenis_akta') ?></td><td>
                                                     <?php echo cmb_dinamis('jenis_akta', 'ref_jenis_akta', 'nama_jenis', 'id_jenis',$selected='id_jenis',$order='desc') ?>
                                                    
                                                </td>
					</tr>
	
					<tr>
						<td width='200'>Nomor Akta <?php echo form_error('nomor_akta') ?></td><td><input type="text" class="form-control" name="nomor_akta" id="nomor_akta" placeholder="Nomor Akta" value="<?php echo $nomor_akta; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Akta <?php echo form_error('tanggal_akta') ?></td>
						<td><input type="date" class="form-control" name="tanggal_akta" id="tanggal_akta" placeholder="Tanggal Akta" value="<?php echo $tanggal_akta; ?>" /></td>
					</tr>
                                        
                                        
                                        <tr>
                                            <td colspan="3"><p style="font-size:15px;font-family: inherit;font-weight: bold;font-style: italic;">LETTER KOHIR</p></td>
					</tr>
	
					<tr>
						<td width='200'>Letter Kohir <?php echo form_error('letter_kohir') ?></td><td><input type="text" class="form-control" name="letter_kohir" id="letter_kohir" placeholder="Letter Kohir" value="<?php echo $letter_kohir; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Letter Nopersil <?php echo form_error('letter_nopersil') ?></td><td><input type="text" class="form-control" name="letter_nopersil" id="letter_nopersil" placeholder="Letter Nopersil" value="<?php echo $letter_nopersil; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Letter Blok <?php echo form_error('letter_blok') ?></td><td><input type="text" class="form-control" name="letter_blok" id="letter_blok" placeholder="Letter Blok" value="<?php echo $letter_blok; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Luas <?php echo form_error('luas') ?></td><td><input type="text" class="form-control" name="luas" id="luas" placeholder="Luas" value="<?php echo $luas; ?>" /></td>
					</tr>
                                        
                                        <tr>
                                            <td colspan="3"><p style="font-size:15px;font-family: inherit;font-weight: bold;font-style: italic;">BATAS LOKASI</p></td>
					</tr>
	
					<tr>
						<td width='200'>Batas Utara <?php echo form_error('batas_utara') ?></td><td><input type="text" class="form-control" name="batas_utara" id="batas_utara" placeholder="Batas Utara" value="<?php echo $batas_utara; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Batas Selatan <?php echo form_error('batas_selatan') ?></td><td><input type="text" class="form-control" name="batas_selatan" id="batas_selatan" placeholder="Batas Selatan" value="<?php echo $batas_selatan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Batas Timur <?php echo form_error('batas_timur') ?></td><td><input type="text" class="form-control" name="batas_timur" id="batas_timur" placeholder="Batas Timur" value="<?php echo $batas_timur; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Batas Barat <?php echo form_error('batas_barat') ?></td><td><input type="text" class="form-control" name="batas_barat" id="batas_barat" placeholder="Batas Barat" value="<?php echo $batas_barat; ?>" /></td>
					</tr>
                                        
                                         <tr>
                                            <td colspan="3"><p style="font-size:15px;font-family: inherit;font-weight: bold;font-style: italic;">KETERANGAN AKTA</p></td>
					</tr>
                                        <tr>
						<td width='200'>Nilai Transaksi <?php echo form_error('nilai_transaksi') ?></td><td>
                                                    <input type="text"  name="nilai_transaksi" class="form-control" id="nilai_transaksi" placeholder="nilai_transaksi" value="<?php echo $nilai_transaksi; ?>" />
                                                </td>                                                  
					</tr>
                                        
                                        
                                        
                                        <tr>
                                            <td width='200'>SPPT PBB <?php echo form_error('sppt_pbb') ?></td><td><input type="file" class="form-control" name="sppt_pbb" id="sppt_pbb" placeholder="sppt_pbb" value="<?php echo $sppt_pbb; ?>" /></td>
                                            <td width='100'>
                                                <input  type="text" multiple="" name="sppt_pbb2" class="form-control"  id="sppt_pbb2" placeholder="Berkas" value="<?php echo $sppt_pbb; ?>" readonly="" />
                                                <?PHP if ($button = 'update' AND $sppt_pbb != '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal3">Lihat</button>

                                                <?PHP } ?> 
                                        </tr>
	
				
	
					
	
					<tr>
						<td width='200'>Resi <?php echo form_error('resi') ?></td><td><input type="text" class="form-control" name="resi" id="resi" placeholder="Resi" value="<?php echo $resi; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Keterangan Tercatat <?php echo form_error('keterangan_tercatat') ?></td><td><input type="text" class="form-control" name="keterangan_tercatat" id="keterangan_tercatat" placeholder="Keterangan Tercatat" value="<?php echo $keterangan_tercatat; ?>" /></td>
					</tr>
                                        
                                          <tr>
                                            <td width='200'>Akta Sebelumnya <?php echo form_error('akta_sebelum') ?></td><td><input type="file" class="form-control" name="akta_sebelum" id="akta_sebelum" placeholder="akta_sebelum" value="<?php echo $akta_sebelum; ?>" /></td>
                                            <td width='100'>
                                                <input  type="text" multiple="" name="akta_sebelum2" class="form-control"  id="akta_sebelum" placeholder="Berkas" value="<?php echo $akta_sebelum; ?>" readonly="" />
                                                <?PHP if ($button = 'update' AND $akta_sebelum!= '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal5">Lihat</button>

                                                <?PHP } ?> 
                                        </tr>
                                        
                                       
                                        
                                        
                                        <tr>
                                            <td width='200'>Akta Selesai <?php echo form_error('akta_selesai') ?></td><td><input type="file" class="form-control" name="akta_selesai" id="akta_selesai" placeholder="akta_selesai" value="<?php echo $akta_selesai; ?>" /></td>
                                            <td width='100'>
                                                <input  type="text" multiple="" name="akta_selesai2" class="form-control"  id="akta_selesai" placeholder="Berkas" value="<?php echo $akta_selesai; ?>" readonly="" />
                                                <?PHP if ($button = 'update' AND $akta_selesai != '') { ?>
                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal4">Lihat</button>

                                                <?PHP } ?> 
                                        </tr>
                                        
                                        
                                        <tr>
						<td width='200'>Status Berkas <?php echo form_error('status_berkas') ?></td><td>
                                              
                                                
                                                  <?php
                                            if ($status_berkas == 1) {
                                                ?>
                                                <input name ="status_berkas" type="radio" value="1" id="status_berkas"  checked>Proses<br /> 
                                                <input name ="status_berkas" type="radio" value="2" id="status_berkas"  >Pending<br />
                                                <input name ="status_berkas" type="radio" value="3" id="status_berkas"  >Dibatalkan<br />
                                                <input name ="status_berkas" type="radio" value="4" id="status_berkas"  >Selesai<br />

                                                <?php
                                            } elseif ($status_berkas == 2) {
                                                ?>
                                               <input name ="status_berkas" type="radio" value="1" id="status_berkas"  >Proses<br /> 
                                                <input name ="status_berkas" type="radio" value="2" id="status_berkas"  checked>Pending<br />
                                                <input name ="status_berkas" type="radio" value="3" id="status_berkas"  >Dibatalkan<br />
                                                <input name ="status_berkas" type="radio" value="4" id="status_berkas"  >Selesai<br />

                                                <?php
                                            } elseif ($status_berkas == 3) {
                                                ?>
                                               <input name ="status_berkas" type="radio" value="1" id="status_berkas"  >Proses<br /> 
                                                <input name ="status_berkas" type="radio" value="2" id="status_berkas"  >Pending<br />
                                                <input name ="status_berkas" type="radio" value="3" id="status_berkas"  checked>Dibatalkan<br />
                                                <input name ="status_berkas" type="radio" value="4" id="status_berkas"  >Selesai<br />

                                                <?php
                                            }elseif($status_berkas == 4) {
                                                ?>
                                               <input name ="status_berkas" type="radio" value="1" id="status_berkas"  >Proses<br /> 
                                                <input name ="status_berkas" type="radio" value="2" id="status_berkas"  >Pending<br />
                                                <input name ="status_berkas" type="radio" value="3" id="status_berkas"  >Dibatalkan<br />
                                                <input name ="status_berkas" type="radio" value="4" id="status_berkas" checked >Selesai<br />
                                            
                                             <?php
                                                }else{
                                                    
                                                    ?>
                                                
                                                    <input name ="status_berkas" type="radio" value="1" id="status_berkas"  >Proses<br /> 
                                                <input name ="status_berkas" type="radio" value="2" id="status_berkas"  >Pending<br />
                                                <input name ="status_berkas" type="radio" value="3" id="status_berkas"  >Dibatalkan<br />
                                                <input name ="status_berkas" type="radio" value="4" id="status_berkas"  >Selesai<br />
                                                    
                                                    
                                          <?PHP
                                          }
                                                    
                                            
                                            ?> 
                                                
                                                
                                                
                                                </td>
					</tr>
	
					
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_ajb" value="<?php echo $id_ajb; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('kelola_ajb') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>
           
 <!-- Modalktp pembeli-->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ktp Pembeli</h4>
        </div>
        <div class="modal-body">
        <embed src="<?php echo base_url();?>/upload_akta/<?PHP echo $ktp_pembeli; ?>" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  
           
 <!-- Modalktp penjual-->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ktp Penjual</h4>
        </div>
        <div class="modal-body">
        <embed src="<?php echo base_url();?>/upload_akta/<?PHP echo $ktp_penjual; ?>" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>  
           
 <!-- Modal3 -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Akta Selesi</h4>
        </div>
        <div class="modal-body">
        <embed src="<?php echo base_url();?>/upload_akta/<?PHP echo $sppt_pbb; ?>" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>           
           
 <!-- Modal4 -->
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Akta Selesi</h4>
        </div>
        <div class="modal-body">
        <embed src="<?php echo base_url();?>/upload_akta/<?PHP echo $akta_selesai; ?>" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 
 
 
  <!-- Modal4 -->
  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Akta Sebelumnya</h4>
        </div>
        <div class="modal-body">
        <embed src="<?php echo base_url();?>/upload_akta/<?PHP echo $akta_sebelum; ?>" type="application/pdf" width="100%" height="600px" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>