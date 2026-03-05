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
        <h2>User List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Create Time</th>
		<th>Update Time</th>
		<th>Visit Time</th>
		<th>Verified Time</th>
		<th>Code</th>
		<th>Fullname</th>
		<th>Gender</th>
		<th>Birth</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Username</th>
		<th>Password</th>
		<th>Description</th>
		<th>Level</th>
		<th>Division</th>
		<th>Division Sub</th>
		<th>Image</th>
		<th>Ipaddress</th>
		<th>Active</th>
		<th>Status</th>
		<th>Token</th>
		<th>Province Id</th>
		<th>Regency Id</th>
		<th>District Id</th>
		<th>Village Id</th>
		<th>Rt Id</th>
		<th>Rw Id</th>
		<th>Verified Email</th>
		<th>Google Id</th>
		<th>Google Image</th>
		
            </tr><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $user->create_time ?></td>
		      <td><?php echo $user->update_time ?></td>
		      <td><?php echo $user->visit_time ?></td>
		      <td><?php echo $user->verified_time ?></td>
		      <td><?php echo $user->code ?></td>
		      <td><?php echo $user->fullname ?></td>
		      <td><?php echo $user->gender ?></td>
		      <td><?php echo $user->birth ?></td>
		      <td><?php echo $user->phone ?></td>
		      <td><?php echo $user->email ?></td>
		      <td><?php echo $user->username ?></td>
		      <td><?php echo $user->password ?></td>
		      <td><?php echo $user->description ?></td>
		      <td><?php echo $user->level ?></td>
		      <td><?php echo $user->division ?></td>
		      <td><?php echo $user->division_sub ?></td>
		      <td><?php echo $user->image ?></td>
		      <td><?php echo $user->ipaddress ?></td>
		      <td><?php echo $user->active ?></td>
		      <td><?php echo $user->status ?></td>
		      <td><?php echo $user->token ?></td>
		      <td><?php echo $user->province_id ?></td>
		      <td><?php echo $user->regency_id ?></td>
		      <td><?php echo $user->district_id ?></td>
		      <td><?php echo $user->village_id ?></td>
		      <td><?php echo $user->rt_id ?></td>
		      <td><?php echo $user->rw_id ?></td>
		      <td><?php echo $user->verified_email ?></td>
		      <td><?php echo $user->google_id ?></td>
		      <td><?php echo $user->google_image ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>