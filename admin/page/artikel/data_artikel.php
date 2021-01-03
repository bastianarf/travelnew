<?php
defined('INDEX') OR exit('akses ditolak');

include "././koneksi.php";

$sql    = "SELECT * FROM `artikel` ORDER BY `id` DESC";
$result = $koneksi->query($sql);
?>

<div class="panel panel-primary">
	<div class="panel-heading">
		Data Artikel
		<span class="pull-right">
			<a href="index.php?page=input-artikel" class="btn btn-default btn-xs">
				Tambah
			</a>
		</span>
	</div>
	<div class="panel-body">
	   <div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul</th>
					<th>Penulis</th>
					<th>Kategori</th>
					<th>Tgl. Terbit</th>
					<th>Foto</th>
					<th>Pilihan</th>
				</tr>
			</thead>
			<tbody>
	<?php
	$no = 1;
	while($data=$result->fetch_array()) :
	?>
		<tr>
			<td class="text-center"><?php echo $no++; ?></td>
			<td><?php echo $data['judul']; ?></td>
			<td><?php echo $data['penulis']; ?></td>
			<td><?php echo $data['kategori']; ?></td>
			<td><?php echo date("d M Y H:i:s", strtotime($data['tanggal_terbit'])); ?></td>
			<td>
			<?php if (!empty($data['foto'])) : ?>
			<a data-fancybox="gallery" href="image/<?php echo $data['foto']; ?>" class="btn btn-xs btn-primary" target="_blank">
				<span class="glyphicon glyphicon-picture"></span> Foto
			</a>
			<?php endif; ?>
			</td>
			<td>
				<a class="btn btn-xs btn-success" href="index.php?page=edit-artikel&id=<?php echo $data['id'] ?>">Edit</a>
				
				<a class="btn btn-xs btn-danger btn-hapus" href="action.php?page=delete-artikel&id=<?php echo $data['id'] ?>">Hapus</a>
			</td>
		</tr>
	<?php endwhile; ?>
			</tbody>
		</table>
	  </div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirm-artikel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data</h4>
      </div>
      <div class="modal-body">
        Apakah Anda yakin akan menghapus data?
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" id="btn-iya">Iya</a>
		<button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>