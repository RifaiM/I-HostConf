<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
			integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk="
			crossorigin="anonymous"
        />
        
    <link rel="icon" type="image/png" href="img/I-HostConf.png" />
    <title>My Purchase List</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> <a href="/Conference/login_register/welcome.php"><i class="far fa-arrow-alt-circle-left"></i></a> My Purchase List</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">

                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" name="get_hash" class="form-control" placeholder="enter your email" required>
                                </div>
                                <button type="submit" name="search_email" class="btn btn-sm">Search</button>
                            </form>
                            </div>
                        </div><br>
                        <div class="table-responsive" class="table-bordered">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Order id#</th>
                                    </tr>
                                </thead>
                                <tbody id="tableID">
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "cart");
                                    if (isset($_POST['search_email'])) 
                                    {
                                        $email = $_POST['get_hash'];
                                        $query = "SELECT customers.email, orders.hash FROM customers 
                                                INNER JOIN orders ON customers.id = orders.customer_id 
                                                WHERE customers.email = '$email' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            while($row = mysqli_fetch_array($query_run))
                                            {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['hash']; ?>
                                        <button type="button" class="btn btn-sm"  onclick="selectElementContents( document.getElementById('tableID') );"><i class="far fa-copy"></i></button>
                                        </td>
                                        
                                    </tr>
                                    <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="6" style="color: red;">No purchase record to corresponding Email found.</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            
                            <script type="text/javascript">
                                function selectElementContents(el) {
                                    var body = document.body, range, sel;
                                    if (document.createRange && window.getSelection) {
                                        range = document.createRange();
                                        sel = window.getSelection();
                                        sel.removeAllRanges();
                                        try {
                                            range.selectNodeContents(el);
                                            sel.addRange(range);
                                        } catch(e) {
                                            range.selectNode(el);
                                            sel.addRange(range);
                                        }
                                        document.execCommand("copy");
                                        alert('Copy successfull');
                                    }else if (body.createTextRange) {
                                        range = body.createTextRange();
                                        range.moveToElementText(el);
                                        range.select();
                                        range.execCommand("Copy");
                                    }
                                }
                            </script>
                            <div class="instruction">
                                <p>To open your purchase page, follow below instruction :</p>
                                <ol>
                                    <li>Search your Order id by typing Email used for Purchase</li>
                                    <li>Copy URL below and paste in your browser :</li>
                                        <span id="instructionID">http://localhost/Conference/cart/public/order/
                                            <button type="button" class="btn btn-sm" onclick="selectElementContents( document.getElementById('instructionID') );"><i class="far fa-copy"></i></button>
                                        </span>
                                    <li>Copy your Order id by clicking copy button on the right side</li>
                                    <li>Last is, paste your Order id in the end of URL order/</li>
                                        <span>ex : http://localhost/Conference/cart/public/order/6e0cf050d6bcd89822753ff382b34e76dadc669bf6a3b81dc6de4dab9f2f608d</span>
                                </ol>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>