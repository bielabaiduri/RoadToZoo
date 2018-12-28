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

<?php

  include '../includes/dbconnect.php';

  if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql="SELECT * FROM event WHERE Eventid='$id'"; 
    $result = mysqli_query($dbc,$sql) or die('Query failed. ' . mysqli_error());
    $row = mysqli_fetch_assoc($result);

  }

?>
<h4>Update Events</h4>
<form name="form1" id="form1" method="post" action="viewevents.php">

    <table class="table table-condensed" border="0" style="width:600px">
        <tr>
          <td>Event Name</td>
          <td>
            <div class='col-lg-12'>
                 <input class="form-control" type="text" name="eventname" id="eventname" value="<?php echo $row['Eventname']?>" required/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Event Date</td>
          <td>
            <div class='col-lg-12'>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="eventdate" id="eventdate" class="form-control" value="<?php echo $row['Eventdate']?>" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
          </td>
        </tr>
        <tr>
          <td>Event Time</td>
          <td>
            <div class='col-lg-12'>
                <input class="form-control" type="text" name="eventtime" id="eventtime"  placeholder="8:00 AM - 9:00 AM" value="<?php echo $row['Eventtime']?>" required/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Event Place</td>
          <td>
            <div class='col-lg-12'>
                <input class="form-control" type="text" name="eventplace" id="eventplace" value="<?php echo $row['Eventplace']?>" required/>
            </div>
          </td>
        </tr> 
        <tr>
          <td>Description</td>
          <td>
             <div class='col-lg-12'>
                <textarea class="form-control" name="description" id="description"><?php echo $row['Description']?></textarea> 
            </div>
            </td>
        </tr>
        <tr>
          <td>Handle By</td>
          <td>
             <div class='col-lg-12'>
                <select class="form-control" name="handleby" id="handleby" style="width:auto">
                    <option  value="">Please choose</option>
                    <?php 

                    $sql_staff="SELECT * FROM staff"; 
                    $r_staff = mysqli_query($dbc,$sql_staff) or die('Query failed. ' . mysqli_error());
                        
                    while ($r = mysqli_fetch_assoc($r_staff)) { ?>       
                    <option value="<?php echo $r['Staffusername']; ?>" <?php if(!strcmp($r['Staffusername'], $row['Handleby'])): echo 'Selected';?><?php endif?>  ><?php echo $r['Staffname']; ?></option>
                    <?php 
                     }
                    ?>
                </select> 
            </div>
            </td>
        </tr>
        <tr>
          <td>Target Customer</td>
          <td>
             <div class='col-lg-12'>
                <select class="form-control" type="text" name="target" id="target" required>
                  <option value="All" <?php if(!strcmp("All", $row['Targetcus'])): echo 'Selected';?><?php endif?>>All</option>
                  <option value="Adult Only" <?php if(!strcmp("Adult Only", $row['Targetcus'])): echo 'Selected';?><?php endif?>>Adult Only</option>
                  <option value="Child Only" <?php if(!strcmp("Child Only", $row['Targetcus'])): echo 'Selected';?><?php endif?>>Child Only</option>
                </select>
            </div>
            </td>
        </tr>
  </table>
  <input name="eventid" value="<?php echo $row['Eventid']?>" type="hidden" >
  <input name="updateevent" type="submit" class="btn  btn-primary" id="Submit" value="Update Event" />

</form> 