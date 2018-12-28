<?php require '../bootstrap.php';?>
<link href="../assets/datepicker/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="../assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/datepicker/js/moment-with-locales.js"></script>
<script src="../assets/datepicker/js/bootstrap-datetimepicker.js"></script>
<?php

  include '../includes/dbconnect.php';

  $id = $_SESSION['user_id'];
  $sql="SELECT * FROM customer WHERE Ic='$id'"; 
  $result = mysqli_query($dbc,$sql) or die('Query failed. ' . mysqli_error());
  $row = mysqli_fetch_assoc($result);

?>

<form name="form1" id="form1" method="post" action="profilecust.php">

    <table class="table table-condensed" border="0" style="width:600px">
        <tr>
          <td>Member IC</td>
          <td>
            <div class='col-lg-12'>
                 <input class="form-control" type="text" name="ic" id="ic" value="<?php echo $row['Ic']?>" readonly/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Member Name</td>
          <td>
            <div class='col-lg-12'>
                <input type='text' name="name" id="name" class="form-control" value="<?php echo $row['Cusname']?>" required/>
            </div>
          </td>
        </tr>
        <tr>
          <td>Member Email</td>
          <td>
            <div class='col-lg-12'>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $row['Email']?>" required/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Member Address</td>
          <td>
            <div class='col-lg-12'>
                <textarea class="form-control" name="address" id="address" required><?php echo $row['Address']?></textarea>
            </div>
          </td>
        </tr> 
        <tr>
          <td>Member Telephone</td>
          <td>
             <div class='col-lg-12'>
                <input class="form-control" type="text" name="tel" id="tel" value="<?php echo $row['Notel']?>" required />
            </div>
            </td>
        </tr>

  </table>
  <input name="cusid" value="<?php echo $row['Cusid']?>" type="hidden" >
  <input name="updateprofile" type="submit" class="btn  btn-primary" id="Submit" value="Update Profile" />

</form> 