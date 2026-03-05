<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TBL_USER</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
          <?php  if($_SESSION['id_user_level']==1){?>   
            
        <?php echo anchor(site_url('kelola_pendaftaran/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
        <?php echo anchor(site_url('kelola_pendaftaran/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?></div>
         
             <?php }?>  
            
            
            <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                <th width="30px">No</th>
                <th>Full Name</th>
                <th>Kota Lahir</th>
                <th>Birth</th>
                <th>Email</th>
                <th>Username</th>
                <th>Alamat</th>
                <th>Nik</th>
             
                   <!--    <th>Pekerjaan</th>
                    <th>Penyandang Disabilitas</th>
                    <th>Ket Laporan</th>-->

		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>

<script src="https://cdn.datatables.net/fixedheader/3.3.2/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>
 
 <script>
new DataTable('#mytable', {
    responsive: true,
    rowReorder: {
        selector: 'td:nth-child(2)'
    }
});
 </script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.3.2/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css">
 

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

                var t = $("#mytable").dataTable({
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
                            {"data": "kota_lahir"},
                            {"data": "birth"},
                            {"data": "email"},
                            {"data": "username"},
                            {"data": "alamat_domisili"},
                             {"data": "nik"},
                          
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