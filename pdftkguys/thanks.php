<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link rel="icon" type="image/png" href="img/I-HostConf.png" />
    <title>Thanks</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
<body>
    <div class="container">
    
        <h1 class="thanks">Your Certificate for "<?php echo $_GET['name'];?> "has been generated : 
            <a href="./completed/<?php echo $_GET['link'];?>" download>Download here.</a>
            <span>Return <a href="/Conference/login_register/admin/admin.php">home.</a></span>
        </h1>
    
    </div>
</body>
</html>