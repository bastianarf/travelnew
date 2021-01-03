<?php
defined('INDEX') OR exit('akses ditolak');

include("koneksi.php");

$folder = "download";
$file   = "";
if (!empty($_FILES['file']['name'])) {
	$nama_file = md5(date("YmdHis") . rand(100, 99999));
	
	$path      = $_FILES['file']['name'];
	$extension = pathinfo($path, PATHINFO_EXTENSION);
	
	$destination = $folder . "/". $nama_file . "." .$extension;
	
	if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
		$file = $nama_file . "." . $extension;
	}
}

$sql = "INSERT INTO download VALUES(
			'',
			'" . addslashes($_POST['judul']). "',
			'$file',
			NOW()
		)";
$result = $koneksi->query($sql);

header("location:index.php?page=data-download");
?>