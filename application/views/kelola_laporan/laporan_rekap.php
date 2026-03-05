
<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"> CETAK REKAP LAPORAN </h3>
			</div>

            <form action="<?php echo $action; ?>" method="post">
				<table class='table table-bordered'>
	
				  <tr>
					<td width='200'>Kecamatan <?php echo form_error('id_kec') ?></td><td>

						<?php echo cmb_dinamis_kecamatan('id_kecamatan', 'reg_districts', 'name', 'id','', 'asc') ?>
					</td>
				</tr>
				
				<tr>
						<td width='200'>Desa <?php echo form_error('district_id') ?></td><td>
						
							
						  <select name="id_desa" class="id_desa form-control" >
						  
							</select>

						

						</td>
					</tr>
				
				
				
                    <tr>
						<td width='200'> Tgl Awal <?php echo form_error('pasien_tgldaftar') ?></td>
						<td>
                            <input type="date" class="form-control" name="tgl1" id="pasien_tgldaftar" placeholder="Pasien Tgldaftar" value="" />
                    
                    </td>
					</tr>

                    <tr>
						<td width='200'> Tgl Akhir <?php echo form_error('pasien_tgldaftar') ?></td>
						<td>
                            <input type="date" class="form-control" name="tgl2" id="pasien_tgldaftar" placeholder="Pasien Tgldaftar" value="" />
                    
                    
                    </td>
					</tr>

					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_users" value="<?php echo $_SESSION['id_users']; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('kelola_laporan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>


            </div>
    </section>
</div>
<!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>






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
                        var html = '<option value="">Pilih Semua</option>';
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