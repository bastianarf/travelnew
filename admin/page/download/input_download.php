<?php
defined('INDEX') OR exit('akses ditolak');
?>

<div class="panel panel-primary">
	<div class="panel-heading">Tambah Download</div>
	<div class="panel-body">
		<form action="action.php?page=insert-download" method="post" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-md-1 control-label">Judul</label>
				<div class="col-md-11">
					<input type="text" name="judul" id="judul" class="form-control">
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-1 control-label">File</label>
				<div class="col-md-4">
					<input type="file" name="file" id="file" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-offset-1 col-md-3">
					<input type="submit" name="submit" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>