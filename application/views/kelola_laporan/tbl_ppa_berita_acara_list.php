<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA PPA_BERITA_ACARA</h3>
                    </div>

                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('kelola_laporan/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
        <?php echo anchor(site_url('kelola_laporan/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'id="btn-excel" class="btn btn-success btn-sm"'); ?>
        <select id="filter_tahun" class="form-control input-sm" style="display: inline-block; width: auto; margin-left: 10px;">
            <option value="">Pilih Tahun</option>
            <?php
            $thn_start = 2020;
            $thn_end = date('Y') + 2;
            for ($i = $thn_start; $i <= $thn_end; $i++) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
</div>
            </div>
            <div class=' col-md-3'>
                                    <form action="<?php echo site_url('kelola_laporan/index'); ?>" class="form-inline"
                                        method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                            <span class="input-group-btn">
                                                <?php
                                                if ($q <> '') {
                                                    ?>
                                                    <a href="<?php echo site_url('kelola_laporan'); ?>"
                                                        class="btn btn-default">Reset</a>
                                                    <?php
                                                }
                                                ?>
                                                <button class="btn btn-primary" type="submit">Search</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>


                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-4 text-center">
                                    <div style="margin-top: 8px" id="message">
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                                </div>
                                <div class="col-md-1 text-right">
                                </div>
                                <div class="col-md-3 text-right">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-success">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">DETAIL DATA LAPORAN (TAHUN:
                                                <?php echo $tahun ? $tahun : 'SEMUA'; ?>)
                                            </h3>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                        class="fa fa-minus"></i></button>
                                                <button
                                                    onclick="ExportToExcel('tbl_export_all_to_xlsx', 'Detail_Laporan_PPA')"
                                                    class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i>
                                                    Export All Detail .XLSX</button>
                                            </div>
                                        </div>
                                        <div class="box-body table-responsive"
                                            style="max-height: 500px; overflow-y: auto;">
                                            <table id="tbl_export_all_to_xlsx"
                                                class="table table-bordered table-striped" style="font-size: 10px;">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
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
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($laporan_all as $d):
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $d->berita_acara_status; ?></td>
                                                            <td><?php echo $d->berita_acara_dihentikan; ?></td>
                                                            <td><?php echo $d->berita_acara_kode; ?></td>
                                                            <td><?php echo $d->berita_acara_tgl; ?></td>
                                                            <td><?php echo $d->berita_acara_hari; ?></td>
                                                            <td><?php echo $d->berita_acara_kronologi; ?></td>
                                                            <td><?php echo $d->berita_acara_penerima_laporan; ?></td>
                                                            <td><?php echo $d->berita_acara_kepala_uptd; ?></td>
                                                            <td><?php echo $d->berita_acara_keterangan; ?></td>
                                                            <td><?php echo $d->pelapor_nama; ?></td>
                                                            <td><?php echo $d->pelapor_tgl; ?></td>
                                                            <td><?php echo $d->pelapor_tempat; ?></td>
                                                            <td><?php echo $d->pelapor_idusers; ?></td>
                                                            <td><?php echo $d->pelapor_nik; ?></td>
                                                            <td><?php echo $d->pelapor_pekerjaan; ?></td>
                                                            <td><?php echo $d->pelapor_telepon; ?></td>
                                                            <td><?php echo $d->pelapor_kab; ?></td>
                                                            <td><?php echo $d->pelapor_kec; ?></td>
                                                            <td><?php echo $d->pelapor_desa; ?></td>
                                                            <td><?php echo $d->korban_nik; ?></td>
                                                            <td><?php echo $d->korban_nama; ?></td>
                                                            <td><?php echo $d->korban_jeniskelamin; ?></td>
                                                            <td><?php echo $d->korban_agama; ?></td>
                                                            <td><?php echo $d->korban_tempat; ?></td>
                                                            <td><?php echo $d->korban_tgl_lahir; ?></td>
                                                            <td><?php echo $d->korban_prop; ?></td>
                                                            <td><?php echo $d->korban_kab; ?></td>
                                                            <td><?php echo $d->korban_kec; ?></td>
                                                            <td><?php echo $d->korban_desa; ?></td>
                                                            <td><?php echo $d->korban_foto1; ?></td>
                                                            <td><?php echo $d->korban_foto2; ?></td>
                                                            <td><?php echo $d->korban_email; ?></td>
                                                            <td><?php echo $d->korban_telepon; ?></td>
                                                            <td><?php echo $d->korban_tglkejadian; ?></td>
                                                            <td><?php echo $d->pelaku_nama; ?></td>
                                                            <td><?php echo $d->pelaku_jenis_kelamin; ?></td>
                                                            <td><?php echo $d->pelaku_usia; ?></td>
                                                            <td><?php echo $d->pelaku_hubungan; ?></td>
                                                            <td><?php echo $d->pelaku_pendidikan; ?></td>
                                                            <td><?php echo $d->pelaku_alamat; ?></td>
                                                            <td><?php echo $d->pelaku_prop; ?></td>
                                                            <td><?php echo $d->pelaku_kab; ?></td>
                                                            <td><?php echo $d->pelaku_kec; ?></td>
                                                            <td><?php echo $d->pelaku_desa; ?></td>
                                                            <td><?php echo $d->pelaku_nik; ?></td>
                                                            <td><?php echo $d->lapor_anonim; ?></td>
                                                            <td><?php echo $d->lapor_rahasia; ?></td>
                                                            <td><?php echo $d->lapor_status; ?></td>
                                                            <td><?php echo $d->lapor_kategori; ?></td>
                                                            <td><?php echo $d->lapor_disposisi; ?></td>
                                                            <td><?php echo $d->lapor_klarifikasi; ?></td>
                                                            <td><?php echo $d->create_at; ?></td>
                                                            <td><?php echo $d->update_at; ?></td>
                                                            <td><?php echo $d->delete_at; ?></td>
                                                            <td><?php echo $d->user_id; ?></td>
                                                        </tr>
                                                        <?php
                                                    endforeach;
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <center>
                                <iframe
                                    src="https://metabase.bandungkab.go.id/public/question/084ad674-966d-427d-90d9-2f3133fdb4d7"
                                    frameborder="0" width="1240px" height="900px" allowtransparency></iframe>

                            </center>
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6 text-right">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Set selected value based on current URL
        var currentUrl = new URL(window.location.href);
        var yearParam = currentUrl.searchParams.get("tahun");
        if (yearParam) {
            $('#filter_tahun').val(yearParam);
        }

        $('#filter_tahun').change(function () {
            var tahun = $(this).val();
            var currentUrl = new URL(window.location.href);
            if (tahun) {
                currentUrl.searchParams.set("tahun", tahun);
            } else {
                currentUrl.searchParams.delete("tahun");
            }
            window.location.href = currentUrl.toString();
        });
    });

    function ExportToExcel(tableId, filenamePrefix) {
        const date = new Date();
        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();
        let currentDate = `${day}-${month}-${year}`;

        var elt = document.getElementById(tableId);
        var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
        var filename = (filenamePrefix || 'Export') + '_' + currentDate + '.xlsx';

        XLSX.writeFile(wb, filename);
    }
</script>