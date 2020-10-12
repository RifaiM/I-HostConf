<?php 
	require_once('PHPMailer/PHPMailerAutoload.php'); 
	require_once('credential.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="icon" type="image/png" href="img/I-HostConf.png" />
	<title>Register / Login</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	

	<link rel="stylesheet" href="css/indexPHP.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
			integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk="
			crossorigin="anonymous"
		/>

</head>

<body>
<?php 
$conn = mysqli_connect("localhost","root","","login_register");

if(isset($_POST['register'])){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repassword = $_POST['repassword'];

	$token = md5(rand('10000', '99999'));
	
	$sql_e = "SELECT * FROM register where email='$email'";
	$sql_n = "SELECT * FROM register where name='$name'";

		$res_e = mysqli_query($conn, $sql_e);
		$res_n = mysqli_query($conn, $sql_n);
	
		if (mysqli_num_rows($res_e) > 0) {
			$msg = "Sorry email already exist";
		} 
		elseif (strlen($password) < 6) {
			$msg =  "Your password must be at least 6 characters long.";
		}
		elseif( !preg_match("#[a-z]+#", $password ) ) {
			$msg = "Your password must include at least one lowercase character.";
			}
		elseif( !preg_match("#[A-Z]+#", $password ) ) {
			$msg = "Your password must include at least one uppercase character.";
			}
		elseif( !preg_match("#\W+#", $password ) ) {
			$msg = "Your password must include at least one special character.";
			}
		elseif( !preg_match("#[0-9]+#", $password ) ) {
			$msg = "Your password must include at least one number.";
			}
		elseif ($password !== $repassword) {
			$msg =  "Password & Re-type password not match";
		}
		else{
		$select = "INSERT INTO register(name,email,password,token,status)VALUES('".$name."','".$email."','".$password."','".$token."','Inactive')";
		$result = mysqli_query($conn,$select);

		$lastId = mysqli_insert_id($conn);

		$url = ('http://localhost').'/Conference/login_register/verify.php?id='.$lastId.'&token='.$token;                                // Set email format to HTML
		
		$output = '<div>Thank you for registering with us. Please click link below to verify your account : <br>'.$url.'</div>';

		if ($result == true) {

			$mail = new PHPMailer();
			$mail->isSMTP();  										// Set mailer to use SMTP                                
			$mail->Host = gethostbyname('smtp.gmail.com');  					// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = "faiacno@gmail.com";                 		// SMTP username
			$mail->Password = "ninjasaga1";                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                   // TCP port to connect to

			$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
			);

			$mail->setFrom('faiacno@gmail.com', 'I-HostConf');
			$mail->addAddress($email, $name);     // Add a recipient
			
			//$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo('faiacno@gmail.com', 'Reply');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			
			
			$mail->isHTML(true);

			$mail->Subject = 'Register confirmation';
			$mail->Body    = $output;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				$msg = '<div class="alert alert-success">Congratulation, Your registration has been successful. Please check your email to verify your Account.</div>';
			}
		}
	}
}

?>

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
			
					<form method="POST" action="">

						<h1>Register to Continue</h1>

						<center style="color: red;">
							<?php if (isset($msg)) { echo $msg; } ?>
						</center>

						<div class="input-group col-md-8 col-md-offset-2">
						<input type="text" name="name" class="input name" autocomplete="off" required>
							<label>Full Name</label>
						</div>

						<div class="input-group col-md-8 col-md-offset-2">
							<input type="email" name="email" class="input email" autocomplete="off" required>
							<label>E-Mail Address</label>
						</div>
					
						<div class="input-group col-md-8 col-md-offset-2">
							<input type="password" name="password" class="input password" id="myInput" required>
							<label>Password</label>
							<!-- <progress max="100" value="0" id="strength" style="width: 450px; height:3px;"></progress> -->
							<span class="TextError"></span>
						</div>

						<div class="input-group col-md-8 col-md-offset-2">
							<input type="password" name="repassword" class="input repassword" required>
							<label>Re-type Password</label>
						</div>
						
						<div class="input-group col-md-4 col-md-offset-4">
								<button type="submit" name="register">
									Register
								</button>							
							</div>
						
						<div class="forgot">
							<span>Have an account? </span><a href="login.php">Login here</a>
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

</body>
</html>
<script src="js/navigation.js"></script>
<script src="js/index.js"></script>
<script src="js/validation.js"></script>
