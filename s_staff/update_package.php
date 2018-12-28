
<?php

  include '../includes/dbconnect.php';

  if(isset($_GET['ids'])){

    $id = $_GET['ids'];

    $sql="SELECT * FROM package WHERE Packageid='$id'"; 
    $result = mysqli_query($dbc,$sql) or die('Query failed. ' . mysqli_error());
    $row = mysqli_fetch_assoc($result);

  }

?>

<h4>Update Package</h4>
<form name="form1" id="form1" method="post" action="viewpackage.php" enctype="multipart/form-data">

    <table class="table table-condensed" border="0" style="width:600px">
        <tr>
          <td>Package Name</td>
          <td>
            <div class='col-lg-12'>
                 <input class="form-control" type="text" name="packagename" id="packagename" value="<?php echo $row['Packagename']?>" required placeholder="Adult/Children/Senior Citizen"/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Package Time</td>
          <td>
            <div class='col-lg-12'>
                  <input type='text' name="packagetime" id="packagetime" class="form-control" value="<?php echo $row['Packagetime']?>" placeholder="8:00 AM - 9:00 PM"  required/>
            </div>
          </td>
        </tr>
        <tr>
          <td>Package Type</td>
          <td>
            <div class='col-lg-12'>
                <select class="form-control" type="text" name="packagetype" id="packagetype" required>
                  <option value="Night & Day" <?php if(!strcmp("Night & Day", $row['Packagetype'])): echo 'Selected';?><?php endif?>>Night & Day</option>
                  <option value="Night" <?php if(!strcmp("Night", $row['Packagetype'])): echo 'Selected';?><?php endif?>>Night</option>
                  <option value="Day" <?php if(!strcmp("Day", $row['Packagetype'])): echo 'Selected';?><?php endif?>>Day</option>
                </select> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Price</td>
          <td>
            <div class='col-lg-12'>
                <input class="form-control" type="text" name="price" id="price" value="<?php echo $row['Price']?>" required/>
            </div>
          </td>
        </tr> 
        <tr>
          <td>Picture</td>
          <td>
             <div class='col-sm-6'>
                <input type="file" name="uploaded" id="uploaded" value="<?php echo $row['Pictureurl']?>" required/> 
            </div>
            </td>
        </tr>
    
  </table>
  <input name="packageid" value="<?php echo $row['Packageid']?>" type="hidden" >
  <input name="updatepackage" type="submit" class="btn  btn-primary" id="Submit" value="Update Package" />

</form> 