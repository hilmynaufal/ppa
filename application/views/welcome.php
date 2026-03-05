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

        <!-- Statistics Widget -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $statistics['total_laporan']; ?></h3>
                        <p>Total Laporan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $statistics['laporan_pengajuan']; ?></h3>
                        <p>Belum Diproses</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?php echo $statistics['laporan_proses']; ?></h3>
                        <p>Sedang Proses</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-spinner"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $statistics['laporan_pendampingan']; ?></h3>
                        <p>Sedang Pendampingan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-5">
                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-clock-o"></i> Pelaporan Terbaru</h3>
                </div>
                <ul class="timeline">
                    <?PHP
                    $jml_data = count($kelola_berita_data);

                    if ($jml_data >= 1) { ?>
                        <?PHP foreach ($kelola_berita_data as $rows) { ?>


                            <li class="time-label">
                                <span class="bg-red">
                                    Tanggal Laporan <?php echo tanggal_indonesia($rows->berita_acara_tgl) ?>
                                </span>
                            </li>

                            <li>
                                <i class="fa fa-user bg-aqua"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> </span>
                                    <h3 class="timeline-header no-border"><a href="#">Pihak Pelapor</a>
                                        <?php echo $rows->pelapor_nama ?></h3>-
                                    <h3 class="timeline-header no-border"><a href="#">Status Laporan</a> Belum Diproses</h3>
                                </div>
                            </li>


                            <li>
                                <i class="fa fa-comments bg-yellow"></i>
                                <div class="timeline-item">

                                    <h3 class="timeline-header"><a href="#">Kronologi</a> </h3>
                                    <div class="timeline-body">
                                        <?php echo $rows->berita_acara_kronologi ?>
                                    </div>

                                </div>
                            </li>


                            <li>
                                <i class="fa fa-envelope bg-blue"></i>
                                <div class="timeline-item">

                                    <h3 class="timeline-header"><a href="#">Foto Pendukung</a> </h3>
                                    <div class="timeline-body">
                                        <?PHP

                                        $imagePath = '/home/apps/diskominfo-portal/ppa/upload_foto/' . $rows->korban_foto1;  // Linux/Unix
                                
                                        // $imagePath = 'D:\\laragon\\www\\bandungkab\\ppa\\upload_foto\\' . $rows->korban_foto1;
                                

                                        if (is_file($imagePath)) {

                                            ?>
                                            <img src="<?php echo base_url(); ?>/upload_foto/<?PHP echo $rows->korban_foto1 ?>"
                                                width="150px" height="100px" class="margin">

                                            <?PHP

                                        } else {
                                            echo "Gambar tidak ada.";
                                        }
                                        ?>



                                    </div>

                                    <?php if ($_SESSION['id_user_level'] <= 2) { ?>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs"
                                                href="<?php echo site_url('kelola_berita_acara/update/' . $rows->berita_acara_id) ?>">Tindak
                                                Lanjuti</a>

                                        </div>
                                    <?php } ?>
                                </div>
                            </li>

                        <?PHP } ?>
                    <?PHP } else { ?>
                        <li>
                            <i class="fa fa-envelope bg-blue"></i>
                            <div class="timeline-item">

                                <h3 class="timeline-header"><a href="#">Belum ada Berita acara</a> </h3>
                                <div class="timeline-body">
                                </div>
                                <div class="timeline-footer">
                                    <a href="<?php echo site_url('kelola_berita_acara/create/') ?>"
                                        class="btn btn-primary btn-xs">Buat Berita acara disini</a>

                                </div>
                            </div>
                        </li>
                    <?PHP } ?>
                </ul>

            </div>


            <!--bagi2-->

            <div class="row" style="margin-top: 10px;">

                <div class='col-md-3'>
                    <div style="padding-bottom: 10px;"'>
                             <?php if ($_SESSION['id_user_level'] != 3) { ?>
                                <?php echo anchor(site_url('kelola_berita/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Laporkan Kasus Kekerasan', 'class="btn btn-danger btn-sm"'); ?>
                             <?php } ?>
                        </div>
                    </div>
                    

                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-camera"></i>Berita Acara</h3>
                            </div>
                            <div class="box-body">
                                <!--<table id="example" class="table table-bordered" style="margin-bottom: 10px">-->
                                <table id="mytable"  style="width:100%">
                            <thead>
                                <tr>
                                    <th width="30px">Tgl Berita Acara</th>
                                    <th>Status laporan</th>
                                    <th>Nama Pelapor</th>
                                    <th>NIK Pelapor</th>
                                    <th>Nama Korban</th>
                                     
                                  <th>Nik Pelapor</th>
                                  <?php if ($_SESSION['id_user_level'] != 3) { ?>

                                        <th width="200px">Action</th>
                                  <?php } ?>
                                </tr>
                            </thead>

                        </table>
                                 
                                
                                
                            </div>

                        </div>

                    </div>
                    
           
                
               
                

            </div>
                
                
                
                
                



        </section>
    </div>
                

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<style>
    table td {
        word-break: break-word;
        vertical-align: top;
        white-space: normal !important;
    }
</style>




</head>
        
       <script>
        $.fn.dataTable.ext.type.order[' custom-date-pre'] = function (d) {
            var parts = d.split('/'); return new Date(parts[2],
                parts[1] - 1, parts[0]).getTime();
        }; new DataTable('#mytable', {
            "columnDefs": [{
                "type"
                    : "custom-date", "targets": 0
            } // Target the date column (index 1) ], "order" : [[0, "desc"
            ]], responsive: true, rowReorder: { selector: 'td:nth-child(4)' }, "ordering": true, // Set
            true agar bisa di sorting processing: true, serverSide: true, ajax:
                { "url": "kelola_berita_acara/json", "type": "POST" }, columns: [{
                    "data": "berita_acara_tgl"
                }, {
                    className: "center", data: "berita_acara_status", render: function (data, type, row) {
                        if
                            (type === 'display' || type === 'filter') { // Filtering and display get the rendered string
                            return data == 1 ? "Belum Diproses" : data == 2 ? "Sedang proses" : "Selesai";
                        } // Otherwise just
                        give the original data return data;
                    }
                }, { "data": "pelapor_nama" }, { "data": "pelapor_nik" },
                { "data": "korban_nama" }, { "data": "korban_nik" }, <?php if ($_SESSION['id_user_level'] != 3) { ?>
                            { "data": "action", "orderable": false, "className": "text-center" } <?php } ?>],
        });
    </script>