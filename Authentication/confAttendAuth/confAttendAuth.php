<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>OrderID Authentication</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/I-HostConf.png" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="frm">
        <form action="Attendprocess.php" method="POST">
            <p>
                <label>Validate Order ID :</label>
                <input type="text" id="order_id" name="order_id" required>
            </p>
            <p>
                <input type="submit" id="btn" value="Check">
            </p>
        </form>
    </div>
    
</body>
</html>