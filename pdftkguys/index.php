<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/I-HostConf.png" />
    <title>Generate Certificate</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css">
<body>
    
<nav>
    <div class="logo">
      <a href="#"><img src="./img/I-HostConf.png" /></a>
    </div>
    <ul class="nav-links">
      
        <li>
          <a href="/Conference/login_register/admin/admin.php">Dashboard</a>
        </li>
        <li>
        <a href="./Conference/login_register/logout.php"><i class="fas fa-running"></i> Logout</a>
        </li>
        
      
    </ul>
    
    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </nav>

    <div class="container">
    
        <form method="POST" action="generate.php" id="form">
            <h1>Generate Certificate</h1>

            <div class="form-group row">
                <div class="col-lg-4">
                    <input type="text" name="name" required class="form-control" placeholder="Participant name">
                </div>
                <div class="col-lg-4">
                    <input type="date" name="date" required class="form-control" placeholder="Date of event">
                </div>
                <div class="col-lg-4">
                    <input type="text" name="name_ceo" required class="form-control" placeholder="Name of PIC Event">
                </div>
            </div>    
                    
                <button type="submit" class="btn"><i class="far fa-file-pdf"></i>&nbsp; Generate</button>   
        </form>
    </div>

    <script src="js/app.js"></script>
</body>
</html>