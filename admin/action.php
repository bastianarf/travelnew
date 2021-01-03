<?php
session_start();

if (!isset($_SESSION['web-b']['username'])) {
	header("location:login.php");
	exit();
}

const INDEX = 'yes';


if (isset($_GET['page'])) {
		
		switch($_GET['page']) {
			case "insert-artikel":
				include("page/artikel/insert_artikel.php");
			break;
			
			case "delete-artikel":
				include("page/artikel/hapus_artikel.php");
			break;
			
			case "update-artikel":
				include("page/artikel/update_artikel.php");
			break;
			
			case "insert-download":
				include("page/download/insert_download.php");
			break;
			
			case "delete-download":
				include("page/download/hapus_download.php");
			break;
			
			default:
				header("location:index.php?page=404");
			break;
		}
		
	} else {
		header("location:index.php");
	}
?>