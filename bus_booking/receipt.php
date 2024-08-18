<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/receipt-style.css">
    <title>GTS|Receipt</title>
</head>
<body>

<?php 
require 'config/conn.php';

$bookindId = 0;

if(isset($_GET['bookindId'])){

    $bookindId = $_GET['bookindId'];



    $userInfo = mysqli_query($connect, "SELECT * FROM `user_booking` WHERE  id  =    $bookindId");
    
    $result = mysqli_fetch_array($userInfo);

    $fname = $result['fname'];
    $lname = $result['lname'];
    $full_name = $fname . ' ' . $lname;

    $email = $result['email'];

     $amount = $result['amount'];


    $route = $result['route'];

    $depeature = $result['depeature'];

    $bus_no = $result['bus_no'];

    $seat_no = $result['seat_no'];


    $booking_id = $result['booking_id'];
    
    
}



?>


<!-- Receipt body start here -->

<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Thanks for patronizing our services <br> Save Journey</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td><span><b><u><?php echo $full_name; ?></u></b></span><br>
                                                    Invoice #<?php echo $booking_id; ?><br>Route: <?php echo $route; ?><br>Bus No.: <?php echo $bus_no; ?><br> 
                                                    Seat No.: <?php echo $seat_no; ?><br> 
                                                    Departure: <?php echo $depeature; ?><br>
                                                    Date: <?php echo date('d-m-Y') ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>Amount Paid</td>
                                                            <td class="alignright"><?php echo $amount; ?></td>
                                                        </tr>
                                                       
                                                        
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total</td>
                                                            <td class="alignright"> &#8358; <?php echo number_format($amount); ?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td class="content-block">
                                       &copy; <?php echo date('Y'); ?> Gombe Transport Services
                                    </td>
                                </tr>

                                  <tr>
                            <td class="aligncenter content-block"><b><i><span style="color: red;">Please note that you are to come to the park 30 minutes before departure time</span></i></b></td>
                        </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody>
                          

                    </tbody></table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>

<!-- Receipt body end here -->

    
</body>
</html>