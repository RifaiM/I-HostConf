<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <title>Live search Database</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

    <link rel="stylesheet" href="../css/customer.css">

    <link rel="icon" type="image/png" href="../img/I-HostConf.png" />
</head>

<body class="bg-secondary">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#"><img src="../img/I-HostConf.png"></a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <li class="nav-item">
            <form method="post" action="export.php">  
                <input type="submit" name="export" value="CSV Export"/>
            </form>
        </li>
        <li class="nav-item">
            <a class="dashboard" href="/Conference/login_register/admin/admin.php">Dashboard</i></a>
        </li>
        <li class="nav-item">
            
        </li>
        </ul>
    </div>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 bg-light mt-2 rounded pb-3">
                <h2 class="text-primary p-2" >Search Data Customer</h2>
                
                <hr>
                <a href="#menu" id="toggle"><span></span></a>
				<div id="menu">
                    <ul>
                        <li><a href="/Conference/login_register/exportData/ExportLoginData/index.php" >Export data User Login</a></li>
                        <li><a href="/Conference/login_register/exportData/ExportOrdersData/index.php" >Export data Orders</a></li>
                        <li><a href="/Conference/login_register/exportData/ExportAddressData/index.php" >Export data Addresses</a></li>
                        <li><a href="/Conference/login_register/exportData/ExportPaymentsData/index.php" >Export data Payments</a></li>
                    </ul>
                </div>
                <div class="form-inline pl-3">
                    <label for="search" class="font-weight-bold lead text-dark" >Search</label>&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" name="search" id="search_text" class="form-control form-control-md rounded-2 border-secondary" placeholder="type here.." >
                </div>
                <?php
                    include '../config.php';
                    $stmt = $conn->prepare("SELECT * FROM customers ORDER BY id ASC");
                    $stmt->execute();
                    $result = $stmt->get_result();
                ?>
                <table class="table table-hover table-light table-stripped" id="table-data" >
                    <thead>
                        <tr>
                            <th>ID</th>  
                            <th>Name</th>  
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Updated at</th>   
                        </tr> 
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['created_at']; ?></td>
                                <td><?= $row['updated_at']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#search_text").keyup(function() {
                var search = $(this).val();
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data: {query:search},
                    success: function(response) {
                        $("#table-data").html(response);
                    }
                });
            });
        });
    </script>
    <script src="../js/menu.js"></script> 
</body>
</html>