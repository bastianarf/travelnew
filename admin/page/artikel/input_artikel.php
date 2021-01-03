<?php
defined('INDEX') OR exit('akses ditolak');
?>

<div class="panel panel-primary">
	<div class="panel-heading">Tambah Artikel</div>
	<div class="panel-body">
		<form action="action.php?page=insert-artikel" method="post" class="form-horizontal" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-md-1 control-label">Judul</label>
				<div class="col-md-11">
					<input type="text" name="judul" id="judul" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label">Kategori</label>
				<div class="col-md-3">
					<select name="kategori" id="kategori" class="form-control">
						<option value="">-Pilih Kategori-</option>
						<option value="berita">berita</option>
						<option value="tips">tips</option>
						<option value="olahraga">olahraga</option>
						<option value="slide">slide</option>
						<option value="penulis">penulis</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label">Foto</label>
				<div class="col-md-4">
					<input type="file" name="foto" id="foto" class="form-control" accept="image/png, image/jpeg">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label">Konten</label>
				<div class="col-md-11">
					<textarea name="konten" id="konten" class="form-control"></textarea>
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