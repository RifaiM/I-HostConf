<?php 
    require_once('config.php');
    session_start();
        if(isset($_POST['login']))
        {
        if(empty($_POST['email']) || empty($_POST['password']))
        {
                header("location:login.php?Empty= Please Fill in the Blanks");
        }
        else
        {
                $query="SELECT * FROM register WHERE email='".$_POST['email']."' and password='".$_POST['password']."'";
                $result=mysqli_query($conn,$query);
                $count = mysqli_num_rows($result);
                $data = mysqli_fetch_array($result);

                if($data['email'] =='jouwilldie@gmail.com')
                {
                    $_SESSION['email']=$_POST['email'];
                    header("location: /Conference/login_register/admin/admin.php");
                }
                elseif($count == 1)
                {
                    $_SESSION['email']=$_POST['email'];
                    header("location:welcome.php");
                }
                else{
                    header('location:login.php?Invalid= This Username or Password invalid.');
                }
        }
        }
        else
        {
            echo 'Not Working Now Guys';
        }
?>