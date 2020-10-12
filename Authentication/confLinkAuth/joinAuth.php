<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Join Link Authentication</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/I-HostConf.png" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="frm">
        <form action="joinprocess.php" method="POST">
            <p>
                <label>Join Link : </label>
                <input type="text" id="links" name="links" required>
            </p>
            <p>
                <input type="submit" id="btn" value="Check">
            </p>
        </form>
    </div>
    
</body>
</html>