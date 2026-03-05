<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA SAMPAH</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
    <table class="table table-bordered table-striped" id="mytable">
            <thead>
			<tr>
			<th width="30px">No</th>
			<th>Berita Acara Kode</th>
			<th>Berita Acara Status</th>
			<th>Berita Acara Tgl</th>
			<th>Pelapor Nama</th>
			<th>Pelapor Nik</th>
			<th>Korban Nik</th>
			<th>Korban Nama</th>
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
                    ajax: {"url": "kelola_sampah/json", "type": "POST"},
                    columns: [
                        {
                            "data": "berita_acara_id",
                            "orderable": false
                        },
                        
           {"data": "berita_acara_kode"},
           {
                className: "center",
                data: "berita_acara_status",
                render: function (data, type, row) {
                    if ( type === 'display' || type === 'filter' ) {
                        // Filtering and display get the rendered string
                        return data == 1 ? "Pengajuan Laporan" : data == 2 ? "Sedang proses": data == 3 ? "Selesai":"Ditolak" ;
                    }
                    // Otherwise just give the original data
                    return data;
                }
            },
  
                       
                        {"data": "berita_acara_tgl"},
                       
                        {"data": "pelapor_nama"},
                  
                        {"data": "pelapor_nik"},
                       
                        {"data": "korban_nik"},
                        {"data": "korban_nama"},
                   //     {"data": "korban_jeniskelamin"},
                    //    {"data": "korban_agama"},{"data": "korban_tempat"},{"data": "korban_tgl_lahir"},{"data": "korban_prop"},{"data": "korban_kab"},{"data": "korban_kec"},{"data": "korban_desa"},{"data": "korban_foto1"},{"data": "korban_foto2"},{"data": "korban_email"},{"data": "korban_telepon"},{"data": "korban_tglkejadian"},{"data": "pelaku_nama"},{"data": "pelaku_jenis_kelamin"},{"data": "pelaku_usia"},{"data": "pelaku_hubungan"},{"data": "pelaku_pendidikan"},{"data": "pelaku_alamat"},{"data": "pelaku_prop"},{"data": "pelaku_kab"},{"data": "pelaku_kec"},{"data": "pelaku_desa"},{"data": "pelaku_nik"},{"data": "lapor_anonim"},{"data": "lapor_rahasia"},{"data": "lapor_status"},{"data": "lapor_kategori"},{"data": "lapor_disposisi"},{"data": "lapor_klarifikasi"},{"data": "create_at"},{"data": "update_at"},{"data": "delete_at"},{"data": "user_id"},
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
