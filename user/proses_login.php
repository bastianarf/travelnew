<?php

include("koneksi.php");
//if(isset($_POST['email'])){
	$email = $_POST['email'];
//}
//if(isset($_POST['password']))
//{
	$password = md5($_POST['password']);
//}
$sql_login = "SELECT * FROM `user_user` WHERE email = '$email' AND password = '$password'";
			  
$result    = $koneksi->query($sql_login);

if ($result->num_rows > 0) {
	$data = $result->fetch_array();
	session_start();
	
	$_SESSION['web-b']['username'] = $data['username'];
	$_SESSION['web-b']['nama']     = $data['nama'];
	$_SESSION['web-b']['email']    = $data['email'];
	
	$koneksi->query("UPDATE `user_user` SET last_login = NOW() WHERE id = '$data[id]' ");
	
	header('location:../index.php');
} 
else {
	header('location:../login.php?status=gagal-login');
}