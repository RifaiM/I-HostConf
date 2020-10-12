
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
	<title>Reset Password</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style.css">

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

if(isset($_POST['reset'])){
	
	$email = $_POST['email'];

	$token = md5(rand('10000', '99999'));
	
	$sql_e = "SELECT * FROM register WHERE email='$email'";

		$res_e = mysqli_query($conn, $sql_e);
    	$data = mysqli_fetch_array($res_e);
	
		if (mysqli_num_rows($res_e) == 0) {
			$msg = "Sorry Email not Found.";
		}
		else{
		$select = "SELECT * FROM register WHERE email='$email'";
		$result = mysqli_query($conn,$select);

		$url = ('http://localhost').'/Conference/login_register/forgotPassword/2.php?'.'&token='.$token;      // Set email format to HTML
		
		$output = '<div>Please click Link below to Reset your Password : <br>'.$url.'</div>';

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
			$mail->addAddress($email);     // Add a recipient
			
			//$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo('faiacno@gmail.com', 'Reply');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			
			
			$mail->isHTML(true);

			$mail->Subject = 'Reset Password';
			$mail->Body    = $output;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				$msg = '<div class="alert alert-success">We have sent Password Reset Link to your Email.</div>';
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
			
					<form  method="POST" action="">

						<h1 style="font-family: 'Poppins', sans-serif;">Reset Password</h1>

						<center>
							<?php if (isset($msg)) { echo $msg; } ?>
						</center>

						<div class="input-group col-md-8 col-md-offset-2">
							<input type="email" name="email" class="input email" autocomplete="off" required>
							<label>E-Mail Address</label>
						</div>
						
						<div class="input-group col-md-4 col-md-offset-4">
							<button type="submit" name="reset">
								Submit
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


</body>
</html>
<script src="js/apps.js"></script>
<script src="js/index.js"></script>
<script>
  AOS.init({
    easing: 'ease-in-out-sine'
  });
</script>