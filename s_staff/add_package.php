<h4>Create Package</h4>
<form name="form1" id="form1" method="post" action="viewpackage.php" enctype="multipart/form-data">

    <table class="table table-condensed" border="0" style="width:600px">
        <tr>
          <td>Package Name</td>
          <td>
            <div class='col-lg-12'>
                 <input class="form-control" type="text" name="packagename" id="packagename" required placeholder="Adult/Children/Senior Citizen"/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Package Time</td>
          <td>
            <div class='col-lg-12'>
                  <input type='text' name="packagetime" id="packagetime" class="form-control" placeholder="8:00 AM - 9:00 PM"  required/>
            </div>
          </td>
        </tr>
        <tr>
          <td>Package Type</td>
          <td>
            <div class='col-lg-12'>
                <select class="form-control" type="text" name="packagetype" id="packagetype" required>
                  <option value="Night & Day">Night & Day</option>
                  <option value="Night">Night</option>
                  <option value="Day">Day</option>
                </select> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Price</td>
          <td>
            <div class='col-lg-12'>
                <input class="form-control" type="text" name="price" id="price" required/>
            </div>
          </td>
        </tr> 
        <tr>
          <td>Picture</td>
          <td>
             <div class='col-sm-6'>
                <input type="file" name="uploaded" id="uploaded" required/> 
            </div>
            </td>
        </tr>
    
  </table>

  <input name="addpackage" type="submit" class="btn  btn-primary" id="Submit" value="Add Package" />

</form> 