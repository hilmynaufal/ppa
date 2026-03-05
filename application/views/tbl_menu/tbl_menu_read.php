
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_MENU</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Title</td>
				<td><?php echo $title; ?></td>
			</tr>
	
			<tr>
				<td>Url</td>
				<td><?php echo $url; ?></td>
			</tr>
	
			<tr>
				<td>Icon</td>
				<td><?php echo $icon; ?></td>
			</tr>
	
			<tr>
				<td>Is Main Menu</td>
				<td><?php echo $is_main_menu; ?></td>
			</tr>
	
			<tr>
				<td>Is Aktif</td>
				<td><?php echo $is_aktif; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('tbl_menu') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>