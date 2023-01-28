<?php
    include('admin/include/db_config2.php');

    $roomname=$_GET['roomname'];
    //echo $roomname;


    $sql2 = "SELECT price FROM room_category WHERE roomname = '$roomname'"; 
    $res2 = mysqli_query($conn,$sql2);
    $count = mysqli_num_rows($res2);
    //echo $count;
    if($res2){
       if($count==1){
            // echo $roomname;
            $row2 = mysqli_fetch_assoc($res2);

            $price = $row2['price'];
            // echo $price;
       }

    }


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
  <link rel="stylesheet" href="admin/css/reg.css" type="text/css">
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
                  dateFormat : 'yy-mm-dd'
                });
  } );
  </script>

    
</head>

<body>
    <div class="container">
      
      
       <img class="img-responsive" src="images/home_banner.jpg" style="width:100%; height:180px;">      
        

      <div class="well">
            <h2>Book Now: <?php echo $roomname; ?></h2>
            <hr>
            <form action="" method="post" name="room_category">
              
              
               <div class="form-group">
                    <label for="checkin">Check In :</label>&nbsp;&nbsp;&nbsp;
                    <input type="date" class="datepicker" name="checkin">

                </div>
               
               <div class="form-group">
                    <label for="checkout">Check Out:</label>&nbsp;
                    <input type="date" class="datepicker" name="checkout">
                </div>
                <div class="form-group">
                    <label for="name">Enter Your Full Name:</label>
                    <input type="text" class="form-control" name="name" placeholder="Jhon Wicky" required>
                </div>
                <div class="form-group">
                    <label for="phone">Enter Your Phone Number:</label>
                    <input type="tel" class="form-control" name="phone" placeholder="018XXXXXXX" required>
                </div>
                 

                
                <button type="submit" class="btn btn-lg btn-primary button" name="submit">Book Now</button>

                <!-- <button type="submit" class="btn btn-lg btn-primary button" name="submit">Book Now</button> -->

               <br>
                <div id="click_here">
                    <a href="index.php">Back to Home</a>
                </div>


            </form>

            <?php
                if(isset($_POST['submit'])){ 
                    //echo "hi";
                    $checkin = $_POST['checkin'];
                    $checkout = $_POST['checkout'];
                    $name = $_POST['name'];
                    $phone = $_POST['phone'];
                    

                    echo $checkin.' -to- '.$checkout ,$name,$phone;
                    $diffDate = abs(strtotime($checkin) - strtotime($checkout));
                    echo 'DATE : '.$diffDate.' ---' ;
                    //echo $diff;
                    $yearsDiff = floor($diffDate/ (365*60*60*24));
                    echo 'YEAR : '.$yearsDiff.' ---';

                    $monthDiff = floor(($diffDate-$yearsDiff * 365*60*60*24)/(30*60*60*24));
                    echo 'MONTH : '.$monthDiff.' ---' ;

                    $daysDiff = floor(($diffDate-$yearsDiff * 365*60*60*24 - $monthDiff*30*60*60*24)/(60*60*24));
                    echo 'DAYS : '.$daysDiff.' ---'; 

                    $months = ceil($yearsDiff * 12) ;
                    echo 'months : '.$months ;

                    $ttl_months = $monthDiff + $months;
                    echo 'ttl_months : '.$ttl_months ;

                    $days = $ttl_months * 30;
                    echo 'days : '.$days;

                    $ttl_days = $daysDiff + $days ;
                    echo 'ttl_days : '.$ttl_days;

                    $bill = $ttl_days * $price;
                    echo 'bill : '.$bill;

                    $sql = "INSERT INTO rooms SET 
                        room_cat = '$roomname',
                        name = '$name',
                        phone = '$phone',
                        book = 'true',
                        checkin = '$checkin',
                        checkout = '$checkout',
                        no_of_days = '$ttl_days',
                        bill = '$bill'
                    "; 
                    
                    $res = mysqli_query($conn,$sql); 

                    If($res){
                       // echo "ok" ;
                       header('location:'.SITEURL.'bill.php?roomname='.$roomname);
                       $_SESSION['successful-booking'] = "<div>ROOM BOOKED SUCCESSFULLY !</div>";
                    }

                }

            ?>
        </div>
        
        



    </div>
    
    
    
    
    






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>