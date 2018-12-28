<h4>Registration Form</h4>
<form name="form1" id="form1" method="post" action="login.php">

    <table class="table table-condensed" border="0" style="width:600px">
        <tr>
          <td>Username</td>
          <td>
            <div class='col-lg-12'>
                 <input class="form-control" type="text" name="username" id="username" required/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>IC Number</td>
          <td>
            <div class='col-lg-12'>
                  <input type='text' name="Ic" id="Ic" class="form-control" required/>
            </div>
          </td>
        </tr>
        <tr>
          <td>Name</td>
          <td>
            <div class='col-lg-12'>
                  <input type='text' name="name" id="name" class="form-control" required/>
            </div>
          </td>
        </tr>
        <tr>
          <td>Email</td>
          <td>
            <div class='col-lg-12'>
                <input class="form-control" type="email" name="email" id="email" required/>
            </div>
          </td>
        </tr> 
        <tr>
          <td>Address</td>
          <td>
            <div class='col-lg-12'>
                <textarea class="form-control" name="address" id="address" required></textarea>
            </div>
          </td>
        </tr> 
        <tr>
          <td>Telephone Number</td>
          <td>
             <div class='col-sm-6'>
                <input class="form-control" type="text" name="notel" id="notel" required/> 
            </div>
            </td>
        </tr>

        <tr>
          <td>Password</td>
          <td>
             <div class='col-sm-6'>
                <input class="form-control" type="password" name="password" id="password" required/> 
            </div>
            </td>
        </tr>

        <tr>
          <td>Confirm Password</td>
          <td>
             <div class='col-sm-6'>
                <input class="form-control" type="password" name="cpassword" id="cpassword" required/> 
            </div>
            </td>
        </tr>
    
  </table>

  <input name="regmember" type="submit" class="btn btn-primary" id="Submit" value="Register" />
  <input name="reset" type="reset" class="btn btn-danger" value="Reset" />

</form>
