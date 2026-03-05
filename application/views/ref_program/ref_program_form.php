<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA REF_PROGRAM</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Id Urusan <?php echo form_error('id_urusan') ?></td><td><input type="text" class="form-control" name="id_urusan" id="id_urusan" placeholder="Id Urusan" value="<?php echo $id_urusan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kode Urusan <?php echo form_error('kode_urusan') ?></td><td><input type="text" class="form-control" name="kode_urusan" id="kode_urusan" placeholder="Kode Urusan" value="<?php echo $kode_urusan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Urusan <?php echo form_error('nama_urusan') ?></td><td><input type="text" class="form-control" name="nama_urusan" id="nama_urusan" placeholder="Nama Urusan" value="<?php echo $nama_urusan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Bidang Urusan <?php echo form_error('id_bidang_urusan') ?></td><td><input type="text" class="form-control" name="id_bidang_urusan" id="id_bidang_urusan" placeholder="Id Bidang Urusan" value="<?php echo $id_bidang_urusan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kode Bidang Urusan <?php echo form_error('kode_bidang_urusan') ?></td><td><input type="text" class="form-control" name="kode_bidang_urusan" id="kode_bidang_urusan" placeholder="Kode Bidang Urusan" value="<?php echo $kode_bidang_urusan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Bidang Urusan <?php echo form_error('nama_bidang_urusan') ?></td><td><input type="text" class="form-control" name="nama_bidang_urusan" id="nama_bidang_urusan" placeholder="Nama Bidang Urusan" value="<?php echo $nama_bidang_urusan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Program <?php echo form_error('id_program') ?></td><td><input type="text" class="form-control" name="id_program" id="id_program" placeholder="Id Program" value="<?php echo $id_program; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kode Program <?php echo form_error('kode_program') ?></td><td><input type="text" class="form-control" name="kode_program" id="kode_program" placeholder="Kode Program" value="<?php echo $kode_program; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Program <?php echo form_error('nama_program') ?></td><td><input type="text" class="form-control" name="nama_program" id="nama_program" placeholder="Nama Program" value="<?php echo $nama_program; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id Giat <?php echo form_error('id_giat') ?></td><td><input type="text" class="form-control" name="id_giat" id="id_giat" placeholder="Id Giat" value="<?php echo $id_giat; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kode Giat <?php echo form_error('kode_giat') ?></td><td><input type="text" class="form-control" name="kode_giat" id="kode_giat" placeholder="Kode Giat" value="<?php echo $kode_giat; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Nama Giat <?php echo form_error('nama_giat') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama_giat" id="nama_giat" placeholder="Nama Giat"><?php echo $nama_giat; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Id Sub Giat <?php echo form_error('id_sub_giat') ?></td><td><input type="text" class="form-control" name="id_sub_giat" id="id_sub_giat" placeholder="Id Sub Giat" value="<?php echo $id_sub_giat; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Kode Sub Giat <?php echo form_error('kode_sub_giat') ?></td><td><input type="text" class="form-control" name="kode_sub_giat" id="kode_sub_giat" placeholder="Kode Sub Giat" value="<?php echo $kode_sub_giat; ?>" /></td>
					</tr>
	    
					<tr>
						<td width='200'>Nama Sub Giat <?php echo form_error('nama_sub_giat') ?></td>
						<td> <textarea class="form-control" rows="3" name="nama_sub_giat" id="nama_sub_giat" placeholder="Nama Sub Giat"><?php echo $nama_sub_giat; ?></textarea></td>
					</tr>
	
					<tr>
						<td width='200'>Is Locked <?php echo form_error('is_locked') ?></td><td><input type="text" class="form-control" name="is_locked" id="is_locked" placeholder="Is Locked" value="<?php echo $is_locked; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Vol Staf <?php echo form_error('vol_staf') ?></td><td><input type="text" class="form-control" name="vol_staf" id="vol_staf" placeholder="Vol Staf" value="<?php echo $vol_staf; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Action <?php echo form_error('action') ?></td><td><input type="text" class="form-control" name="action" id="action" placeholder="Action" value="<?php echo $action; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_sipd" value="<?php echo $id_sipd; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('ref_program') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>