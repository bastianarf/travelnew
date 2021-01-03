<?php

include("koneksi.php");

$name = $_POST['nama'];
$noid = $_POST['nomor'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$email = $_POST['email'];
$pilihwisata = $_POST['pilihwisata'];
$sql = "INSERT INTO `form_user` (`id`, `nama_lengkap`, `nomor_identitas`, `alamat`, `nomor_hp`, `email`, `pilihwisata`, `last_booking`) 
            VALUES ( NULL,'$name', '$noid', '$alamat', '$nohp', '$email', '$pilihwisata', NOW() )";
$result = $koneksi->query($sql);
	header('../index.php');
//if ($result->num_rows > 0) {
//	$data = $result->fetch_array();
//	session_start();
	
//	$_SESSION['web-b']['username'] = $data['username'];
//	$_SESSION['web-b']['nama']     = $data['nama'];
//	$_SESSION['web-b']['email']    = $data['email'];
//$koneksi->query("UPDATE `form_user` SET `last_booking` = NOW() WHERE id = '$data[id]'");

//} else {
//	header('location:login.php?status=gagal-login');
//}