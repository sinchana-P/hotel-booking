<?php 
    include('admin/include/db_config2.php'); 
    // include('login-checkup.php');
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   
    
    <style>
        .well
        {
            background: rgba(0,0,0,0.7);
            border: none;
    
        }
        .wellfix
        {
            background: rgba(0,0,0,0.7);
            border: none;
            height: 150px;
        }
		body
		{
			background-image: url('images/home_bg.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
		}
		p
		{
			font-size: 13px;
		}
        .pro_pic
        {
            border-radius: 50%;
            height: 50px;
            width: 50px;
            margin-bottom: 15px;
            margin-right: 15px;
        }
        .title {
            color: whitesmoke;
            font-size: 2.1rem;
            padding-top: 30px;
            margin-bottom: 50px;
        
        }
		.review-menu-box{
            width: 27%;
            margin: 1% 3%;
            padding: 1%;
            float: left;
            background-color: rgb(225, 215, 215);
            border-radius: 15px;
        }

        .review-menu-desc{
            /* background-color: blue; */
            width: 80%;
            float: left;
            margin-left: 4%;
        }

        .review-email{
            font-size: 0.9rem;
            margin: 1% 0;
            font-style: italic;

        }
        .review-detail{
            font-size: 1rem;
            color: #747d8c;
            margin-bottom: 10px;

        }
        .btn{
            margin-left: 45%;
            margin-bottom: 5%;
        }
    </style>
    
    
</head>

<body>
    <div class="container">
      
       <img class="img-responsive" src="images/home_banner.jpg" style="width:100%; height:180px;">      
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="room.php">Room &amp; Facilities</a></li>
                    <li><a href="register-user.php">Registeration</a></li>
                    <li><a href="reviews.php">Review</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.facebook.com"><img src="images/facebook.png"></a></li>
                    <li><a href="http://www.twitter.com"><img src="images/twitter.png"></a></li>                    
                </ul>
            </div>
        </nav>


<section class="wrapper-review">
        <div class="container">
            <h1 class="title text-center">Customer's Review</h1>
            <form action="" method="POST">
                <table>
                    <a href="add-review.php"><input type="button" value="Add Review" name="add-review" class="btn"></a>
                </table>
            </form>

            <?php
                $sql = "SELECT * FROM review";
                $res = mysqli_query($conn,$sql);

                if($res){
                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        while($rows = mysqli_fetch_assoc($res)){
                            $id = $rows['id'];
                            $name = $rows['username'];
                            $email = $rows['email'];
                            $review = $rows['review'];

                            ?>
                            <div class="review-menu-box">
                                    <div class="review-menu-desc">
                                        <h4 class="cust-name"><?php echo $name; ?></h4>
                                        <p class="review-email"><?php echo $email; ?></p>
                                        <p class="review-detail">
                                            <?php echo $review ; ?>
                                        </p>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                }
            ?>
        </div>
        
        <div class="clearfix"></div>

</section>      
 

