<?php
session_start();

if (!isset($_SESSION['web-b']['email'])) {
  header("location:login.php");
  exit();
}

const INDEX = 'yes';

include("admin/koneksi.php");
$sql_artikel = "SELECT * FROM artikel WHERE id='18'AND kategori NOT IN ('penulis', 'slide') AND NOT judul='Profil' AND NOT judul='Hubungi Kami' ORDER BY id DESC";
$data_artikel = $koneksi->query($sql_artikel);
$sql_slide = "SELECT * FROM artikel WHERE kategori = 'slide' ORDER BY id DESC";
$data_slide = $koneksi->query($sql_slide);
$sql_penulis  = "SELECT * FROM artikel WHERE 
				 kategori = 'penulis'
				 ORDER BY id DESC LIMIT 3";
$data_penulis = $koneksi->query($sql_penulis);

?>
<!DOCTYPE html>
<!-- saved from url=(0052)https://getbootstrap.com/docs/3.3/examples/carousel/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">

    <title>Website Jasa Perjalanan | TRAVELLO</title>

    <!-- Bootstrap core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="admin/css/carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">TRAVELLO</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="hubungikami.php">Hubungi Kami</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown mr-2 mr-sm-0">
          <a href="user/login.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['web-b']['nama']; ?><span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#"> Ganti Password </a></li>
              <li><a href="user/logout.php"> Logout </a> </li>
            </ul>
        </li>
                </ul>
              </form>
            </div>
          </div>
        </nav>

      </div>
    </div>
	
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
       <?php for ($i=0; $i<=($data_slide->num_rows-1); $i++) : ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>"></li>
       <?php endfor; ?>
      </ol>
      <div class="carousel-inner" role="listbox">
	  <?php
	  $num = 1;
	  while ($slide=$data_slide->fetch_array()) :
	  $active = "";
	  if ($num == 1) {
		  $active = "active";
	  }
	  
	  $num++;
	  ?>
        <div class="item <?php echo $active; ?>">
          <img class="slide" src="admin/image/<?php echo !empty($slide['foto']) ? $slide['foto'] : 'default.png'; ?>" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $slide['judul']; ?></h1>
              <p><?php echo $slide['kontenfull']; ?></p>
            </div>
          </div>
        </div>
	  <?php endwhile; ?>
      </div>
      <a class="left carousel-control" href="https://getbootstrap.com/docs/3.3/examples/carousel/#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="https://getbootstrap.com/docs/3.3/examples/carousel/#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
	
	<?php
	if (!empty($_GET['page'])) :
		if ($_GET['page'] == 'artikel' && !empty($_GET['id'])) :
	$sql_post = "SELECT * FROM artikel WHERE id = '".$_GET['id']."'";
	$data_post= $koneksi->query($sql_post)->fetch_array();
	?>
	<div class="container" style="margin-top:100px;margin-bottom:100px;">
	<div class="row">
		<div class="col-md-4">
			<img src="<?php echo 'admin/image/'.$data_post['foto'] ?>" class="img-responsive" style="width:100%;" />
		</div>
		<div class="col-md-8">
			<h2><?php echo $data_post['judul']; ?></h2>
			<div style="font-size:20px;text-align:justify;"><?php echo $data_post['kontenfull']; ?></div>
		</div>
	</div>
	</div>
	<?php elseif ($_GET['page'] == 'download') :
		$sql_download = "SELECT * FROM download ORDER BY id DESC";
		$query_download = $koneksi->query($sql_download);
	?>
	  <div class="container">
		<table class="table">
			<tr>
				<th>Judul</th>
				<th width="200">Download</th>
			</tr>
		 <?php while($download = $query_download->fetch_array()): ?>
			<tr>
				<td><?php echo $download['judul'] ?></td>
				<td>
					<a class="btn btn-primary btn-sm" href="admin/download/<?php echo $download['nama_file']; ?>">
					<span class="glyphicon glyphicon-download"></span> Download
					</a> 
				</td>
			</tr>
		<?php endwhile; ?>
		</table>
	</div>
	<?php endif; ?>

    <?php else: ?>

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
	  <?php while ($penulis=$data_penulis->fetch_array()) : ?>
        <div class="col-lg-4">
          <img class="img-circle" src="<?php echo 'admin/image/'.$penulis['foto']; ?>" alt="Generic placeholder image" width="140" height="140">
          <h2><?php echo $penulis['judul'] ?></h2>
          <p><?php echo $penulis['kontenfull'] ?></p>
        </div><!-- /.col-lg-4 -->
       <?php endwhile; ?>
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
	<?php
	$no = 1;
	while ($artikel=$data_artikel->fetch_array()) :
		$class_content = "";
		$class_gambar  = "";
		
		if (($no % 2) == 0) {
			$class_content = "col-md-push-5";
			$class_gambar  = "col-md-pull-7";
		}
		
		$no++;
	?>
      <div class="row featurette">
        <div class="col-md-7 <?php echo $class_content; ?>">
          <h2 class="featurette-heading"><?php echo $artikel['judul'] ?></h2>
          <p class="lead"><?php echo $artikel['kontenfull']; ?></p>
        </div>
        <div class="col-md-5 <?php echo $class_gambar ?>">
          <img class="featurette-image img-responsive center-block" alt="500x500" src="<?php echo 'admin/image/'.(!empty($artikel['foto']) ? $artikel['foto'] : 'default.png' ); ?>">
        </div>
      </div>

      <hr class="featurette-divider">
	 <?php endwhile; ?>

      <!-- /END THE FEATURETTES -->
	 
	 <?php endif; ?>

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="index.php">Back to top</a></p>
        <p>© 2019 BastianRevi, Inc. ·
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="admin/js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="admin/js/bootstrap.min.js"></script>
    
	</body>
</html>