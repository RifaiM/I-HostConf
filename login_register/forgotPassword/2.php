<?php
	include 'config.php';
?>
 
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="icon" type="image/png" href="img/I-HostConf.png" />
	<title>Reset Password</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous"/>

</head>
<body>

<nav>
    <div class="logo">
	<a href="/Conference/index.html"><img src="img/I-HostConf.png"/></a>
    </div>
    <ul class="nav-links" style="margin: 0;">
      <li>
        <a href="/Conference/index.html#pre-B">CONFERENCE</a>
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
			
					<form  method="POST" action="2.php">

						<h1 style="font-family: 'Poppins', sans-serif;">Reset Password</h1>

						<center>
							<?php if (isset($msg)) { echo $msg; } ?>
						</center>

						<div class="input-group col-md-8 col-md-offset-2">
							<input type="email" name="email" class="input email" autocomplete="off" required>
							<label>E-Mail Address</label>
						</div>
					
						<div class="input-group col-md-8 col-md-offset-2">
							<input type="password" name="pass" class="input password" id="myInput" required>
							<label>New Password</label>
							<!-- <progress max="100" value="0" id="strength" style="width: 450px; height:3px;"></progress> -->
							<span class="TextError" style="margin-left: 40px;"></span>
						</div>

						<div class="input-group col-md-8 col-md-offset-2">
							<input type="password" name="repass" class="input repassword" required>
							<label>Re-type New Password</label>
						</div>
						
						<div class="input-group col-md-4 col-md-offset-4">
							<button type="submit" name="reset">
								Reset
							</button>							
						</div>
						
						<div class="forgot">
							<p>Already have an account? <a href="/Conference/login_register/login.php">Login here</a></p>
							<p>or <a href="/Conference/login_register/index.php">Register here</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- progress bar password validation
	
	<script type="text/javascript">
		var pass = document.getElementById("myInput");
		pass.addEventListener('keyup', function(){
			checkPassword(pass.value)
		})
		function checkPassword(myInput){
			var strengthBar = document.getElementById("strength")
			var strength = 0;
			if (myInput.length < 7) {
				strength -= 1
			}
			if (myInput.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)) {
				strength += 1
			}
			if (myInput.match(/[~<>?]+/)) {
				strength += 1
			}
			if (myInput.match(/[!@£$%^&*()]+/)) {
				strength += 1
			}
			if (myInput.length > 7) {
				strength += 1
			}
			switch(strength) {
				case 0:
						strengthBar.value = 0;
						break
				case 1:
						strengthBar.value = 20;
						break
				case 2:
						strengthBar.value = 40;
						break
				case 3:
						strengthBar.value = 60;
						break
				case 4:
						strengthBar.value = 80;
						break
				case 5:	
						strengthBar.value = 100;
						break	
			}
		}
	</script>

	-->

<?php
if(isset($_POST['reset'])){
	
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$repass = $_POST ['repass'];
	
	if($pass == $repass){
		
		$query  ="SELECT * FROM register WHERE email='$email'";
		
		$query_check = mysqli_query($con,$query);
		
		if($query_check){
			
	       if(mysqli_num_rows($query_check) > 0) {
			   
			   $query1 ="UPDATE register SET password='$pass' WHERE email='$email'";
			   $query_run = mysqli_query($con,$query1);
			   
			   if($query_run) {
				   echo "
				   <script>
						alert('Your Password is Updated.');
						window.location.href='/Conference/login_register/login.php';
				   </script>
				   ";
				}
				else {
					echo "
					 <script>
						alert('Your Password is not Updated, Please Try Again.');
						window.location.href='#';
					 </script>
					 ";
				 }

			} else {
				echo "
					<script>
					alert('Your Email is not Found.');
					window.location.href='#';
					</script>
					";
				}

		  }
		  else{ 
		   	echo "
				<script>
					 alert('Email Query not Working.');
					 window.location.href='#';
				</script>
				";
		  	}
  
	  } else {
		   echo "
				<script>
					 alert('Your Password and Confrim Password not match');
					 window.location.href='#';
				</script>
				";
	  	}
  }
  else {

  }

?>

<script src="js/apps.js"></script>
<script src="js/index.js"></script>
<script src="js/validation.js"></script>
<script>
  AOS.init({
    easing: 'ease-in-out-sine'
  });
</script>

</body>
</html>