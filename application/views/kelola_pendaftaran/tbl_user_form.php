
<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php  echo strtoupper($button) ?> DATA TBL_USER</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
		
				<table class='table table-bordered'>
                                  
	
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
                                        <tr>
                                            <td width='200'>Hp/Telepon Aktif <?php echo form_error('phone') ?></td><td><input readonly="" type="text" class="form-control" name="phone" id="phone" placeholder="No HP / Telp" value="<?php echo $phone; ?>" /></td>
					</tr>
	    
				
					<input type="hidden" class="form-control" name="id_user_level" id="id_user_level" placeholder="Id User Level" value="2" />
                           
	
					<input type="hidden" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="1" />
	
					<input type="hidden" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $email; ?>" />
	
					<tr>
						<td width='200'>Password <?php echo form_error('password') ?></td><td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
					</tr>
	
                                        <tr>
                                            <td width='200'>Propinsi <?php echo form_error('province_id') ?></td><td>

                                                <?php echo cmb_dinamis_propinsi('province_id', 'reg_provinces', 'name', 'id', $province_id, 'asc') ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='200'>Kabupaten <?php echo form_error('regency_id') ?></td><td>
                                                
                                                <?PHP if ($button == 'Update' and $regency_id!='') { ?>
                                                    <?php echo cmb_dinamis_propinsi('regency_id', 'reg_regencies', 'name', 'id', $regency_id, 'asc') ?>
                                                <?PHP } else  {?>
                                                
                                               <select name="regency_id" class="id_kab form-control" id="pilih_kecamatan">
                                                </select>

                                                </select>
                                                <?PHP } ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td width='200'>Kecamatan <?php echo form_error('district_id') ?></td><td>
                                                <?PHP if ($button == 'Update' and $district_id!='') { ?>
                                                    <?php echo cmb_dinamis_propinsi('district_id', 'reg_districts', 'name', 'id', $district_id, 'asc') ?>
                                                <?PHP } else  {?>
                                                
                                                <select name="district_id" class="id_kec form-control" id="pilih_desa">

                                                </select>
                                                <?PHP } ?>

                                            </td>
                                        </tr>
  <?php  if($_SESSION['id_user_level']==1){?> 
                                        <tr>
                                            <td width='200'>Level user <?php echo form_error('id_user_level') ?></td><td>

                                                <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level, 'asc') ?>
                                            </td>
                                        </tr>
  <?php  }?> 
                                        <tr>
						<td width='200'>Alamat Domisili <?php echo form_error('alamat_domisili') ?></td>
						<td> <textarea class="form-control" rows="3" name="alamat_domisili" id="alamat_domisili" placeholder="Alamat Domisili"><?php echo $alamat_domisili; ?></textarea></td>
					</tr>
	

					<tr>
						<td width='200'>Pekerjaan <?php echo form_error('pekerjaan') ?></td><td><input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" /></td>
					</tr>
	
                                        <tr>
                                            <td width='200'>Penyandang Disabilitas <?php echo form_error('penyandang_disabilitas') ?></td><td>


                                                <?php
                                                if ($penyandang_disabilitas == 'Ya' and $button == 'Update') {
                                                    ?>
                                                    <input name ="penyandang_disabilitas" type="radio" value="Ya" id="penyandang_disabilitas"  checked>Ya<br /> 
                                                    <input name ="penyandang_disabilitas" type="radio" value=Tidak id="penyandang_disabilitas"  >Tidak<br />


                                                    <?php
                                                } else {
                                                    ?> 
                                                    <input name ="penyandang_disabilitas" type="radio" value="Ya" id="penyandang_disabilitas"  >Ya<br /> 
                                                    <input name ="penyandang_disabilitas" type="radio" value="Tidak" id="penyandang_disabilitas"  checked>Tidak<br />

                                                <?php } ?>


                                            </td>
                                        </tr>
	    
					
					
	    
					<tr>
						<td width='200'>Ket Laporan <?php echo form_error('ket_laporan') ?></td>
						<td> <textarea class="form-control" rows="3" name="ket_laporan" id="ket_laporan" placeholder="Ket Laporan"><?php echo $ket_laporan; ?></textarea></td>
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