<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TBL_PPA_BERITA_ACARA</h3>
                    </div>

                    <div class="box-body">
                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-6">
                                <?php echo anchor(site_url('kelola_berita_acara/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
                                <?php echo anchor(site_url('kelola_berita_acara/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'id="btn-excel" class="btn btn-success btn-sm"'); ?>
                            </div>
                            <div class="col-md-6 text-right">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label for="filter_tahun">Tahun: </label>
                                        <select id="filter_tahun" class="form-control input-sm">
                                            <option value="">Semua Tahun</option>
                                            <?php
                                            $thn_start = 2020;
                                            $thn_end = date('Y') + 2;
                                            for ($i = $thn_start; $i <= $thn_end; $i++) {
                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-left: 10px;">
                                        <label for="filter_bulan">Bulan: </label>
                                        <select id="filter_bulan" class="form-control input-sm">
                                            <option value="">Semua Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-left: 10px;">
                                        <label for="filter_tanggal">Tanggal: </label>
                                        <input type="date" id="filter_tanggal" class="form-control input-sm">
                                    </div>
                                </form>
                            </div>
                        </div>
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



    $(document).ready(function () {
        $.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
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
            initComplete: function () {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function (e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });

                $('#filter_tahun, #filter_bulan, #filter_tanggal').change(function () {
                    var tahun = $('#filter_tahun').val();
                    var bulan = $('#filter_bulan').val();
                    var tanggal = $('#filter_tanggal').val();

                    var searchValue = '';
                    if (tanggal) {
                        searchValue = tanggal; // Jika ada tanggal spesifik (YYYY-MM-DD), cari dengan ini
                    } else if (tahun && bulan) {
                        searchValue = tahun + '-' + bulan; // YYYY-MM
                    } else if (tahun) {
                        searchValue = tahun;
                    } else if (bulan) {
                        searchValue = '-' + bulan + '-'; // Format DB biasanya YYYY-MM-DD
                    }

                    // Kita akan menggunakan column(3).search() di bawah, bukan api.search() global yang mencari semua kolom
                    // api.search(searchValue).draw(); // Dihapus karena menggunakan column search lebih tepat
                });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,


            order: [[3, "desc"]],

            ajax: { "url": "kelola_berita_acara/json", "type": "POST" },
            columns: [
                {
                    "data": "berita_acara_id",
                    "orderable": false
                },

                { "data": "berita_acara_kode" },
                {
                    className: "center",
                    data: "berita_acara_status",
                    render: function (data, type, row) {
                        if (type === 'display' || type === 'filter') {
                            // Filtering and display get the rendered string
                            return data == 1 ? "Pengajuan Laporan" : data == 2 ? "Sedang proses" : data == 3 ? "Selesai" : "Ditolak";
                        }
                        // Otherwise just give the original data
                        return data;
                    }
                },


                { "data": "berita_acara_tgl" },

                { "data": "pelapor_nama" },

                { "data": "pelapor_nik" },

                { "data": "korban_nik" },
                { "data": "korban_nama" },
                //     {"data": "korban_jeniskelamin"},
                //    {"data": "korban_agama"},{"data": "korban_tempat"},{"data": "korban_tgl_lahir"},{"data": "korban_prop"},{"data": "korban_kab"},{"data": "korban_kec"},{"data": "korban_desa"},{"data": "korban_foto1"},{"data": "korban_foto2"},{"data": "korban_email"},{"data": "korban_telepon"},{"data": "korban_tglkejadian"},{"data": "pelaku_nama"},{"data": "pelaku_jenis_kelamin"},{"data": "pelaku_usia"},{"data": "pelaku_hubungan"},{"data": "pelaku_pendidikan"},{"data": "pelaku_alamat"},{"data": "pelaku_prop"},{"data": "pelaku_kab"},{"data": "pelaku_kec"},{"data": "pelaku_desa"},{"data": "pelaku_nik"},{"data": "lapor_anonim"},{"data": "lapor_rahasia"},{"data": "lapor_status"},{"data": "lapor_kategori"},{"data": "lapor_disposisi"},{"data": "lapor_klarifikasi"},{"data": "create_at"},{"data": "update_at"},{"data": "delete_at"},{"data": "user_id"},
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            order: [[0, 'desc']],
            rowCallback: function (row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });

        $('#filter_tahun, #filter_bulan, #filter_tanggal').change(function () {
            var tahun = $('#filter_tahun').val();
            var bulan = $('#filter_bulan').val();
            var tanggal = $('#filter_tanggal').val();

            var searchValue = '';
            if (tanggal) {
                searchValue = tanggal;
                // Kosongkan tahun dan bulan agar tidak membingungkan pengguna
                $('#filter_tahun').val('');
                $('#filter_bulan').val('');
            } else if (tahun && bulan) {
                searchValue = tahun + '-' + bulan;
                $('#filter_tanggal').val('');
            } else if (tahun) {
                searchValue = tahun;
                $('#filter_tanggal').val('');
            } else if (bulan) {
                searchValue = '-' + bulan + '-';
                $('#filter_tanggal').val('');
            }

            console.log("Search Date:", searchValue);
            t.api().column(3).search(searchValue).draw();

            // Update excel link
            var excelUrl = "<?php echo site_url('kelola_berita_acara/excel') ?>";
            var params = [];

            if (tanggal) {
                params.push("tanggal=" + tanggal);
            } else {
                if (tahun) params.push("tahun=" + tahun);
                if (bulan) params.push("bulan=" + bulan);
            }

            if (params.length > 0) {
                excelUrl += "?" + params.join("&");
            }
            $('#btn-excel').attr('href', excelUrl);
        });

        // Handling when specific date is cleared
        $('#filter_tanggal').on('input', function() {
            if (!$(this).val()) {
                $(this).trigger('change');
            }
        });


    });




</script>