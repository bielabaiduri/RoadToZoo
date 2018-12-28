<?php require '../bootstrap.php';?>
<?php include "menu.php";?>

<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Invoice</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../css/style_invoice.css" type="text/css" />
<link href="../assets/datepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">


<style type="text/css">

  table.table {
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.1), 0 6px 6px 0 rgba(0, 0, 0, 0); 
    font-size: 12px;
  }

</style>


</head>
<body>
<div id="page">
  <div id="header"> <a href="#" id="logo"><img src="../images/logo-page.jpg" alt=""/></a>
    <ul id="navigation">
      <li id="link1"><a href="index.php">Home</a></li>
      <li id="link2"><a href="viewbooking.php">Bookings</a></li>
      <li id="link3"><a href="viewevents.php">Events</a></li>
      <li id="link5"><a href="profilecust.php">Profile</a></li>
      <li id="link6"><a href="logout.php">Logout</a></li>
      <li id="link7"><a href="#" data-toggle="modal" data-target="#myModalcart" class="offer-img"><span style="color:yellow" class="fa fa-shopping-cart my-cart-ico"> <?php echo $bil; ?></span></a></li>
    </ul>


  </div>
  <div id="content">
    <div id="events">
      <legend><strong>Place Bookings</strong></legend> 

           <table class="table table-bordered" id="" style="width:900px">
                    <thead>
                      <tr style="background-color:#FF6666 !important">
                        <th class="text-center">Package Name</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                      </tr>
                    </thead>
                    <?php
                      if(!empty($_SESSION["shopping_cart"]))
                      {
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                    ?>
                        <tr style="background-color:#fff">
                          <td align="left"><?php echo $values["Packagename"]; ?></td>
                          <td><?php echo $values["Package_quantity"]; ?></td>
                          <td>RM <?php echo $values["Price"]; ?></td>
                          <td>RM <?php echo number_format($values["Package_quantity"] * $values["Price"], 2); ?></td>
                        </tr>

                        <?php
                          $total = $total + ($values["Package_quantity"] * $values["Price"]);
                        }
                        ?>
                        <tr style="background-color:#fff">
                          <td colspan="3" align="right"><strong>Total Order</strong></td>
                          <td align="right" class="total_order"><strong>RM <?php echo number_format($total, 2); ?></strong></td>
                        </tr>
                    <?php
                      }else{
                          
                          echo "<tr><td colspan='4'>Your cart is empty</td></tr>";
                        
                      }
                    ?>
          </table>


          <?php

            if(isset($_POST['process_order'])){

                $cust_id = $_SESSION['userid'];
                $booking_date = $_POST['bookingdate'];
                $total_payment = $_POST['total_payment'];
               // $accowner = strtoupper(trim($_POST['acc_owner']));
                //$bank_name = $_POST['bankname'];
                $order_status = 'Paid';
                $transcode = $_SESSION['Transcode'];

                foreach($_SESSION["shopping_cart"] as $keys => $values){

                    $package_id = $values['id_package'];
                    $amount = $values["Package_quantity"] * $values["Price"];
                    $quantity  = $values['Package_quantity'];
                    $price  = $values['Price'];

                    $sql_order = "INSERT INTO booking (Cusid,Packageid,Ticketquantity,transcode) VALUES ('$cust_id','$package_id','$quantity','$transcode')"; 
                    mysqli_query($dbc, $sql_order) or die('Query failed. ' . mysqli_error());

                 }


                 $sql = "INSERT INTO booking_detail (Cusid,totalpayment,bookingdate,order_status,transcode) VALUES ('$cust_id','$total_payment','$booking_date','$order_status','$transcode')"; 
                 mysqli_query($dbc, $sql) or die('Query failed. ' . mysqli_error());

                 unset($_SESSION["shopping_cart"]);

                  function createRandomPassword()
                  {
                        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
                        srand((double)microtime()*1000000);
                        $i = 0;
                        $pass = '' ;
                        
                        while ($i <= 7) {
                      
                          $num = rand() % 33;
                          $tmp = substr($chars, $num, 1);
                          $pass = $pass . $tmp;
                          $i++;
                        }
                        return $pass;
                  }
                        
                  $confirmation = createRandomPassword();
                  $_SESSION['Transcode'] = $confirmation; 

                  print "<script>";
                  print "alert('Your order successful'); self.location='Index.php';"; 
                  print "</script>";
            }


          ?>

          <form name="form" action="" method="post">

                <table border="0" class="table table-bordered">

                  <tr>
                    <td style="text-align:left">Booking Date</td>
                    <td>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' name="bookingdate" id="bookingdate" class="form-control" date-format="dd/mm/yyyy" required/>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </td>
                  </tr>
                  
                  <tr>
                    <td style="text-align:left">Total Payment (RM)</td>
                    <td>
                      <input type="hidden" name="totalorder" id="totalorder" value="<?php echo number_format($total,2)?>" />
                      <input class="form-control total_payment" type="text" name="total_payment" id="total_payment" value="<?php echo number_format($total,2)?>" readonly required/>
                    </td>
                  </tr>
                </table>

                <input name="process_order" type="submit" class="btn btn-primary" id="order" value="Pay Bookings" />
				

				
        </form>

    </div>

  </div>



  <div id="footer">
    <div> <a href="#" class="logo"><img src="../images/animal-kingdom.jpg" alt=""/></a>
      <div>
        <p>Road To Zoo</p>
        <span>03-89531111 / 2222</span> <span>email@roadtozoo.com</span> </div>
      <ul class="navigation">
        <li><a href="index.php">Home</a></li>
        <li><a href="viewbooking.php">Bookings</a></li>
        <li><a href="viewevents.php">Events</a></li>
      </ul>
      <p>Copyright &copy; <?php echo date('Y')?> <a href="#">Road To Zoo</a> - All Rights Reserved </p>
    </div>
  </div>
</div>
</body>


<link href="../assets/datepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/datepicker/js/moment-with-locales.js"></script>
<script src="../assets/datepicker/js/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
    $(function () {

        $('#datetimepicker1').datetimepicker({
          format: 'YYYY-MM-DD',
          minDate: new Date()
        });
    });

</script>

</html>


