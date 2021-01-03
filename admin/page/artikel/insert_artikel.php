<?php
defined('INDEX') OR exit('akses ditolak');

include("././koneksi.php");

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
$sql = "INSERT INTO `artikel` VALUES(
			'',
			'" . addslashes($_POST['judul']). "',
			'" . addslashes($_SESSION['web-b']['nama']) . "',
			'" . addslashes($_POST['konten']) ."',
			'" . addslashes($_POST['kategori']) ."',
			NOW(),
			'$foto'
		)";
//$sql = "INSERT INTO `artikel` (`judul`, `penulis`, `konten`, `kategori`, `tanggal_terbit`, `foto`)
//       VALUES 
//        judul = '".($_POST['judul']."', 
//       	penulis = '".$_SESSION['web-b']['nama']."', 
//       	konten = '".$_POST['konten']."', 
//       	kategori = '".$_POST['kategori']."', 
//       	NOW(), 
//       	$foto ";
$result = $koneksi->query($sql);

header("location:index.php?page=data-artikel");
?>