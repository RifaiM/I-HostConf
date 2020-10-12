<!DOCTYPE html>
<html>
<head>
	<body>
	<link rel="icon" type="image/png" href="img/I-HostConf.png" />
	<title>Verify successful</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<link rel="stylesheet" href="css/indexPHP.css">


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
		body{
			text-align: center;
			padding-top: 100px;
			font-family: 'Poppins';
			font-weight: bold;
			font-size: 20px;
		}
	</style>
</head>
</body>

<?php 
	$conn = mysqli_connect("localhost","root","","login_register");

	//if(isset($_POST['login'])){
		
		$id = $_GET['id'];
		$token = $_GET['token'];

		$select = "UPDATE register SET status = 'Active' WHERE id = '$id' AND token = '$token'";
		$result = mysqli_query($conn,$select);
		if ($result) {
			echo 'Verify successful. You can log in now : <a href="login.php">Log in</a>';
		}else{
			echo "verify failed";
		}

	//}

?>