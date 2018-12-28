
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
<h4>Create Events</h4>
<form name="form1" id="form1" method="post" action="viewevents.php">

    <table class="table table-condensed" border="0" style="width:600px">
        <tr>
          <td>Event Name</td>
          <td>
            <div class='col-lg-12'>
                 <input class="form-control" type="text" name="eventname" id="eventname" required/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Event Date</td>
          <td>
            <div class='col-lg-12'>
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' name="eventdate" id="eventdate" class="form-control" date-format="dd/mm/yyyy" required/>
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
                <input class="form-control" type="text" name="eventtime" id="eventtime"  placeholder="8:00 AM - 9:00 AM" required/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Event Place</td>
          <td>
            <div class='col-lg-12'>
                <input class="form-control" type="text" name="eventplace" id="eventplace" required/>
            </div>
          </td>
        </tr> 
        <tr>
          <td>Description</td>
          <td>
             <div class='col-lg-12'>
                <textarea class="form-control" name="description" id="description"></textarea> 
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

                    include '../includes/dbconnect.php';
                    
                    $sql_staff="SELECT * FROM staff"; 
                    $r_staff = mysqli_query($dbc,$sql_staff) or die('Query failed. ' . mysqli_error());
                        
                    while ($row = mysqli_fetch_assoc($r_staff)) { ?>       
                    <option value="<?php echo $row['Staffusername']; ?>"><?php echo $row['Staffname']; ?></option>
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
                  <option value="All">All</option>
                  <option value="Adult Only">Adult Only</option>
                  <option value="Child Only">Child Only</option>
                </select>
            </div>
            </td>
        </tr>
  </table>

  <input name="addevent" type="submit" class="btn  btn-primary" id="Submit" value="Add Event" />

</form> 