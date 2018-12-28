<?php require '../bootstrap.php';?>

<?php

    if(isset($_POST['updateticket'])){

      $bookingid = $_POST['bookingid'];
      $order_status = $_POST['order_status'];

      $sql = "UPDATE booking_detail SET order_status ='$order_status' WHERE id = '$bookingid'"; 
      mysqli_query($dbc, $sql) or die('Query failed. ' . mysqli_error());

      print "<script>";
      print "alert('Booking Order updated')"; 
      print "</script>";


    }

   
?>

<!DOCTYPE html>
<html>
<head>
<title>Road To Zoo | Bookings</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/style_invoice.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap.min.css">
<link href="../css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="page">
  <div id="header"> <a href="#" id="logo"><img src="../images/logo-page.jpg" alt=""/></a>
    <ul id="navigation">
      <li id="link1"><a href="index.php">Home</a></li>
      <li id="link2" class="selected"><a href="viewbooking.php">Bookings</a></li>
      <li id="link3"><a href="viewstatistic2.php">Statistics</a></li>
      <li id="link4"><a href="viewevents.php">Events</a></li>
      <li id="link5"><a href="viewpackage.php">Packages</a></li>
      <li id="link6"><a href="profilestaff.php">Profile</a></li>
      <li id="link7"><a href="logout.php">Logout</a></li>
    </ul>
  </div>


  <div id="content">
    <div id="events">
      <legend><strong>Manage Bookings</strong></legend>

            <table class="table table-bordered table-condensed table-hover" id="list">
            <thead>
              <tr>
                <td width="10px"></td>
                <td width="100px">Cust Name</td>
                <td width="100px">Cust IC</td>
                <td width="150px">Cust Tel</td>
                <td width="100px">Payment Date</td>
                <td width="100px">Total Payment</td>
                <td width="100px">Order Status</td>
                <td width="100px">Ticket Details</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
            <?php 

                $sql_b = "SELECT a.*,b.Cusname,b.Ic,b.Notel FROM booking_detail AS a,customer AS b
                          WHERE a.Cusid = b.Cusid";                
                $result_b = mysqli_query($dbc,$sql_b) or die('Query failed. ' . mysqli_error());

                $tmpCount = 1;
                while($row = mysqli_fetch_assoc($result_b)) {?>   
                <tr style="background-color:#fff">
                  <td><?php echo $tmpCount; ?></td>
                  <td><?php echo $row['Cusname']; ?></td>
                  <td><?php echo $row['Ic']; ?></td>
                  <td><?php echo $row['Notel']; ?></td>
                  <td><?php echo date('d M Y',strtotime($row['bookingdate'])); ?></td>
                  <td><?php echo $row['totalpayment']; ?></td>
                  <td><?php echo $row['order_status']; ?></td>
                  <td>
                    <a rel="facebox" href="ticket_detail.php?id=<?php echo $row['transcode']; ?>" class="btn btn-xs"><i class="fa fa-list"></i></a>
                  </td>
                  <td>
                      <?php if($row['order_status']=='Paid'):?>
                        <a rel="facebox" href="process_ticket.php?id=<?php echo $row['transcode']; ?>" class="btn btn-xs"><i class="fa fa-pencil"></i></a>
                      <?php else:?>
                        -
                      <?php endif?>
                  </td> 
                </tr> 
                <?php $tmpCount++; } 
              
            ?>  
            </tbody>
            </table>
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
        <li><a href="viewstatistic.php">Statistics</a></li>
        <li><a href="viewevents.php">Events</a></li>
        <li><a href="viewpackage.php">Packages</a></li>
        <li><a href="profilestaff.php">Profile</a></li>
      </ul>
      <p>Copyright &copy; <?php echo date('Y')?> <a href="#">Road To Zoo</a> - All Rights Reserved </p>
    </div>
  </div>
</div>
</body>


<script type="text/javascript" src="../assets/js/jquery-3.3.1.js"></script>
<script src="../assets/js/facebox.js" type="text/javascript"></script>

<script>
  $(document).ready(function() {
      
        $('a[rel*=facebox]').facebox({
          loadingImage : '../css/loading.gif',
          closeImage   : '../css/closelabel.png'
        })  
  });
</script>

<script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#list').DataTable( {
      } );
  } );
</script>

</html>
