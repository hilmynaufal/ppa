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
        <button onclick="ExportToExcel('tbl_export_all_to_xlsx', 'Detail_Laporan_PPA')" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export Ms Excel</button>
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


                            <div class="row" style="display: none;">
                                <div class="col-md-12">
                                    <table id="tbl_export_all_to_xlsx" class="table table-bordered table-striped" style="font-size: 10px;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Berita Acara</th>
                                                <th>Kode Berita Acara</th>
                                                <th>Status Berita Acara</th>
                                                <th>Kategori Laporan</th>
                                                <th>Status Laporan</th>
                                                <th>Disposisi Laporan</th>
                                                <th>Nama Pelapor</th>
                                                <th>Telepon Pelapor</th>
                                                <th>NIK Korban</th>
                                                <th>Nama Korban</th>
                                                <th>Jenis Kelamin Korban</th>
                                                <th>Agama Korban</th>
                                                <th>Tgl Lahir Korban</th>
                                                <th>Alamat Korban (Kab, Kec, Desa)</th>
                                                <th>Telepon Korban</th>
                                                <th>Tanggal Kejadian</th>
                                                <th>NIK Pelaku</th>
                                                <th>Nama Pelaku</th>
                                                <th>Jenis Kelamin Pelaku</th>
                                                <th>Usia Pelaku</th>
                                                <th>Hubungan Pelaku</th>
                                                <th>Pendidikan Pelaku</th>
                                                <th>Alamat Pelaku (Kab, Kec, Desa)</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($laporan_all as $d):
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $d->berita_acara_tgl; ?></td>
                                                    <td><?php echo $d->berita_acara_kode; ?></td>
                                                    <td><?php echo $d->berita_acara_status; ?></td>
                                                    <td><?php echo $d->lapor_kategori; ?></td>
                                                    <td><?php echo $d->lapor_status; ?></td>
                                                    <td><?php echo $d->lapor_disposisi; ?></td>
                                                    <td><?php echo $d->pelapor_nama; ?></td>
                                                    <td><?php echo $d->pelapor_telepon; ?></td>
                                                    <td><?php echo $d->korban_nik; ?></td>
                                                    <td><?php echo $d->korban_nama; ?></td>
                                                    <td><?php echo $d->korban_jeniskelamin; ?></td>
                                                    <td><?php echo $d->korban_agama; ?></td>
                                                    <td><?php echo $d->korban_tgl_lahir; ?></td>
                                                    <td><?php echo $d->korban_kab . ', ' . $d->korban_kec . ', ' . $d->korban_desa; ?></td>
                                                    <td><?php echo $d->korban_telepon; ?></td>
                                                    <td><?php echo $d->korban_tglkejadian; ?></td>
                                                    <td><?php echo $d->pelaku_nik; ?></td>
                                                    <td><?php echo $d->pelaku_nama; ?></td>
                                                    <td><?php echo $d->pelaku_jenis_kelamin; ?></td>
                                                    <td><?php echo $d->pelaku_usia; ?></td>
                                                    <td><?php echo $d->pelaku_hubungan; ?></td>
                                                    <td><?php echo $d->pelaku_pendidikan; ?></td>
                                                    <td><?php echo $d->pelaku_kab . ', ' . $d->pelaku_kec . ', ' . $d->pelaku_desa; ?></td>
                                                    <td><?php echo $d->berita_acara_keterangan; ?></td>
                                                </tr>
                                                <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
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