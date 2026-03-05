<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA REF_PROGRAM</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('ref_program/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
		<?php echo anchor(site_url('ref_program/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('ref_program/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('ref_program/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('ref_program'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
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
		<th>Action</th>
            </tr><?php
            foreach ($ref_program_data as $ref_program)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
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
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('ref_program/read/'.$ref_program->id_sipd),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('ref_program/update/'.$ref_program->id_sipd),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('ref_program/delete/'.$ref_program->id_sipd),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>