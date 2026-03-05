<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Cetak Resi</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="<?= base_url()?>assets/css/report.css" rel="stylesheet" type="text/css">
	</head>
	<body>
             <input type="button" value="Print Halaman Ini!" onclick="ExportPdf()" />
		<div id="container">
			
			
			<div id="body">
				
					
				

<!------------------------ -->
<table class="border thick">
						<thead>
							<tr >
								<td rowspan="6" colspan="5" align="center"><div><img src="<?= base_url('images/logo.png')?>" style="width:25%"> 
								<br>PEMERINTAH KABUPATEN BANDUNG
								<br>KECAMATAN SOREANG </h1>
                                                                    <br>Rumah Informasi Pertanahan Kecamatan Soreang (RUMINA)
								<br>Jl. Raya Soreang Telp/Fax. (022) 123123
								
								<br><h1></div></td>
								<td width="30%"><div >Nama Pemohon Penjual</div></td>
								<td width="1%"><div >:</div></td>
								<td width="30%"><div ><?php echo $penjual; ?></div></td>
								
							</tr>
                                                    <tr>
								<td ><div >Nama Pemohon Pembeli</div></td>
								<td ><div >:</div></td>
								<td ><div ><?php echo $pembeli; ?></div></td>
								
							</tr>

							<tr>
								<td ><div >Kode Register </div></td>
								<td width="1%"><div >:</div></td>
								<td ><div ><?php echo $kode_akta; ?></div></td>
								
							</tr>
							<tr>
								
								<td ><div >Kode Resi</div></td>
								<td width="1%"><div >:</div></td>
								<td ><div ><?php echo $resi; ?></div></td>
								
							</tr>
                                                    
							<tr>
								
								<td ><div >Status Berkas</div></td>
								<td ><div >:</div></td>
								<td ><div ><?php echo $keterangan_proses; ?></div></td>
							</tr>
                                                    <tr>
								
                                                        <td colspan="3"><div align="center">
								Dikeluarkan di : Soreang <br>
								Pada Tanggal : <?PHP  echo tanggal_indonesia(date('Y-m-d'));  ?>
<br>
								CAMAT SOREANG<br>
								
								
                                                                    <img src="https://api.qrserver.com/v1/create-qr-code/?format=svg&size=90x90&data=<?php echo site_url('home/cetak_resi/'.($resi)."")  ?>" style="width:10%;"/>
                                                                    <br>
								
								( <u>Drs. Eef Syarif Hidayatulloh.</u> )<br>
								NIP .196808241990061001 </div>
								</td>
							</tr>
							
							

						
							
						</thead>
  					</tbody>
					</table>

				
    	</div>
		</div>
   	
	
<a href="<?php echo site_url() ;?>" class="btn btn-default">Kembali</a>
</body>

  <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
</html>
<?PHP 
$namafile= $kode_akta;

        ?>
     <script>
      $(document).ready(function() {
        $("#export").click(function() {
          alert("Berhasil di Export ke PDF");
          ExportPdf();
        });
      });

      function ExportPdf() {
        kendo.drawing.drawDOM("#container", {
        paperSize: "A4",
          //  paperSize: 'A4',
            margin: '1cm',
            landscape: true,

          margin: {
            top: "2cm",
            left: "2cm",
            right: "2cm",
            bottom: "8cm"
          },
          scale: 0.8,
          height: 500,
        }).then(function(group) {
          kendo.drawing.pdf.saveAs(group,<?php echo $resi;?> )
        });
      }

    </script>

