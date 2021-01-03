<?php
defined('INDEX') OR exit('akses ditolak');

include("././koneksi.php");

$id = isset($_POST['id']) ? $_POST['id'] : '';

$folder = "image";
$foto   = "";
if (!empty($_FILES['foto']['name'])) {
	$nama_file = md5(date("YmdHis") . rand(100, 99999));
	
	$path      = $_FILES['foto']['name'];
	$extension = pathinfo($path, PATHINFO_EXTENSION);
	
	$destination = $folder . "/". $nama_file . "." .$extension;
	
	if (move_uploaded_file($_FILES['foto']['tmp_name'], $destination)) {
		$foto = $nama_file . "." . $extension;
	}
}

$sql_foto = "";
if (!empty($foto)) {
	$sql_foto = ", foto = '$foto'";
	
	$sql_edit = "SELECT * FROM `artikel` WHERE id = '$id' ";

	$result = $koneksi->query($sql_edit);
	$data   = $result->fetch_array();
	
	unlink('image/'.$data['foto']);
}

$sql = "UPDATE `artikel` SET
			judul    = '".$_POST['judul']."',
			konten   = '".$_POST['konten']."',
			kategori = '".$_POST['kategori']."'
			$sql_foto
		WHERE id = '$id'";

$result = $koneksi->query($sql);

header("location:index.php?page=data-artikel");
?>