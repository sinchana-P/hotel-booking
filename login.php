<?php
    include('admin/include/db_config2.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hotel Booking</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $(".datepicker").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>

    <style>
        .well {
            background: rgba(0, 0, 0, 0.7);
            border: none;
            height: 200px;
        }

        body {
            background-image: url('images/home_bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        h4 {
            color: #ffbb2b;
        }

        h6 {
            color: navajowhite;
            font-family: monospace;
        }

        label {
            color: #ffbb2b;
            font-size: 13px;
            font-weight: 100;
        }
        .wrapper{
            width: 100%;
            background-color: #000000B3;
            color: #DDDDDD;
            padding-left: 34%;
            padding-top: 14%;
            padding-bottom: 16%;
        }
        input{
            color: black;
            padding-left: 6%;
        }
        .my-row{
            height: 50px;
        }
        .submit-btn {
            margin-left: 100%;
            width: 80px;
            height: 30px;
            margin-top: 10px;
        }
    </style>


</head>

<body>
    <div class="container">

        <img class="img-responsive" src="images/home_banner.jpg" style="width:100%; height:180px;">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <li><a href="register-user.php">Registeration</a></li>
                    <li><a href="review.php">Review</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.facebook.com"><img src="images/facebook.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png"></a></li>
                </ul>
            </div>
        </nav>

        <?php
            if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>

        <div class="wrapper">
            <form action="" method="POST">
                <table>
                    <tr class="my-row">
                        <td>Full Name :</td>
                        <td><input type="text" name="username" placeholder="Full Name"></td>
                    </tr>
                    <tr class="my-row">
                        <td>Password :</td>
                        <td><input type="password" name="password" placeholder="Password"></td>
                    </tr>
                    <tr class="my-row">
                        <td>
                            <input type="submit" name="login" value="Log in" class="submit-btn">
                        </td>
                    </tr>
                </table>
            </form>

            <?php 
                if(isset($_POST['login'])){

                $username = $_POST['username'];
                $pwd = $_POST['password'];

                // echo "success";
                    $sql = "SELECT * FROM users WHERE username='$username' AND pwd='$pwd'";
                    $res = mysqli_query($conn, $sql);
                    if($res==true){
                        $count = mysqli_num_rows($res);
                        if($count==1){
                        $_SESSION['user'] = $username ;
                            $_SESSION['login'] = "<div>Login Successful</div>" ;
                            echo $_SESSION['login'];
                            header('location:'.SITEURL);
                        }
                        else{
                            $_SESSION['login'] = "<div>Invalid Username Or Password</div>";
                        }
                    }
                    
                    


                }
            ?>
        </div>

    <div>
</body>            