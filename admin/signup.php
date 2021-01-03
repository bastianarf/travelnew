<?php
session_start();

if (isset($_SESSION['web-b']['username'])) {
	header("location:index.php");
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

    <title>Signup Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="proses_signup.php" method="post">
      	<?php if (isset($_GET['status']) && $_GET['status'] == 'gagal-login') : ?>
		<div class="alert alert-danger text-center alert-dismissible">
		
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			
			Login gagal!
		
		</div>
		<?php endif; ?>
      
        <h2 class="form-signin-heading">Sign Up Admin</h2>
        <label for="name" class="sr-only">Name</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus>

        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
        
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <label for="Email" class="sr-only">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
        <button class="btn btn-lg btn-success btn-block" type="submit">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sign up
        </button>
       
      </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
      setTimeout(function(){
        $(".alert").fadeOut();
      }, 3000);
      
    });
  </script>
  </body>
  </html>