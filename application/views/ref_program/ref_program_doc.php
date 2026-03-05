<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Ref_program List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Urusan</th>
		<th>Kode Urusan</th>
		<th>Nama Urusan</th>
		<th>Id Bidang Urusan</th>
		<th>Kode Bidang Urusan</th>
		<th>Nama Bidang Urusan</th>
		<th>Id Program</th>
		<th>Kode Program</th>
		<th>Nama Program</th>
		<th>Id Giat</th>
		<th>Kode Giat</th>
		<th>Nama Giat</th>
		<th>Id Sub Giat</th>
		<th>Kode Sub Giat</th>
		<th>Nama Sub Giat</th>
		<th>Is Locked</th>
		<th>Vol Staf</th>
		<th>Status</th>
		<th>Action</th>
		
            </tr><?php
            foreach ($ref_program_data as $ref_program)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ref_program->id_urusan ?></td>
		      <td><?php echo $ref_program->kode_urusan ?></td>
		      <td><?php echo $ref_program->nama_urusan ?></td>
		      <td><?php echo $ref_program->id_bidang_urusan ?></td>
		      <td><?php echo $ref_program->kode_bidang_urusan ?></td>
		      <td><?php echo $ref_program->nama_bidang_urusan ?></td>
		      <td><?php echo $ref_program->id_program ?></td>
		      <td><?php echo $ref_program->kode_program ?></td>
		      <td><?php echo $ref_program->nama_program ?></td>
		      <td><?php echo $ref_program->id_giat ?></td>
		      <td><?php echo $ref_program->kode_giat ?></td>
		      <td><?php echo $ref_program->nama_giat ?></td>
		      <td><?php echo $ref_program->id_sub_giat ?></td>
		      <td><?php echo $ref_program->kode_sub_giat ?></td>
		      <td><?php echo $ref_program->nama_sub_giat ?></td>
		      <td><?php echo $ref_program->is_locked ?></td>
		      <td><?php echo $ref_program->vol_staf ?></td>
		      <td><?php echo $ref_program->status ?></td>
		      <td><?php echo $ref_program->action ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>