
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="icon" type="image/png" href="img/I-HostConf.png" />
	<title>Welcome Admin</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/floating.css">

</head>
<body>

<nav>
	<div class="logo">
		<a href="/Conference/index.html"><img src="img/I-HostConf.png"/></a>
	</div>
	<ul class="nav-links">
		<li>
			<a href="/Conference/login_register/admin/logout.php?logout"><i class="fas fa-running"></i> Logout</a>
		</li>
		<li>
			
		</li>
	</ul>

	<div class="burger">
		<div class="line1"></div>
		<div class="line2"></div>
		<div class="line3"></div>
	</div>
</nav>

	<?php 
		session_start();

		if(isset($_SESSION['email']))
		{
			
			echo '';
		}
		else
		{
			header("location:index.php");
		}
	?>

	<br><br><br><br>
	<div class="container">
		<form action="" method="post">
			<div class="col-md-12">
				<div class="jumbotron">
					<h1>Welcome Admin</h1>(<?php echo $_SESSION['email']; ?>) 
				</div>

				<a href="#menu" id="toggle"><span></span></a>

				<div id="menu">
					<ul>
						<li><a href="/Conference/login_register/exportData/ExportLoginData/index.php">Export Data</a></li>
						<li><a href="/Conference/Authentication/certAuth/certAuth.php">Generate Certificate</a></li>
						<li><a href="/Conference/video_chat/host/index.html">Host Meeting</a></li>
						<li><a href="https://console.agora.io/token/eNCQCdNBmeS" target="_blank">Generate token</a></li>
						<li><a href="./Generate-QR-Codes/index.php">Generate Token QR</a></li>
					</ul>
				</div>
			</div>
		</form>
	</div>

	<div class="avx-feedback-float-icon">
	<a href="http://localhost:3000/" target="_blank"><div class="fb-float-icon">Live Chat Support</div>
    </div>
				
	<script src="js/navigation.js"></script>
	<script src="js/menu.js"></script>
		
</body>
</html>