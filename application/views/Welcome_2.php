
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <div class="content-wrapper">
        <section class="content-header">
            <h1>

                <small>Riwayat Pelaporan</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">UI</a></li>
                <li class="active">Timeline</li>
            </ol>



        </section>
        

<!--Riwayat -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">

                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>150</h3>
                                <p>Pengajuan Laporan Tindak Kekerasan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>
                                <p>Ditindak Lanjuti</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>44</h3>
                                <p>Dihentikan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">

                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>65</h3>
                                <p>Kasus Selesai</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
                             
         
                             
          
                   <div class="row">
                
                <div class="col-md-5">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-clock-o"></i> Riwayat Pelaporan Tindak Kekerasan Yang Sedang Dilaporkan</h3>
                    </div>
                    <ul class="timeline">
                        
        <?PHP  foreach ($kelola_berita_data as $rows) {?>
                        
                        
                        
                        <li class="time-label">
                            <span class="bg-red">
                                Tanggal Laporan  <?php echo tanggal_indonesia($rows->berita_acara_tgl) ?>
                            </span>
                        </li>
                        
                         <li>
                            <i class="fa fa-user bg-aqua"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i>  </span>
                                  <h3 class="timeline-header no-border"><a href="#">Pihak Pelapor</a> <?php echo $rows->pelapor_nama ?></h3>-
                                <h3 class="timeline-header no-border"><a href="#">Status Laporan</a> Dalam Proses</h3>
                            </div>
                        </li>

                        
                         <li>
                            <i class="fa fa-comments bg-yellow"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                                <h3 class="timeline-header"><a href="#">Kronologi</a> </h3>
                                <div class="timeline-body">
                                   <?php echo $rows->berita_acara_kronologi?>
                                </div>
                                
                            </div>
                        </li>


                        <li>
                            <i class="fa fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                                <h3 class="timeline-header"><a href="#">Foto Pendukung</a> </h3>
                                <div class="timeline-body">
                                    <img src="<?php echo base_url();?>/upload_foto/<?PHP echo $rows->korban_foto1 ?>" width="150px" height="100px"  class="margin">
                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-xs">Read more</a>
                                    <a class="btn btn-danger btn-xs">Delete</a>
                                </div>
                            </div>
                        </li>


                       
                        
                          <?PHP  }?>
                    </ul>
                </div>
                
              
                <!--bagi2-->
                
                <div class="row" style="margin-top: 10px;">


                    <div class='col-md-3'>
                        <div style="padding-bottom: 10px;"'>
                            <?php echo anchor(site_url('kelola_berita/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Laporkan Kasus Kekerasan', 'class="btn btn-danger btn-sm"'); ?>
                        </div>
                    </div>
                    <div class='col-md-3'>
                        <form action="<?php echo site_url('kelola_berita/index'); ?>" class="form-inline" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
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


                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-camera"></i>  Pelaporan Tindak Kekerasan</h3>
                            </div>
                            <div class="box-body">
                                <table id="example" class="table table-bordered" style="margin-bottom: 10px">
                                    <tr>
                                        <th>No</th>
                                      <th>Berita Acara Status</th>
                                        <th>Berita Acara Tgl</th>
                                        <th>Pelapor Nama</th>
                                        <th>Pelapor Nik</th>
                                        <th>Korban Nik</th>
                                        <th>Korban Nama</th>
                                        <th>Action</th>

                                    </tr>
                                        <?php
                                    $row = count($kelola_berita_data);
                                    if ($row >= 1) {

                                        foreach ($kelola_berita_data as $kelola_berita) {
                                            ?>
                                            <tr>
                                                <td width="10px"><?php echo ++$start ?></td>
                                                <td> 
                                                            <?php
                                                            if ($kelola_berita->berita_acara_status == 1) {
                                                                echo "Belum Diproses";
                                                            } else
                                                            if ($kelola_berita->berita_acara_status == 2) {
                                                                echo "Dalam Diproses";
                                                            } else {
                                                                echo "Selesai";
                                                            }
                                                            ?>
                                                </td>
                                                <td><?php echo $kelola_berita->berita_acara_tgl ?></td>


                                                <td><?php echo $kelola_berita->pelapor_nama ?></td>
                                                <td><?php echo $kelola_berita->pelapor_nik ?></td>


                                                <td><?php echo $kelola_berita->korban_nik ?></td>
                                                <td><?php echo $kelola_berita->korban_nama ?></td>
                                                <td style="text-align:center" width="200px">
                                                    <?php
                                                    echo anchor(site_url('kelola_berita/read/' . $kelola_berita->berita_acara_id), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                                    echo '  ';
                                                    echo anchor(site_url('kelola_berita/update/' . $kelola_berita->berita_acara_id), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');
                                                    echo '  ';
                                                    echo anchor(site_url('kelola_berita/delete/' . $kelola_berita->berita_acara_id), '<i class="fa fa-trash-o" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm" Delete', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                                    ?>
                                                </td>
                                            </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo '<tr><td width="10px" colspan="5"><p style="text-align:center">Laporan Kasus Kekerasan Belum ada</p></td><tr>';
                                            }
                                            ?>

                                </table>
                            </div>

                        </div>

                    </div>
                    
                    <!--data pelapor-->
          
            <div class="col-md-6">
                <div class="box box-primary">
    
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-camera"></i> Data Pelapor</h3>
                    </div>
        
                    <div class="box-body">
                        <div style="padding-bottom: 10px;"'>
                            <?php echo anchor(site_url('kelola_pendaftaran/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data Pelapor', 'class="btn btn-danger btn-sm"'); ?>
                      <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NIK</th>
                                    <th>Lokasi</th>
      

                                    <th width="200px">Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                    </div>
            </div>

 <!--data pelapor-->
                </div>
                
               
                

            </div>
                
                
                
                
                



        </section>
    </div>

<script >
$(document).ready(function () {
    $('#example.table').DataTable();
});

</script >
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable.table").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "kelola_pendaftaran/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_users",
                            "orderable": false
                            
                        },
                            {"data": "full_name"},
                            {"data": "nik"},
                            {"data": "alamat_domisili"},
                   
                          
//                            {"data": "alamat_domisili"},
////                            {"data": "pekerjaan"},
//                            {"data": "penyandang_disabilitas"},
//                            {"data": "ket_laporan"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
