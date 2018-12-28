
<?php

  include '../includes/dbconnect.php';
  if(isset($_GET['id'])){

    $id_trans = $_GET['id'];
    $sql_2 = mysqli_query($dbc,"SELECT * FROM booking_detail WHERE transcode = '$id_trans'");
    $row2 = mysqli_fetch_array($sql_2);
  }


?>
<h4>Update Booking Ticket</h4>
<form name="form1" id="form1" method="post" action="viewbooking.php">

    <table id="datatable" class="table table-hover table-bordered" width="1000px">
      <thead>
        <tr style="background-color:#FF6666">
          <th class="text-center">No</th>
          <th class="text-center">Package Name</th>
          <th class="text-center">Package Time</th>
          <th class="text-center">Package Type</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Price</th>
          <th class="text-center">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no=1;
          $sql=mysqli_query($dbc,"SELECT a.*,b.* FROM booking AS a, package As b WHERE a.transcode = '$id_trans' AND a.Packageid = b.Packageid");
          while($row=mysqli_fetch_array($sql)){
          ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['Packagename'] ?></td>
            <td><?php echo $row['Packagetime'] ?></td>
            <td><?php echo $row['Packagetype'] ?></td>
            <td><?php echo $row['Ticketquantity'] ?></td>
            <td><?php echo $row['Price'] ?></td>
            <td><strong><?php  $price=$row['Price']; $quantity=$row['Ticketquantity']; $total=$price*$quantity; echo 'RM';echo $total;?></strong></td>    
          </tr>
          <?php $no++;}?>
      </tbody>
    </table>

    <table class="table table-condensed" border="0" style="width:600px">
        <tr>
          <td>Order Status</td>
          <td>
             <div class='col-lg-12'>
                <select class="form-control" name="order_status" id="order_status" style="width:auto">
                    <option  value="">Please choose status</option>
                    <option value="Collect & Done" <?php if(!strcmp("Collect & Done", $row2['order_status'])): echo 'Selected';?><?php endif?>>Collect & Done</option>
                    <option value="Paid" <?php if(!strcmp("Paid", $row2['order_status'])): echo 'Selected';?><?php endif?>>Paid</option>
                </select> 
            </div>
            </td>
        </tr>
    </table>

  <input name="bookingid" value="<?php echo $row2['id']?>" type="hidden" >
  <input name="updateticket" type="submit" class="btn  btn-primary" id="Submit" value="Update Bookings" />

</form> 