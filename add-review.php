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

        <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        .container{
            max-width: 100%;
            height: 100vh;
            background-color: antiquewhite;
        }
        .wrapper{
            width: 90%;
            /* background-color: blueviolet; */
            padding-left: 30%;
        }
        .my-row{
            height: 60px;
        }
        .submit-btn {
            margin-left: 100%;
            width: 60px;
            height: 30px;
            margin-top: 10px;
        }
        .label-left {
            margin-right: 17%;
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
    <section class="container">
            <div class="wrapper">
                <h1 class="title">Add Review</h1>
                <form action="" method="POST">
                    <table>
                        <tr class="my-row">
                            <td class="label-left">Customer Name :</td>
                            <td><input type="text" name="name" placeholder="your name" class="label-right"></td>
                        </tr>
                        <tr class="my-row">
                            <td class="label-left">Customer Email :</td>
                            <td><input type="email" name="email" placeholder="your email" class="label-right"></td>
                        </tr>
                        <tr class="my-row">
                            <td class="label-left">Customer Review :</td>
                            <td><textarea type="text" name="review" rows="10" placeholder="your review" class="label-right"></textarea></td>
                        </tr>
                        <tr class="my-row">
                            <td>
                                <input type="submit" name="submit" class="submit-btn">
                            </td>
                        </tr>
                    </table>
                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $review = $_POST['review'];
                        
                        $sql = "INSERT INTO review SET 
                            username = '$name',
                            email = '$email',
                            review = '$review'
                        "; 
                        $res = mysqli_query($conn,$sql);
                        if($res){
                            header('location:'.SITEURL.'reviews.php');
                        }
                    }
                ?>

            </div>
    </section> 

</body>    
    
