<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA REF_DEPARTMENT</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
                                            <td width='200'>Name <?php echo form_error('name') ?></td><td><input readonly="" type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Leader <?php echo form_error('leader') ?></td><td><input type="text" class="form-control" name="leader" id="leader" placeholder="Leader" value="<?php echo $leader; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nip Leader <?php echo form_error('nip_leader') ?></td><td><input type="text" class="form-control" name="nip_leader" id="nip_leader" placeholder="Nip Leader" value="<?php echo $nip_leader; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Jabatan <?php echo form_error('jabatan') ?></td><td><input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" /></td>
					</tr>
                                        <tr>
						<td width='200'>Jabatan <?php echo form_error('pangkat') ?></td><td><input type="text" class="form-control" name="pangkat" id="jabatan" placeholder="pangkat" value="<?php echo $pangkat; ?>" /></td>
					</tr>
	    
	    
				
	
					<tr>
						<td width='200'>Phone <?php echo form_error('phone') ?></td><td><input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Email <?php echo form_error('email') ?></td><td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
					</tr>
	
					
	
					<tr>
						<td width='200'>Website <?php echo form_error('website') ?></td><td><input type="text" class="form-control" name="website" id="website" placeholder="Website" value="<?php echo $website; ?>" /></td>
					</tr>
	
				
	
					
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_department" value="<?php echo $id_department; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('master_department') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>