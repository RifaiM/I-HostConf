<?php 
	require('PHPMailer/PHPMailerAutoload.php'); 
	require('credential.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="icon" type="image/png" href="img/I-HostConf.png" />
	<title>Login</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
			integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk="
			crossorigin="anonymous"
		/>

	<link rel="stylesheet" href="css/login.css">
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
<?php 
	if(@$_GET['Empty']==true) {
?>
	<div class="alert-light text-danger text-center py-3"><?php echo $_GET['Empty'] ?></div>                                
<?php
	}
?>

<nav>
<div class="logo">
	<a href="/Conference/index.html"><img src="img/I-HostConf.png"/></a>
</div>
    <ul class="nav-links" style="margin: 0;">
      <li>
	  	<a href="/Conference/index.html#pre-A">CONFERENCE</a>
      </li>
      <li>
        <a href="/Conference/Mailer/mailerContactUs/index.php">CONTACT US</a>
      </li>
    </ul>

    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>

	<div class="container">
		
		<div class="row">
			<div class="col-md-8 col-md-offset-2 col-sm-12">	
				<div class="form">
			
					<form  method="POST" action="process.php">

						<h1 style="font-family: 'Poppins', sans-serif;">Welcome back!</h1>

						<?php 
							if(@$_GET['Invalid']==true) {
						?>
							<div class="alert-light text-danger text-center py-3"><?php echo $_GET['Invalid'] ?></div>                                
						<?php
							}
						?>

						<div class="input-group col-md-8 col-md-offset-2">
							<input type="email" name="email" class="input email" autocomplete="off" required>
							<label>E-Mail Address</label>
						</div>
					
						<div class="input-group col-md-8 col-md-offset-2">
							<input type="password" name="password" class="input password" id="myInput" required>
							<label>Password</label>
							<span>
								<i class="fa fa-eye" aria-hidden="true" id="eye" onclick="toggle()"></i>
							</span>
						</div>

						<div class="input-group col-md-4 col-md-offset-4">
								<button type="submit" name="login">
									LOGIN
								</button>							
							</div>
						
						<div class="forgot">
							<a href="/Conference/login_register/forgotPassword/1.php">Forgot Password?</a>
							<p>New user? <a href="index.php">Register here</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		var state= false;
		function toggle(){
			if(state){
				document.getElementById("myInput").setAttribute("type","password");
				document.getElementById("eye").style.color='#7a797e';
				state = false;
			}
			else{
				document.getElementById("myInput").setAttribute("type","text");
				document.getElementById("eye").style.color='#5887ef';
				state = true;
			}
		}
	</script>
			
</body>
</html>

<script src="js/navigation.js"></script>
<script src="js/index.js"></script>
