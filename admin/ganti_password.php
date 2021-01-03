<?php if (!empty($_SESSION['error'])) :?>
	<div class="alert alert-danger"><?php echo
	$_SESSION['error']; ?></div>
<?php
	unset($_SESSION['error']);
	endif;
?>	
	
	
<?php if (!empty($_GET['status']) && $_GET['status'] == 'sukses') : ?>
<div class="alert alert-success">Password Anda berhasil diganti!</div>
<?php endif; ?>
<div class="panel panel-primary">
	<div class="panel-heading">
		Ganti Password
	</div>
	
	<div class="panel-body">
			<form action="update_password.php" method="post" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-md-2">Password Lama</label>
		<div class="col-md-5">
			<input type="password" name="password_lama" class="form-control" required="required">
		</div>
	</div>
	
	
	<div class="form-group">
			<label class="control-label col-md-2">Password Baru</label>
		<div class="col-md-5">
			<input type="password" name="password_baru" class="form-control" required="required">
		</div>
	</div>
	
	<div class="form-group">
			<label class="control-label col-md-2">Ulangi Password Baru</label>
		<div class="col-md-5">
			<input type="password" name="ulangi_password" class="form-control" required="required">
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-md-5 col-md-offset-2">
		<input type="submit" value="Ganti Password" class="btn btn-primary" required="required">
		</div>
	</div>	
</form>