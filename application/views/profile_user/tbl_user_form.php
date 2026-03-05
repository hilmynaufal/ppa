<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> PASSWORD ANDA</h3>
			</div>
                 
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					
	
					<tr>
                                            <td width='200'>Password Lama<?php echo form_error('oldpass') ?></td><td><input type="text" class="form-control" name="old_pass" id="name" placeholder="Password" value="" /></td>
					</tr>
                                        <tr>
						<td width='200'>Password  Baru<?php echo form_error('newpass') ?></td><td><input type="password" class="form-control" name="newpass" id="password" placeholder="Password" value="" /></td>
					</tr>
                                        <tr>
						<td width='200'>Ulangi Password <?php echo form_error('passconf') ?></td><td><input type="password" class="form-control" name="passconf" id="password" placeholder="Password" value="" /></td>
					</tr>
                                        
                                          <tr>
						<td width='200'>Nama Operator <?php echo form_error('full_name') ?></td><td><input type="text" class="form-control" name="full_name" id="full_name" placeholder="nama Operator" value="<?PHP echo $full_name?>" /></td>
					</tr>
                                        
                                        
                       
	    
					
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_users" value="<?php echo $_SESSION['id_users']; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('profile_user') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>