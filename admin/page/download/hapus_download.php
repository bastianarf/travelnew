<?php
defined('INDEX') OR exit('akses ditolak');

include("koneksi.php");

$id = !empty($_GET['id']) ? $_GET['id'] : null;

$sql_select = "SELECT nama_file FROM download WHERE id='$id'";
$data       = $koneksi->query($sql_select)->fetch_array();
$folder 	= 'download';
unlink($folder . '/' . $data['nama_file']);

$sql_delete = "DELETE FROM download WHERE id='$id' ";

$result = $koneksi->query($sql_delete);

header("location:index.php?page=data-download");
