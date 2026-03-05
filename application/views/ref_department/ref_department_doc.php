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
        <h2>Ref_department List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Name</th>
		<th>Leader</th>
		<th>Address</th>
		<th>Email</th>
		<th>Image</th>
		<th>Website</th>
		<th>Views</th>
		<th>Status</th>
		<th>Type</th>
		<th>Created Id</th>
		<th>Created Date</th>
		<th>Update Id</th>
		<th>Update Date</th>
		
            </tr><?php
            foreach ($ref_department_data as $ref_department)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $ref_department->name ?></td>
		      <td><?php echo $ref_department->leader ?></td>
		      <td><?php echo $ref_department->address ?></td>
		      <td><?php echo $ref_department->email ?></td>
		      <td><?php echo $ref_department->image ?></td>
		      <td><?php echo $ref_department->website ?></td>
		      <td><?php echo $ref_department->views ?></td>
		      <td><?php echo $ref_department->status ?></td>
		      <td><?php echo $ref_department->type ?></td>
		      <td><?php echo $ref_department->created_id ?></td>
		      <td><?php echo $ref_department->created_date ?></td>
		      <td><?php echo $ref_department->update_id ?></td>
		      <td><?php echo $ref_department->update_date ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>