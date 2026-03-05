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
        <h2>Tbl_user List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Full Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Images</th>
		<th>Id User Level</th>
		<th>Is Aktif</th>
		<th>Username</th>
		<th>Id Skpd</th>
		<th>Province Id</th>
		<th>Regency Id</th>
		<th>District Id</th>
		<th>Village Id</th>
		<th>Rw Id</th>
		<th>Rt Id</th>
		<th>Verified Email</th>
		<th>Google Id</th>
		<th>Google Image</th>
		<th>Division Sub</th>
		
            </tr><?php
            foreach ($tbl_user_data as $tbl_user)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tbl_user->full_name ?></td>
		      <td><?php echo $tbl_user->email ?></td>
		      <td><?php echo $tbl_user->password ?></td>
		      <td><?php echo $tbl_user->images ?></td>
		      <td><?php echo $tbl_user->id_user_level ?></td>
		      <td><?php echo $tbl_user->is_aktif ?></td>
		      <td><?php echo $tbl_user->username ?></td>
		      <td><?php echo $tbl_user->id_skpd ?></td>
		      <td><?php echo $tbl_user->province_id ?></td>
		      <td><?php echo $tbl_user->regency_id ?></td>
		      <td><?php echo $tbl_user->district_id ?></td>
		      <td><?php echo $tbl_user->village_id ?></td>
		      <td><?php echo $tbl_user->rw_id ?></td>
		      <td><?php echo $tbl_user->rt_id ?></td>
		      <td><?php echo $tbl_user->verified_email ?></td>
		      <td><?php echo $tbl_user->google_id ?></td>
		      <td><?php echo $tbl_user->google_image ?></td>
		      <td><?php echo $tbl_user->division_sub ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>