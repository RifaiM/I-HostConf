<?php 
	require('PHPMailer/PHPMailerAutoload.php'); 
	require('credential.php');
?>

<?php 

if(isset($_POST['send'])){
	
	$email = $_POST['email'];
	$ordermsg = $_POST['ordermsg'];

	
	// Set email format to HTML
		
		$output = 'Thank you for your Purcahse. Below is your Payment link page : <br><br>';
		

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
			$mail->addReplyTo('faiacno@gmail.com');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			
			
			$mail->isHTML(true);

			$mail->Subject = 'Payment Details';
			$mail->Body    = $output. "Email : ".$email.'<br><br>'."Your payment link page : ".'<br><br>'.$ordermsg;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {

				echo "
				   <script>
						alert('Sent Successfully! Your Payment Details has been sent to your email.');
						window.close();
				   </script>
				   ";
			}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/I-HostConf.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>Send Payment Details</title>
</head>

<body>

<div class="container">

<h1 class="brand"><a href="/Conference/login_register/welcome.php" style="text-decoration: none;"><span>I-HostConference</span></a></h1>

	<div class="wrapper">

	<!-- COMPANY INFORMATION -->
	<div class="company-info">
		<h3>I-HostConference</h3>

		<ul>
			<li><i class="fa fa-road"></i> XYZ Street</li>
			<li><i class="fa fa-phone"></i> (021) 1234-56789</li>
			<li><i class="fa fa-envelope"></i> support@ihostconf</li>
		</ul>
	</div>
	<!-- End .company-info -->

	<!-- CONTACT FORM -->
	<div class="contact">
		<h3>Send your Payment Details</h3>

		<form id="contact-form" action="" method="POST" name="form">

			<p>
				<label for="email">E-mail</label>
				<input type="email" name="email" id="email" required>
			</p>

			<p class="full">
				<label for="message">Order Details</label>
				<textarea name="ordermsg" id="ordermsg" rows="5" placeholder="paste here.."></textarea>
			</p>

			<p class="full">
				<button type="submit" name="send">Send</button>
			</p>

		</form>
		<!-- End #contact-form -->
	</div>
	<!-- End .contact -->

</div>
<!-- End .wrapper -->
</div>
<!-- End .container -->

</body>
</html>