<?php
session_start();

include("koneksi.php");

$username		= $_SESSION['web-b']['username'];
$password_lama = md5($_POST['password_lama']);
$password_baru = $_POST['password_baru'];
$ulangi_password = $_POST['ulangi_password'];

$sql_user = "SELECT * FROM `user` WHERE username='$username' AND password = '$password_lama'";

$result	= $koneksi->query($sql_user);

if ($result->num_rows <= 0) {
	$_SESSION['error'] = "Password Lama Salah";
	header("location:index.php?page=ganti-password");
	exit();
}

if (strlen($password_baru) < 6) {
	$_SESSION['error'] = "Panjang karakter password Baru minimal 6!";
	header("location:index.php?page=ganti-password");
	exit();
}

if ($password_baru != $ulangi_password) {
	$_SESSION['error'] = "Password Baru tidak cocok!";
	header("location:index.php?page=ganti-password");
	exit();
}

$sql_update = "UPDATE `user` SET password='".md5(
$password_baru)."' WHERE username = '$username'";

$result = $koneksi->query($sql_update);

header("location:index.php?page=ganti-password&status=sukses");
	