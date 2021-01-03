<?php

include("koneksi.php");

$name = $_POST['name'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$email = $_POST['email'];

$sql = "INSERT INTO `admin_user` (`id`, `username`, `password`, `nama`, `email`, `last_login`) 
            VALUES ( NULL,'$username', '$password', '$name', '$email', NOW() )";
$result = $koneksi->query($sql);
//if ($result->num_rows > 0) {
//	$data = $result->fetch_array();
//	session_start();
	
//	$_SESSION['web-b']['username'] = $data['username'];
//	$_SESSION['web-b']['nama']     = $data['nama'];
//	$_SESSION['web-b']['email']    = $data['email'];
//$koneksi->query("UPDATE `admin_user` SET `last_login` = NOW() WHERE id = '$data[id]'");
	
	header('location:index.php');
//} else {
//	header('location:login.php?status=gagal-login');
//}