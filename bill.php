<?php  

    include('admin/include/db_config2.php');
   // echo "hi";

    if(isset($_GET['roomname']))
    {
        $roomname = $_GET['roomname'];
        //echo $roomname ;
    }    

   //$roomname = $_GET['roomname'];
   //echo $roomname ;
 

    $sql2 = "SELECT price FROM room_category WHERE roomname = '$roomname'"; 
    $res2 = mysqli_query($conn,$sql2);
    $count = mysqli_num_rows($res2);
    //echo $count;
    if($res2){
       if($count==1){
            //echo $roomname;
            $row2 = mysqli_fetch_assoc($res2);

            $price = $row2['price'];
            //echo $price;
       }

    }


   $sql = "SELECT * FROM rooms ORDER BY room_id DESC"; 
   $res = mysqli_query($conn,$sql);

   if($res){
    //echo "fine";
        $row = mysqli_fetch_assoc($res);
        $room_id = $row['room_id'];
        //echo $room_id;
        $name = $row['name'];
        $phone = $row['phone'];
        $book = $row['book'];
        $checkin = $row['checkin'];
        $checkout = $row['checkout'];
        $days = $row['no_of_days'];
        $bill = $row['bill'];

   }



?>
<head>
    <link rel="stylesheet" href="text/css" href="print.css" media="print">

    <style>
       @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;1,300&display=swap');

        *{
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }
        .invoice-container{
            background-color: #1C315E;
            height: 100vh;
        }
        .invoice-data{
            max-width: max-content;
            margin: 5% auto;
            padding: 3% 7%;
            background-color: #227C70;
            box-shadow: 0px 9px 9px 2px rgba(17, 17, 26, 0.18);
        }
        .table-invoice{
            width: max-content;
            /* background-color: #fff; */
        }
        td{
            color: #DDDDDD ;
            padding: 3% 0;
        }
        .invoice-title{
            color: #DDDDDD;
            text-align: center;
            padding-top: 6%;
        }
        .btn-primary{
            background-color: #3E4E88;
            color: #DDDDDD;
            padding: 1% 2%;
            margin: 0 46%;
            border: none;
        }
        .label-left{
            /* padding-left: 4%; */
        }
        .back{
            color: #DDDDDD;
            margin-left: 90%;
        }
    </style>
</head>
<section>
    <div class="invoice-container">
        <h1 class="invoice-title">INVOICE</h1>
        <div class="invoice-data">
            <table class="table-invoice">
                <tr>
                    <td>NAME :</td>
                    <td class="label-left">
                        <?php echo $name ; ?>
                    </td>
                </tr>
                <tr>
                    <td>PHONE :</td>
                    <td class="label-left">
                        <?php echo $phone ; ?>
                    </td>
                </tr>
                <tr>
                    <td>FROM :</td>
                    <td class="label-left">
                        <?php echo $checkin ; ?>
                    </td>
                </tr>
                <tr>
                    <td>TO :</td>
                    <td class="label-left">
                        <?php echo $checkout ; ?>
                    </td>
                </tr>
                <tr>
                    <td>DAYS :</td>
                    <td class="label-left">
                        <?php echo $days ; ?>
                    </td>
                </tr>
                <tr>
                    <td>PRICE :</td>
                    <td class="label-left">
                        <?php echo $bill ; ?>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>STATUS :</td>
                    <td class="label-left">
                        <?php 
                            if($book){
                                echo "BOOKED";
                            }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
        <a href="<?php echo SITEURL ;?>"><p class="back">Back To Home</p></a>
    </div>
</section>