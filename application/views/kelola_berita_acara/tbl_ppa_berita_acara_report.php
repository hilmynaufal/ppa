<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Berita Acara Pelaporan Lengkap</title>
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
            width: 130px;
        }

        .field-dots {
            width: 10px;
        }

        .field-value {
            flex-grow: 1;
            border-bottom: 1px dotted #aaa;
            min-height: 14px;
        }

        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 3px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        /* Khusus Kronologis & Kebutuhan */
        .full-input-area {
            min-height: 100px;
            border-bottom: 1px dotted #aaa;
            margin-top: 5px;
        }

        /* Tanda Tangan */
        .signature-section {
            display: flex;
            justify-content: space-between;
            padding: 20px 40px;
            text-align: center;
        }

        .sig-box {
            width: 200px;
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
            /* Mengubah dari center ke flex-start agar logo mentok kiri */
            position: relative;
        }

        .logo-container {
            width: 110px;
            /* Ganti nilai ini untuk mengubah ukuran logo (misal: 100px, 120px) */
            margin-right: 15px;
            /* position: absolute; */
            /* Menggunakan absolute agar tidak mempengaruhi centering text container jika diinginkan, atau biarkan statis */
            left: 0;
        }

        .logo-container img {
            width: 100%;
            height: auto;
        }

        .text-container {
            text-align: center;
            width: 100%;
            /* Memastikan text container mengambil sisa ruang */
        }
    </style>

</head>

<body>
    <div class="header">
        <div class="header-content">
            <div class="logo-container"><img src="<?php echo base_url('assets/images/logo_bandungkab.png'); ?>"
                    alt="Logo Kabupaten Bandung"></div>
            <div class="text-container">
                <h1>PEMERINTAH KABUPATEN BANDUNG</h1>
                <h2>DINAS PENGENDALIAN PENDUDUK,
                    KELUARGA BERENCANA,
                    <br>PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK
                </h2>
                <h2>UPTD PERLINDUNGAN PEREMPUAN DAN ANAK</h2>
                <p>Jl. Raya Soreang KM. 17 Telp. (022) 5897180 Soreang 40911</p>
                <p>Kabupaten Bandung Provinsi Jawa Barat</p>
            </div>
        </div>
    </div>
    <div class="title-section">
        <h3>BERITA ACARA PELAPORAN </h3>
        <p>No. Registrasi :
            <?php echo $berita_acara_kode; ?>
        </p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col w-50"><label>Nama Penerima Pengaduan </label>
                <div class="field-value">
                    <?php echo $berita_acara_penerima_laporan; ?>
                </div>
            </div>
            <div class="col w-50">
                <div class="field-group">
                    <div class="field-label">Hari/Tanggal</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo ($berita_acara_hari ? $berita_acara_hari . ', ' : '') . $berita_acara_tgl; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Jam</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col w-100"><label>NAMA PELAPOR </label>
                <div class="field-value"><?php echo $pelapor_nama; ?></div>
                <div class="checkbox-group" style="margin-top:5px; grid-template-columns: repeat(3, 1fr); width: 50%;">
                    <div class="checkbox-item"><input type="checkbox">Laki-laki </div>
                    <div class="checkbox-item"><input type="checkbox">Perempuan </div>
                    <div class="checkbox-item"><input type="checkbox">Lainnya </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col w-50"><label>ALAMAT LENGKAP PELAPOR </label>
                <div class="field-group">
                    <div class="field-label">KTP</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $pelapor_nik; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Domisili</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php
                        $alamat_pelapor = array_filter([$pelapor_desa, $pelapor_kec, $pelapor_kab]);
                        echo implode(', ', $alamat_pelapor);
                        ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">HP</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"></div>
                </div>
            </div>
            <div class="col w-50"><label>ALAMAT KORBAN </label>
                <div class="field-group">
                    <div class="field-label">KTP</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $korban_nik; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Domisili</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php
                        $alamat_korban = array_filter([$korban_desa, $korban_kec, $korban_kab]);
                        echo implode(', ', $alamat_korban);
                        ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">HP</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $korban_telepon; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col w-50"><label>DATA KORBAN </label>
                <div class="field-group">
                    <div class="field-label">Nama Lengkap</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $korban_nama; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Nama Panggilan</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"></div>
                </div>
                <div class="field-group">
                    <div class="field-label">No. Identitas (NIK)</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $korban_nik; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">TTL</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo ($korban_tempat ? $korban_tempat . ', ' : '') . $korban_tgl_lahir; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Usia</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $korban_usia; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Pekerjaan</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"></div>
                </div>
                <div class="field-group">
                    <div class="field-label">Pendidikan</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"></div>
                </div>
                <div class="field-group">
                    <div class="field-label">Agama</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $korban_agama; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Status Pernikahan</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"></div>
                </div>
            </div>
            <div class="col w-50"><label>HUBUNGAN KORBAN DENGAN PELAKU </label>
                <div class="checkbox-group">
                    <div class="checkbox-item"><input type="checkbox">Istri-suami </div>
                    <div class="checkbox-item"><input type="checkbox">Kakak-adik </div>
                    <div class="checkbox-item"><input type="checkbox">Pacar </div>
                    <div class="checkbox-item"><input type="checkbox">Karyawan-Majikan </div>
                    <div class="checkbox-item"><input type="checkbox">Tetangga </div>
                </div>
                <div class="field-value" style="font-size:9px;">Lain-lain: ..................... </div><label
                    style="margin-top:10px;">DATA PELAKU </label>
                <div class="field-group">
                    <div class="field-label">Nama Lengkap</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $pelaku_nama; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Jenis Kelamin</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"><?php echo $pelaku_jenis_kelamin; ?></div>
                </div>
                <div class="field-group">
                    <div class="field-label">No. Identitas</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $pelaku_nik; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">TTL / Usia</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $pelaku_usia; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Pekerjaan</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"></div>
                </div>
                <div class="field-group">
                    <div class="field-label">Pendidikan</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $pelaku_pendidikan; ?>
                    </div>
                </div>
                <div class="field-group">
                    <div class="field-label">Agama</div>
                    <div class="field-dots">:</div>
                    <div class="field-value"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col w-100"><label>KRONOLOGIS KASUS </label><i style="font-size: 9px;">(tempat, waktu, pihak yang
                    terlibat, latar belakang masalah, bentuk dan dampak kekerasan) </i>
                <div class="field-group" style="margin-top:5px;">
                    <div class="field-label" style="width:50px">TKP</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $korban_tempat; // Asumsi TKP = tempat korban/kejadian ?>
                    </div>
                    <div class="field-label" style="width:100px; margin-left:20px;">TANGGAL KEJADIAN</div>
                    <div class="field-dots">:</div>
                    <div class="field-value">
                        <?php echo $korban_tglkejadian; ?>
                    </div>
                </div>
                <div class="full-input-area">KRONOLOGIS :
                    <?php echo $berita_acara_kronologi; ?>
                </div>
            </div>
        </div>
        <div class="signature-section">
            <div class="sig-box">
                <p>PENERIMA LAPORAN </p>
                <div class="sig-space"></div>
                <p>(............................................) </p>
            </div>
            <div class="sig-box">
                <p>PELAPOR </p>
                <div class="sig-space"></div>
                <p>(............................................) </p>
            </div>
        </div>
        <div class="head-office">
            <p>MENGETAHUI,
                <br>KEPALA UPTD PPA
            </p>
            <div class="sig-space"></div>
            <p><b>............................................</b><br>NIP. ............................................
            </p>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>