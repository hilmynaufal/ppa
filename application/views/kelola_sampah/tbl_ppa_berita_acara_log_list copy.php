<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TBL_PPA_BERITA_ACARA_LOG</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('kelola_sampah/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('kelola_sampah/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?></div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Berita Acara Status</th>
		    <th>Berita Acara Dihentikan</th>
		    <th>Berita Acara Kode</th>
		    <th>Berita Acara Tgl</th>
		    <th>Berita Acara Hari</th>
		    <th>Berita Acara Kronologi</th>
		    <th>Berita Acara Penerima Laporan</th>
		    <th>Berita Acara Kepala Uptd</th>
		    <th>Berita Acara Keterangan</th>
		    <th>Pelapor Nama</th>
		    <th>Pelapor Tgl</th>
		    <th>Pelapor Tempat</th>
		    <th>Pelapor Idusers</th>
		    <th>Pelapor Nik</th>
		    <th>Pelapor Pekerjaan</th>
		    <th>Pelapor Telepon</th>
		    <th>Pelapor Kab</th>
		    <th>Pelapor Kec</th>
		    <th>Pelapor Desa</th>
		    <th>Korban Nik</th>
		    <th>Korban Nama</th>
		    <th>Korban Jeniskelamin</th>
		    <th>Korban Agama</th>
		    <th>Korban Tempat</th>
		    <th>Korban Tgl Lahir</th>
		    <th>Korban Usia</th>
		    <th>Korban Prop</th>
		    <th>Korban Kab</th>
		    <th>Korban Kec</th>
		    <th>Korban Desa</th>
		    <th>Korban Foto1</th>
		    <th>Korban Foto2</th>
		    <th>Korban Email</th>
		    <th>Korban Telepon</th>
		    <th>Korban Tglkejadian</th>
		    <th>Pelaku Nama</th>
		    <th>Pelaku Jenis Kelamin</th>
		    <th>Pelaku Usia</th>
		    <th>Pelaku Hubungan</th>
		    <th>Pelaku Pendidikan</th>
		    <th>Pelaku Alamat</th>
		    <th>Pelaku Prop</th>
		    <th>Pelaku Kab</th>
		    <th>Pelaku Kec</th>
		    <th>Pelaku Desa</th>
		    <th>Pelaku Nik</th>
		    <th>Lapor Anonim</th>
		    <th>Lapor Rahasia</th>
		    <th>Lapor Status</th>
		    <th>Lapor Kategori</th>
		    <th>Lapor Disposisi</th>
		    <th>Lapor Klarifikasi</th>
		    <th>Create At</th>
		    <th>Update At</th>
		    <th>Delete At</th>
		    <th>User Id</th>
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
                        },{"data": "berita_acara_status"},{"data": "berita_acara_dihentikan"},{"data": "berita_acara_kode"},{"data": "berita_acara_tgl"},{"data": "berita_acara_hari"},{"data": "berita_acara_kronologi"},{"data": "berita_acara_penerima_laporan"},{"data": "berita_acara_kepala_uptd"},{"data": "berita_acara_keterangan"},{"data": "pelapor_nama"},{"data": "pelapor_tgl"},{"data": "pelapor_tempat"},{"data": "pelapor_idusers"},{"data": "pelapor_nik"},{"data": "pelapor_pekerjaan"},{"data": "pelapor_telepon"},{"data": "pelapor_kab"},{"data": "pelapor_kec"},{"data": "pelapor_desa"},{"data": "korban_nik"},{"data": "korban_nama"},{"data": "korban_jeniskelamin"},{"data": "korban_agama"},{"data": "korban_tempat"},{"data": "korban_tgl_lahir"},{"data": "korban_usia"},{"data": "korban_prop"},{"data": "korban_kab"},{"data": "korban_kec"},{"data": "korban_desa"},{"data": "korban_foto1"},{"data": "korban_foto2"},{"data": "korban_email"},{"data": "korban_telepon"},{"data": "korban_tglkejadian"},{"data": "pelaku_nama"},{"data": "pelaku_jenis_kelamin"},{"data": "pelaku_usia"},{"data": "pelaku_hubungan"},{"data": "pelaku_pendidikan"},{"data": "pelaku_alamat"},{"data": "pelaku_prop"},{"data": "pelaku_kab"},{"data": "pelaku_kec"},{"data": "pelaku_desa"},{"data": "pelaku_nik"},{"data": "lapor_anonim"},{"data": "lapor_rahasia"},{"data": "lapor_status"},{"data": "lapor_kategori"},{"data": "lapor_disposisi"},{"data": "lapor_klarifikasi"},{"data": "create_at"},{"data": "update_at"},{"data": "delete_at"},{"data": "user_id"},
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