<!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<div class="content-wrapper">
<section class="content">
<div class="box box-warning box-solid">
<div class="box-header with-border">
        <h3 class="box-title"><?php echo strtoupper($button) ?> DATA USER</h3>
</div>
<form action="<?php echo $action; ?>" method="post">
        <table class='table table-bordered'>


                <tr>
                        <td width='200'>Nik <?php echo form_error('nik') ?></td><td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" /></td>
                </tr>

                <tr>
                        <td width='200'>Nama Lengkap <?php echo form_error('fullname') ?></td><td><input type="text" class="form-control" name="fullname" id="fullname" placeholder="Nama Lengkap" value="<?php echo $fullname; ?>" /></td>
                </tr>

                <tr>
                        <td width='200'>Jenis Kelamin <?php echo form_error('gender') ?></td><td>

                            <input name ="gender" type="radio" value="Laki-Laki" id="Laki-Laki"  >Laki-Laki &nbsp;<input name ="gender" type="radio" value="Perempuan" id="Perempuan"  >Perempuan

                        </td>
                </tr>

                <tr>
                        <td width='200'>Tanggal Lahir <?php echo form_error('birth') ?></td>
                        <td><input type="date" class="form-control" name="birth" id="birth" placeholder="Birth" value="<?php echo $birth; ?>" /></td>
                </tr>

                <tr>
                        <td width='200'>HP/Telepon <?php echo form_error('phone') ?></td><td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" /></td>
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
                        <td width='200'>Propinsi <?php echo form_error('province_id') ?></td><td>
                            
                        <?php echo cmb_dinamis_propinsi('province_id', 'reg_provinces', 'name', 'id') ?>
                        </td>
                </tr>
               <tr>
                    <td width='200'>Kabupaten <?php echo form_error('regency_id') ?></td><td>
                        <select name="regency_id" class="id_kab form-control" id="pilih_kecamatan">

                        </select>
                    </td>
                </tr>


                <tr>
                    <td width='200'>Kecamatan <?php echo form_error('district_id') ?></td><td>
                        <select name="district_id" class="id_kec form-control" id="pilih_desa">

                        </select>
                    </td>
                </tr>

                <tr>
                    <td width='200'>Desa<?php echo form_error('village_id') ?></td><td>
                        <select name="village_id" class="id_desa form-control" >  </select>
                    </td>
                </tr>

                <tr>
                        <td width='200'>Pekerjaan <?php echo form_error('pekerjaan') ?></td><td><input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" /></td>
                </tr>

                <tr>
                        <td width='200'>Penyandang Disabilitas <?php echo form_error('penyandang_disabilitas') ?></td><td>
                            
                               <input name ="penyandang_disabilitas" type="radio" value="Ya" id="penyandang_disabilitas"  >Ya &nbsp;<input name ="penyandang_disabilitas" type="radio" value="Tidak" id="penyandang_disabilitas"  >Tidak
        </tr>

                <tr>
                        <td width='200'>Alamat Domisili <?php echo form_error('alamat_domisili') ?></td><td>

                        <textarea class="form-control" rows="3" name="alamat_domisili" id="alamat_domisili" placeholder="Alamat domisili"><?php echo $alamat_domisili; ?></textarea>
                        </td>
                </tr>


                <input type="text" class="form-control" name="level" id="level" placeholder="level" value="1" />
                 <input type="text" class="form-control" name="active" id="active" placeholder="active" value="2" />


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
    
    <script type="text/javascript">
   $(document).ready(function(){
       $('#pilih_kabupaten').change(function(){
           var id=$(this).val();
           $.ajax({
               url : "<?php echo base_url(); ?>index.php/Kelola_register/get_kabupaten",
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
           url : "<?php echo base_url(); ?>index.php/Kelola_register/get_kecamatan",
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
                    url : "<?php echo base_url(); ?>index.php/Kelola_register/get_desa",
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