<?php
session_start();
if (isset($_SESSION['web-b']['email'])) {
}
else
{
    header("../index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <title>Reservasi Travel</title>

    <!-- Bootstrap core CSS -->
    <link href="../admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../admin/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../admin/css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="proses_form.php" method="post">
      	<?php if (isset($_GET['status']) && $_GET['status'] == 'gagal-login') : ?>
		<div class="alert alert-danger text-center alert-dismissible">
		
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			
			Login gagal!
		
		</div>
		<?php endif; ?>
      
        <h2 class="form-signin-heading">Form Reservasi Travel</h2>
        
        <label for="nama" class="sr-only">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" required autofocus>
        <label for="nomor" class="sr-only">Nomor Identitas (NIK/SIM/Passport)</label>
        <input type="text" name="nomor" id="nomor" class="form-control" placeholder="Nomor Identitas (NIK/NIM/Passport)" required autofocus>
        <label for="alamat" class="sr-only">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" required autofocus>
        <label for="nohp" class="sr-only">Nomor HP</label>
        <input type="text" name="nohp" id="nohp" class="form-control" placeholder="Nomor HP" required autofocus>
        <label for="email" class="sr-only">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
        <label for="pilihwisata" class="sr-only">Pilihan Paket Wisata</label>
        <input type="text" name="pilihwisata" id="pilihwisata" class="form-control" placeholder="Pilih Paket Wisata" required autofocus>
        <button class="btn btn-lg btn-success btn-block" type="submit">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Lanjutkan
        </button>
        </form>

    <script src="../admin/js/jquery.min.js"></script>
    <script src="../admin/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			setTimeout(function(){
				$(".alert").fadeOut();
			}, 3000);
			
		});
	</script>
	
  </body>
</html>
