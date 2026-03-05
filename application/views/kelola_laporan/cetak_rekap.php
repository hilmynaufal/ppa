
<style type="text/css">
	
	h1,
        h3 {
            text-align: center;
        }
 
        table {
            border-spacing: 0px;
            table-layout: fixed;
            margin-left: auto;
            margin-right: auto;
        }
 
        th {
            color: green;
            border: 1px solid black;
			
    text-align: center;

        }
 
        td {
            border: 1px solid black;
            word-wrap: break-word;

        }
	
	</style>

<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">REKAP LAPORAN KECAMATAN</h3>
			</div>
            <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
            <button onclick="ExportToExcel('xlsx')" class="btn btn-success btn-sm" >Cetak Laporan</button>
       </div>

            </div>

            <table id="tbl_exporttable_to_xls" border="1"width="70%">        

	
	
<tr>
    <th>NO</th>
    <th>KECAMATAN</th>
    <th>PEREMPUAN</th>
    <th>PRIA</th>
    <th>DEWASA </th>
    <th>ANAK </th>
    <th>TOTAL</th>
    

</tr>
<?php
$no = 1;
foreach ($rekap as $baris):
    ?>
    <tr>
        <th><?php echo $no++; ?></th>
            <td><?php echo $baris->kecamatan; ?></td>
            <td><?php echo $baris->perempuan; ?></td>
            <td><?php echo $baris->pria; ?></td>
            <td><?php echo $baris->dewasa; ?></td>
            <td><?php echo $baris->anak; ?></td>
            <td><?php echo $baris->total; ?></td>
        
        

    </tr>
    <?php
endforeach;
?>

       </table>
            </div>
            
            </div>
			
	
	

			   
	
			
	
	
		</div>
	</section>
</div>

<script>


    function ExportToExcel(type, fn, dl) {

        const date = new Date();

let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();

// This arrangement can be altered based on how we want the date's format to appear.
let currentDate = `${day}-${month}-${year}`;
//console.log(currentDate); // "17-6-2022"

       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Rekap Kecamatan.' + (type || 'xlsx')));
    }
    </script>