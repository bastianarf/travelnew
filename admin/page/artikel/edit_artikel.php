<?php
defined('INDEX') OR exit('akses ditolak');

include("././koneksi.php");


$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql_edit = "SELECT * FROM artikel WHERE id = '$id' ";

$result = $koneksi->query($sql_edit);
$data   = $result->fetch_array();

?>

<div class="panel panel-primary">
	<div class="panel-heading">Edit Artikel</div>
	<div class="panel-body">
		<form action="action.php?page=update-artikel" method="post" class="form-horizontal" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group">
				<label class="col-md-1 control-label">Judul</label>
				<div class="col-md-11">
					<input type="text" name="judul" id="judul" class="form-control" value="<?php echo $data['judul']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-1 control-label">Kategori</label>
				<div class="col-md-3">
					<select name="kategori" id="kategori" class="form-control">
						<option value="">-Pilih Kategori-</option>
						<?php
						$list_kategori = $koneksi->query("SELECT * FROM kategori ORDER BY kategori ASC");
						
						while ($kategori = $list_kategori->fetch_array()) {
							if ($kategori['kategori'] == $data['kategori']) {
								echo '<option selected="selected" value="' .$kategori['kategori']. '">' . $kategori['kategori'] . '</option>';
							} else {
								echo '<option value="' .$kategori['kategori']. '">' . $kategori['kategori'] . '</option>';
							}
						}
						?>
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
					<textarea name="konten" id="konten" class="form-control"><?php echo $data['konten'] ?></textarea>
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