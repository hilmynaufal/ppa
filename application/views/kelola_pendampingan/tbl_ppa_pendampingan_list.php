<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA PENDAMPINGAN</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('kelola_pendampingan/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
	<?php echo anchor(site_url('kelola_pendampingan/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?></div>
            <table class="display table table-bordered table-striped" id="mytable"  cellspacing="0" width="100%">
                <thead>
                    <tr>
                        
                        <th width="30px">No</th>
                        <th>Kode Registrasi</th>
                        <th>Layanan Tgl</th>
                        <th>Layanan Jenis</th>
                        <th>Jenis Pendampingan</th>
                        <th>Layanan Keterangan</th>
                         <th>Nama Korban</th>
                         <th>NIK Korban</th>

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
        
        
 <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
 <script src="https://cdn.datatables.net/rowgroup/1.4.0/js/dataTables.rowGroup.min.js"></script>
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
var groupColumn = 1;
    var t = $("#mytable").dataTable({
           
                     
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "kelola_pendampingan/json", "type": "POST"},
                    columns: [
                        
                        {
                                       
                            "data": "layanan_id",
                            "orderable": false
                        },{"data": "kode_beritaacara"},
                        {"data": "layanan_tgl"},
                        {"data": "layanan_jenis"},
                        {"data": "progres_nama"},
                        {"data": "tindak_lanjut1"},
                        {"data": "korban_nama"},
                        {"data": "korban_nik"},
                        //{"data": "layanan_rtl"},{"data": "layanan_progress"},{"data": "layanan_foto1"},{"data": "layanan_foto2"},{"data": "layanan_foto3"},{"data": "tindak_lanjut1"},{"data": "tindak_lanjut2"},{"data": "tindak_lanjut3"},{"data": "creat_at"},{"data": "update_at"},{"data": "delete_at"},{"data": "id_users"},
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
                    },
                     displayLength: 10,
                     drawCallback: function (settings) {
        var api = this.api();
        var rows = api.rows({ page: 'current' }).nodes();
        var last = null;
 
        api.column(groupColumn, { page: 'current' })
            .data()
            .each(function (group, i) {
                if (last !== group) {
                    $(rows)
                        .eq(i)
                        .before(
                            '<tr class="group"><td colspan="5">' +
                                group +
                                '</td></tr>'
                        );
 
                    last = group;
                }
            });
    }
                });
                
                

    
    
} );
            $('#mytable tbody').on('click', 'tr.group', function () {
    var currentOrder = table.order()[5];
    if (currentOrder[0] === groupColumn && currentOrder[1] === 'asc') {
        table.order([groupColumn, 'desc']).draw();
    }
    else {
        table.order([groupColumn, 'asc']).draw();
    }
});
    
    
    
    
    
    
    
    
    
    
    
    
        </script>
        
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.4.0/css/rowGroup.bootstrap.min.css">


