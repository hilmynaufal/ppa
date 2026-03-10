<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Pendampingan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.4;
            margin: 20px;
            color: #000;
        }

        .container {
            max-width: 850px;
            margin: auto;
            border: 2px solid #000;
            padding: 0;
        }

        /* Header */
        .header {
            text-align: center;
            padding: 10px;
            border-bottom: 3px double #000;
        }

        .header h1 {
            font-size: 14px;
            margin: 0;
        }

        .header h2 {
            font-size: 12px;
            margin: 2px 0;
        }

        .header p {
            margin: 2px 0;
            font-size: 10px;
        }

        .title-section {
            text-align: center;
            margin: 10px 0;
        }

        .title-section h3 {
            text-decoration: underline;
            margin: 0;
            font-size: 13px;
        }

        /* Grid System */
        .row {
            display: flex;
            border-bottom: 1px solid #000;
        }

        .row:last-child {
            border-bottom: none;
        }

        .col {
            padding: 5px;
            border-right: 1px solid #000;
        }

        .col:last-child {
            border-right: none;
        }

        .w-50 {
            width: 50%;
        }

        .w-100 {
            width: 100%;
        }

        /* Form Elements */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        .field-group {
            display: flex;
            margin-bottom: 4px;
        }

        .field-label {
            width: 150px;
        }

        .field-dots {
            width: 10px;
        }

        .field-value {
            flex-grow: 1;
            /* border-bottom: 1px dotted #aaa; */
            min-height: 14px;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table-data th,
        .table-data td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
            vertical-align: top;
        }

        .table-data th {
            text-align: center;
            font-weight: bold;
        }

        /* Tanda Tangan */
        .signature-section {
            display: flex;
            justify-content: flex-end;
            padding: 20px 40px;
            text-align: center;
        }

        .sig-box {
            width: 250px;
        }

        .sig-space {
            height: 60px;
        }

        .head-office {
            text-align: center;
            margin-top: 20px;
            padding-bottom: 20px;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            position: relative;
        }

        .logo-container {
            width: 110px;
            margin-right: 15px;
            left: 0;
        }

        .logo-container img {
            width: 100%;
            height: auto;
        }

        .text-container {
            text-align: center;
            width: 100%;
        }

        @media print {
            .container {
                border: none;
                margin: 0;
                width: 100%;
                max-width: 100%;
            }

            .header {
                border-bottom: 3px double #000;
            }
        }
    </style>

</head>

<body>

    <div class="title-section">
        <h3>RESUME PENDAMPINGAN</h3>
    </div>
    <div class="container" style="border: none; padding-top: 10px;">
        <div class="row" style="border: none; display: block;">
            <div class="col w-100" style="border: none;">
                <div class="field-group">
                    <div class="field-label">No Registrasi</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"><?php echo $berita_acara_kode; ?></div>
                </div>
                <div class="field-group">
                    <div class="field-label">Nama Korban</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"><?php echo $korban_nama; ?></div>
                </div>
                <div class="field-group">
                    <div class="field-label">Usia</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"><?php echo $korban_usia; ?></div>
                </div>
                <div class="field-group">
                    <div class="field-label">Tempat Tanggal Lahir</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo ($korban_tempat ? $korban_tempat . ', ' : '') . $korban_tgl_lahir; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Alamat</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php
                        $alamat_korban = array_filter([$korban_desa, $korban_kec, $korban_kab]);
                        echo implode(', ', $alamat_korban);
                        ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Jenis Kekerasan</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"><?php echo $lapor_kategori; ?></div>
                </div>
            </div>
        </div>

        <div class="row" style="border: none; display: block; margin-top: 20px;">
            <div class="col w-100" style="border: none;">
                <table class="table-data">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th width="80px">Tanggal</th>
                            <th>Uraian Keterangan</th>
                            <th width="80px">Paraf</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        if (!empty($pendampingan_list)) {
                            foreach ($pendampingan_list as $row) {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no++; ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($row->layanan_tgl)); ?></td>
                                    <td>
                                        <strong>Jenis Layanan:</strong> <?php echo $row->layanan_jenis; ?><br>
                                        <strong>Keterangan:</strong> <?php echo $row->layanan_keterangan; ?><br>
                                        <strong>Tindak Lanjut:</strong> <?php echo $row->tindak_lanjut1; ?>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4" style="text-align: center;">Belum ada data pendampingan</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <script>
        window.print();
    </script>
</body>

</html>