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
            
          <table class="table table-bordered table-striped" id="mytable"  style="width:100%">
            <thead>
                <tr>
                <th>Nama</th>
                <th>Hp</th>
                <th>Kota Lahir</th>
                <th>Tanggal Lahir</th>
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
<script>
new DataTable('#mytable', {
    responsive: true,
    rowReorder: {
        selector: 'td:nth-child(4)'
    },
     "ordering": true, // Set true agar bisa di sorting
    "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
     processing: true,
                    serverSide: true,
                    ajax: {"url": "kelola_pendaftaran/json", "type": "POST"},
                    columns: [
                      
                            {"data": "full_name"},
                            {"data": "phone"},
                            {"data": "kota_lahir"},
                            {"data": "birth"},
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
                    
});
</script>
       
         