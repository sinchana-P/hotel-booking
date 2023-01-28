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
        .container{
            max-width: 100%;
            height: 100vh;
            background-color: #000000B3;
        }
        .wrapper{
            width: 90%;
            /* background-color: blueviolet; */
            color: #DDDDDD;
            padding-left: 34%;
            padding-top: 10%;
        }
        input{
            color: black;
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
        .label-left {
            /* margin-right: 18%; */
        }
        .label-right{
            margin-left: 17%;
        }
        .title{
            margin-left: 70px;
            /* text-align: center; */
            margin-bottom: 50px;
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
                    <li><a href="reviews.php">Review</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.facebook.com"><img src="images/facebook.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png"></a></li>
                </ul>
            </div>
        </nav>

        <div class="wrapper">
            <form action="" method="POST">
                <table>
                    <tr class="my-row">
                        <td class="label-left">Full Name :</td>
                        <td><input type="text" name="username" placeholder="Full Name" class="label-right"></td>
                    </tr>
                    <tr class="my-row">
                        <td class="label-left">Email id :</td>
                        <td><input type="email" name="email" placeholder="Email id" class="label-right"></td>
                    </tr>
                    <tr class="my-row">
                        <td class="label-left">Phone No :</td>
                        <td><input type="tel" name="phone" placeholder="Phone no" class="label-right"></td>
                    </tr>
                    <tr class="my-row">
                        <td class="label-left">Password :</td>
                        <td><input type="password" name="password" placeholder="Password" class="label-right"></td>
                    </tr>
                    <tr class="my-row">
                        <td>
                            <input type="submit" name="submit" value="Register" class="submit-btn">
                        </td>
                    </tr>
                </table>
            </form>

            <?php
                if(isset($_POST['submit'])){
                    // echo "helllooooo" ;

                    // 1. get data from user
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];

                // set/write the SQL query 
                // 2. store the values to db
                $sql = "INSERT INTO users SET
                    username = '$username',
                    email = '$email',
                    phone_no = '$phone',
                    pwd = '$password'
                ";

                // Execute query
                $res = mysqli_query($conn,$sql);
                
                // verify the result...
                if($res==true){
                    // echo "successful" ;
                    header('location:'.SITEURL.'login.php');
                }

                    

                }
            ?>
        </div>

    <div>
</body>            