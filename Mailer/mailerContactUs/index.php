<?php 
	require('PHPMailer/PHPMailerAutoload.php'); 
	require('credential.php');
?>

<?php 

if(isset($_POST['send'])){
	
	$name = $_POST['name'];
	$title = $_POST['title'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];
	
	// Set email format to HTML
		
		$output = 'You have new users Inquiry below : <br><br>';
		

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

			$mail->setFrom($email, 'User Inquiry (I-HostConf)');
			$mail->addAddress('faiacno@gmail.com');     // Add a recipient
			
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('faiacno@gmail.com');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			
			
			$mail->isHTML(true);

			$mail->Subject = 'User Inquiry';
			$mail->Body    = $output. "Name : ".$name.'<br>'."Title : ".$title.'<br>'."Email : ".$email.'<br>'."Phone : ".$phone.'<br>'."Message : ".'<br><br>'.$message;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo "
				   <script>
						alert('Sent Successfully! Thank you for Contacting I-HostConf, We will reply your message soon.');
						window.location.href='/Conference/index.html';
				   </script>
				   ";
			}
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/I-HostConf.png" />
    <link rel="stylesheet" href="css/style.css">
    <script
			  src="https://code.jquery.com/jquery-2.1.4.min.js"
			  integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw="
			  crossorigin="anonymous"></script>

    <title>Contact Us</title>
</head>
<body>
    
    <div class="container">

        <h1 class="brand"><a href="/Conference/index.html" style="text-decoration: none;"><span>I-HostConference</span></a></h1>
    
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
				<h3>We're Ready to Help you</h3>
				
                <form id="contact-form" action="" method="POST" name="form">
    
                    <p>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" required />
                    </p>
    
                    <p>
                        <label for="title">Subject</label>
                        <input type="text" name="title" id="title" required />
                    </p>
    
                    <p>
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" autocomplete="off" required />
                    </p>
    
                    <p>
                        
                        <label for="phone">Phone
                            <select id="select-country">
                                <option value="US">US</option>
                                <option value="ID" selected>ID</option>
                            </select>
                        </label>
                        
                        <input type="text" name="phone" id="phone" required />
                        
                    </p>
    
                    <p class="full">
                        <label for="message">Message</label>
                        <textarea name="message" rows="5" required></textarea>
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

    <script src="js/cleave.js"></script>
    <script src="js/cleave-phone.i18n.js"></script>
    <script>
        var cleave = new Cleave('#phone', {
            phone: true,
            phoneRegionCode: 'ID'
        });

        $('#select-country').change(function() {
            cleave.setPhoneRegionCode(this.value);
            cleave.setRawValue('');
        });
    </script>
</body>
</html>

</body>
</html>